<?php

namespace NTPBundle\ValueConventer;

use Ddeboer\DataImport\ValueConverter\ValueConverterInterface;

class DateTimeNow implements ValueConverterInterface {
    
    
    public function convert($input) {          
         
        return new \DateTime();
    }

}
