<?php

namespace NTPBundle\GoogleAPI;

/*
 * Google chart formatter
 * @author Michal
 */

class GoogleChartFormatter {

    /*
     * Returns formatted string according to column chart designed for diffrent columns - color coded
     * 
     * @param $data array to format
     * @return $result string formatted for google charts
     * 
     */
    public function columnChart($data) {
       $conversion='';
       $i=0;
       $color='blue';
       foreach ($data as $row) {
            switch($i){
                case 0: 
                    $color='blue';
                    break;
                case 1: 
                    $color='red';
                    break;
                case 2: 
                    $color='yellow';
                    break;
            }
            $conversion = ('["' . implode('",', $row) . ',"'.$color.'"]') . ',' . $conversion;
            $i++;
        }
        $result= '[[{ role: "domain" }, "Quantity",  { role: "style" } ],' . substr($conversion, 0, -1) . ']';
        return $result;
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

