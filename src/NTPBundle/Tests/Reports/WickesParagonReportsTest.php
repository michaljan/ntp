<?php

namespace NTPBundle\Tests\Reports;


use NTPBundle\Reports\WickesParagonReports;

class WickesParagonReportstest{
    function createDashboardTest(){
        $dashboard= new WickesParagonReports;
        $dashboard->createDashboard($date);
        
    }
    
}


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

