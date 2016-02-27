<?php

namespace NTPBundle\ValueConventer;

use Ddeboer\DataImport\ValueConverter\ValueConverterInterface;

class TimeToMicroConventer implements ValueConverterInterface {

    public function convert($input) {
        $parts = explode(':', $input);
        $hours = !empty($parts[0]) ? $parts[0] : 0;
        $minutes = !empty($parts[1]) ? $parts[1] : 0;
        $seconds = !empty($parts[2]) ? $parts[2] : 0;
        $output = (($hours * 60 * 60) + ($minutes * 60) + ($seconds)) * 1000000;
        return $output;
    }

}
