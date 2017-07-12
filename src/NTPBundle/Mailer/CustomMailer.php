<?php

namespace NTPBundle\Mailer;

  use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class CustomMailer {
    
    private $mailer;
    
    public function __construct($mailer)
    {
        $this->mailer = $mailer;
        
    }
    
    
    public function weekExtractMail($data) {
        
        $message = \Swift_Message::newInstance()
                ->setSubject($data[0])
                ->setFrom('no-reply@mxmelite.com')
                ->setTo($data[1])
                ->setBody($data[2])
                ->attach(\Swift_Attachment::fromPath($data[3]))
                
        ;
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

