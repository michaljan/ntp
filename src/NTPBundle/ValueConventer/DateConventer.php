<?php

namespace NTPBundle\ValueConventer;

use Ddeboer\DataImport\ValueConverter\ValueConverterInterface;

class DateConventer implements ValueConverterInterface {
    
    public function __construct($planDate) {
        return $this->planDate=$planDate;
    }
    
    
    public function convert($input) { 
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
            //\Doctrine\Common\Util\Debug::dump(new \DateTime($date));
            //die;
        return new \DateTime($date);
    }

}
