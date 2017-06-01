<?php

namespace NTPBundle\Mailer;

  use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class CustomMailer {
    
    private $mailer;

    public function __construct($mailer)
    {
        $this->mailer = $mailer;
    }
    
    
    public function weekExtractMail() {
        
        $message = \Swift_Message::newInstance()
                ->setSubject('Hello Email')
                ->setFrom('no-reply@mxmelite.com')
                ->setTo('michal.papke@wp.pl')
                ->setBody("Test"
        );
        //$this->get('mail.helper')->send($message);
        $this->mailer->send($message);
        return $this;
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

