<?php

namespace NTPBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DriverType
 *
 * @ORM\Table(name="driver_type")
 * @ORM\Entity
 */
class DriverType
{
    /**
     * @var string
     *
     * @ORM\Column(name="type_name", type="string", length=45, nullable=true)
     */
    private $typeName;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set typeName
     *
     * @param string $typeName
     *
     * @return DriverType
     */
    public function setTypeName($typeName)
    {
        $this->typeName = $typeName;

        return $this;
    }

    /**
     * Get typeName
     *
     * @return string
     */
    public function getTypeName()
    {
        return $this->typeName;
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
