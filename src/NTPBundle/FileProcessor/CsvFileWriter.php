<?php

namespace NTPBundle\FileProcessor;

use Doctrine\ORM\EntityManager;
use Ddeboer\DataImport\Workflow;
use Ddeboer\DataImport\Reader\CsvReader;
use Ddeboer\DataImport\Writer\DoctrineWriter;
use NTPBundle\ValueConventer\DateConventer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use NTPBundle\Entity\ParagonData;
use NTPBundle\ValueConventer\DateTimeNow;
use NTPBundle\ValueConventer\UploadedBy;
use NTPBundle\ValueConventer\PlanDateConvert;
use NTPBundle\ValueConventer\PlanNameConventer;
use NTPBundle\ValueConventer\DateToMicroConventer;
use NTPBundle\ValueConventer\RouteNameConventer;
use NTPBundle\Headers\ParagonArray;
use Ddeboer\DataImport\ValueConverter\DateTimeValueConverter;

class CsvFileWriter extends Controller {

    private $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function csvImport($csvFile, $entity, $user ,$fileRecord) {
        // Create and configure the reader
        $headers = new ParagonArray();
        $file = new \SplFileObject($csvFile);
        $csvReader = new CsvReader($file);
        $csvReader->setHeaderRowNumber(0);
        $csvReader->setStrict(false);
        $csvReader->setColumnHeaders($headers->csvReaderArray());
        $workflow = new Workflow($csvReader);
        $doctrineWriter = new DoctrineWriter($this->em, $entity);
        $doctrineWriter->disableTruncate();
        $workflow->addWriter($doctrineWriter);
        $dateConverter = new DateConventer($fileRecord ->getPlanDate());
        $planNameConverter = new PlanNameConventer($fileRecord ->getName());
        $routeNameConventer = new RouteNameConventer($fileRecord ->getPlanDate());
        $dateTimeNow = new DateTimeNow;
        $dateToMicroConventer =     new DateToMicroConventer;
        $timeConverter = new DateTimeValueConverter('H:i');
        $uploadedBy = new UploadedBy($user);
        $planDateConvert = new PlanDateConvert($fileRecord ->getPlanDate());
        $workflow->setSkipItemOnFailure(true)
                ->addValueConverter('routeNo', $routeNameConventer)
                ->addValueConverter('startTime', $dateConverter)
                ->addValueConverter('sourceDepotDepartureTime', $dateConverter)
                ->addValueConverter('arrivalTime', $dateConverter)
                ->addValueConverter('departTime', $dateConverter)
                ->addValueConverter('endDepotArrivalTime', $dateConverter)
                ->addValueConverter('tripStart', $dateConverter)
                ->addValueConverter('destDepotArrivalTime', $dateConverter)
                ->addValueConverter('destDepotDepartureTime', $dateConverter)
                ->addValueConverter('sourceDepotArrivalTime2', $dateConverter)
                ->addValueConverter('sourceDepotDepartureTime2', $dateConverter)
                ->addValueConverter('startDepotDepartureTime', $dateConverter)
                ->addValueConverter('endTime', $dateConverter)
                ->addValueConverter('callDuration', $dateToMicroConventer)
                ->addValueConverter('dutyTime', $dateToMicroConventer)
                ->addValueConverter('driveTime', $dateToMicroConventer)
                ->addValueConverter('emptyTime', $dateToMicroConventer)
                ->addValueConverter('timeWindowStart', $dateConverter)
                ->addValueConverter('timeWindowEnd', $dateConverter)
                ->addValueConverter('uploadDate', $dateTimeNow)
                ->addValueConverter('uploadedBy', $uploadedBy)
                ->addValueConverter('planDate', $planDateConvert)
                ->addValueConverter('planName', $planNameConverter);
//        \Doctrine\Common\Util\Debug::dump($doctrineWriter);
//        die;
//        foreach($csvReader as $row){
//            print_r($row);
//            
//        }
//        
//        die;    
        $result = $workflow->process();
        return $result;
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

