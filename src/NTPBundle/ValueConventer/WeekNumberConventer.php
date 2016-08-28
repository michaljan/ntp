<?php

namespace NTPBundle\ValueConventer;

use Ddeboer\DataImport\ValueConverter\ValueConverterInterface;

class WeekNumberConventer implements ValueConverterInterface {
    
        public function convert($input) {          
            $date=new \DateTime($input);
            $output=$date->format("W");
        return $output;
    }

}

