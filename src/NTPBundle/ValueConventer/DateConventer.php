<?php

namespace NTPBundle\ValueConventer;

use Ddeboer\DataImport\ValueConverter\ValueConverterInterface;

/**
 * @package ddeboer/data-import-bundle
 * 
 * @final
 */

class DateConventer implements ValueConverterInterface {
    
    public function __construct($planDate) {
        return $this->planDate=$planDate;
    }
    
    /**
     * 
     *
     * @param string $input 
     * @return $date
     *
     * Converts csv input value in format of day name and time 
     * to based on the plan date datetime object 
     *    
     */
    public function convert($input) { 
            $date=false;
            if (!$input) {
                return;
            }
            $timeDay = \explode(" ", $input); //day name of the input file
            $planDate=$this->planDate->format('Y-m-d');
            //\Doctrine\Common\Util\Debug::dump($planDate);
            //die;
            if($timeDay[1]==date("D", strtotime($planDate))){
                $date = date("Y-m-d", strtotime($planDate)) . " " . $timeDay[0];
            }
            if($timeDay[1]==date("D", strtotime($planDate . " + 1 days"))){
                    $date = date("Y-m-d", strtotime($planDate . " + 1 days")) . " " . $timeDay[0];
            }
            if($timeDay[1]==date("D", strtotime($planDate . " + 2 days"))){
                    $date = date("Y-m-d", strtotime($planDate . " + 2 days")) . " " . $timeDay[0];
            }
            if (false === $date) {
                throw new \UnexpectedValueException(
                'Incorrect plan date'
                );
            }
        return new \DateTime($date);
    }

}
