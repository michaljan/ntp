<?php

namespace NTPBundle\ValueConventer;

use Ddeboer\DataImport\ValueConverter\ValueConverterInterface;

/**
 * @package ddeboer/data-import-bundle
 * 
 * @final
 */

class DateTimeNow implements ValueConverterInterface {
    
    /**
     * 
     *
     * @param string $input 
     * @return $date
     *
     * Converts string to datetime object 
     *    
     */
    public function convert($input) {          
         
        return new \DateTime();
    }

}
