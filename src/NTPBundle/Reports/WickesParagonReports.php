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
class WickesParagonReports {

    private $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

}