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
        return $resultArray;
    }

    public function tractorUsageWeekly() {
        $resultArray = array();
        $tractorsPerSite = array();
        $maxTractors = array();
        $textData = '';
        $startIntDate = strtotime($this->startDate->format('Y-m-d'));
        $endIntDate = strtotime($this->endDate->format('Y-m-d'));
        $query = $this->em
                ->createQuery("SELECT DISTINCT p.routeNo, p.depotId, p.startTime, p.endTime "
                        . "FROM NTPBundle:ParagonData p WHERE p.tripNo=1 AND p.callTripPosition=1 AND p.startTime BETWEEN :startDate AND :endDate AND p.customerId<>'SHUNTSAL' AND p.customerId<>'NORHDCSHUNT' ORDER BY p.startTime")
                ->setParameter('startDate', $this->startDate->format('Y-m-d H:i:s'))
                ->setParameter('endDate', $this->endDate->format('Y-m-d H:i:s'));
        $result = $query->getResult();
        //\Doctrine\Common\Util\Debug::dump($result);
        //die;
        //change + number to increase probing time 
        for ($i = $startIntDate; $i < $endIntDate + 86400; $i = $i + 900) {
            $tractors[$i] = 0;
            $currentDay = gmdate('D', $i); //set weekday as key
            foreach ($result as $key => $value) {

                if (!isset($tractorsPerSite[$value["depotId"]][$i])) {
                    $tractorsPerSite[$value["depotId"]][$i] = 0;
                }
                if (!isset($maxTractors[$value["depotId"]][$currentDay])) {
                   
                   
                    $maxTractors[$value["depotId"]][$currentDay] = 0;
                    
                }


                if (strtotime($value ["startTime"]->format('Y-m-d H:i:s')) <= $i && strtotime($value ["endTime"]->format('Y-m-d H:i:s')) >= $i) {
                    $tractors[$i] ++;
                    $tractorsPerSite[$value["depotId"]][$i] ++;
                    if ($maxTractors[$value["depotId"]][$currentDay] < $tractorsPerSite[$value["depotId"]][$i]) {
                        $maxTractors[$value["depotId"]][$currentDay] = $tractorsPerSite[$value["depotId"]][$i];
                        
                    }
                }
            }
        }
        
        //format for google charts
        foreach ($tractorsPerSite as $currentSite => $site) {
            $textData = "['Date','Tractors'],";
            foreach ($site as $key => $value) {
                $dateTime = gmdate('D H:i', $key);
                $textData = $textData . "['" . $dateTime . "'," . $value . "],";
            }
            $textData = rtrim($textData, ',');
            $resultArray["tractorUsage"][$currentSite] = $textData;
        }

        foreach ($maxTractors as $currentSite => $site) {
            $textData = '["Day","Tractors",{ role: "style" }],';
            foreach ($site as $key => $value) {
                
                $textData = $textData . '["' . $key . '",' . $value . ',"blue"],';
            }
            $textData = rtrim($textData, ',');
            $resultArray["maxTractors"][$currentSite] = $textData;
        }
        
        //\Doctrine\Common\Util\Debug::dump($resultArray["tractorUsage"]);
        //\Doctrine\Common\Util\Debug::dump($resultArray["maxTractors"]);
        
       // die;

        return $resultArray;
    }

    public function tractorAllocation() {
        $resultArray=array();
        $query = $this->em
                ->createQuery("SELECT DISTINCT(p.routeNo) as routeNo, p.depotId, dayname(p.startTime) as startDay "
                        . "FROM NTPBundle:ParagonData p WHERE p.tripNo=1 AND p.callTripPosition=1 AND p.startTime BETWEEN :startDate AND :endDate AND p.customerName<>'SHUNTSAL' AND p.customerName<>'NORHDCSHUNT' "
                        . "GROUP BY p.depotId, p.routeNo ORDER BY p.startTime")
                ->setParameter('startDate', $this->startDate->format('Y-m-d H:i:s'))
                ->setParameter('endDate', $this->endDate->format('Y-m-d H:i:s'));
        $result = $query->getResult();
        
        //group by site
        foreach($result as $key=>$value){
            $routeCode= (int)substr($value['routeNo'], -6,4);
                isset($resultArray[$value['startDay']]['Stores'])?:$resultArray[$value['startDay']]['Stores']=0;
                isset($resultArray[$value['startDay']]['HDC'])?:$resultArray[$value['startDay']]['HDC']=0;
                isset($resultArray[$value['startDay']]['IWTrunking'])?:$resultArray[$value['startDay']]['IWTrunking']=0;
           
            if($routeCode<1000){
                $resultArray[$value['startDay']]['Stores']++;
            }
            if($routeCode>=1000 && $routeCode<1999){
                $resultArray[$value['startDay']]['HDC']++;
            }
            if($routeCode>=3000 && $routeCode<4999){
                $resultArray[$value['startDay']]['IWTrunking']++;
            }
        }
        //google decode
        $textData = '["Day","Store","HDC","Trunks",{ role: "annotation" }],';
         foreach ($resultArray as $key=>$value) {
            $textData =  $textData. ('["'. substr($key,0,3) .'",'. $value['Stores'].','. $value['HDC']. ','. $value['IWTrunking'].',""]') . ',' ;
        }
        $textData = rtrim($textData, ',');
//       \Doctrine\Common\Util\Debug::dump($textData);
//        die;
        return $textData;
    }

    public function tractorsRuns() {
        $site = array_fill_keys(array('Devizes', 'Cardiff', 'Belshill', 'Midlands', 'Wakefield'), 0);
        $resultArray=array();
        $storeRun="";
        $hdcRun="";
        $trunkRun="";    
        $query = $this->em
                ->createQuery("SELECT DISTINCT p.routeNo, p.depotId, dayname(p.startTime) as startDay "
                        . "FROM NTPBundle:ParagonData p WHERE p.tripNo=1 AND p.callTripPosition=1 AND p.startTime BETWEEN :startDate AND :endDate AND p.customerName<>'SHUNTSAL' AND p.customerName<>'NORHDCSHUNT' "
                        . "GROUP BY p.depotId, p.routeNo")
                ->setParameter('startDate', $this->startDate->format('Y-m-d H:i:s'))
                ->setParameter('endDate', $this->endDate->format('Y-m-d H:i:s'));
        $result = $query->getResult();
        //site specific counts
        foreach($result as $key=>$value){
            $routeCode= (int)substr($value['routeNo'], -6,4);
            if($routeCode<1000){
                $storeRun++;
            }
            if($routeCode>=1000 && $routeCode<1999){
                $hdcRun++;
            }
            if($routeCode>=3000 && $routeCode<4999){
                $trunkRun++;
            }
        }
        
        $textData = '["Site","Runs"],'.'["Store delivery",'.$storeRun.'],["HDC trunking",'.$hdcRun.'],["Wickes trunking",'.$trunkRun.']';
        

        return $textData;
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

