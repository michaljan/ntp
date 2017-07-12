
<?php
namespace NTPBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * DriverType
 *
 * @ORM\Table(name="mailing_list")
 * @ORM\Entity
 */
class DriverType
{
    /**
     * @var string
     *
     * @ORM\Column(name="mailing_name", type="string", length=45, nullable=true)
     */
    private $mailingName;
	
    /**
     * @var string
     *
     * @ORM\Column(name="mail_list", type="string", length=245, nullable=true)
     */
    private $mailList;	
	
    /**
     * @var string
     *
     * @ORM\Column(name="mailing_description", type="string", length=245, nullable=true)
     */
    private $mailingDescription;	
	
	
	/**
     * @var integer
     *
     * @ORM\Column(name="active", type="integer")
     */
    private $active;
	
	
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
	
	
    /**
     * Set mailingName
     *
     * @param string $mailingName
     *
     * @return DriverType
     */
    public function setMailingName($mailingName)
    {
        $this->mailingName = $mailingName;
        return $this;
    }
    /**
     * Get mailingName
     *
     * @return string
     */
    public function getMailingName()
    {
        return $this->mailingName;
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
     * Set mailList
     *
     * @param string $mailList
     *
     * @return MailList
     */
    public function setMailList($mailList)
    {
        $this->mailList = $mailList;
        return $this;
    }
    /**
     * Get mailList
     *
     * @return string
     */
    public function getMailList()
    {
        return $this->mailList;
    }
	
	/**
     * Set mailingDescription
     *
     * @param string $mailingDescription
     *
     * @return MailingDescription
     */
    public function setMailingDescription($mailingDescription)
    {
        $this->mailingDescription = $mailingDescription;
        return $this;
    }
    /**
     * Get mailingDescription
     *
     * @return string
     */
    public function getMailingDescription()
    {
        return $this->mailingDescription;
    }
	
	/**
     * Set active
     *
     * @param intiger $active
     *
     * @return active
     */
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }
    /**
     * Get active
     *
     * @return integer
     */
    public function getActive()
    {
        return $this->active;
    }
}
