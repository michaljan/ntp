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


class CsvFileWriter extends Controller {

    private $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function csvImport($csvFile, $entity, $planDate,$user) {
        // Create and configure the reader
        $file = new \SplFileObject($csvFile);
        $csvReader = new CsvReader($file);
        $csvReader->setHeaderRowNumber(0);
        $csvReader->setStrict(false);
        $csvReader->setColumnHeaders(['customerId', 'customerName', 'arrivalTime', 'departTime', 'callRefNumber', 'cages', 'chepPallets', 'psPallets', 'container', 'cageEquivalent', 'orderDetails1', 'orderDetails2', 'orderDetails3', 'orderDetails4', 'postcode', 'prodCode', 'productName', 'routeNo', 'tripNo', 'travelDistanceToNextCall', 'travelDistanceFromPrevCall ', 'callType', 'timeWindowStart', 'timeWindowEnd', 'tripsStartDepot', 'tripsEndDepot', 'sourceDepotDepartureTime', 'endDepotArrivalTime', 'waitingTime', 'transferId', 'trailerTypeName', 'callTripPosition', 'routeDropNo', 'uploadDate', 'uploadedBy','planDate']);
        $workflow = new Workflow($csvReader);
//        \Doctrine\Common\Util\Debug::dump($csvReader);
//        die;
        $doctrineWriter = new DoctrineWriter($this->em, $entity);
        $doctrineWriter->disableTruncate();
        $workflow->addWriter($doctrineWriter);
        $dateConverter = new DateConventer($planDate);
        $dateTimeNow = new DateTimeNow;
        $uploadedBy = new UploadedBy($user);
        $planDateConvert = new PlanDateConvert($planDate);
        $workflow->addValueConverter('arrivalTime', $dateConverter)
                 ->addValueConverter('departTime', $dateConverter)
                 ->addValueConverter('uploadDate', $dateTimeNow)
                 ->addValueConverter('uploadedBy', $uploadedBy)
                 ->addValueConverter('planDate', $planDate);
        $result = $workflow->process();
        return $result;
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

