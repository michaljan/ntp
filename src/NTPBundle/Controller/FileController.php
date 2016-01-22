<?php
namespace NTPBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class FileController extends Controller
{
    public function uploadParagonAction()
    {
        return $this->render('NTPBundle:Forms:upload_form.html.twig');
    }
}

