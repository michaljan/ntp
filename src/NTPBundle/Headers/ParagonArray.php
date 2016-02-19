<?php

namespace NTPBundle\Headers;

class ParagonArray{
    
    
    public function csvReaderArray(){
        $headers= array('routeNo','tripNo','callTripPosition','depotId','startTime','sourceDepotDepartureTime','customerId','customerName','postcode','timeWindowStart','timeWindowEnd','arrivalTime','departTime','callDuration','callType','orderDetails1','cages','chepPallets','psPallets','container','cageEquivalent','prodCode','productName','trailerGroupName','orderDetails2','orderDetails3','orderDetails4','endDepotArrivalTime','depotofroute','dutyTime','driveTime','distanceKms','emptyDistKms','emptyTime','timeUtil','waitingTime','noOfTrips','routeDropNo','callNo','tripDropNo','tripStart','destDepotArrivalTime','destDepotDepartureTime','tripsEndDepot','tripsSourceDepot','sourceDepotArrivalTime2','sourceDepotDepartureTime2','tripsStartDepot','startDepotDepartureTime','trailerTypeName','endTime','transferId','driverGroupName','tractorGroupName','callRefNumber','uploadDate','uploadedBy','planDate','planName','routeName','travelDistNext','travelDistPrev');
        return $headers;
    }
}
