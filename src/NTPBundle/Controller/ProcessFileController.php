<?php

namespace NTPBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ProcessFileController extends Controller
{
    public function importCSVAction()
    {
        return $this->render('NTPBundle:Default:index.html.twig');
    }
}
