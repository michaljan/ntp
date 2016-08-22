<?php
namespace NTPBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use NTPBundle\TMS\Para;

class NtpController extends Controller
{
   
    public function paragonTranslateAction()
    {
        return $this->render('NTPBundle:Default:index.html.twig');
    }
}
