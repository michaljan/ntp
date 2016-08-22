<?php
namespace NTPBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use NTPBundle\TMS\Para;

class TMSController extends Controller
{
   
    public function routeDisplayAction()
    {
        return $this->render('NTPBundle:Default:index.html.twig');
    }
}
