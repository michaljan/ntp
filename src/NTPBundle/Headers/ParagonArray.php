<?php

namespace NTPBundle\Headers;

class ParagonArray{
    
    
    public function csvReaderArray(){
        $headers= array('routeNo','tripNo','callTripPosition','depotId','startTime','sourceDepotDepartureTime','customerId','customerName','postcode','timeWindowStart','timeWindowEnd','arrivalTime','departTime','callDuration','callType','orderDetails1','measure1','measure2','measure3','measure4','measure5','prodCode','productName','trailerGroupName','orderDetails2','orderDetails3','orderDetails4','endDepotArrivalTime','dutyTime','driveTime','distanceKms','emptyDistKms','emptyTime','timeUtil','waitingTime','noOfTrips','routeDropNo','callNo','tripDropNo','tripStart','destDepotArrivalTime','destDepotDepartureTime','tripsEndDepot','tripsSourceDepot','sourceDepotArrivalTime2','sourceDepotDepartureTime2','tripsStartDepot','startDepotDepartureTime','trailerTypeName','endTime','transferId','driverGroupName','tractorGroupName','callRefNumber','travelDistNext','travelDistPrev','custData1','custData2','custData3','ndata1','ndata2','ndata3','ndata4','ndata5','sdata1','sdata2','sdata3','sdata4','sdata5','uploadDate','uploadedBy','planDate','planName','routeName','weekNumber');
        return $headers;
    }
}
