<?php

namespace NTPBundle\ValueConventer;

use Ddeboer\DataImport\ValueConverter\ValueConverterInterface;

class WeekNumberConventer implements ValueConverterInterface {
    
    private $dateOb;
    
    public function __construct($date) {
        $this->dateOb=$date;
    }

        public function convert($input) {
            if($this->dateOb->format("W")==52){
                $output=1;
            }
            else{
                $output=$this->dateOb->format("W")+1;
            }    
        return $output;
    }

}

