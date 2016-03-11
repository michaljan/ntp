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
class MinutesToHoursConventer {

    public function convert($input) {
        foreach($input as $key=>$item){
            $hours = floor(intval($item['a']) / 3600);
            $minutes = floor((intval($item['a']) / 60) % 60);
            $input[$key]['a']=$hours.'.'.$minutes;
        }
        return $input;
    }

}

