<?php

namespace NTPBundle\FileProcessor;

use Ddeboer\DataImport\Workflow;
use Ddeboer\DataImport\Reader\CsvReader;
use Ddeboer\DataImport\Writer\DoctrineWriter;
use Ddeboer\DataImport\ValueConverter\StringToDateTimeValueConverter;

class FileImport {

    protected $entityManager;
    
    public function __construct(EntityManager $entityManager){
        $this->entityManager=$entityManager;
        
    }
    
    
    public function csvImport($csvFile, $entity) {
        // Create and configure the reader
        $file = new \SplFileObject($csvFile);
        $csvReader = new CsvReader($file);

// Tell the reader that the first row in the CSV file contains column headers
        $csvReader->setHeaderRowNumber(1);

// Create the workflow from the reader
        $workflow = new Workflow($csvReader);

// Create a writer: you need Doctrine’s EntityManager.
        $doctrineWriter = new DoctrineWriter($this->entityManager, $entity);
        $workflow->addWriter($doctrineWriter);

// Add a converter to the workflow that will convert `beginDate` and `endDate`
// to \DateTime objects
        $dateTimeConverter = new StringToDateTimeValueConverter('Ymd');
        $workflow
                ->addValueConverter('beginDate', $dateTimeConverter)
                ->addValueConverter('endDate', $dateTimeConverter);

// Process the workflow
        $workflow->process();
    
        return true;
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

