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
use Symfony\Component\HttpFoundation\Request;
use NTPBundle\Reports\ParagonReports;
/**
 * Description of ReportController
 *
 * @author Michal
 */
class ReportController extends Controller {

    public function dashboardAction(Request $request) {
        $result=array();
        $entity = new ParagonData;
        $form=$this->createForm(ReportType::class, $entity);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $date=$form->get('planDate')->getData();
            $report =$this->get('paragonreports');
            $result= $report->dashboard($date);
            //\Doctrine\Common\Util\Debug::dump($form->get('planDate')->getData());
        }
        return $this->render('NTPBundle:Reports:dashboard.html.twig',array('form' => $form->createView(),'report'=>$result));
    }

}
