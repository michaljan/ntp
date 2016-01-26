<?php

namespace NTPBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use NTPBundle\Entity\FileUpload;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

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
            $processed=false;
            $this->displayFilesAction($processed);
        }

        return $this->render('NTPBundle:Forms:upload_form.html.twig', array('form' => $form->createView()));
    }

    public function displayFilesAction($processed) {
 //       $this->processed=$processed;
        $fileUpload = new FileUpload();
        $em = $this->getDoctrine()->getManager();
        //if($this->processed === true || $this->processed === false){
//        $fileProcessed = $em->getRepository($fileUpload)
//                ->findByProcessed('1');
//        }
//        else{
//        $fileProcessed = $em->getRepository($fileUpload)
//                ->findBy(array(),array('id'=>'DESC'),10,0);
//        }
//
//        if (!$fileProcessed) {
//            throw $this->createNotFoundException(
//                    'No files to process'
//            );
//        
//        }
        return $this->render('NTPBundle:File:files_display.html.twig');//, array('fileProcessed' => $fileProcessed));
    }

}
