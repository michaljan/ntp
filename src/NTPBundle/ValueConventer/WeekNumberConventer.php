<?php

namespace NTPBundle\ValueConventer;

use Ddeboer\DataImport\ValueConverter\ValueConverterInterface;

class WeekNumberConventer implements ValueConverterInterface {
    
    public function __construct($date) {
        $this->date=$date;
    }

        public function convert($input) {          
            $date=new \DateTime($this->date);
            $date->add(new \DateInterval('P8D'));
            $output=$date->format("W");
        return $output;
    }

}

