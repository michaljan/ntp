<?php
namespace NTPBundle\TMS;

use Doctrine\ORM\EntityManager;

class ParagonTranslator{
    private $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    
    public function convertData(){
        $query = $this->em
                ->createQuery("INSERT INTO NTPBundle:Schedule () "
                        . "SELECT DISTINCT p.routeNo, p.tripNo ,p.callTripPosition ,p.depotId ,p.startTime ,p.sourceDepotDepartureTime ,p.customerId ,p.customerName ,p.postcode ,p.timeWindowStart ,p.timeWindowEnd ,p.arrivalTime ,p.departTime ,p.callDuration ,p.callType ,p.orderDetails1 ,p.measure1 ,p.measure2 ,p.measure3 ,p.measure4 ,p.measure5 ,p.prodCode ,p.productName ,p.trailerGroupName ,p.orderDetails2 ,p.orderDetails3 ,p.orderDetails4 ,p.endDepotArrivalTime ,p.dutyTime ,p.driveTime ,p.distanceKms ,p.emptyDistKms ,p.emptyTime ,p.timeUtil ,p.waitingTime ,p.noOfTrips ,p.routeDropNo ,p.callNo ,p.tripDropNo ,p.tripStart ,p.destDepotArrivalTime ,p.destDepotDepartureTime ,p.tripsEndDepot ,p.tripsSourceDepot ,p.sourceDepotArrivalTime2 ,p.sourceDepotDepartureTime2 ,p.tripsStartDepot ,p.startDepotDepartureTime ,p.trailerTypeName ,p.endTime ,p.transferId ,p.driverGroupName ,p.tractorGroupName ,p.callRefNumber ,p.travelDistNext ,p.travelDistPrev ,p.custData1 ,p.custData2 ,p.custData3 ,p.ndata1 ,p.ndata2 ,p.ndata3 ,p.ndata4 ,p.ndata5 ,p.sdata1 ,p.sdata2 ,p.sdata3 ,p.sdata4 ,p.sdata5 ,p.uploadDate ,p.uploadedBy ,p.planDate ,p.planName ,p.routeName  "
                        . "FROM NTPBundle:ParagonData p WHERE p.planDate = :date ")
                ->setParameter('date', $date);
        $result = $query->getResult();
    }
    
}
