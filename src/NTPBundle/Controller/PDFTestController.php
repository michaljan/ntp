<?php

// src/AppBundle/Controller/AdminController.php

namespace NTPBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use \Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use NTPBundle\Mailer\CustomMailer;

class PDFTestController extends Controller{

    /**
     * @Route("/pdftest")
     */
    public function pdfTestAction() {
        $mailer=new CustomMailer;
        $mailer->weekExtractMail();
        return new response($this->renderView('NTPBundle:PDFReports:weekVolumes.html.twig', array()));
    }

}
