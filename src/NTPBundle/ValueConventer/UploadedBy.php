<?php

namespace NTPBundle\ValueConventer;

use Ddeboer\DataImport\ValueConverter\ValueConverterInterface;

class UploadedBy implements ValueConverterInterface {
    
    public function __construct($user) {
        $this->user=$user;
    }


    public function convert($input) {          
        $user=$this->user;
        return (integer)$user;
    }

}
