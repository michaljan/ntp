<?php

namespace NTPBundle\ValueConventer;

use Ddeboer\DataImport\ValueConverter\ValueConverterInterface;

class RouteDateConvert implements ValueConverterInterface {
    
    public $planDate;
    
    public function __construct($planDate) {
        $this->planDate=$planDate;
    }


    public function convert($input) {          
        
        return $this->planDate;
    }

}
