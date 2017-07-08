<?php

// src/AppBundle/Controller/AdminController.php

namespace NTPBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use \Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class PDFTestController extends Controller {


    public $result;
    
    /**
     * @Route("/pdftest")
     */
    public function pdfTestAction() {
        $result=array();
        
        $result= $this->get('ntp.pdf_reports')->dailyVolumes();
        $resultPallet= $this->get('ntp.pdf_reports')->palletVolumes();
        $trailerFill= $this->get('ntp.pdf_reports')->trailerFill();
        $palletFill= $this->get('ntp.pdf_reports')->palletFill();
        $avgTrailerFill= $this->get('ntp.pdf_reports')->avgTrailerFill();
        return new response($this->renderView('NTPBundle:PDFReports:volumes.html.twig', array('result'=>$result,'resultPallet'=>$resultPallet,'trailerFill'=>$trailerFill,"palletFill"=>$palletFill,"avgTrailerFill"=>$avgTrailerFill)));
    }

}
