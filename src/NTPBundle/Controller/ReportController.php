<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace NTPBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use NTPBundle\Entity\ParagonData;
use NTPBundle\Form\ReportType;
use NTPBundle\Form\RangeType;
use Symfony\Component\HttpFoundation\Request;
use NTPBundle\Reports\ParagonReports;
use \Symfony\Component\HttpFoundation\Response;

/**
 * Description of ReportController
 *
 * @author Michal
 */
class ReportController extends Controller {

    public function dashboardAction(Request $request) {
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
        return new response($this->renderView('NTPBundle:Reports:dashboard.html.twig', array('form' => $form->createView(), 'report' => $result, 'message'=>$message)));
    }
    
    
    public function tractorReportAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(RangeType::class);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $startDate = $form->get('startDate')->getData();
            $endDate = $form->get('endDate')->getData();
            $report = $this->get('paragonreports');
            $result = $report->tractorReport($startDate, $endDate);
            
        }else {
            $result = FALSE;
        }
//        \Doctrine\Common\Util\Debug::dump($result['tractor']);
//        die;
        return new response($this->renderView('NTPBundle:Reports:tractorReport.html.twig', array('form' => $form->createView(),'report'=>$result)));
    }
    
    /**
     * 
     *
     * @param array $request 
     * @return view
     *
     * Controller responsible for managing paragon run sheet report
     * creates view and gats request from wiev    
     */
    
       
    public function storesETAAction(Request $request){
        $form = $this->createForm(ReportType::class);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $startDate = $form->get('planDate')->getData();
            $report = $this->get('paragonreports');
            $result = FALSE;
        }else {
            $result = FALSE;
        }
        return new response($this->renderView('NTPBundle:Reports:paragonRunSheetReport.html.twig', array('form' => $form->createView(),'report'=>$result)));
    }
    
    
    
    
    
    
    
    
    
    
    
    public function paragonRunSheetReportAction(Request $request){
        $form = $this->createForm(ReportType::class);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $startDate = $form->get('planDate')->getData();
            $report = $this->get('paragonreports');
        //\Doctrine\Common\Util\Debug::dump($request->isXmlHttpRequest());
        //die;      
            $result = FALSE;
        }else {
            $result = FALSE;
        }
//        \Doctrine\Common\Util\Debug::dump($result['tractor']);
//        die;
        return new response($this->renderView('NTPBundle:Reports:paragonRunSheetReport.html.twig', array('form' => $form->createView(),'report'=>$result)));
    }
    
}
