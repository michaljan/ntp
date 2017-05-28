<?php

namespace NTPBundle\Cron;

use NTPBundle\Generator\PDFGenerator;

class CronJobs
{
    public function pdfTrigger()
    {
        $pdfGenerator = new PDFGenerator;
         $html = $this->renderView(
         'Templates/template.html.twig',
         array(
          'someDataToView' => 'Something'
         )
    );
  
    $pdfGenerator->returnPDFResponseFromHTML($html);
    }
}
