<?php

namespace NTPBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use NTPBundle\Entity\FileUpload;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use NTPBundle\FileProcessor\CsvFileWriter;
use NTPBundle\FileProcessor\CsvFileReader;
use NTPBundle\Entity\ParagonData;
use NTPBundle\Form\DateRangeType;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class FileController extends Controller {

    protected $processed;

    /**
     * @Template()
     */
    public function uploadFileAction(Request $request, $dataset) {
        $fileUpload = new FileUpload();
        $form = $this->createFormBuilder($fileUpload)
                ->add('name')
                ->add('file')
                ->add('planDate', 'date', array('widget' => 'single_text',
                    'format' => 'dd-MM-yyyy',
                    'data' => new \DateTime(),
                    'attr' => array('class' => 'form-control')
                        )
                )
                ->add('save', SubmitType::class, array('label' => 'Upload file'))
                ->getForm();
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $fileUpload->setDataset($dataset);
            $em->persist($fileUpload);
            $em->flush();
            return $this->redirectToRoute('file_display');
        }

        return $this->render('NTPBundle:Forms:upload_form.html.twig', array('form' => $form->createView()));
    }

    public function displayFilesAction() {
        $fileUpload = new FileUpload();
        $em = $this->getDoctrine()->getManager();
        $fileProcessed = $em->getRepository('NTPBundle:FileUpload')
                ->findByProcessed(0, array('id' => 'DESC'), 10, 0);

        return $this->render('NTPBundle:File:files_display.html.twig', array('fileProcessed' => $fileProcessed));
    }

    public function processCsvAction($id) {
        $message = null;
        $user = $this->container->get('security.token_storage')->getToken()->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $paragonData = 'NTPBundle:ParagonData';
        $csvFileWriter = new CsvFileWriter($em);
        $fileRecord = $em->getRepository('NTPBundle:FileUpload')
                ->findOneById($id);
        $planExists = $em->getRepository('NTPBundle:ParagonData')
                ->findOneByPlanDate($fileRecord->getPlanDate());
//            \Doctrine\Common\Util\Debug::dump($planExists);
//            die;
        if (!is_null($fileRecord) && is_null($planExists)) {
            $webPath = __DIR__ . '/../data/uploads/' . $fileRecord->getPath();
            $result = $csvFileWriter->csvImport($webPath, $paragonData, $user, $fileRecord);
            if (!empty($result->getExceptions())) {
                $exceptionsArray = $result->getExceptions();
            } else {
                $exceptionsArray = array();
            }
            $fileRecord->setProcessed(true);
            $em->flush();
            //\Doctrine\Common\Util\Debug::dump($result);
            //die;
        }
        if (!is_null($planExists)) {
            $message = 'File proccessed already';
            return $this->render('NTPBundle:File:file_processed.html.twig', array('message' => $message));
        }
        return $this->render('NTPBundle:File:file_processed.html.twig', array('errors' => ($result->getErrorCount()),
                    'success' => ($result->getSuccessCount()),
                    'exceptionsArray' => $exceptionsArray,
                    'message' => $message
        ));
    }

    public function deleteCsvAction($id) {
        $em = $this->getDoctrine()->getManager();
        $fileRecord = $em->getRepository('NTPBundle:FileUpload')
                ->findOneById($id);
        if (!$fileRecord) {
            throw $this->createNotFoundException(
                    'No fie found for id ' . $id
            );
        }
        $em->remove($fileRecord);
        $em->flush();
        return $this->redirectToRoute('file_display');
    }

    public function uploadedPlansAction() {
        $em = $this->getDoctrine()->getManager();
        $endDate = date('Y-m-d');
        $startDate = new \DateTime('Today');
        $startDate->sub(new \DateInterval('P30D'));
        $dateCounter = $startDate;
        $startDate = $startDate->format('Y-m-d');
        $query = $em->createQuery('SELECT DISTINCT p.planDate FROM NTPBundle:ParagonData p WHERE p.planDate BETWEEN :startDate AND :endDate')
                ->setParameter('startDate', $startDate)
                ->setParameter('endDate', $endDate);
        $result = $query->getResult();
        $formattedArray = array_map(function($num) {
            return $num['planDate']->format('Y-m-d');
        }, $result);
        $count = 1;
        for ($i = 1; $i <= 36; $i++) {
            $dateArray[$i]['date'] = $dateCounter->format('Y-m-d');
            if (in_array($dateCounter->format('Y-m-d'), $formattedArray)) {
                $dateArray[$i]['inarray'] = True;
            } else {
                $dateArray[$i]['inarray'] = False;
            }
            if ($count == 6) {
                $dateArray[$i]['counter'] = True;
                $count = 0;
            } else {
                $dateArray[$i]['counter'] = False;
            }
            $count++;
            $dateCounter->add(new \DateInterval('P1D'));
        }
        //\Doctrine\Common\Util\Debug::dump($dateArray);
        //die;
        return $this->render('NTPBundle:File:files_history.html.twig', array('dateArray' => $dateArray));
    }

    public function downloadFileAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(DateRangeType::class);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $csvFileReader = new CsvFileReader($em);
            $startDate = $form->get('startDate')->getData();
            $endDate = $form->get('endDate')->getData();
            $result = $csvFileReader->readDatabase($startDate, $endDate);
            if ($result <> false) {
                $response = new BinaryFileResponse($result);
                $response->headers->set('Content-Type', 'text/plain');
                $response->setContentDisposition(
                        ResponseHeaderBag::DISPOSITION_ATTACHMENT, 'paragon' . date("Ymd") . '.csv'
                );
                return $response;
            }
        }
        return $this->render('NTPBundle:File:download_file.html.twig', array('form' => $form->createView()));
    }

}
