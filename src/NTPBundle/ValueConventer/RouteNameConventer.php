<?php

namespace NTPBundle\ValueConventer;

use Ddeboer\DataImport\ValueConverter\ValueConverterInterface;

class RouteNameConventer implements ValueConverterInterface {
    
    public function __construct($date) {
        $this->date=$date;
    }

        public function convert($input) {          
            $date =  $this->date->format('Ymd');
            $output='NTP'.$date.sprintf('%06d', $input);
        return $output;
    }

}
