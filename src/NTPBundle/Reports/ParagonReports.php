<?php
namespace NTPBundle\Reports;

use Doctrine\ORM\EntityManager;
/**
 * Description of ParagonReports
 *
 * @author Michal
 */
class ParagonReports {
    
    private $em;
    public function __construct(EntityManager $em) {
        $this->em=  $em;
    }
    
    public function dashboard($date){
        $query= $this->em
                ->createQuery('SELECT DISTINCT p.routeNo, p.dutyTime AS TIME FROM NTPBundle:ParagonData p WHERE p.planDate = :date')
                ->setParameter('date', $date);
        $result= $query->getResult();
        foreach($result as $row){
            print_r($row);
            echo '<br/>';   
        }
        //\Doctrine\Common\Util\Debug::dump($result);
        die;
        return $dashboardArray;
    }
}
