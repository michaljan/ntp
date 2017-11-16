<?php

namespace NTPBundle\Reports;

use Doctrine\ORM\EntityManager;
use NTPBundle\GoogleAPI\GoogleChartFormatter;

class MonthlyPDFReports {

    private $em;


    public function __construct(EntityManager $em) {
        $this->em = $em;
        $this->startDate = new \DateTime(); //week date
        $this->startDate->sub(new \DateInterval('P12M'));
    }

    public function monthlyCombined() {
        $formatter = new GoogleChartFormatter;
        $query = $this->em
                ->createQuery("SELECT Month(p.planDate) as month, SUM(ROUND(p.ndata5/1000)) AS volume, SUM(ROUND(p.measure1/1000)) AS weight, sum(ROUND(p.ndata1/1000)) as cases "
                        . "FROM NTPBundle:ParagonData p WHERE p.planDate >= :startDate AND p.ndata5<>0 "
                        . "GROUP BY month "
                        . "ORDER BY p.planDate")
                ->setParameter('startDate', $this->startDate->format('Y-m-d'));
        $data = array_reverse($query->getResult());
        $header ='[{label:"Month"},' . '{label:"Volume in tousands m3"},'. '{label:"Weight in tones"},' . '{label:"Cases qunatity"}],';
        $result = $formatter->multipleLineChart($data,$header);
        return $result;
    }



}
