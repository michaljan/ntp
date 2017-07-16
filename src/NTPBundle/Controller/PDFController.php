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
    
    /**
     * Generate manually
     *
     * @Route("/pdf", name="pdf_generate")
     */
    
    public function pdfVolumePrepare(){
        $html=$this->pdfVoluemAction();
        $attachmentPath=$this->returnPDF($html);
        $mailerData=$this->mailerDataAction(1);
        $data[0]=$mailerData->getSubject();//subject
        $data[1]=$mailerData->getMailList();//mailing list
        $data[2]=$mailerData->getBody();//boday
        $data[3]=$attachmentPath;
        return $data;
        
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
        $this->get('knp_snappy.pdf')->getInternalGenerator()->setTimeout(600);
        $this->get('knp_snappy.pdf')->generateFromHtml($html,$webPath);
        return $webPath;
           
    }
    
    public function mailerDataAction($id){
        $this->em = $this->getDoctrine()->getEntityManager();
        $result=$this->em->find("NTPBundle\Entity\MailingList", $id);
        return $result;
    }
}
