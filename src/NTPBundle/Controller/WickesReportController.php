<?php

namespace NTPBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use NTPBundle\Entity\ParagonData;
use NTPBundle\Form\ReportType;
use NTPBundle\Form\RangeType;
use NTPBundle\Form\WeekRangeType;
use Symfony\Component\HttpFoundation\Request;
use NTPBundle\Reports\WickesParagonReports;
use \Symfony\Component\HttpFoundation\Response;


class WickesReportController extends Controller
{
        public function wickesDashboardAction(Request $request) {
        $message=null;
        $em =   $this->getDoctrine()->getManager();
        $result = array();
        $entity = new ParagonData;
        $form = $this->createForm(ReportType::class, $entity);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $date = $form->get('planDate')->getData();
            $planExists = $em->getRepository('NTPBundle:ParagonData')
                ->findOneByPlanDate($date);
            if (!empty($planExists)) {
                $report = $this->get('paragonreports');
                $result = $report->dashboard($date);
            }
            else{
                $message='Plan for the date is not imported';
            }
        } else {
            $result = FALSE;
        }
        return new response($this->renderView('NTPBundle:WickesReports:dashboard.html.twig', array('form' => $form->createView(), 'report' => $result, 'message'=>$message)));
    }
    
}
