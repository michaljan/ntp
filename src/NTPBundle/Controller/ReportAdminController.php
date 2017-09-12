<?php

// src/AppBundle/Controller/AdminController.php

namespace NTPBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class ReportAdminController extends Controller {

    public function manualEmailTriggerAction(Request $request) {
        $weeklyArray = array('weeklyVolumeEmail' => 'Send last week volume report', 'weeklyTractorUsage' => 'Send last week tractor usage email');
        $isAjax = $request->isXmlHttpRequest();

        if ($isAjax == True) {
            $report = $request->get('data1');
            if($report=='weeklyVolumeEmail'){
                $data = $this->get('app.pdf_generate')->pdfVolumePrepare();
            }
            if($report=='weeklyTractorUsage'){
                $data = $this->get('app.pdf_generate')->pdfTractorUsagePrepare();
            }
            if (!is_null($data)) {
                $this->get('app.custom_mailer')->weekExtractMail($data);
            }
            $response = array('code' => 100, 'success' => true);
            return new JsonResponse($response);
        }

        return new Response($this->renderView('NTPBundle:ReportAdmin:manualEmailTrigger.html.twig', array('weeklyArray' => $weeklyArray)));
    }

}
