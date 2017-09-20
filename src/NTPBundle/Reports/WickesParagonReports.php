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
        
        

        \Doctrine\Common\Util\Debug::dump($networkRuns);
        die;
        return $result;
    }
    
    private function networkRuns(){
        $this->em->createQuery(
                );
        return $networkRuns;
    }
    
    
    

}