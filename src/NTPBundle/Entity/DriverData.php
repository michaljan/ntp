<?php

namespace NTPBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DriverData
 *
 * @ORM\Table(name="driver_data", indexes={@ORM\Index(name="fk_driver_data_driver_type1_idx", columns={"driver_type_id"})})
 * @ORM\Entity
 */
class DriverData
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=45, nullable=true)
     */
    private $surname;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var \NTPBundle\Entity\DriverType
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="NTPBundle\Entity\DriverType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="driver_type_id", referencedColumnName="id")
     * })
     */
    private $driverType;


}

