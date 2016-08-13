<?php

namespace NTPBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParagonData
 *
 * @ORM\Table(name="paragon_data")
 * @ORM\Entity
 */
class ParagonData
{
    /**
     * @var string
     *
     * @ORM\Column(name="route_no", type="string", nullable=true)
     */
    private $routeNo;

    /**
     * @var integer
     *
     * @ORM\Column(name="trip_no", type="integer", length=20, nullable=true)
     */
    private $tripNo;

    /**
     * @var integer
     *
     * @ORM\Column(name="call_trip_position", type="integer", nullable=true)
     */
    private $callTripPosition;

    /**
     * @var integer
     *
     * @ORM\Column(name="depot_id", type="string", nullable=true)
     */
    private $depotId;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="start_time", type="datetime", length=20, nullable=true)
     */
    private $startTime;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="source_depot_departure_time", type="datetime", length=20, nullable=true)
     */
    private $sourceDepotDepartureTime;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_id", type="string", length=20, nullable=true)
     */
    private $customerId;
    
     /**
     * @var string
     * 
     * @ORM\Column(name="customer_name", type="string", length=64, nullable=true)
     */
    public $customerName;
    
    /**
     * @var DateTime
     *
     * @ORM\Column(name="arrival_time", type="datetime", length=20, nullable=true)
     */
    
    
    private $arrivalTime;
    
    /**
     * @var string
     * 
     * @ORM\Column(name="postcode", type="string", length=8, nullable=true)
     */
    public $postcode;


    /**
     * @var DateTime
     * 
     * @ORM\Column(name="depart_time", type="datetime", length=20, nullable=true)
     */
    private $departTime;

    /**
     * @var bigint
     *
     * @ORM\Column(name="call_duration", type="bigint", length=20, nullable=true)
     */
    private $callDuration;

    /**
     * @var string
     *
     * @ORM\Column(name="call_type", type="string", length=20, nullable=true)
     */
    private $callType;

    /**
     * @var string
     *
     * @ORM\Column(name="order_details_1", type="string", length=50, nullable=true)
     */
    private $orderDetails1;

    /**
     * @var integer
     *
     * @ORM\Column(name="measure_1", type="integer", nullable=true)
     */
    private $measure1;

    /**
     * @var integer
     *
     * @ORM\Column(name="measure_2", type="integer", nullable=true)
     */
    private $measure2;

    /**
     * @var integer
     *
     * @ORM\Column(name="measure_3", type="integer", nullable=true)
     */
    private $measure3;

    /**
     * @var integer
     *
     * @ORM\Column(name="measure_4", type="integer", nullable=true)
     */
    private $measure4;

    /**
     * @var integer
     *
     * @ORM\Column(name="measure_5", type="integer", nullable=true)
     */
    private $measure5;

    /**
     * @var integer
     *
     * @ORM\Column(name="prod_code", type="integer", nullable=true)
     */
    private $prodCode;

    /**
     * @var string
     *
     * @ORM\Column(name="product_name", type="string", length=50, nullable=true)
     */
    private $productName;

    /**
     * @var string
     *
     * @ORM\Column(name="trailer_group_name", type="string", length=50, nullable=true)
     */
    private $trailerGroupName;

    /**
     * @var string
     *
     * @ORM\Column(name="order_details_2", type="string", length=50, nullable=true)
     */
    private $orderDetails2;

    /**
     * @var string
     *
     * @ORM\Column(name="order_details_3", type="string", length=50, nullable=true)
     */
    private $orderDetails3;

    /**
     * @var string
     *
     * @ORM\Column(name="order_details_4", type="string", length=50, nullable=true)
     */
    private $orderDetails4;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="end_depot_arrival_time", type="datetime", length=20, nullable=true)
     */
    private $endDepotArrivalTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="depotofroute", type="integer", nullable=true)
     */
    private $depotofroute;

    /**
     * @var bigint
     *
     * @ORM\Column(name="duty_time", type="bigint", length=20, nullable=true)
     */
    private $dutyTime;

    /**
     * @var bigint
     *
     * @ORM\Column(name="drive_time", type="bigint", length=20, nullable=true)
     */
    private $driveTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="distance_kms", type="integer", nullable=true)
     */
    private $distanceKms;

    /**
     * @var integer
     *
     * @ORM\Column(name="empty_dist_kms", type="integer", nullable=true)
     */
    private $emptyDistKms;

    /**
     * @var bigint
     *
     * @ORM\Column(name="empty_time", type="bigint", length=20, nullable=true)
     */
    private $emptyTime;

    /**
     * @var string
     *
     * @ORM\Column(name="time_util_", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $timeUtil;

    /**
     * @var string
     *
     * @ORM\Column(name="waiting_time", type="bigint", length=20, nullable=true)
     */
    private $waitingTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="no_of_trips", type="integer", nullable=true)
     */
    private $noOfTrips;

    /**
     * @var integer
     *
     * @ORM\Column(name="route_drop_no", type="integer", nullable=true)
     */
    private $routeDropNo;

    /**
     * @var integer
     *
     * @ORM\Column(name="call_no", type="integer", nullable=true)
     */
    private $callNo;

    /**
     * @var integer
     *
     * @ORM\Column(name="trip_drop_no", type="integer", nullable=true)
     */
    private $tripDropNo;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="trip_start", type="datetime", length=20, nullable=true)
     */
    private $tripStart;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="dest_depot_arrival_time", type="datetime", length=20, nullable=true)
     */
    private $destDepotArrivalTime;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="dest_depot_departure_time", type="datetime", length=20, nullable=true)
     */
    private $destDepotDepartureTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="trips_end_depot", type="integer", nullable=true)
     */
    private $tripsEndDepot;

    /**
     * @var integer
     *
     * @ORM\Column(name="trips_source_depot", type="integer", nullable=true)
     */
    private $tripsSourceDepot;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="source_depot_arrival_time_2", type="datetime", length=20, nullable=true)
     */
    private $sourceDepotArrivalTime2;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="source_depot_departure_time_2", type="datetime", length=20, nullable=true)
     */
    private $sourceDepotDepartureTime2;

    /**
     * @var integer
     *
     * @ORM\Column(name="trips_start_depot", type="integer", nullable=true)
     */
    private $tripsStartDepot;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="start_depot_departure_time", type="datetime", length=20, nullable=true)
     */
    private $startDepotDepartureTime;

    /**
     * @var string
     *
     * @ORM\Column(name="trailer_type_name", type="string", length=50, nullable=true)
     */
    private $trailerTypeName;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="end_time", type="datetime", length=20, nullable=true)
     */
    private $endTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="transfer_id", type="integer", nullable=true)
     */
    private $transferId;

    /**
     * @var string
     *
     * @ORM\Column(name="driver_group_name", type="string", length=50, nullable=true)
     */
    private $driverGroupName;

    /**
     * @var string
     *
     * @ORM\Column(name="tractor_group_name", type="string", length=50, nullable=true)
     */
    private $tractorGroupName;

    /**
     * @var integer
     *
     * @ORM\Column(name="call_ref_number", type="integer", nullable=true)
     */
    private $callRefNumber;
    
    /**
     * @var Datetime
     * 
     * @ORM\Column(name="time_window_start", type="datetime", length=9, nullable=true)
     */
    public $timeWindowStart;

    /**
     * @var Datetime
     * 
     * @ORM\Column(name="time_window_end", type="datetime", length=9, nullable=true)
     */
    public $timeWindowEnd;
    
    /**
     * @var string
     *
     * @ORM\Column(name="cust_data_1", type="string", length=20, nullable=true)
     */
    private $custData1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="cust_data_2", type="string", length=20, nullable=true)
     */
    private $custData2;
    
    /**
     * @var string
     *
     * @ORM\Column(name="cust_data_3", type="string", length=20, nullable=true)
     */
    private $custData3;
    
    
        /**
     * @var integer
     *
     * @ORM\Column(name="ndata_1", type="integer", length=20, nullable=true)
     */
    private $ndata1;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="ndata_2", type="integer", length=20, nullable=true)
     */
    private $ndata2;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="ndata_3", type="integer", length=20, nullable=true)
     */
    private $ndata3;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="ndata_4", type="integer", length=20, nullable=true)
     */
    
    private $ndata4;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="ndata_5", type="integer", length=20, nullable=true)
     */
    private $ndata5;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="upload_Date", type="datetime", nullable=true)
     */
    private $uploadDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="uploaded_by", type="integer", nullable=true)
     */
    private $uploadedBy;

    /**
     * @var \date
     *
     * @ORM\Column(name="plan_date", type="date", nullable=true)
     */
    private $planDate;

    /**
     * @var string
     *
     * @ORM\Column(name="plan_name", type="string", length=20, nullable=true)
     */
    private $planName;

    /**
     * @var string
     *
     * @ORM\Column(name="route_name", type="string", length=30, nullable=true)
     */
    private $routeName;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="travel_dist_next", type="integer", length=20, nullable=true)
     */
    private $travelDistNext;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="travel_dist_prev", type="integer", length=20, nullable=true)
     */
    private $travelDistPrev;
    
    /**
     * Set routeNo
     *
     * @param string $routeNo
     *
     * @return ParagonData
     */
    public function setRouteNo($routeNo)
    {
        $this->routeNo = $routeNo;

        return $this;
    }

    /**
     * Get routeNo
     *
     * @return integer
     */
    public function getRouteNo()
    {
        return $this->routeNo;
    }

    /**
     * Set tripNo
     *
     * @param integer $tripNo
     *
     * @return ParagonData
     */
    public function setTripNo($tripNo)
    {
        $this->tripNo = $tripNo;

        return $this;
    }

    /**
     * Get tripNo
     *
     * @return integer
     */
    public function getTripNo()
    {
        return $this->tripNo;
    }

    /**
     * Set callTripPosition
     *
     * @param integer $callTripPosition
     *
     * @return ParagonData
     */
    public function setCallTripPosition($callTripPosition)
    {
        $this->callTripPosition = $callTripPosition;

        return $this;
    }

    /**
     * Get callTripPosition
     *
     * @return integer
     */
    public function getCallTripPosition()
    {
        return $this->callTripPosition;
    }

    /**
     * Set depotId
     *
     * @param string $depotId
     *
     * @return ParagonData
     */
    public function setDepotId($depotId)
    {
        $this->depotId = $depotId;

        return $this;
    }

    /**
     * Get depotId
     *
     * @return string
     */
    public function getDepotId()
    {
        return $this->depotId;
    }

    /**
     * Set startTime
     *
     * @param DateTime $startTime
     *
     * @return ParagonData
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;

        return $this;
    }

    /**
     * Get startTime
     *
     * @return DateTime
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * Set sourceDepotDepartureTime
     *
     * @param DateTime $sourceDepotDepartureTime
     *
     * @return ParagonData
     */
    public function setSourceDepotDepartureTime($sourceDepotDepartureTime)
    {
        $this->sourceDepotDepartureTime = $sourceDepotDepartureTime;

        return $this;
    }

    /**
     * Get sourceDepotDepartureTime
     *
     * @return DateTime
     */
    public function getSourceDepotDepartureTime()
    {
        return $this->sourceDepotDepartureTime;
    }

    /**
     * Set customerId
     *
     * @param string $customerId
     *
     * @return ParagonData
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * Get customerId
     *
     * @return string
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Set arrivalTime
     *
     * @param DateTime $arrivalTime
     *
     * @return ParagonData
     */
    public function setArrivalTime($arrivalTime)
    {
        $this->arrivalTime = $arrivalTime;

        return $this;
    }

    /**
     * Get arrivalTime
     *
     * @return DateTime
     */
    public function getArrivalTime()
    {
        return $this->arrivalTime;
    }

    /**
     * Set departTime
     *
     * @param DateTime $departTime
     *
     * @return ParagonData
     */
    public function setDepartTime($departTime)
    {
        $this->departTime = $departTime;

        return $this;
    }

    /**
     * Get departTime
     *
     * @return DateTime
     */
    public function getDepartTime()
    {
        return $this->departTime;
    }

    /**
     * Set callDuration
     *
     * @param integer $callDuration
     *
     * @return ParagonData
     */
    public function setCallDuration($callDuration)
    {
        $this->callDuration = $callDuration;

        return $this;
    }

    /**
     * Get callDuration
     *
     * @return string
     */
    public function getCallDuration()
    {
        return $this->callDuration;
    }

    /**
     * Set callType
     *
     * @param string $callType
     *
     * @return ParagonData
     */
    public function setCallType($callType)
    {
        $this->callType = $callType;

        return $this;
    }

    /**
     * Get callType
     *
     * @return string
     */
    public function getCallType()
    {
        return $this->callType;
    }

    /**
     * Set orderDetails1
     *
     * @param string $orderDetails1
     *
     * @return ParagonData
     */
    public function setOrderDetails1($orderDetails1)
    {
        $this->orderDetails1 = $orderDetails1;

        return $this;
    }

    /**
     * Get orderDetails1
     *
     * @return string
     */
    public function getOrderDetails1()
    {
        return $this->orderDetails1;
    }

    /**
     * Set measure1
     *
     * @param integer $measure1
     *
     * @return ParagonData
     */
    public function setMeasure1($measure1)
    {
        $this->measure1 = $measure1;

        return $this;
    }

    /**
     * Get measure1
     *
     * @return integer
     */
    public function getMeasure1()
    {
        return $this->measure1;
    }

    /**
     * Set measure2
     *
     * @param integer $measure2
     *
     * @return ParagonData
     */
    public function setMeasure2($measure2)
    {
        $this->measure2 = $measure2;

        return $this;
    }

    /**
     * Get measure2
     *
     * @return integer
     */
    public function getMeasure2()
    {
        return $this->measure2;
    }

    /**
     * Set Measure3
     *
     * @param integer $Measure3
     *
     * @return ParagonData
     */
    public function setMeasure3($Measure3)
    {
        $this->Measure3 = $Measure3;

        return $this;
    }

    /**
     * Get Measure3
     *
     * @return integer
     */
    public function getMeasure3()
    {
        return $this->Measure3;
    }

    /**
     * Set measure4
     *
     * @param integer $measure4
     *
     * @return ParagonData
     */
    public function setMeasure4($measure4)
    {
        $this->measure4 = $measure4;

        return $this;
    }

    /**
     * Get measure4
     *
     * @return integer
     */
    public function getMeasure4()
    {
        return $this->measure4;
    }

    /**
     * Set measure5
     *
     * @param integer $measure5
     *
     * @return ParagonData
     */
    public function setMeasure5($measure5)
    {
        $this->measure5 = $measure5;

        return $this;
    }

    /**
     * Get measure5
     *
     * @return integer
     */
    public function getMeasure5()
    {
        return $this->measure5;
    }

    /**
     * Set prodCode
     *
     * @param integer $prodCode
     *
     * @return ParagonData
     */
    public function setProdCode($prodCode)
    {
        $this->prodCode = $prodCode;

        return $this;
    }

    /**
     * Get prodCode
     *
     * @return integer
     */
    public function getProdCode()
    {
        return $this->prodCode;
    }

    /**
     * Set productName
     *
     * @param string $productName
     *
     * @return ParagonData
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;

        return $this;
    }

    /**
     * Get productName
     *
     * @return string
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * Set trailerGroupName
     *
     * @param string $trailerGroupName
     *
     * @return ParagonData
     */
    public function setTrailerGroupName($trailerGroupName)
    {
        $this->trailerGroupName = $trailerGroupName;

        return $this;
    }

    /**
     * Get trailerGroupName
     *
     * @return string
     */
    public function getTrailerGroupName()
    {
        return $this->trailerGroupName;
    }

    /**
     * Set orderDetails2
     *
     * @param string $orderDetails2
     *
     * @return ParagonData
     */
    public function setOrderDetails2($orderDetails2)
    {
        $this->orderDetails2 = $orderDetails2;

        return $this;
    }

    /**
     * Get orderDetails2
     *
     * @return string
     */
    public function getOrderDetails2()
    {
        return $this->orderDetails2;
    }

    /**
     * Set orderDetails3
     *
     * @param string $orderDetails3
     *
     * @return ParagonData
     */
    public function setOrderDetails3($orderDetails3)
    {
        $this->orderDetails3 = $orderDetails3;

        return $this;
    }

    /**
     * Get orderDetails3
     *
     * @return string
     */
    public function getOrderDetails3()
    {
        return $this->orderDetails3;
    }

    /**
     * Set orderDetails4
     *
     * @param string $orderDetails4
     *
     * @return ParagonData
     */
    public function setOrderDetails4($orderDetails4)
    {
        $this->orderDetails4 = $orderDetails4;

        return $this;
    }

    /**
     * Get orderDetails4
     *
     * @return string
     */
    public function getOrderDetails4()
    {
        return $this->orderDetails4;
    }

    /**
     * Set endDepotArrivalTime
     *
     * @param DateTime $endDepotArrivalTime
     *
     * @return ParagonData
     */
    public function setEndDepotArrivalTime($endDepotArrivalTime)
    {
        $this->endDepotArrivalTime = $endDepotArrivalTime;

        return $this;
    }

    /**
     * Get endDepotArrivalTime
     *
     * @return DateTime
     */
    public function getEndDepotArrivalTime()
    {
        return $this->endDepotArrivalTime;
    }

    /**
     * Set depotofroute
     *
     * @param integer $depotofroute
     *
     * @return ParagonData
     */
    public function setDepotofroute($depotofroute)
    {
        $this->depotofroute = $depotofroute;

        return $this;
    }

    /**
     * Get depotofroute
     *
     * @return integer
     */
    public function getDepotofroute()
    {
        return $this->depotofroute;
    }

    /**
     * Set dutyTime
     *
     * @param integer $dutyTime
     *
     * @return ParagonData
     */
    public function setDutyTime($dutyTime)
    {
        $this->dutyTime = $dutyTime;

        return $this;
    }

    /**
     * Get dutyTime
     *
     * @return string
     */
    public function getDutyTime()
    {
        return $this->dutyTime;
    }

    /**
     * Set driveTime
     *
     * @param Tiem $driveTime
     *
     * @return ParagonData
     */
    public function setDriveTime($driveTime)
    {
        $this->driveTime = $driveTime;

        return $this;
    }

    /**
     * Get driveTime
     *
     * @return string
     */
    public function getDriveTime()
    {
        return $this->driveTime;
    }

    /**
     * Set distanceKms
     *
     * @param integer $distanceKms
     *
     * @return ParagonData
     */
    public function setDistanceKms($distanceKms)
    {
        $this->distanceKms = $distanceKms;

        return $this;
    }

    /**
     * Get distanceKms
     *
     * @return integer
     */
    public function getDistanceKms()
    {
        return $this->distanceKms;
    }

    /**
     * Set emptyDistKms
     *
     * @param integer $emptyDistKms
     *
     * @return ParagonData
     */
    public function setEmptyDistKms($emptyDistKms)
    {
        $this->emptyDistKms = $emptyDistKms;

        return $this;
    }

    /**
     * Get emptyDistKms
     *
     * @return integer
     */
    public function getEmptyDistKms()
    {
        return $this->emptyDistKms;
    }

    /**
     * Set emptyTime
     *
     * @param integer $emptyTime
     *
     * @return ParagonData
     */
    public function setEmptyTime($emptyTime)
    {
        $this->emptyTime = $emptyTime;

        return $this;
    }

    /**
     * Get emptyTime
     *
     * @return string
     */
    public function getEmptyTime()
    {
        return $this->emptyTime;
    }

    /**
     * Set timeUtil
     *
     * @param string $timeUtil
     *
     * @return ParagonData
     */
    public function setTimeUtil($timeUtil)
    {
        $this->timeUtil = $timeUtil;

        return $this;
    }

    /**
     * Get timeUtil
     *
     * @return string
     */
    public function getTimeUtil()
    {
        return $this->timeUtil;
    }

    /**
     * Set waitingTime
     *
     * @param string $waitingTime
     *
     * @return ParagonData
     */
    public function setWaitingTime($waitingTime)
    {
        $this->waitingTime = $waitingTime;

        return $this;
    }

    /**
     * Get waitingTime
     *
     * @return string
     */
    public function getWaitingTime()
    {
        return $this->waitingTime;
    }

    /**
     * Set noOfTrips
     *
     * @param integer $noOfTrips
     *
     * @return ParagonData
     */
    public function setNoOfTrips($noOfTrips)
    {
        $this->noOfTrips = $noOfTrips;

        return $this;
    }

    /**
     * Get noOfTrips
     *
     * @return integer
     */
    public function getNoOfTrips()
    {
        return $this->noOfTrips;
    }

    /**
     * Set routeDropNo
     *
     * @param integer $routeDropNo
     *
     * @return ParagonData
     */
    public function setRouteDropNo($routeDropNo)
    {
        $this->routeDropNo = $routeDropNo;

        return $this;
    }

    /**
     * Get routeDropNo
     *
     * @return integer
     */
    public function getRouteDropNo()
    {
        return $this->routeDropNo;
    }

    /**
     * Set callNo
     *
     * @param integer $callNo
     *
     * @return ParagonData
     */
    public function setCallNo($callNo)
    {
        $this->callNo = $callNo;

        return $this;
    }

    /**
     * Get callNo
     *
     * @return integer
     */
    public function getCallNo()
    {
        return $this->callNo;
    }

    /**
     * Set tripDropNo
     *
     * @param integer $tripDropNo
     *
     * @return ParagonData
     */
    public function setTripDropNo($tripDropNo)
    {
        $this->tripDropNo = $tripDropNo;

        return $this;
    }

    /**
     * Get tripDropNo
     *
     * @return integer
     */
    public function getTripDropNo()
    {
        return $this->tripDropNo;
    }

    /**
     * Set tripStart
     *
     * @param DateTime $tripStart
     *
     * @return ParagonData
     */
    public function setTripStart($tripStart)
    {
        $this->tripStart = $tripStart;

        return $this;
    }

    /**
     * Get tripStart
     *
     * @return DateTime
     */
    public function getTripStart()
    {
        return $this->tripStart;
    }

    /**
     * Set destDepotArrivalTime
     *
     * @param DateTime $destDepotArrivalTime
     *
     * @return ParagonData
     */
    public function setDestDepotArrivalTime($destDepotArrivalTime)
    {
        $this->destDepotArrivalTime = $destDepotArrivalTime;

        return $this;
    }

    /**
     * Get destDepotArrivalTime
     *
     * @return DateTime
     */
    public function getDestDepotArrivalTime()
    {
        return $this->destDepotArrivalTime;
    }

    /**
     * Set destDepotDepartureTime
     *
     * @param DateTime $destDepotDepartureTime
     *
     * @return ParagonData
     */
    public function setDestDepotDepartureTime($destDepotDepartureTime)
    {
        $this->destDepotDepartureTime = $destDepotDepartureTime;

        return $this;
    }

    /**
     * Get destDepotDepartureTime
     *
     * @return DateTime
     */
    public function getDestDepotDepartureTime()
    {
        return $this->destDepotDepartureTime;
    }

    /**
     * Set tripsEndDepot
     *
     * @param integer $tripsEndDepot
     *
     * @return ParagonData
     */
    public function setTripsEndDepot($tripsEndDepot)
    {
        $this->tripsEndDepot = $tripsEndDepot;

        return $this;
    }

    /**
     * Get tripsEndDepot
     *
     * @return integer
     */
    public function getTripsEndDepot()
    {
        return $this->tripsEndDepot;
    }

    /**
     * Set tripsSourceDepot
     *
     * @param integer $tripsSourceDepot
     *
     * @return ParagonData
     */
    public function setTripsSourceDepot($tripsSourceDepot)
    {
        $this->tripsSourceDepot = $tripsSourceDepot;

        return $this;
    }

    /**
     * Get tripsSourceDepot
     *
     * @return integer
     */
    public function getTripsSourceDepot()
    {
        return $this->tripsSourceDepot;
    }

    /**
     * Set sourceDepotArrivalTime2
     *
     * @param DateTime $sourceDepotArrivalTime2
     *
     * @return ParagonData
     */
    public function setSourceDepotArrivalTime2($sourceDepotArrivalTime2)
    {
        $this->sourceDepotArrivalTime2 = $sourceDepotArrivalTime2;

        return $this;
    }

    /**
     * Get sourceDepotArrivalTime2
     *
     * @return DateTime
     */
    public function getSourceDepotArrivalTime2()
    {
        return $this->sourceDepotArrivalTime2;
    }

    /**
     * Set sourceDepotDepartureTime2
     *
     * @param DateTime $sourceDepotDepartureTime2
     *
     * @return ParagonData
     */
    public function setSourceDepotDepartureTime2($sourceDepotDepartureTime2)
    {
        $this->sourceDepotDepartureTime2 = $sourceDepotDepartureTime2;

        return $this;
    }

    /**
     * Get sourceDepotDepartureTime2
     *
     * @return DateTime
     */
    public function getSourceDepotDepartureTime2()
    {
        return $this->sourceDepotDepartureTime2;
    }

    /**
     * Set tripsStartDepot
     *
     * @param integer $tripsStartDepot
     *
     * @return ParagonData
     */
    public function setTripsStartDepot($tripsStartDepot)
    {
        $this->tripsStartDepot = $tripsStartDepot;

        return $this;
    }

    /**
     * Get tripsStartDepot
     *
     * @return integer
     */
    public function getTripsStartDepot()
    {
        return $this->tripsStartDepot;
    }

    /**
     * Set startDepotDepartureTime
     *
     * @param DateTime $startDepotDepartureTime
     *
     * @return ParagonData
     */
    public function setStartDepotDepartureTime($startDepotDepartureTime)
    {
        $this->startDepotDepartureTime = $startDepotDepartureTime;

        return $this;
    }

    /**
     * Get startDepotDepartureTime
     *
     * @return DateTime
     */
    public function getStartDepotDepartureTime()
    {
        return $this->startDepotDepartureTime;
    }

    /**
     * Set trailerTypeName
     *
     * @param string $trailerTypeName
     *
     * @return ParagonData
     */
    public function setTrailerTypeName($trailerTypeName)
    {
        $this->trailerTypeName = $trailerTypeName;

        return $this;
    }

    /**
     * Get trailerTypeName
     *
     * @return string
     */
    public function getTrailerTypeName()
    {
        return $this->trailerTypeName;
    }

    /**
     * Set endTime
     *
     * @param DateTime $endTime
     *
     * @return ParagonData
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;

        return $this;
    }

    /**
     * Get endTime
     *
     * @return DateTime
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * Set transferId
     *
     * @param integer $transferId
     *
     * @return ParagonData
     */
    public function setTransferId($transferId)
    {
        $this->transferId = $transferId;

        return $this;
    }

    /**
     * Get transferId
     *
     * @return integer
     */
    public function getTransferId()
    {
        return $this->transferId;
    }

    /**
     * Set driverGroupName
     *
     * @param string $driverGroupName
     *
     * @return ParagonData
     */
    public function setDriverGroupName($driverGroupName)
    {
        $this->driverGroupName = $driverGroupName;

        return $this;
    }

    /**
     * Get driverGroupName
     *
     * @return string
     */
    public function getDriverGroupName()
    {
        return $this->driverGroupName;
    }

    /**
     * Set tractorGroupName
     *
     * @param string $tractorGroupName
     *
     * @return ParagonData
     */
    public function setTractorGroupName($tractorGroupName)
    {
        $this->tractorGroupName = $tractorGroupName;

        return $this;
    }

    /**
     * Get tractorGroupName
     *
     * @return string
     */
    public function getTractorGroupName()
    {
        return $this->tractorGroupName;
    }

    /**
     * Set callRefNumber
     *
     * @param integer $callRefNumber
     *
     * @return ParagonData
     */
    public function setCallRefNumber($callRefNumber)
    {
        $this->callRefNumber = $callRefNumber;

        return $this;
    }

    /**
     * Get callRefNumber
     *
     * @return integer
     */
    public function getCallRefNumber()
    {
        return $this->callRefNumber;
    }

    /**
     * Set uploadDate
     *
     * @param \DateTime $uploadDate
     *
     * @return ParagonData
     */
    public function setUploadDate($uploadDate)
    {
        $this->uploadDate = $uploadDate;

        return $this;
    }

    /**
     * Get uploadDate
     *
     * @return \DateTime
     */
    public function getUploadDate()
    {
        return $this->uploadDate;
    }

    /**
     * Set uploadedBy
     *
     * @param integer $uploadedBy
     *
     * @return ParagonData
     */
    public function setUploadedBy($uploadedBy)
    {
        $this->uploadedBy = $uploadedBy;

        return $this;
    }

    /**
     * Get uploadedBy
     *
     * @return integer
     */
    public function getUploadedBy()
    {
        return $this->uploadedBy;
    }

    /**
     * Set planDate
     *
     * @param \Date $planDate
     *
     * @return ParagonData
     */
    public function setPlanDate($planDate)
    {
        $this->planDate = $planDate;

        return $this;
    }

    /**
     * Get planDate
     *
     * @return \Date
     */
    public function getPlanDate()
    {
        return $this->planDate;
    }

    /**
     * Set planName
     *
     * @param string $planName
     *
     * @return ParagonData
     */
    public function setPlanName($planName)
    {
        $this->planName = $planName;

        return $this;
    }

    /**
     * Get planName
     *
     * @return string
     */
    public function getPlanName()
    {
        return $this->planName;
    }

    /**
     * Set routeName
     *
     * @param string $routeName
     *
     * @return ParagonData
     */
    public function setRouteName($routeName)
    {
        $this->routeName = $routeName;

        return $this;
    }

    /**
     * Get routeName
     *
     * @return string
     */
    public function getRouteName()
    {
        return $this->routeName;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    
    
    /**
     * Set customerName
     *
     * @param string $customerName
     *
     * @return ParagonData
     */
    public function setCustomerName($customerName)
    {
        $this->customerName = $customerName;

        return $this;
    }

    /**
     * Get customerName
     *
     * @return string
     */
    public function getCustomerName()
    {
        return $this->customerName;
    }
    
     /**
     * Set postcode
     *
     * @param string $postcode
     *
     * @return ParagonData
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * Get postcode
     *
     * @return string
     */
    public function getPostcode()
    {
        return $this->postcode;
    }
    
    
    /**
     * Set travelDistNext
     *
     * @param integer $travelDistNext
     *
     * @return ParagonData
     */
    public function setTravelDistNext($travelDistNext)
    {
        $this->travelDistNext = $travelDistNext;

        return $this;
    }

    /**
     * Get travelDistNext
     *
     * @return integer
     */
    public function getTravelDistNext()
    {
        return $this->travelDistNext;
    }
    
        
    /**
     * Set travelDistPrev
     *
     * @param integer $travelDistPrev
     *
     * @return ParagonData
     */
    public function setTravelDistPrev($travelDistPrev)
    {
        $this->travelDistPrev = $travelDistPrev;

        return $this;
    }

    /**
     * Get travelDistPrev
     *
     * @return integer
     */
    public function getTravelDistPrev()
    {
        return $this->travelDistPrev;
    }
    
        /**
     * Set timeWindowStart
     *
     * @param DateTime $timeWindowStart
     *
     * @return ParagonData
     */
    public function setTimeWindowStart($timeWindowStart)
    {
        $this->timeWindowStart = $timeWindowStart;

        return $this;
    }

    /**
     * Get timeWindowEnd
     *
     * @return DateTime
     */
    public function getTimeWindowStart()
    {
        return $this->timeWindowStart;
    }
    
        
        /**
     * Set timeWindowEnd
     *
     * @param DateTime $timeWindowEnd
     *
     * @return ParagonData
     */
    public function setTimeWindowEnd($timeWindowEnd)
    {
        $this->timeWindowEnd = $timeWindowEnd;

        return $this;
    }

    /**
     * Get timeWindowEnd
     *
     * @return DateTime
     */
    public function getTimeWindowEnd()
    {
        return $this->timeWindowEnd;
    }
    
     /**
     * Set custData1
     *
     * @param string $custData1
     *
     * @return ParagonData
     */
    public function setCustData1($custData1)
    {
        $this->custData1 = $custData1;

        return $this;
    }

    /**
     * Get custData1
     *
     * @return string
     */
    public function getcustData1()
    {
        return $this->custData1;
    }
    
       /**
     * Set custData1
     *
     * @param string $custData1
     *
     * @return ParagonData
     */
    public function setCustData2($custData2)
    {
        $this->custData2 = $custData2;

        return $this;
    }

    /**
     * Get custData2
     *
     * @return string
     */
    public function getcustData2()
    {
        return $this->custData2;
    }
    
       /**
     * Set custData3
     *
     * @param string $custData3
     *
     * @return ParagonData
     */
    public function setCustData3($custData3)
    {
        $this->custData3 = $custData3;

        return $this;
    }

    /**
     * Get custData3
     *
     * @return string
     */
    public function getcustData3()
    {
        return $this->custData3;
    }
    
    /**
     * Set ndata1
     *
     * @param integer $ndata1
     *
     * @return ParagonData
     */
    public function setNdata1($ndata1)
    {
        $this->ndata1 = $ndata1;

        return $this;
    }

    /**
     * Get ndata1
     *
     * @return integer
     */
    public function getNdata1()
    {
        return $this->ndata1;
    }
    
       /**
     * Set ndata1
     *
     * @param integer $ndata1
     *
     * @return ParagonData
     */
    public function setNdata2($ndata2)
    {
        $this->ndata2 = $ndata2;

        return $this;
    }

    /**
     * Get ndata2
     *
     * @return integer
     */
    public function getNdata2()
    {
        return $this->ndata2;
    }
    
    /**
     * Set ndata3
     *
     * @param integer $ndata3
     *
     * @return ParagonData
     */
    public function setNdata3($ndata3)
    {
        $this->ndata3 = $ndata3;

        return $this;
    }

    /**
     * Get ndata3
     *
     * @return integer
     */
    public function getNdata3()
    {
        return $this->ndata3;
    }
    
    
    /**
     * Set ndata4
     *
     * @param integer $ndata4
     *
     * @return ParagonData
     */
    public function setNdata4($ndata4)
    {
        $this->ndata4 = $ndata4;

        return $this;
    }

    /**
     * Get ndata4
     *
     * @return integer
     */
    public function getNdata4()
    {
        return $this->ndata4;
    }
    
    /**
     * Set ndata5
     *
     * @param integer $ndata5
     *
     * @return ParagonData
     */
    public function setNdata5($ndata5)
    {
        $this->ndata5 = $ndata5;

        return $this;
    }

    /**
     * Get ndata5
     *
     * @return integer
     */
    public function getNdata5()
    {
        return $this->ndata5;
    }
}

