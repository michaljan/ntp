<?php

namespace NTPBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use NTPBundle\Entity\FileUpload;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use NTPBundle\FileProcessor\CsvFileWriter;

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
            $fileUpload->setDataset($dataset);
            $em = $this->getDoctrine()->getManager();
            $em->persist($fileUpload);
            $em->flush();
            $this->displayFilesAction();
        }

        return $this->render('NTPBundle:Forms:upload_form.html.twig', array('form' => $form->createView()));
    }

    public function displayFilesAction() {
        $fileUpload = new FileUpload();
        $em = $this->getDoctrine()->getManager();
        $fileProcessed = $em->getRepository('NTPBundle:FileUpload')
                ->findByProcessed( 0 ,array('id'=>'DESC'),10,0);
        return $this->render('NTPBundle:File:files_display.html.twig', array('fileProcessed' => $fileProcessed));
    }
    
    public function processCsvAction($id){
        $csvFileWriter = new CsvFileWriter;
        $em = $this->getDoctrine()->getManager();
        $fileRecord = $em->getRepository('NTPBundle:FileUpload')
                ->findById($id);
        if(!is_null($fileRecord)){
            $webPath=$this->container->getParameter('web_path').'/uploads/';
            \Doctrine\Common\Util\Debug::dump($fileRecord->getPath());
        }
        //$fileImport->csvImport($csvFile, $entity);
        return $this->render('NTPBundle:File:file_processed.html.twig');
    }

}
