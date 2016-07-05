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


}

