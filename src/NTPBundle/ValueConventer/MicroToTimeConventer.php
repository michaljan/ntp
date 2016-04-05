<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace NTPBundle\ValueConventer;

/**
 * @package reports
 * 
 * @final
 */

class MicroToTimeConventer {
    /**
     * 
     * @param integer $input 
     * @return string  
     *
     * Converts integer minutes format 
     * to hh:mm  
     *     
     */
    
    public function convert($input) {
        $hours = floor($input / 3600);
        $minutes = floor(($input / 60) % 60);
        $seconds = $input % 60;
        return $hours . 'h : ' . $minutes.'m';
    }

}
