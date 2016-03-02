<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace NTPBundle\ValueConventer;

/**
 * Description of MicroToTimeConventer
 *
 * @author Michal
 */
class MicroToTimeConventer {

    public function convert($input) {
        $hours = floor($input / 3600);
        $minutes = floor(($input / 60) % 60);
        $seconds = $input % 60;
        return $hours . 'h : ' . $minutes.'m';
    }

}
