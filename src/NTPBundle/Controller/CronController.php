<?php

namespace NTPBundle\Controller;

use NTPBundle\Generator\PDFGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CronController extends Controller{

    public function pdfTrigger() {
        $pdfGenerator = new PDFGenerator;
        $html = $this->renderView(
                'Templates/template.html.twig', array(
            'someDataToView' => 'Something'
                )
        );

        $pdfGenerator->returnPDFResponseFromHTML($html);
    }
    
        public function weekExtractTrigger() {
            $csvReader=new \NTPBundle\FileProcessor\CsvFileReader;
            $endDate=Date("Y-m-d",time());
            $startDate=Date("Y-m-d",strtotime("-1 week"));
            $result=$csvReader->readDatabase($startDate, $endDate);
            if($result<>false){
                
            }
            
    }

}
