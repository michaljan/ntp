<?php

namespace NTPBundle\Reports;

use Doctrine\ORM\EntityManager;
use NTPBundle\ValueConventer\MicroToTimeConventer;
use NTPBundle\ValueConventer\JsonMorrisConventer;
use NTPBundle\ValueConventer\MinutesToHoursConventer;

/**
 * Description of ParagonReports
 *
 * @author Michal
 */
class ParagonReports {

    private $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    /**
     * 
     *
     * @param datetime $date 
     * @return $dashboardArray
     *
     * Dashboard method uses datetimem field to return
     * dashboard array. Dashboard   
     */
    public function dashboard($date) {
        $timeConventer = new MicroToTimeConventer;
        $minutesConventer = new MinutesToHoursConventer();
        $query = $this->em
                ->createQuery('SELECT DISTINCT p.routeNo, SUM(p.dutyTime) AS dutyTime, COUNT(p.routeNo) AS routeCount, SUM(p.distanceKms) AS distanceKms, SUM(p.emptyDistKms) AS emptyDistKms, SUM(p.emptyTime) AS emptyTime, AVG(p.timeUtil) AS timeUtil '
                        . 'FROM NTPBundle:ParagonData p WHERE p.planDate = :date AND p.tripNo=1 AND p.callTripPosition=1')
                ->setParameter('date', $date);
        $result = $query->getResult();
        $dutyTime = $timeConventer->convert($result[0]['dutyTime']);
        $minDutyTime = $result[0]['dutyTime'];
        $runsCount = $result[0]['routeCount'];
        $distanceKm = $result[0]['distanceKms'];
        $emptyDistKms = $result[0]['emptyDistKms'];
        $timeUtil = $result[0]['timeUtil'];
        $avgDutyTime = $timeConventer->convert($minDutyTime / $runsCount);
        $avgDistance = $distanceKm / $runsCount;
        $avgEmptyDist = $emptyDistKms / $runsCount;
        $dashboardArray = array('dutyTime' => $dutyTime,
            'runsCount' => $runsCount,
            'distanceKm' => $distanceKm,
            'emptyDistKms' => $emptyDistKms,
            'timeUtil' => $timeUtil,
            'avgDutyTime' => $avgDutyTime,
            'avgDistance' => $avgDistance,
            'avgEmptyDist' => $avgEmptyDist
        );
        //Runs query for graph

        $query = $this->em
                ->createQuery('SELECT DISTINCT(p.routeNo),p.depotId AS y, count(p.depotId) AS a'
                        . ' FROM NTPBundle:ParagonData p WHERE p.planDate = :date AND p.tripNo=1 AND p.callTripPosition=1 GROUP BY p.depotId')
                ->setParameter('date', $date);
        $result = $query->getResult();
        $jsonMorrisConventer = new JsonMorrisConventer();
        $compiled = $jsonMorrisConventer->morrisBarChart($result);
        $dashboardArray['graphRuns'] = $compiled;

        //Time utilisation per site graph

        $query = $this->em
                ->createQuery('SELECT DISTINCT(p.routeNo),p.depotId AS y, AVG(p.timeUtil) AS a'
                        . ' FROM NTPBundle:ParagonData p WHERE p.planDate = :date AND p.tripNo=1 AND p.callTripPosition=1 GROUP BY p.depotId')
                ->setParameter('date', $date);
        $result = $query->getResult();
        $compiled = $jsonMorrisConventer->morrisBarChart($result);
        $dashboardArray['graphAvgTime'] = $compiled;

        //Duty time

        $query = $this->em
                ->createQuery('SELECT DISTINCT(p.routeNo),p.depotId AS y, AVG(p.dutyTime) AS a'
                        . ' FROM NTPBundle:ParagonData p WHERE p.planDate = :date AND p.tripNo=1 AND p.callTripPosition=1 GROUP BY p.depotId')
                ->setParameter('date', $date);
        $result = $query->getResult();

        $minutesConverted = $minutesConventer->convert($result);
        $compiled = $jsonMorrisConventer->morrisBarChart($minutesConverted);
        $dashboardArray['graphTimePerSite'] = $compiled;
        return $dashboardArray;
    }

    public function tractorReport($startDate, $endDate) {
        $tractors = array();
        $startIntDate = strtotime($startDate->format('Y-m-d H:i:s'));
        $endIntDate = strtotime($endDate->format('Y-m-d H:i:s')) + 86400;
        $endDate->add(new \DateInterval('PT' . 1439 . 'M'));
        $query = $this->em
                ->createQuery('SELECT DISTINCT p.routeNo, p.tripsStartDepot, p.startTime, p.endTime '
                        . 'FROM NTPBundle:ParagonData p WHERE p.tripNo=1 AND p.callTripPosition=1 AND p.startTime BETWEEN :startDate AND :endDate')
                ->setParameter('startDate', $startDate->format('Y-m-d H:i:s'))
                ->setParameter('endDate', $endDate->format('Y-m-d H:i:s'));
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
        foreach ($tractors as $key => $value) {
            $tractor[] = 'a:' . gmdate('Y-m-d H:i', $key) . ', y:' . $value;
        }
        $tractor = json_encode($tractor);
        $tractor = str_replace('"a:', '{a:', $tractor);
        $tractor = str_replace('"', '}', $tractor);
        $tractor = str_replace('a:', 'a:"', $tractor);
        $tractor = str_replace(', y', '", y', $tractor);
        $tractorMatrix['tractor'] = $tractor;
        //$tractorMatrix['tractorsPerSite'] = $tractorsPerSite;
        //\Doctrine\Common\Util\Debug::dump($startDate->format('Y-m-d H:i:s'));
        //\Doctrine\Common\Util\Debug::dump($endDate->format('Y-m-d H:i:s'));
        //die;
        return $tractorMatrix;
    }
    
    public function storesEta($date){
        $query = $this->em
                ->createQuery("SELECT p.customerId, p.customerName, p.arrivalTime, p.departTime, p.callDuration "
                        . "FROM NTPBundle:ParagonData p WHERE p.planDate = :date AND p.callType = 'D' AND p.customerId BETWEEN 1 AND 999 ORDER BY p.customerName")
                ->setParameter('date', $date);
        $result = $query->getResult();
        return $result;
    }
    
    public function planSummary($year, $startWeek,$endWeek){
        $query = $this->em
                ->createQuery("SELECT DISTINCT p.routeNo,SUM(p.dutyTime) AS dutyTime, dayname(p.planDate) "
                        . "FROM NTPBundle:ParagonData p WHERE p.weekNumber BETWEEN :startWeek AND :endWeek AND year(p.planDate)=:year GROUP BY p.weekNumber, p.planDate")
                ->setParameter('startWeek', $startWeek)
                ->setParameter('endWeek', $endWeek)
                ->setParameter('year', $year);
        $result = $query->getResult();
        \Doctrine\Common\Util\Debug::dump($result);
        die;
        return $result;
    }

}
