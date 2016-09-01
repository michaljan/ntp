<?php

namespace NTPBundle\ValueConventer;

use Ddeboer\DataImport\ValueConverter\ValueConverterInterface;

class WeekNumberConventer implements ValueConverterInterface {
    
    public function __construct($date) {
        $dateOb=new \DateTime($date);
    }

        public function convert($input) {          
            $dateOb->add(new \DateInterval('P8D'));
            $output=$dateOb->format("W");
        return $output;
    }

}

