<?php

namespace NTPBundle\Reports;

use Doctrine\ORM\EntityManager;
use NTPBundle\GoogleAPI\GoogleChartFormatter;

class MonthlyPDFReports {

    private $em;
    private $formatter;

    public function __construct(EntityManager $em) {
        $this->em = $em;
        $this->startDate = new \DateTime(); //week date
        $this->startDate->sub(new \DateInterval('P12M'));
        $this->formatter = new GoogleChartFormatter;
    }

    public function monthlyCombined() {
        $query = $this->em
                ->createQuery("SELECT Month(p.planDate) as month, SUM(ROUND(p.ndata5/1000)) AS volume, SUM(ROUND(p.measure1/1000)) AS weight, sum(ROUND(p.ndata1/1000)) as cases "
                        . "FROM NTPBundle:ParagonData p WHERE p.planDate >= :startDate AND p.ndata5<>0 "
                        . "GROUP BY month "
                        . "ORDER BY p.planDate")
                ->setParameter('startDate', $this->startDate->format('Y-m-d'));
        $data = array_reverse($query->getResult());
        $header = '[{label:"Month"},' . '{label:"Volume in tousands m3"},' . '{label:"Weight in tones"},' . '{label:"Cases qunatity"}],';
        $result = $this->formatter->multipleLineChart($data, $header);
        return $result;
    }

    public function monthlyRuns() {
        $query = $this->em
                ->createQuery("SELECT DISTINCT p.routeNo, month(p.planDate) as month "
                        . "FROM NTPBundle:ParagonData p "
                        . "WHERE p.tripNo=1 AND p.callTripPosition=1 AND p.planDate >= :startDate AND p.customerName<>'SHUNTSAL' AND p.customerName<>'NORHDCSHUNT' "
                        . "GROUP BY p.depotId, p.routeNo")
                ->setParameter('startDate', $this->startDate->format('Y-m-d'));
        $result = $query->getResult();
        dump($result);
        die;
        //site specific counts
        foreach ($result as $key => $value) {
            $routeCode = (int) substr($value['routeNo'], -6, 4);
            if ($routeCode < 1000) {
                $storeRun++;
            }
            if ($routeCode >= 1000 && $routeCode < 1999) {
                $hdcRun++;
            }
            if ($routeCode >= 3000 && $routeCode < 4999) {
                $trunkRun++;
            }
        }

        $textData = '["Site","Runs"],' . '["Store delivery",' . $storeRun . '],["HDC trunking",' . $hdcRun . '],["Wickes trunking",' . $trunkRun . ']';


        return $textData;
    }

}
