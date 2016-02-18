<?php

namespace NTPBundle\ValueConventer;

use Ddeboer\DataImport\ValueConverter\ValueConverterInterface;

class PlanNameConventer implements ValueConverterInterface {
    
    public function __construct($date) {
        $this->date=$date;
    }

        public function convert($input) {          
            $date =  $this->date->format('dmY');
            $output='NTP'.$date.sprintf('%06d', $input);
        return $output;
    }

}
