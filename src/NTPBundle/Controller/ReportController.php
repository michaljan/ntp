<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace NTPBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use NTPBundle\Form\ReportType;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of ReportController
 *
 * @author Michal
 */
class ReportController extends Controller {

    public function dashboardAction(Request $request) {
        $form = new ReportType;
        $form->buildForm();
        $form->handleRequest($request);
        if ($form->isValid()) {

        }
        return $this->render('NTPBundle:Reports:dashboard.html.twig',array('form' => $form->createView()));
    }

}
