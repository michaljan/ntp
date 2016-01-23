<?php
namespace NTPBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use NTPBundle\Entity as Entity;
use NTPBundle\Form\UploadType;

class FileController extends Controller
{
    public function uploadParagonAction()
    {
    $paragonUpload = new Entity\ParagonUpload;
    $form = new UploadType();
    $form->buildForm($paragonUpload, $options);
    $form->handleRequest($request);
    if ($form->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $em->persist($document);
        $em->flush();
        return $this;
    }
        
    return $this->render('NTPBundle:Forms:upload_form.html.twig',array('form' => $form->createView()));
    }
}

