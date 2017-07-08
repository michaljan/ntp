<?php

// src/AppBundle/Controller/AdminController.php

namespace NTPBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use NTPBundle\Controller\GeneratorController;

class PDFController extends Controller {


    public $result;
    
    
      /**
     * @Route("/pdftest")
     */
    public function pdfPrepareAction(){
        $html=$this->pdfVoluemAction();
        $filePath=$this->returnPDFAction($html);
        
        return new Response($filePath);
        
    }
    
    
    public function pdfVoluemAction() {
        $result=array();
        $result= $this->get('ntp.pdf_reports')->dailyVolumes();
        $resultPallet= $this->get('ntp.pdf_reports')->palletVolumes();
        $trailerFill= $this->get('ntp.pdf_reports')->trailerFill();
        $palletFill= $this->get('ntp.pdf_reports')->palletFill();
        $avgTrailerFill= $this->get('ntp.pdf_reports')->avgTrailerFill();
        $html=$this->renderView('NTPBundle:PDFReports:volumes.html.twig', array('result'=>$result,'resultPallet'=>$resultPallet,'trailerFill'=>$trailerFill,"palletFill"=>$palletFill,"avgTrailerFill"=>$avgTrailerFill));
        $this->returnPDF($html);
    }
    
        
    public function returnPDF($html) {
        //set_time_limit(30); uncomment this line according to your needs
        // If you are not in a controller, retrieve of some way the service container and then retrieve it
        //$pdf = $container->get("white_october.tcpdf")->create('vertical', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        //if you are in a controlller use :

        $filename = sprintf('test-%s.pdf', date('Y-m-d'));

        return new Response(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            200,
            [
                'Content-Type'        => 'application/pdf',
                'Content-Disposition' => sprintf('attachment; filename="%s"', $filename),
            ]
        );
    }
    

}
