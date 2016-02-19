<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace NTPBundle\ValueConventer;

use Ddeboer\DataImport\ValueConverter\ValueConverterInterface;
/**
 * Description of PlanNameConventer
 *
 * @author Michal
 */
class PlanNameConventer implements ValueConverterInterface {
    
    public function __construct($name) {
        $this->name=$name;
    }

        public function convert($input) {          

        return $this->name;
    }

}
