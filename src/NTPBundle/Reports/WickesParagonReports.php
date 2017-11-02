<?php

namespace NTPBundle\Reports;

use Doctrine\ORM\EntityManager;
use NTPBundle\GoogleAPI;
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
    private $chartFormatter;

    public function __construct(EntityManager $em) {
        $this->em = $em;
        $this->chartFormatter=new GoogleAPI\GoogleChartFormatter();
    }
    
    /*
     * Triggers dasboard methods for main website
     * 
     * @param $date date object from UI
     * 
     * @return $result array with data raw for dashboard
     */
    
    public function createDashboard($date){
        $this->date=$date;
        $networkRuns=$this->networkRuns();
        $result['plts']=$networkRuns;
        return $result;
    }
    
    
        
    /*
     * Returns array with number of pallets by site
     * 
     * @return $result array site pallet data
     */
    
    private function networkRuns(){
        $networkRuns="";
        $query=$this->em->createQuery("SELECT p.depotId as depot, SUM(p.measure5) as data1 FROM NTPBundle:ParagonData p WHERE p.planDate = :date GROUP BY p.depotId")
                ->setParameter('date',$this->date->format('Y-m-d'));
        $data=$query->getResult();
        $data=$this->siteAllocator($data);
        $result=$this->chartFormatter->columnChart($data);
        return $result;
    }
    
    private function createMap(){
        $query=$this->em->createQuery("SELECT p.depotId as depot, SUM(p.measure5) as data1 FROM NTPBundle:ParagonData p WHERE p.planDate = :date GROUP BY p.depotId")
                ->setParameter('date',$this->date->format('Y-m-d'));
        $data=$query->getResult();
        
        return $result;
    }


    /*
     *  Allocates sites to one of two groups Wakefield and Midlands
     * 
     * @param $data array of sql query result
     * 
     * @return $result array with data for two sites
     */
    
    private function siteAllocator($data){
        $result[0]['depot']='Midlands';
        $result[0]['data1']=0;
        $result[1]['depot']='Wakefield';
        $result[1]['data1']=0;
        foreach ($data as $row) {
            if($row["depot"]=="MIDIW" or  $row["depot"]=="DEVOB" or $row["depot"]=="CAROB" ){
                $result[0]['data1'] =$result[0]['data1']+$row["data1"]; 
            }
            if($row["depot"]=="WAKEIW" or  $row["depot"]=="BELOB"){
                $result[1]['data1'] =$result[1]['data1']+$row["data1"];    
            }
        }
        return $result;   
    }
}