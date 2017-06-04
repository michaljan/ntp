<?php

namespace NTPBundle\FileProcessor;

use Doctrine\ORM\EntityManager;
use Ddeboer\DataImport\Workflow;
use Ddeboer\DataImport\Reader\ArrayReader;
use Ddeboer\DataImport\Writer\CsvWriter;

class CsvFileReader {

    private $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function readDatabase($endDate,$startDate) {
        array_map('unlink', glob(__DIR__ . '/../data/downloads/*.csv'));
        $csvPath = __DIR__ . '/../data/downloads/paragon' . date("Ymd") . '.csv';
        var_dump($csvPath);
        die;
        $query = $this->em
                ->createQuery("SELECT p.id, p.routeNo, p.tripNo, p.callTripPosition, p.depotId, DATE_FORMAT(p.startTime,'%Y-%m-%d %H:%i:%s') , DATE_FORMAT( p.sourceDepotDepartureTime,'%Y-%m-%d %H:%i:%s'), p.customerId, DATE_FORMAT( p.arrivalTime,'%Y-%m-%d %H:%i:%s'),DATE_FORMAT( p.departTime,'%Y-%m-%d %H:%i:%s') , p.callDuration, p.callType, p.orderDetails1, p.prodCode, p.productName, p.trailerGroupName, p.orderDetails2, p.orderDetails3, p.orderDetails4, DATE_FORMAT(p.endDepotArrivalTime ,'%Y-%m-%d %H:%i:%s'), p.depotofroute, p.dutyTime, p.driveTime, p.distanceKms, p.emptyDistKms, p.emptyTime, p.timeUtil, p.waitingTime, p.noOfTrips, p.routeDropNo, p.callNo, p.tripDropNo, DATE_FORMAT( p.tripStart,'%Y-%m-%d %H:%i:%s'), DATE_FORMAT( p.destDepotArrivalTime,'%Y-%m-%d %H:%i:%s'), DATE_FORMAT( p.destDepotDepartureTime,'%Y-%m-%d %H:%i:%s'), p.tripsEndDepot, p.tripsSourceDepot, DATE_FORMAT( p.sourceDepotArrivalTime2,'%Y-%m-%d %H:%i:%s'), DATE_FORMAT( p.sourceDepotDepartureTime2,'%Y-%m-%d %H:%i:%s'), p.tripsStartDepot, DATE_FORMAT( p.startDepotDepartureTime,'%Y-%m-%d %H:%i:%s'), p.trailerTypeName, DATE_FORMAT(p.endTime ,'%Y-%m-%d %H:%i:%s'), p.transferId, p.driverGroupName, p.tractorGroupName, p.callRefNumber, DATE_FORMAT(p.uploadDate ,'%Y-%m-%d %H:%i:%s'), p.uploadedBy, DATE_FORMAT(p.planDate ,'%Y-%m-%d'), p.planName, p.routeName, p.customerName, p.postcode, DATE_FORMAT( p.timeWindowStart,'%Y-%m-%d %H:%i:%s'), DATE_FORMAT(p.timeWindowEnd ,'%Y-%m-%d %H:%i:%s'), p.travelDistNext, p.travelDistPrev, p.custData1, p.measure1, p.measure2, p.measure3, p.measure4, p.measure5, p.custData2, p.custData3, p.ndata1, p.ndata2, p.ndata3, p.ndata4, p.ndata5, p.sdata1, p.sdata2, p.sdata3, p.sdata4, p.sdata5, p.weekNumber "
                        . "FROM NTPBundle:ParagonData p WHERE p.planDate BETWEEN :startDate AND :endDate")
                ->setParameter('startDate', $startDate->format('Y-m-d'))
                ->setParameter('endDate', $endDate->format('Y-m-d'));
        $result = $query->getResult();
        $fp = fopen($csvPath, 'w');
        $headers=array("id","route_no","trip_no","call_trip_position","depot_id","start_time","source_depot_departure_time","customer_id","arrival_time","depart_time","call_duration","call_type","order_details_1","prod_code","product_name","trailer_group_name","order_details_2","order_details_3","order_details_4","end_depot_arrival_time","depotofroute","duty_time","drive_time","distance_kms","empty_dist_kms","empty_time","time_util_","waiting_time","no_of_trips","route_drop_no","call_no","trip_drop_no","trip_start","dest_depot_arrival_time","dest_depot_departure_time","trips_end_depot","trips_source_depot","source_depot_arrival_time_2","source_depot_departure_time_2","trips_start_depot","start_depot_departure_time","trailer_type_name","end_time","transfer_id","driver_group_name","tractor_group_name","call_ref_number","upload_Date","uploaded_by","plan_date","plan_name","route_name","customer_name","postcode","time_window_start","time_window_end","travel_dist_next","travel_dist_prev","cust_data_1","measure_1","measure_2","measure_3","measure_4","measure_5","cust_data_2","cust_data_3","ndata_1","ndata_2","ndata_3","ndata_4","ndata_5","sdata_1","sdata_2","sdata_3","sdata_4","sdata_5","week_number");
        fputcsv($fp,$headers);
        if (!empty($result)) {
            foreach ($result as $row) {
                 fputcsv($fp,$row);
            }
            fclose($fp);

            return $csvPath;
        }
        return false;
    }

}
