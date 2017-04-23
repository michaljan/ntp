<?php
namespace NTPBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToMany(targetEntity="NTPBundle\Entity\Group")
     * @ORM\JoinTable(name="fos_user_user_group",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     * )
     */
    protected $groups;
    
    
    /**
     * @var integer
     *
     * @ORM\Column(name="store_number", type="integer", nullable=true)
     */
    protected $storeNumber;
    
    
    public function __construct() {
        
        $this->groups = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function getGroups()
    {
        return $this->groups;
    }
    
    
    public function setGroups(NTPBundle\Entity\Group $groups)
    {
        $this->groups = $groups;

        return $this;
    }
    
    public function getStoreNumber()
    {
        return $this->storeNumber;
    }
    
    
    public function setStoreNumber($storeNumber)
    {
        $this->storeNumber = $storeNumber;

        return $this;
    }
    
}