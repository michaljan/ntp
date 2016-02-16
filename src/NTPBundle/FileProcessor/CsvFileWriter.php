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
use NTPBundle\Headers\ParagonArray;

class CsvFileWriter extends Controller {

    private $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function csvImport($csvFile, $entity, $planDate, $user) {
        // Create and configure the reader
        $headers = new ParagonArray();
        $file = new \SplFileObject($csvFile);
        $csvReader = new CsvReader($file);
        $csvReader->setHeaderRowNumber(0);
        $csvReader->setStrict(false);
        $csvReader->setColumnHeaders($headers->csvReaderArray());
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
        $workflow->addValueConverter(`start_time`, $dateConverter)
                ->addValueConverter(`source_depot_departure_time`, $dateConverter)
                ->addValueConverter(`arrival_time`, $dateConverter)
                ->addValueConverter(`depart_time`, $dateConverter)
                ->addValueConverter(`end_depot_arrival_time`, $dateConverter)
                ->addValueConverter(`trip_start`, $dateConverter)
                ->addValueConverter(`dest_depot_arrival_time`, $dateConverter)
                ->addValueConverter(`dest_depot_departure_time`, $dateConverter)
                ->addValueConverter(`source_depot_arrival_time_2`, $dateConverter)
                ->addValueConverter(`source_depot_departure_time_2`, $dateConverter)
                ->addValueConverter(`start_depot_departure_time`, $dateConverter)
                ->addValueConverter(`end_time`, $dateConverter)
                ->addValueConverter(`plan_date`, $dateConverter)
                ->addValueConverter('uploadDate', $dateTimeNow)
                ->addValueConverter('uploadedBy', $uploadedBy)
                ->addValueConverter('planDate', $planDateConvert);
        $result = $workflow->process();
        return $result;
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

