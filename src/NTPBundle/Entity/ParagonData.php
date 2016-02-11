<?php
namespace NTPBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * ParagonData
 *
 * @ORM\Table(name="paragon_data")
 * @ORM\Entity
 */
class ParagonData
{
    /**
     * @var integer
     *
     * @ORM\Column(name="customer_id", type="integer", nullable=true)
     */
    public $customerId;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_name", type="string", length=64, nullable=true)
     */
    public $customerName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="arrival_time", type="datetime", nullable=true)
     */
    public $arrivalTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="depart_time", type="datetime", nullable=true)
     */
    public $departTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="call_ref_number", type="integer", nullable=true)
     */
    public $callRefNumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="cages", type="integer", nullable=true)
     */
    public $cages;

    /**
     * @var integer
     *
     * @ORM\Column(name="chep_pallets", type="integer", nullable=true)
     */
    public $chepPallets;

    /**
     * @var integer
     *
     * @ORM\Column(name="ps_pallets", type="integer", nullable=true)
     */
    public $psPallets;

    /**
     * @var integer
     *
     * @ORM\Column(name="container", type="integer", nullable=true)
     */
    public $container;

    /**
     * @var integer
     *
     * @ORM\Column(name="cage_equivalent", type="integer", nullable=true)
     */
    public $cageEquivalent;

    /**
     * @var string
     *
     * @ORM\Column(name="order_details_1", type="string", length=30, nullable=true)
     */
    public $orderDetails1;

    /**
     * @var string
     *
     * @ORM\Column(name="order_details_2", type="string", length=30, nullable=true)
     */
    public $orderDetails2;

    /**
     * @var string
     *
     * @ORM\Column(name="order_details_3", type="string", length=30, nullable=true)
     */
    public $orderDetails3;

    /**
     * @var string
     *
     * @ORM\Column(name="order_details_4", type="string", length=30, nullable=true)
     */
    public $orderDetails4;

    /**
     * @var string
     *
     * @ORM\Column(name="postcode", type="string", length=8, nullable=true)
     */
    public $postcode;

    /**
     * @var integer
     *
     * @ORM\Column(name="prod_code", type="integer", nullable=true)
     */
    public $prodCode;

    /**
     * @var string
     *
     * @ORM\Column(name="product_name", type="string", length=30, nullable=true)
     */
    public $productName;

    /**
     * @var integer
     *
     * @ORM\Column(name="route_no", type="integer", nullable=true)
     */
    public $routeNo;

    /**
     * @var integer
     *
     * @ORM\Column(name="trip_no", type="integer", nullable=true)
     */
    public $tripNo;

    /**
     * @var integer
     *
     * @ORM\Column(name="travel_distance_to_next_call", type="integer", nullable=true)
     */
    public $travelDistanceToNextCall;

    /**
     * @var integer
     *
     * @ORM\Column(name="travel_distance_from_prev_call", type="integer", nullable=true)
     */
    public $travelDistanceFromPrevCall;

    /**
     * @var string
     *
     * @ORM\Column(name="call_type", type="string", length=2, nullable=true)
     */
    public $callType;

    /**
     * @var string
     *
     * @ORM\Column(name="time_window_start", type="string", length=9, nullable=true)
     */
    public $timeWindowStart;

    /**
     * @var string
     *
     * @ORM\Column(name="time_window_end", type="string", length=9, nullable=true)
     */
    public $timeWindowEnd;

    /**
     * @var integer
     *
     * @ORM\Column(name="trips_start_depot", type="integer", nullable=true)
     */
    public $tripsStartDepot;

    /**
     * @var integer
     *
     * @ORM\Column(name="trips_end_depot", type="integer", nullable=true)
     */
    public $tripsEndDepot;

    /**
     * @var string
     *
     * @ORM\Column(name="source_depot_departure_time", type="string", length=9, nullable=true)
     */
    public $sourceDepotDepartureTime;

    /**
     * @var string
     *
     * @ORM\Column(name="end_depot_arrival_time", type="string", length=9, nullable=true)
     */
    public $endDepotArrivalTime;

   
    /**
     * @var string
     *
     * @ORM\Column(name="waiting_time", type="string", length=9, nullable=true)
     */
    public $waitingTime;

    /**
     * @var string
     *
     * @ORM\Column(name="transfer_id", type="string", length=10, nullable=true)
     */
    public $transferId;

    /**
     * @var string
     *
     * @ORM\Column(name="trailer_type_name", type="string", length=16, nullable=true)
     */
    public $trailerTypeName;

    /**
     * @var integer
     *
     * @ORM\Column(name="call_trip_position", type="integer", nullable=true)
     */
    public $callTripPosition;

    /**
     * @var integer
     *
     * @ORM\Column(name="route_drop_no", type="integer", nullable=true)
     */
    public $routeDropNo;

    /**
     * @var \DateTime
     * 
     * @ORM\Column(name="upload_date", type="datetime", nullable=true)
     */
    public $uploadDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="uploaded_by", type="integer", nullable=true)
     */
    public $uploadedBy;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $id;


    /**
     * Set customerId
     *
     * @param integer $customerId
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
     * @return integer
     */
    public function getCustomerId()
    {
        return $this->customerId;
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
     * Set arrivalTime
     *
     * @param \DateTime $arrivalTime
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
     * @return \DateTime
     */
    public function getArrivalTime()
    {
        return $this->arrivalTime;
    }

    /**
     * Set departTime
     *
     * @param \DateTime $departTime
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
     * @return \DateTime
     */
    public function getDepartTime()
    {
        return $this->departTime;
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
     * Set cages
     *
     * @param integer $cages
     *
     * @return ParagonData
     */
    public function setCages($cages)
    {
        $this->cages = $cages;

        return $this;
    }

    /**
     * Get cages
     *
     * @return integer
     */
    public function getCages()
    {
        return $this->cages;
    }

    /**
     * Set chepPallets
     *
     * @param integer $chepPallets
     *
     * @return ParagonData
     */
    public function setChepPallets($chepPallets)
    {
        $this->chepPallets = $chepPallets;

        return $this;
    }

    /**
     * Get chepPallets
     *
     * @return integer
     */
    public function getChepPallets()
    {
        return $this->chepPallets;
    }

    /**
     * Set psPallets
     *
     * @param integer $psPallets
     *
     * @return ParagonData
     */
    public function setPsPallets($psPallets)
    {
        $this->psPallets = $psPallets;

        return $this;
    }

    /**
     * Get psPallets
     *
     * @return integer
     */
    public function getPsPallets()
    {
        return $this->psPallets;
    }

    /**
     * Set container
     *
     * @param integer $container
     *
     * @return ParagonData
     */
    public function setContainer($container)
    {
        $this->container = $container;

        return $this;
    }

    /**
     * Get container
     *
     * @return integer
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * Set cageEquivalent
     *
     * @param integer $cageEquivalent
     *
     * @return ParagonData
     */
    public function setCageEquivalent($cageEquivalent)
    {
        $this->cageEquivalent = $cageEquivalent;

        return $this;
    }

    /**
     * Get cageEquivalent
     *
     * @return integer
     */
    public function getCageEquivalent()
    {
        return $this->cageEquivalent;
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
     * Set routeNo
     *
     * @param integer $routeNo
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
     * Set travelDistanceToNextCall
     *
     * @param integer $travelDistanceToNextCall
     *
     * @return ParagonData
     */
    public function setTravelDistanceToNextCall($travelDistanceToNextCall)
    {
        $this->travelDistanceToNextCall = $travelDistanceToNextCall;

        return $this;
    }

    /**
     * Get travelDistanceToNextCall
     *
     * @return integer
     */
    public function getTravelDistanceToNextCall()
    {
        return $this->travelDistanceToNextCall;
    }

    /**
     * Set travelDistanceFromPrevCall
     *
     * @param integer $travelDistanceFromPrevCall
     *
     * @return ParagonData
     */
    public function setTravelDistanceFromPrevCall($travelDistanceFromPrevCall)
    {
        $this->travelDistanceFromPrevCall = $travelDistanceFromPrevCall;

        return $this;
    }

    /**
     * Get travelDistanceFromPrevCall
     *
     * @return integer
     */
    public function getTravelDistanceFromPrevCall()
    {
        return $this->travelDistanceFromPrevCall;
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
     * Set timeWindowStart
     *
     * @param string $timeWindowStart
     *
     * @return ParagonData
     */
    public function setTimeWindowStart($timeWindowStart)
    {
        $this->timeWindowStart = $timeWindowStart;

        return $this;
    }

    /**
     * Get timeWindowStart
     *
     * @return string
     */
    public function getTimeWindowStart()
    {
        return $this->timeWindowStart;
    }

    /**
     * Set timeWindowEnd
     *
     * @param string $timeWindowEnd
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
     * @return string
     */
    public function getTimeWindowEnd()
    {
        return $this->timeWindowEnd;
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
     * Set sourceDepotDepartureTime
     *
     * @param string $sourceDepotDepartureTime
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
     * @return string
     */
    public function getSourceDepotDepartureTime()
    {
        return $this->sourceDepotDepartureTime;
    }

    /**
     * Set endDepotArrivalTime
     *
     * @param string $endDepotArrivalTime
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
     * @return string
     */
    public function getEndDepotArrivalTime()
    {
        return $this->endDepotArrivalTime;
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
     * Set transferId
     *
     * @param string $transferId
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
     * @return string
     */
    public function getTransferId()
    {
        return $this->transferId;
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
     * Set uploadDate
     *
     * @param \DateTime $uploadDate
     *
     * @return ParagonData
     */
    public function setUploadDate($uploadDate)
    {
            $this->uploadDate=$uploadDate;

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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}

