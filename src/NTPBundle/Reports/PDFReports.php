<?php

namespace NTPBundle\Reports;

use Doctrine\ORM\EntityManager;

class PDFReports {

    private $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function dailyVolumes() {
        $resultArray=array();
        $endDate = new \DateTime();
        $startDate = new \DateTime(); //week date
        $startDate->sub(new \DateInterval('P7D'));
        $query = $this->em
                ->createQuery("SELECT dayname(p.startTime) AS planDay, SUM(ROUND(p.ndata5/1000)) AS volume "
                        . "FROM NTPBundle:ParagonData p WHERE p.planDate BETWEEN :startDate AND :endDate AND p.ndata5<>0 GROUP BY p.planDate")
                ->setParameter('startDate', $startDate->format('Y-m-d'))
                ->setParameter('endDate', $endDate->format('Y-m-d'));
        $result =  array_reverse($query->getResult());
        $conversionBar='';
        foreach ($result as $row){
            $conversionBar=('["'.implode('",',$row).',"blue"]').','.$conversionBar;
        }
        
        $conversionPie='';
        foreach ($result as $row){
            $conversionPie=('["'.implode('",',$row).']').','.$conversionPie;
        }
        
        
        $resultArray['volumeBar']='[["Element", "Density", { role: "style" } ],'.substr($conversionBar, 0, -1).']';
        $resultArray['volumePie']= '[["Day", "Volume"],'.substr($conversionPie, 0, -1).']';        
//\Doctrine\Common\Util\Debug::dump($conversion);
        //die;
        return $resultArray;
    }
        public function palletVolumes() {
        $resultArray=array();
        $endDate = new \DateTime();
        $startDate = new \DateTime(); //week date
        $startDate->sub(new \DateInterval('P7D'));
        $query = $this->em
                ->createQuery("SELECT dayname(p.startTime) AS planDay,SUM(p.measure5) AS palletFootprint "
                        . "FROM NTPBundle:ParagonData p WHERE p.planDate BETWEEN :startDate AND :endDate AND p.ndata5<>0 GROUP BY p.planDate")
                ->setParameter('startDate', $startDate->format('Y-m-d'))
                ->setParameter('endDate', $endDate->format('Y-m-d'));
        $result =  array_reverse($query->getResult());
        $conversionBar='';
        foreach ($result as $row){
            $conversionBar=('["'.implode('",',$row).',"blue"]').','.$conversionBar;
        }
        
        $conversionPie='';
        foreach ($result as $row){
            $conversionPie=('["'.implode('",',$row).']').','.$conversionPie;
        }
        
        
        $resultArray['palletBar']='[["Element", "Density", { role: "style" } ],'.substr($conversionBar, 0, -1).']';
        $resultArray['palletPie']= '[["Day", "Volume"],'.substr($conversionPie, 0, -1).']';        
//\Doctrine\Common\Util\Debug::dump($conversion);
        //die;
        return $result;
    
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

