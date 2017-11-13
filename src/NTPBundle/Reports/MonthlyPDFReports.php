<?php

namespace NTPBundle\Reports;

use Doctrine\ORM\EntityManager;

class MonthlyPDFReports {

    private $em;
    private $endPeriod;
    private $currentDate;

    public function __construct(EntityManager $em) {
        $this->em = $em;
        $this->startDate = new \DateTime(); //week date
        $this->startDate->sub(new \DateInterval('P12M'));
    }

    public function monthlyVolume() {
        $query = $this->em
                ->createQuery("SELECT dayname(p.startTime) AS planDay, SUM(ROUND(p.ndata5/1000)) AS volume "
                        . "FROM NTPBundle:ParagonData p WHERE p.planDate >= :startDate AND p.ndata5<>0 GROUP BY p.weekNumber")
                ->setParameter('startDate', $this->startDate->format('Y-m-d'));
        $result = array_reverse($query->getResult());
        
        return $result;
    }

}
