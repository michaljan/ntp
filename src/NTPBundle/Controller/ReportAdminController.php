<?php

// src/AppBundle/Controller/AdminController.php

namespace NTPBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ReportAdminController extends Controller {

    public function manualEmailTriggerAction() {
        $weeklyArray = array('weeklyVolumeEmailAction' => 'Send last week volume report', 'weeklyTractorUsageAction' => 'Send last week tractor usage email');
        return new response($this->renderView('NTPBundle:ReportAdmin:manualEmailTrigger.html.twig', array('weeklyArray' => $weeklyArray)));
    }

    public function manualEmailAction(Request $request) {
        $isAjax = $request->isXmlHttpRequest();
    }


}
