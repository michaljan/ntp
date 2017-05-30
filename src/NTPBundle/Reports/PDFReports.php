<?php

namespace NTPBundle\Reports;

use Doctrine\ORM\EntityManager;


class PDFReports{
    
    private $em;
    
    public function __construct(EntityManager $em) {
        $this->em=$em;
        
    }
    
    public function weeklyVolumes(){
        $week=20; //replace with current week number functon
        \Doctrine\Common\Util\Debug::dump($this->em);
        die;
    }
    
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

