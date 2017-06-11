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

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }
    
    

}