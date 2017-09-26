<?php

namespace NTPBundle\Reports;

use Doctrine\ORM\EntityManager;
use NTPBundle\ValueConventer\MicroToTimeConventer;
use NTPBundle\ValueConventer\JsonMorrisConventer;
use NTPBundle\ValueConventer\MinutesToHoursConventer;
use Symfony\Component\DependencyInjection\ContainerAware;

/**
 * Description of ParagonReports
 *
 * @author Michal
 */
class WickesParagonReports extends ContainerAware{

    private $em;
    private $date;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }
    
    
    public function createDashboard($date){
        $this->date=$date;
        $networkRuns=$this->networkRuns();
        
       $result['networkRuns']=$networkRuns; 
        //dump($result);
        //die;
        return $result;
    }
    
    private function networkRuns(){
        $networkRuns="";
        $query=$this->em->createQuery("SELECT p.depotId as depot, SUM(p.measure5) as pallets FROM NTPBundle:ParagonData p WHERE p.planDate = :date GROUP BY p.depotId")
                ->setParameter('date',$this->date->format('Y-m-d'));
        $result=$query->getResult();
        return $result;
    }
    
    
    

}