<?php

// src/AppBundle/Controller/AdminController.php

namespace NTPBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use \Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \NTPBundle\Cron\CronTriggers;

class PDFTestController extends Controller {

    /**
     * @Route("/pdftest")
     */
    public function pdfTestAction() {
        $em = $this->getDoctrine()->getManager();
        $csvReader = new \NTPBundle\FileProcessor\CsvFileReader($em);
        $endDate = new \DateTime();
        $startDate = new \DateTime();
        $endDate->sub(new \DateInterval("P1W"));
        $attachmentPath = $csvReader->readDatabase($startDate, $endDate);
        if ($attachmentPath <> false) {
            $this->get('app.custom_mailer')->weekExtractMail($attachmentPath);
        }
        return new response($this->renderView('NTPBundle:PDFReports:weekVolumes.html.twig', array()));
    }

}
