<?php

namespace NTPBundle\Reports;

use Doctrine\ORM\EntityManager;

class PDFReports {

    private $em;
    private $endDate;
    private $startDate;

    public function __construct(EntityManager $em) {
        $this->em = $em;
        $this->endDate = new \DateTime();
        $this->startDate = new \DateTime(); //week date
        $this->startDate->sub(new \DateInterval('P7D'));
    }

    public function dailyVolumes() {
        $resultArray = array();
        $endDate = new \DateTime();
        $startDate = new \DateTime(); //week date
        $startDate->sub(new \DateInterval('P7D'));
        $query = $this->em
                ->createQuery("SELECT dayname(p.startTime) AS planDay, SUM(ROUND(p.ndata5/1000)) AS volume "
                        . "FROM NTPBundle:ParagonData p WHERE p.planDate BETWEEN :startDate AND :endDate AND p.ndata5<>0 GROUP BY p.planDate")
                ->setParameter('startDate', $startDate->format('Y-m-d'))
                ->setParameter('endDate', $endDate->format('Y-m-d'));
        $result = array_reverse($query->getResult());
        $conversionBar = '';
        foreach ($result as $row) {
            $conversionBar = ('["' . implode('",', $row) . ',"blue"]') . ',' . $conversionBar;
        }

        $conversionPie = '';
        foreach ($result as $row) {
            $conversionPie = ('["' . implode('",', $row) . ']') . ',' . $conversionPie;
        }


        $resultArray['volumeBar'] = '[["Element", "Density", { role: "style" } ],' . substr($conversionBar, 0, -1) . ']';
        $resultArray['volumePie'] = '[["Day", "Volume"],' . substr($conversionPie, 0, -1) . ']';
//\Doctrine\Common\Util\Debug::dump($conversion);
        //die;
        return $resultArray;
    }

    public function palletVolumes() {
        $resultArray = array();
        $endDate = new \DateTime();
        $startDate = new \DateTime(); //week date
        $startDate->sub(new \DateInterval('P7D'));
        $query = $this->em
                ->createQuery("SELECT dayname(p.startTime) AS planDay,SUM(p.measure5) AS palletFootprint "
                        . "FROM NTPBundle:ParagonData p WHERE p.planDate BETWEEN :startDate AND :endDate AND p.ndata5<>0 GROUP BY p.planDate")
                ->setParameter('startDate', $startDate->format('Y-m-d'))
                ->setParameter('endDate', $endDate->format('Y-m-d'));
        $result = array_reverse($query->getResult());
        $conversionBar = '';
        foreach ($result as $row) {
            $conversionBar = ('["' . implode('",', $row) . ',"blue"]') . ',' . $conversionBar;
        }

        $conversionPie = '';
        foreach ($result as $row) {
            $conversionPie = ('["' . implode('",', $row) . ']') . ',' . $conversionPie;
        }


        $resultArray['palletBar'] = '[["Element", "Density", { role: "style" } ],' . substr($conversionBar, 0, -1) . ']';
        $resultArray['palletPie'] = '[["Day", "Volume"],' . substr($conversionPie, 0, -1) . ']';
//\Doctrine\Common\Util\Debug::dump($conversion);
        //die;
        return $resultArray;
    }

    public function trailerFill() {
        $resultArray = array();
        $endDate = new \DateTime();
        $startDate = new \DateTime(); //week date
        $startDate->sub(new \DateInterval('P7D'));
        $query = $this->em
                ->createQuery("SELECT dayname(p.startTime) AS planDay,SUM(p.measure5)/(COUNT(DISTINCT(p.routeNo))*58) AS trailerFill "
                        . "FROM NTPBundle:ParagonData p WHERE p.planDate BETWEEN :startDate AND :endDate AND p.ndata5<>0 GROUP BY p.planDate")
                ->setParameter('startDate', $startDate->format('Y-m-d'))
                ->setParameter('endDate', $endDate->format('Y-m-d'));
        $result = array_reverse($query->getResult());

        $conversionBar = '';
        foreach ($result as $row) {
            $conversionBar = ('["' . implode('",', $row) . ',"blue"]') . ',' . $conversionBar;
        }

        $resultArray['trailerChart'] = '[["Element", "Density", { role: "style" } ],' . substr($conversionBar, 0, -1) . ']';
//        \Doctrine\Common\Util\Debug::dump($resultArray);
//            die;
        return $resultArray;
    }

    public function palletFill() {
        $resultArray = array();
        $endDate = new \DateTime();
        $startDate = new \DateTime(); //week date
        $startDate->sub(new \DateInterval('P7D'));
        $query = $this->em
                ->createQuery("SELECT dayname(p.startTime) AS planDay, SUM(ROUND(p.ndata5/1000))/SUM(p.measure5) AS palletFill "
                        . "FROM NTPBundle:ParagonData p WHERE p.planDate BETWEEN :startDate AND :endDate AND p.ndata5<>0 GROUP BY p.planDate")
                ->setParameter('startDate', $startDate->format('Y-m-d'))
                ->setParameter('endDate', $endDate->format('Y-m-d'));
        $result = array_reverse($query->getResult());

        $conversionBar = '';
        foreach ($result as $row) {
            $conversionBar = ('["' . implode('",', $row) . ',"blue"]') . ',' . $conversionBar;
        }

        $resultArray['palletFillColumn'] = '[["Element", "Density", { role: "style" } ],' . substr($conversionBar, 0, -1) . ']';
//        \Doctrine\Common\Util\Debug::dump($resultArray);
//            die;
        return $resultArray;
    }

    public function avgTrailerFill() {
        $resultArray = array();
        $endDate = new \DateTime();
        $startDate = new \DateTime(); //week date
        $startDate->sub(new \DateInterval('P7D'));
        $query = $this->em
                ->createQuery("SELECT dayname(p.startTime) AS planDay, ROUND(SUM(p.measure5)/COUNT(DISTINCT(p.routeNo)) AS avgTrailerFill "
                        . "FROM NTPBundle:ParagonData p WHERE p.planDate BETWEEN :startDate AND :endDate AND p.ndata5<>0 GROUP BY p.planDate")
                ->setParameter('startDate', $startDate->format('Y-m-d'))
                ->setParameter('endDate', $endDate->format('Y-m-d'));
        $result = array_reverse($query->getResult());

        $conversionBar = '';
        foreach ($result as $row) {
            $conversionBar = ('["' . implode('",', $row) . ',"blue"]') . ',' . $conversionBar;
        }

        $resultArray['avgTrailerFill'] = '[["Element", "Density", { role: "style" } ],' . substr($conversionBar, 0, -1) . ']';
        //\Doctrine\Common\Util\Debug::dump($resultArray);
        //  die;
        return $resultArray;
    }
    
    public function tractorUsageWeekly(){
        $resultArray = array();
        $startIntDate = strtotime($this->startDate->format('Y-m-d H:i:s'));
        $endIntDate = strtotime($this->endDate->format('Y-m-d H:i:s')) + 86400; //move to the end of the day
        $query = $this->em
                ->createQuery('SELECT DISTINCT p.routeNo, p.tripsStartDepot, p.startTime, p.endTime '
                        . 'FROM NTPBundle:ParagonData p WHERE p.tripNo=1 AND p.callTripPosition=1 AND p.startTime BETWEEN :startDate AND :endDate')
                ->setParameter('startDate', $this->startDate->format('Y-m-d H:i:s'))
                ->setParameter('endDate', $this->endDate->format('Y-m-d H:i:s'));
        $result = $query->getResult();
        for ($i = $startIntDate; $i < $endIntDate; $i = $i + 900) {
            $tractors[$i] = 0;
            foreach ($result as $key => $value) {
                if (!isset($tractorsPerSite[$value["tripsStartDepot"]][$i])) {
                    $tractorsPerSite[$value["tripsStartDepot"]][$i] = 0;
                }
                if (strtotime($value ["startTime"]->format('Y-m-d H:i:s')) <= $i && strtotime($value ["endTime"]->format('Y-m-d H:i:s')) >= $i) {
                    $tractors[$i] ++;
                    $tractorsPerSite[$value["tripsStartDepot"]][$i] ++;
                }
            }
        }
        
        \Doctrine\Common\Util\Debug::dump($tractorsPerSite);
        die;
        
        return $resultArray;
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

