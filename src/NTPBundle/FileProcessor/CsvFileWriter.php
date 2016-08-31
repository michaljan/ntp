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
use NTPBundle\ValueConventer\WeekNumberConventer;
use NTPBundle\ValueConventer\PlanNameConventer;
use NTPBundle\ValueConventer\TimeToMicroConventer;
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
        $date=$fileRecord ->getPlanDate();
        $dateConverter = new DateConventer($fileRecord ->getPlanDate());
        $weekNumberConverter = new WeekNumberConventer($date->format('Y-m-d'));
        $planNameConverter = new PlanNameConventer($fileRecord ->getName());
        $routeNameConventer = new RouteNameConventer($fileRecord ->getPlanDate());
        $dateTimeNow = new DateTimeNow;
        $dateToMicroConventer = new TimeToMicroConventer;
        $timeConverter = new DateTimeValueConverter('H:i');
        $uploadedBy = new UploadedBy($user);
        $planDateConvert = new PlanDateConvert($fileRecord ->getPlanDate());
        //\Doctrine\Common\Util\Debug::dump($date->format('Y-m-d'));
        //die;
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
                ->addValueConverter('planName', $planNameConverter)
                ->addValueConverter('weekNumber', $weekNumberConverter);
//        \Doctrine\Common\Util\Debug::dump($doctrineWriter);
//        die;
        $result = $workflow->process();
        //update query to generate route and trip combination
        $query = $this->em
                ->createQuery("UPDATE NTPBundle:ParagonData p SET p.routeNo = CONCAT(p.routeNo,'0', p.tripNo) "
                            . "WHERE p.planDate=:date")
                ->setParameter('date', $date);
        $query->execute();
        return $result;
    }
    

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

