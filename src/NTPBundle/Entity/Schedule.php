<?php

namespace NTPBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Schedule
 *
 * @ORM\Table(name="schedule", uniqueConstraints={@ORM\UniqueConstraint(name="route_no_UNIQUE", columns={"route_no"})}, indexes={@ORM\Index(name="fk_schedule_driver_data1_idx", columns={"driver_data_id"}), @ORM\Index(name="fk_schedule_vehicle_data1_idx", columns={"vehicle_data_id"})})
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
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var \NTPBundle\Entity\VehicleData
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="NTPBundle\Entity\VehicleData")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="vehicle_data_id", referencedColumnName="id")
     * })
     */
    private $vehicleData;

    /**
     * @var \NTPBundle\Entity\DriverData
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="NTPBundle\Entity\DriverData")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="driver_data_id", referencedColumnName="id")
     * })
     */
    private $driverData;


}

