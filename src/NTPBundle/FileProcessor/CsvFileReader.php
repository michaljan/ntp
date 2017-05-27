<?php

namespace NTPBundle\FileProcessor;

use Doctrine\ORM\EntityManager;
use Ddeboer\DataImport\Writer\CsvWriter;

class CsvFileReader {

    private $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function readDatabase($startDate, $endDate) {
        $csvPath = __DIR__ . '/../data/downloads/paragon' . date("Ymd") . '.csv';
        $query = $this->em
                ->createQuery("SELECT DATE_FORMAT(p.startTime, '%d-%m-%Y') AS startTime "
                        . "FROM NTPBundle:ParagonData p WHERE p.startTime BETWEEN :startDate AND :endDate")
                ->setParameter('startDate', $startDate->format('Y-m-d H:i:s'))
                ->setParameter('endDate', $endDate->format('Y-m-d H:i:s'));
        $result = $query->getResult();
        if (!empty($result)) {
            $writer = new CsvWriter();
            $writer->setStream(fopen($csvPath, 'w'));
            foreach ($result as $row) {
                $writer->writeItem($row);
            }

            $writer->finish();
        }
        \Doctrine\Common\Util\Debug::dump($result);
        die;
    }

}
