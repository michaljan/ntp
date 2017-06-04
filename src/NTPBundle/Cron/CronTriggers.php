<?php

namespace NTPBundle\Cron;

use NTPBundle\Generator\PDFGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\DependencyInjection\ContainerAware;

class CronTriggers extends ContainerAware {

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
        
        $em = $this->container->get('doctrine');
                var_dump('test');
        die;
        $csvReader = new \NTPBundle\FileProcessor\CsvFileReader($em);
        $endDate = new \DateTime();
        $startDate = new \DateTime();
        $endDate->sub(new \DateInterval("P1W"));
        var_dump('test');
        die;
        $attachmentPath = $csvReader->readDatabase($startDate, $endDate);
        if ($attachmentPath <> false) {
            $this->container->get('app.custom_mailer')->weekExtractMail($attachmentPath);
        }
        return;
    }

}
