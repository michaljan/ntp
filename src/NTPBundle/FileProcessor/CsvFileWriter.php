<?php

namespace NTPBundle\FileProcessor;

use Doctrine\ORM\EntityManager;
use Ddeboer\DataImport\Workflow;
use Ddeboer\DataImport\Reader\CsvReader;
use Ddeboer\DataImport\Writer\DoctrineWriter;
use Ddeboer\DataImport\ValueConverter\StringToDateTimeValueConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use NTPBundle\Entity\ParagonData;

class CsvFileWriter extends Controller {
    private $em;
    
    public function __construct(EntityManager $em) {
    $this->em = $em;

}
    
    public function csvImport($csvFile, $entity) {
        // Create and configure the reader
        $file = new \SplFileObject($csvFile);
        $csvReader = new CsvReader($file);
        $csvReader->setHeaderRowNumber(0);
        $csvReader->setColumnHeaders(['customer_id','customer_name','arrival_time','depart_time','call_ref_number','cages','chep_pallets','ps_pallets','container','cage_equivalent','order_details_1','order_details_2','order_details_3','order_details_4','postcode','prod_code','product_name','route_no','trip_no','travel_distance__to_next_call','travel_distance__from_prev_call_','call_type','time_window_start','time_window_end','trips_start_depot','trips_end_depot','source_depot_departure_time','end_depot_arrival_time','waiting_time','transfer_id','trailer_type_name','call_trip_position','route_drop_no']);
        \Doctrine\Common\Util\Debug::dump($csvReader->getColumnHeaders);
        die;
        $workflow = new Workflow($csvReader);
        $doctrineWriter = new DoctrineWriter($this->em, $entity);
        $workflow->addWriter($doctrineWriter);
        
// Add a converter to the workflow that will convert `beginDate` and `endDate`
// to \DateTime objects
       // $dateTimeConverter = new StringToDateTimeValueConverter('Ymd');
        //$workflow
        //        ->addValueConverter('beginDate', $dateTimeConverter)
        //        ->addValueConverter('endDate', $dateTimeConverter);

// Process the workflow
        $result=$workflow->process();
        return true;
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

