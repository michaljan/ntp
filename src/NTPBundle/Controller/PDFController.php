<?php

// src/AppBundle/Controller/AdminController.php

namespace NTPBundle\Controller;
use Symfony\Component\Process\Exception\ProcessTimedOutException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use NTPBundle\Controller\GeneratorController;
use NTPBundle\Mailer\CustomMailer;
use Doctrine\ORM\EntityManager;
use NTPBundle\Entity\MailingList;


class PDFController extends Controller {


    public $result;
    /*
     * Clear all files in pdf folder
     */
    
    
    
    public function __construct() {
        array_map('unlink', glob(__DIR__ . '/../data/pdf/*.*'));
        
    }
    
   
    public function pdfVolumePrepare(){
        $name='planned_weekly_volume_';
        $mailerData=$this->mailerData(1);
        if($mailerData->getActive()==0){
            return null;
        }
        $html=$this->pdfVoluemAction();
        $attachmentPath=$this->returnPDF($html,$name);
        $data=$this->allocateData($mailerData,$attachmentPath);
        return $data;
        
    }
    
    public function pdfTractorUsagePrepare(){
        $name='planned_tractor_usage_';
        $mailerData=$this->mailerData(3);
        if($mailerData->getActive()==0){
            return null;
        }
        $html=$this->pdfTractorUsageAction();
        $attachmentPath=$this->returnPDF($html,$name);
        $data=$this->allocateData($mailerData,$attachmentPath);
        return $data;
    }
    
     /*
     * Monthly volume report
     * 
     * @return $data array for mailer
     */
    
    
    
    
    public function pdfMonthlyVolumePrepare(){
        $name='planned_weekly_volume_';
        $mailerData=$this->mailerData(1);
        if($mailerData->getActive()==0){
            return null;
        }
        $html=$this->pdfMonthlyVolumeAction();
        $attachmentPath=$this->returnPDF($html,$name);
        $data=$this->allocateData($mailerData,$attachmentPath);
        return $data;
        
    }
    
    /**
     * Matches /html exactly
     *
     * @Route("/html", name="html_test")
     */

     public function pdfMonthlyVolumeAction() {
         $monthlyVolume=$this->get('monthlypdfreports')->monthlyVolume();
         $html=$this->renderView('NTPBundle:PDFReports:monthlyVolume.html.twig', array('monthlyVolume'=>$monthlyVolume));
         return new Response($html);
     }

    

    public function pdfTractorUsageAction() {
        $tractorUsageWeekly= $this->get('ntp.pdf_reports')->tractorUsageWeekly();
        $tractorAllocation= $this->get('ntp.pdf_reports')->tractorAllocation();
        $tractorRuns= $this->get('ntp.pdf_reports')->tractorsRuns();
        $html=$this->renderView('NTPBundle:PDFReports:tractorUsage.html.twig', array('tractorUsageWeekly'=>$tractorUsageWeekly["tractorUsage"],'maxTractors'=>$tractorUsageWeekly["maxTractors"],'tractorAllocation'=>$tractorAllocation,'tractorRuns'=>$tractorRuns));
        return new Response($html);
    }

    public function pdfVoluemAction() {
        
        $dailyVolumes= $this->get('ntp.pdf_reports')->dailyVolumes();
        $resultPallet= $this->get('ntp.pdf_reports')->palletVolumes();
        $trailerFill= $this->get('ntp.pdf_reports')->trailerFill();
        $palletFill= $this->get('ntp.pdf_reports')->palletFill();
        $avgTrailerFill= $this->get('ntp.pdf_reports')->avgTrailerFill();
        $weight= $this->get('ntp.pdf_reports')->weight();
        $cases= $this->get('ntp.pdf_reports')->cases();
        $dateRange= $this->get('ntp.pdf_reports')->getDate();
        $html=$this->renderView('NTPBundle:PDFReports:volumes.html.twig', array('result'=>$dailyVolumes,'resultPallet'=>$resultPallet,'trailerFill'=>$trailerFill,"palletFill"=>$palletFill,"avgTrailerFill"=>$avgTrailerFill,"weight"=>$weight,"cases"=>$cases,"dateRange"=>$dateRange));
        return new Response($html);
    }
    
        
    private function returnPDF($html,$name) {
        $webPath = __DIR__ . '/../data/pdf/'.$name. date("Ymd") . '.pdf';
        $this->get('knp_snappy.pdf')->getInternalGenerator()->setTimeout(600);
        $this->get('knp_snappy.pdf')->generateFromHtml($html,$webPath);
        return $webPath;
           
    }
    
    private function mailerData($id){
        $this->em = $this->getDoctrine()->getEntityManager();
        $result=$this->em->find("NTPBundle\Entity\MailingList", $id);
        return $result;
    }
    
    private function allocateData($mailerData,$attachmentPath){
        $data[0]=$mailerData->getSubject();//subject
        $data[1]=explode(";",$mailerData->getMailList());//mailing list
        $data[2]=$mailerData->getBody();//boday
        $data[3]=$attachmentPath;
        return $data;
    }
    

}
