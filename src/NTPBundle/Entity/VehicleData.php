<?php

namespace NTPBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VehicleData
 *
 * @ORM\Table(name="vehicle_data")
 * @ORM\Entity
 */
class VehicleData
{
    /**
     * @var string
     *
     * @ORM\Column(name="vehicle_name", type="string", length=45, nullable=true)
     */
    private $vehicleName;

    /**
     * @var string
     *
     * @ORM\Column(name="vehicle_type", type="string", length=45, nullable=true)
     */
    private $vehicleType;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set vehicleName
     *
     * @param string $vehicleName
     *
     * @return VehicleData
     */
    public function setVehicleName($vehicleName)
    {
        $this->vehicleName = $vehicleName;

        return $this;
    }

    /**
     * Get vehicleName
     *
     * @return string
     */
    public function getVehicleName()
    {
        return $this->vehicleName;
    }

    /**
     * Set vehicleType
     *
     * @param string $vehicleType
     *
     * @return VehicleData
     */
    public function setVehicleType($vehicleType)
    {
        $this->vehicleType = $vehicleType;

        return $this;
    }

    /**
     * Get vehicleType
     *
     * @return string
     */
    public function getVehicleType()
    {
        return $this->vehicleType;
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
