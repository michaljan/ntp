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
        $this->repository=  $em->getRepository('NTPBundle:ParagonData');
    }
    
    public function dashboard($date){
        $query= $this->repository->createQueryBuilder('p')
                ->where('p.planDate = :date')
                ->setParameter('date', $date)
                ->getQuery();
        
        $result=$query->getResult();
        \Doctrine\Common\Util\Debug::dump($result);
        die;
        return $result;
    }
}
