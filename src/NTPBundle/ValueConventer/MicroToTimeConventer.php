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
    public function convert(){
    $input = 1456385160;
    $uSec = $input % 1000;
    $input = floor($input / 1000);
    echo $input.'<br/>'; 
    $seconds = $input % 60;
    $input = floor($input / 60);
    echo $seconds.'<br/>';
    $minutes = $input % 60;
    $input = floor($input / 60); 
    echo $miutes.'<br/>';
    $hours = $input % 60;
    $input = floor($input / 60); 
    echo $hours.'<br/>';
    }
}
