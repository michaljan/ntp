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
     * @ORM\ManyToOne(targetEntity="NTPBundle\Entity\DriverType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="driver_type_id", referencedColumnName="id")
     * })
     */
    private $driverType;



    /**
     * Set name
     *
     * @param string $name
     *
     * @return DriverData
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set surname
     *
     * @param string $surname
     *
     * @return DriverData
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return DriverData
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
     * Set driverType
     *
     * @param \NTPBundle\Entity\DriverType $driverType
     *
     * @return DriverData
     */
    public function setDriverType(\NTPBundle\Entity\DriverType $driverType)
    {
        $this->driverType = $driverType;

        return $this;
    }

    /**
     * Get driverType
     *
     * @return \NTPBundle\Entity\DriverType
     */
    public function getDriverType()
    {
        return $this->driverType;
    }
}
