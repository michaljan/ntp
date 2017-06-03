<?php
namespace NTPBundle\Entity;

//updates
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;

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
    
    
    
    public function __construct() {
        
        $this->groups = new \Doctrine\Common\Collections\ArrayCollection();
        parent::__construct();
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
    
}