<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace NTPBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use NTPBundle\Entity\ParagonData;
/**
 * Description of ReportController
 *
 * @author Michal
 */
class ReportController extends Controller {

    public function dashboardAction() {
        $report = new ParagonData;
        $form->createForm(Report::class, $report);
        $form->handleRequest($request);
        return $this->render('NTPBundle:Reports:dashboard.html.twig',array('form' => $form->createView()));
    }

}
