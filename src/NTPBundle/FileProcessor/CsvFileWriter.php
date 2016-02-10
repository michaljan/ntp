<?php

namespace NTPBundle\FileProcessor;

use Doctrine\ORM\EntityManager;
use Ddeboer\DataImport\Workflow;
use Ddeboer\DataImport\Reader\CsvReader;
use Ddeboer\DataImport\Writer\DoctrineWriter;
use NTPBundle\ValueConventer\DateConventer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use NTPBundle\Entity\ParagonData;

class CsvFileWriter extends Controller {

    private $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function csvImport($csvFile, $entity, $planDate) {
        // Create and configure the reader
        $file = new \SplFileObject($csvFile);
        $csvReader = new CsvReader($file);
        $csvReader->setHeaderRowNumber(0);
        $csvReader->setColumnHeaders(['customerId', 'customerName', 'arrivalTime', 'departTime', 'callRefNumber', 'cages', 'chepPallets', 'psPallets', 'container', 'cageEquivalent', 'orderDetails1', 'orderDetails2', 'orderDetails3', 'orderDetails4', 'postcode', 'prodCode', 'productName', 'routeNo', 'tripNo', 'travelDistanceToNextCall', 'travelDistanceFromPrevCall ', 'callType', 'timeWindowStart', 'timeWindowEnd', 'tripsStartDepot', 'tripsEndDepot', 'sourceDepotDepartureTime', 'endDepotArrivalTime', 'waitingTime', 'transferId', 'trailerTypeName', 'callTripPosition', 'routeDropNo']);
        $workflow = new Workflow($csvReader);
        $doctrineWriter = new DoctrineWriter($this->em, $entity);
        $workflow->addWriter($doctrineWriter);
        $dateConverter = new DateConventer($planDate);
        $workflow->addValueConverter('arrivalTime', $dateConverter);
        $workflow->addValueConverter('departTime', $dateConverter);
// Add a converter to the workflow that will convert `beginDate` and `endDate`
// to \DateTime objects
        // $dateTimeConverter = new StringToDateTimeValueConverter('Ymd');
        //$workflow
        //        ->addValueConverter('beginDate', $dateTimeConverter)
        //        ->addValueConverter('endDate', $dateTimeConverter);
// Process the workflow
        $result = $workflow->process();
        return true;
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

