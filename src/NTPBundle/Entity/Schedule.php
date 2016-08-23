<?php

namespace NTPBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Schedule
 *
 * @ORM\Table(name="schedule")
 * @ORM\Entity
 */
class Schedule
{
    /**
     * @var string
     *
     * @ORM\Column(name="route_no", type="string", length=255, nullable=false)
     */
    private $routeNo;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="trip_no", type="integer",  nullable=true)
     */
    private $tripNo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_time_planned", type="datetime", nullable=true)
     */
    private $startTimePlanned;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_time_actual", type="datetime", nullable=true)
     */
    private $startTimeActual;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="depart_time_planned", type="datetime", nullable=true)
     */
    private $departTimePlanned;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="depart_time_actual", type="datetime", nullable=true)
     */
    private $departTimeActual;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="arrival_time_planned", type="datetime", nullable=true)
     */
    private $arrivalTimePlanned;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="arrival_time_actual", type="datetime", nullable=true)
     */
    private $arrivalTimeActual;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="finish_time_planned", type="datetime", nullable=true)
     */
    private $finishTimePlanned;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="finish_time_actual", type="datetime", nullable=true)
     */
    private $finishTimeActual;

    /**
     * @var integer
     *
     * @ORM\Column(name="duty_time_planned", type="integer", nullable=true)
     */
    private $dutyTimePlanned;

    /**
     * @var integer
     *
     * @ORM\Column(name="duty_time_actual", type="integer", nullable=true)
     */
    private $dutyTimeActual;

    /**
     * @var integer
     *
     * @ORM\Column(name="route_distance", type="integer", nullable=true)
     */
    private $routeDistance;

    /**
     * @var integer
     *
     * @ORM\Column(name="route_time", type="integer", nullable=true)
     */
    private $routeTime;

    /**
     * @var string
     *
     * @ORM\Column(name="loader", type="string", length=45, nullable=true)
     */
    private $loader;

    /**
     * @var string
     *
     * @ORM\Column(name="trailer_number", type="string", length=45, nullable=true)
     */
    private $trailerNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="seal", type="string", length=45, nullable=true)
     */
    private $seal;

    /**
     * @var integer
     *
     * @ORM\Column(name="ad_blue", type="integer", nullable=true)
     */
    private $adBlue;

    /**
     * @var integer
     *
     * @ORM\Column(name="fuel_on_site", type="integer", nullable=true)
     */
    private $fuelOnSite;

    /**
     * @var integer
     *
     * @ORM\Column(name="kms_planned", type="integer", nullable=true)
     */
    private $kmsPlanned;

    /**
     * @var integer
     *
     * @ORM\Column(name="kms_actual", type="integer", nullable=true)
     */
    private $kmsActual;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \NTPBundle\Entity\VehicleData
     *
     * 
     * 
     * @ORM\ManyToOne(targetEntity="NTPBundle\Entity\VehicleData")
     * @ORM\JoinColumn(name="vehicle_data_id", referencedColumnName="id")
     *
     */
    private $vehicleData;

    /**
     * @var \NTPBundle\Entity\DriverData
     *
     * 
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="NTPBundle\Entity\DriverData")
     * @ORM\JoinColumn(name="driver_data_id", referencedColumnName="id")
     *
     */
    private $driverData;

    /**
     * @var \NTPBundle\Entity\CallDetails
     *
     * 
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToMany(targetEntity="NTPBundle\Entity\CallDetails",mappedBy="schedule")
     *
     */
    private $callDetails;

    /**
     * @var string
     *
     * @ORM\Column(name="depot_id", type="string", length=45, nullable=true)
     */
    private $depotId;
    
    
    
    
    /**
     * Set routeNo
     *
     * @param string $routeNo
     *
     * @return Schedule
     */
    public function setRouteNo($routeNo)
    {
        $this->routeNo = $routeNo;

        return $this;
    }

    /**
     * Get routeNo
     *
     * @return string
     */
    public function getRouteNo()
    {
        return $this->routeNo;
    }

    /**
     * Set startTimePlanned
     *
     * @param \DateTime $startTimePlanned
     *
     * @return Schedule
     */
    public function setStartTimePlanned($startTimePlanned)
    {
        $this->startTimePlanned = $startTimePlanned;

        return $this;
    }

    /**
     * Get startTimePlanned
     *
     * @return \DateTime
     */
    public function getStartTimePlanned()
    {
        return $this->startTimePlanned;
    }

    /**
     * Set startTimeActual
     *
     * @param \DateTime $startTimeActual
     *
     * @return Schedule
     */
    public function setStartTimeActual($startTimeActual)
    {
        $this->startTimeActual = $startTimeActual;

        return $this;
    }

    /**
     * Get startTimeActual
     *
     * @return \DateTime
     */
    public function getStartTimeActual()
    {
        return $this->startTimeActual;
    }

    /**
     * Set departTimePlanned
     *
     * @param \DateTime $departTimePlanned
     *
     * @return Schedule
     */
    public function setDepartTimePlanned($departTimePlanned)
    {
        $this->departTimePlanned = $departTimePlanned;

        return $this;
    }

    /**
     * Get departTimePlanned
     *
     * @return \DateTime
     */
    public function getDepartTimePlanned()
    {
        return $this->departTimePlanned;
    }

    /**
     * Set departTimeActual
     *
     * @param \DateTime $departTimeActual
     *
     * @return Schedule
     */
    public function setDepartTimeActual($departTimeActual)
    {
        $this->departTimeActual = $departTimeActual;

        return $this;
    }

    /**
     * Get departTimeActual
     *
     * @return \DateTime
     */
    public function getDepartTimeActual()
    {
        return $this->departTimeActual;
    }

    /**
     * Set arrivalTimePlanned
     *
     * @param \DateTime $arrivalTimePlanned
     *
     * @return Schedule
     */
    public function setArrivalTimePlanned($arrivalTimePlanned)
    {
        $this->arrivalTimePlanned = $arrivalTimePlanned;

        return $this;
    }

    /**
     * Get arrivalTimePlanned
     *
     * @return \DateTime
     */
    public function getArrivalTimePlanned()
    {
        return $this->arrivalTimePlanned;
    }

    /**
     * Set arrivalTimeActual
     *
     * @param \DateTime $arrivalTimeActual
     *
     * @return Schedule
     */
    public function setArrivalTimeActual($arrivalTimeActual)
    {
        $this->arrivalTimeActual = $arrivalTimeActual;

        return $this;
    }

    /**
     * Get arrivalTimeActual
     *
     * @return \DateTime
     */
    public function getArrivalTimeActual()
    {
        return $this->arrivalTimeActual;
    }

    /**
     * Set finishTimePlanned
     *
     * @param \DateTime $finishTimePlanned
     *
     * @return Schedule
     */
    public function setFinishTimePlanned($finishTimePlanned)
    {
        $this->finishTimePlanned = $finishTimePlanned;

        return $this;
    }

    /**
     * Get finishTimePlanned
     *
     * @return \DateTime
     */
    public function getFinishTimePlanned()
    {
        return $this->finishTimePlanned;
    }

    /**
     * Set finishTimeActual
     *
     * @param \DateTime $finishTimeActual
     *
     * @return Schedule
     */
    public function setFinishTimeActual($finishTimeActual)
    {
        $this->finishTimeActual = $finishTimeActual;

        return $this;
    }

    /**
     * Get finishTimeActual
     *
     * @return \DateTime
     */
    public function getFinishTimeActual()
    {
        return $this->finishTimeActual;
    }

    /**
     * Set dutyTimePlanned
     *
     * @param integer $dutyTimePlanned
     *
     * @return Schedule
     */
    public function setDutyTimePlanned($dutyTimePlanned)
    {
        $this->dutyTimePlanned = $dutyTimePlanned;

        return $this;
    }

    /**
     * Get dutyTimePlanned
     *
     * @return integer
     */
    public function getDutyTimePlanned()
    {
        return $this->dutyTimePlanned;
    }

    /**
     * Set dutyTimeActual
     *
     * @param integer $dutyTimeActual
     *
     * @return Schedule
     */
    public function setDutyTimeActual($dutyTimeActual)
    {
        $this->dutyTimeActual = $dutyTimeActual;

        return $this;
    }

    /**
     * Get dutyTimeActual
     *
     * @return integer
     */
    public function getDutyTimeActual()
    {
        return $this->dutyTimeActual;
    }

    /**
     * Set routeDistance
     *
     * @param integer $routeDistance
     *
     * @return Schedule
     */
    public function setRouteDistance($routeDistance)
    {
        $this->routeDistance = $routeDistance;

        return $this;
    }

    /**
     * Get routeDistance
     *
     * @return integer
     */
    public function getRouteDistance()
    {
        return $this->routeDistance;
    }

    /**
     * Set routeTime
     *
     * @param integer $routeTime
     *
     * @return Schedule
     */
    public function setRouteTime($routeTime)
    {
        $this->routeTime = $routeTime;

        return $this;
    }

    /**
     * Get routeTime
     *
     * @return integer
     */
    public function getRouteTime()
    {
        return $this->routeTime;
    }

    /**
     * Set loader
     *
     * @param string $loader
     *
     * @return Schedule
     */
    public function setLoader($loader)
    {
        $this->loader = $loader;

        return $this;
    }

    /**
     * Get loader
     *
     * @return string
     */
    public function getLoader()
    {
        return $this->loader;
    }

    /**
     * Set trailerNumber
     *
     * @param string $trailerNumber
     *
     * @return Schedule
     */
    public function setTrailerNumber($trailerNumber)
    {
        $this->trailerNumber = $trailerNumber;

        return $this;
    }

    /**
     * Get trailerNumber
     *
     * @return string
     */
    public function getTrailerNumber()
    {
        return $this->trailerNumber;
    }

    /**
     * Set seal
     *
     * @param string $seal
     *
     * @return Schedule
     */
    public function setSeal($seal)
    {
        $this->seal = $seal;

        return $this;
    }

    /**
     * Get seal
     *
     * @return string
     */
    public function getSeal()
    {
        return $this->seal;
    }

    /**
     * Set adBlue
     *
     * @param integer $adBlue
     *
     * @return Schedule
     */
    public function setAdBlue($adBlue)
    {
        $this->adBlue = $adBlue;

        return $this;
    }

    /**
     * Get adBlue
     *
     * @return integer
     */
    public function getAdBlue()
    {
        return $this->adBlue;
    }

    /**
     * Set fuelOnSite
     *
     * @param integer $fuelOnSite
     *
     * @return Schedule
     */
    public function setFuelOnSite($fuelOnSite)
    {
        $this->fuelOnSite = $fuelOnSite;

        return $this;
    }

    /**
     * Get fuelOnSite
     *
     * @return integer
     */
    public function getFuelOnSite()
    {
        return $this->fuelOnSite;
    }

    /**
     * Set kmsPlanned
     *
     * @param integer $kmsPlanned
     *
     * @return Schedule
     */
    public function setKmsPlanned($kmsPlanned)
    {
        $this->kmsPlanned = $kmsPlanned;

        return $this;
    }

    /**
     * Get kmsPlanned
     *
     * @return integer
     */
    public function getKmsPlanned()
    {
        return $this->kmsPlanned;
    }

    /**
     * Set kmsActual
     *
     * @param integer $kmsActual
     *
     * @return Schedule
     */
    public function setKmsActual($kmsActual)
    {
        $this->kmsActual = $kmsActual;

        return $this;
    }

    /**
     * Get kmsActual
     *
     * @return integer
     */
    public function getKmsActual()
    {
        return $this->kmsActual;
    }

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Schedule
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Set vehicleData
     *
     * @param \NTPBundle\Entity\VehicleData $vehicleData
     *
     * @return Schedule
     */
    public function setVehicleData(\NTPBundle\Entity\VehicleData $vehicleData)
    {
        $this->vehicleData = $vehicleData;

        return $this;
    }

    /**
     * Get vehicleData
     *
     * @return \NTPBundle\Entity\VehicleData
     */
    public function getVehicleData()
    {
        return $this->vehicleData;
    }

    /**
     * Set driverData
     *
     * @param \NTPBundle\Entity\DriverData $driverData
     *
     * @return Schedule
     */
    public function setDriverData(\NTPBundle\Entity\DriverData $driverData)
    {
        $this->driverData = $driverData;

        return $this;
    }

    /**
     * Get driverData
     *
     * @return \NTPBundle\Entity\DriverData
     */
    public function getDriverData()
    {
        return $this->driverData;
    }
    
    
    /**
     * Set tripNo
     *
     * @param integer $tripNo
     *
     * @return Schedule
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
     * Set depotId
     *
     * @param string $depotId
     *
     * @return Schedule
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


}
