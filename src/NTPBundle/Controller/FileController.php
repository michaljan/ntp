<?php
namespace NTPBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use NTPBundle\Entity as Entity;
use NTPBundle\Form\UploadType;
use Symfony\Component\HttpFoundation\Request;

class FileController extends Controller
{
    public function uploadParagonAction(Request $request)
    {
    $paragonUpload = new Entity\ParagonUpload;
    $form=$this->get('form.factory')->create(new UploadType($paragonUpload));
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

