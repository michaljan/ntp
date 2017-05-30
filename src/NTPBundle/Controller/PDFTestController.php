<?php

// src/AppBundle/Controller/AdminController.php

namespace NTPBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use \Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PDFTestController extends Controller{

    /**
     * @Route("/pdftest")
     */
    public function pdfTestAction() {
        return new response($this->renderView('NTPBundle:PDFReports:weekVolumes.html.twig', array()));
    }

}
