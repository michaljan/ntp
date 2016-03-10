<?php
namespace NTPBundle\Reports;

use Doctrine\ORM\EntityManager;
use NTPBundle\ValueConventer\MicroToTimeConventer;
use NTPBundle\ValueConventer\NTPBundle\ValueConventer\JsonMorrisConventer;
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
        $timeConventer= new MicroToTimeConventer;
        $query= $this->em
                ->createQuery('SELECT DISTINCT p.routeNo, SUM(p.dutyTime) AS dutyTime, COUNT(p.routeNo) AS routeCount, SUM(p.distanceKms) AS distanceKms, SUM(p.emptyDistKms) AS emptyDistKms, SUM(p.emptyTime) AS emptyTime, AVG(p.timeUtil) AS timeUtil '
                        .'FROM NTPBundle:ParagonData p WHERE p.planDate = :date')
                ->setParameter('date', $date);
        $result= $query->getResult();
        $dutyTime=$timeConventer->convert($result[0]['dutyTime']);
        $minDutyTime=$result[0]['dutyTime'];
        $runsCount=$result[0]['routeCount'];
        $distanceKm=$result[0]['distanceKms'];
        $emptyDistKms=$result[0]['emptyDistKms'];
        $timeUtil=$result[0]['timeUtil'];
        $avgDutyTime=$timeConventer->convert($minDutyTime/$runsCount);
        $avgDistance=$distanceKm/$runsCount;
        $avgEmptyDist=$emptyDistKms/$runsCount;
        $dashboardArray=array('dutyTime'=>$dutyTime,
                              'runsCount'=>$runsCount,
                              'distanceKm'=>$distanceKm,
                              'emptyDistKms'=>$emptyDistKms,
                              'timeUtil'=>$timeUtil,
                              'avgDutyTime'=>$avgDutyTime,
                              'avgDistance'=>$avgDistance,
                              'avgEmptyDist'=>$avgEmptyDist
            );
        $query= $this->em
                ->createQuery('SELECT DISTINCT(p.routeNo),p.tripsSourceDepot AS y, count(p.depotId) AS a'
                        . ' FROM NTPBundle:ParagonData p WHERE p.planDate = :date GROUP BY p.tripsSourceDepot')
                ->setParameter('date', $date);
        $result= $query->getResult();
        $jsonMorrisConventer=new JsonMorrisConventer();
        $compiled=$jsonMorrisConventer->morrisBarChart($result);
        $dashboardArray['graphRuns']=$compiled;
//      foreach($result as $row){
//            print_r($row);
//            echo '<br/>';   
//        }
//        \Doctrine\Common\Util\Debug::dump($newResult);
//       die;
       return $dashboardArray;
    }
}
