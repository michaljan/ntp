<?php

// src/AppBundle/Controller/AdminController.php

namespace NTPBundle\Controller;
use Symfony\Component\Process\Exception\ProcessTimedOutException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use NTPBundle\Controller\GeneratorController;

class PDFController extends Controller {


    public $result;
    /*
     * Clear all files in pdf folder
     */
    
    
    
    public function __construct() {
        array_map('unlink', glob(__DIR__ . '/../data/pdf/*.*'));
    }

    /**
     * @Route("/pdftest")
     */
   
    public function pdfPrepareAction(){
        $html=$this->pdfVoluemAction();
        $filePath=$this->returnPDF($html);
        
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
       
        return new Response($html);
    }
    
        
    public function returnPDF($html) {
        $webPath = __DIR__ . '/../data/pdf/weeklyvolumecron' . date("Ymd") . '.pdf';
        //file_put_contents( __DIR__ . '/../data/pdf/weeklyvolumecron' . date("Ymd") . '.html',$html);
        $this->get('knp_snappy.pdf')->getInternalGenerator()->setTimeout(600);
        $this->get('knp_snappy.pdf')->generateFromHtml($html,$webPath);
        return new Response($webPath);
           
    }
    

}
