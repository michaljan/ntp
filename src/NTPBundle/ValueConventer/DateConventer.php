<?php

namespace NTPBundle\ValueConverter;

use Ddeboer\DataImport\ValueConverter\ValueConverterInterface;

class DateConventer implements ValueConverterInterface {
    
    public function __construct($planDate){
        $this->planDate=$planDate;
    }
    
    public function convert($input) { 
            if (!$input) {
                return;
            }
            $timeDay = \explode(" ", $input); //day name of the input file

            if($timeDay[1]==date("D", strtotime($this->planDate))){
                $date = date("Y-m-d", strtotime($this->planDate)) . " " . $timeDay[0];
            }
            if($timeDay[1]==date("D", strtotime($this->planDate . " + 1 days"))){
                    $date = date("Y-m-d", strtotime($this->planDate . " + 1 days")) . " " . $timeDay[0];
            }
            if($timeDay[1]==date("D", strtotime($this->planDate . " + 2 days"))){
                    $date = date("Y-m-d", strtotime($this->planDate . " + 2 days")) . " " . $timeDay[0];
            }
            if (false === $date) {
                throw new \UnexpectedValueException(
                'Incorrect plan date'
                );
            }
        return $date;
    }

}
