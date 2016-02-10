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
        $csvReader->setColumnHeaders(['customerid','customername','arrivaltime','departtime','callrefnumber','cages','cheppallets','pspallets','container','cageequivalent','orderdetails1','orderdetails2','orderdetails3','orderdetails4','postcode','prodcode','productname','routeno','tripno','traveldistancetonextcall','traveldistancefromprevcall','calltype','timewindowstart','timewindowend','tripsstartdepot','tripsenddepot','sourcedepotdeparturetime','enddepotarrivaltime','waitingtime','transferid','trailertypename','calltripposition','routedropno']);
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

