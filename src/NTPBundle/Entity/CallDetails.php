<?php

namespace NTPBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CallDetails
 *
 * @ORM\Table(name="call_details", indexes={@ORM\Index(name="fk_call_details_schedule1_idx", columns={"schedule_id"})})
 * @ORM\Entity
 */
class CallDetails
{
    /**
     * @var integer
     *
     * @ORM\Column(name="trip_no", type="integer", nullable=true)
     */
    private $tripNo;

    /**
     * @var string
     *
     * @ORM\Column(name="call_no", type="string", length=45, nullable=false)
     */
    private $callNo;

    /**
     * @var integer
     *
     * @ORM\Column(name="call_id", type="integer", nullable=true)
     */
    private $callId;

    /**
     * @var string
     *
     * @ORM\Column(name="call_name", type="string", length=45, nullable=true)
     */
    private $callName;

    /**
     * @var string
     *
     * @ORM\Column(name="call_postcode", type="string", length=10, nullable=true)
     */
    private $callPostcode;

    /**
     * @var string
     *
     * @ORM\Column(name="call_type", type="string", length=5, nullable=true)
     */
    private $callType;

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
     * @var integer
     *
     * @ORM\Column(name="call_duration_planned", type="integer", nullable=true)
     */
    private $callDurationPlanned;

    /**
     * @var integer
     *
     * @ORM\Column(name="call_duration_actual", type="integer", nullable=true)
     */
    private $callDurationActual;

    /**
     * @var integer
     *
     * @ORM\Column(name="call_measure_1", type="integer", nullable=true)
     */
    private $callMeasure1;

    /**
     * @var integer
     *
     * @ORM\Column(name="call_measure_2", type="integer", nullable=true)
     */
    private $callMeasure2;

    /**
     * @var integer
     *
     * @ORM\Column(name="call_measure_3", type="integer", nullable=true)
     */
    private $callMeasure3;

    /**
     * @var integer
     *
     * @ORM\Column(name="call_measure_4", type="integer", nullable=true)
     */
    private $callMeasure4;

    /**
     * @var integer
     *
     * @ORM\Column(name="call_measure_5", type="integer", nullable=true)
     */
    private $callMeasure5;

    /**
     * @var string
     *
     * @ORM\Column(name="call_detailscol1", type="string", length=45, nullable=true)
     */
    private $callDetailscol1;

    /**
     * @var string
     *
     * @ORM\Column(name="call_detailscol", type="string", length=45, nullable=true)
     */
    private $callDetailscol;

    /**
     * @var string
     *
     * @ORM\Column(name="call_details_1", type="string", length=45, nullable=true)
     */
    private $callDetails1;

    /**
     * @var string
     *
     * @ORM\Column(name="call_details_2", type="string", length=45, nullable=true)
     */
    private $callDetails2;

    /**
     * @var string
     *
     * @ORM\Column(name="call_details_3", type="string", length=45, nullable=true)
     */
    private $callDetails3;

    /**
     * @var string
     *
     * @ORM\Column(name="call_details_4", type="string", length=45, nullable=true)
     */
    private $callDetails4;

    /**
     * @var integer
     *
     * @ORM\Column(name="media_delivery_1", type="integer", nullable=true)
     */
    private $mediaDelivery1;

    /**
     * @var integer
     *
     * @ORM\Column(name="media_delivery_2", type="integer", nullable=true)
     */
    private $mediaDelivery2;

    /**
     * @var integer
     *
     * @ORM\Column(name="media_delivery_3", type="integer", nullable=true)
     */
    private $mediaDelivery3;

    /**
     * @var integer
     *
     * @ORM\Column(name="media_delivery_4", type="integer", nullable=true)
     */
    private $mediaDelivery4;

    /**
     * @var integer
     *
     * @ORM\Column(name="media_delivery_5", type="integer", nullable=true)
     */
    private $mediaDelivery5;

    /**
     * @var integer
     *
     * @ORM\Column(name="media_collection_1", type="integer", nullable=true)
     */
    private $mediaCollection1;

    /**
     * @var integer
     *
     * @ORM\Column(name="media_collection_2", type="integer", nullable=true)
     */
    private $mediaCollection2;

    /**
     * @var integer
     *
     * @ORM\Column(name="media_collection_3", type="integer", nullable=true)
     */
    private $mediaCollection3;

    /**
     * @var integer
     *
     * @ORM\Column(name="media_collection_4", type="integer", nullable=true)
     */
    private $mediaCollection4;

    /**
     * @var integer
     *
     * @ORM\Column(name="media_collection_5", type="integer", nullable=true)
     */
    private $mediaCollection5;

    /**
     * @var string
     *
     * @ORM\Column(name="call_notes_1", type="string", length=45, nullable=true)
     */
    private $callNotes1;

    /**
     * @var string
     *
     * @ORM\Column(name="call_notes_2", type="string", length=45, nullable=true)
     */
    private $callNotes2;

    /**
     * @var string
     *
     * @ORM\Column(name="call_notes_3", type="string", length=45, nullable=true)
     */
    private $callNotes3;

    /**
     * @var string
     *
     * @ORM\Column(name="call_notes_4", type="string", length=45, nullable=true)
     */
    private $callNotes4;

    /**
     * @var string
     *
     * @ORM\Column(name="call_notes_5", type="string", length=45, nullable=true)
     */
    private $callNotes5;

    /**
     * @var boolean
     *
     * @ORM\Column(name="call_cancelled", type="boolean", nullable=true)
     */
    private $callCancelled = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="call_cancel_notes", type="string", length=45, nullable=true)
     */
    private $callCancelNotes;

    /**
     * @var string
     *
     * @ORM\Column(name="call_product_name", type="string", length=45, nullable=true)
     */
    private $callProductName;

    /**
     * @var integer
     *
     * @ORM\Column(name="call_position", type="integer", nullable=true)
     */
    private $callPosition;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var \NTPBundle\Entity\Schedule
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToMany(targetEntity="NTPBundle\Entity\Schedule")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="schedule_id", referencedColumnName="id")
     * })
     */
    private $schedule;



    /**
     * Set tripNo
     *
     * @param integer $tripNo
     *
     * @return CallDetails
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
     * Set callNo
     *
     * @param string $callNo
     *
     * @return CallDetails
     */
    public function setCallNo($callNo)
    {
        $this->callNo = $callNo;

        return $this;
    }

    /**
     * Get callNo
     *
     * @return string
     */
    public function getCallNo()
    {
        return $this->callNo;
    }

    /**
     * Set callId
     *
     * @param integer $callId
     *
     * @return CallDetails
     */
    public function setCallId($callId)
    {
        $this->callId = $callId;

        return $this;
    }

    /**
     * Get callId
     *
     * @return integer
     */
    public function getCallId()
    {
        return $this->callId;
    }

    /**
     * Set callName
     *
     * @param string $callName
     *
     * @return CallDetails
     */
    public function setCallName($callName)
    {
        $this->callName = $callName;

        return $this;
    }

    /**
     * Get callName
     *
     * @return string
     */
    public function getCallName()
    {
        return $this->callName;
    }

    /**
     * Set callPostcode
     *
     * @param string $callPostcode
     *
     * @return CallDetails
     */
    public function setCallPostcode($callPostcode)
    {
        $this->callPostcode = $callPostcode;

        return $this;
    }

    /**
     * Get callPostcode
     *
     * @return string
     */
    public function getCallPostcode()
    {
        return $this->callPostcode;
    }

    /**
     * Set callType
     *
     * @param string $callType
     *
     * @return CallDetails
     */
    public function setCallType($callType)
    {
        $this->callType = $callType;

        return $this;
    }

    /**
     * Get callType
     *
     * @return string
     */
    public function getCallType()
    {
        return $this->callType;
    }

    /**
     * Set arrivalTimePlanned
     *
     * @param \DateTime $arrivalTimePlanned
     *
     * @return CallDetails
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
     * @return CallDetails
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
     * Set departTimePlanned
     *
     * @param \DateTime $departTimePlanned
     *
     * @return CallDetails
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
     * @return CallDetails
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
     * Set callDurationPlanned
     *
     * @param integer $callDurationPlanned
     *
     * @return CallDetails
     */
    public function setCallDurationPlanned($callDurationPlanned)
    {
        $this->callDurationPlanned = $callDurationPlanned;

        return $this;
    }

    /**
     * Get callDurationPlanned
     *
     * @return integer
     */
    public function getCallDurationPlanned()
    {
        return $this->callDurationPlanned;
    }

    /**
     * Set callDurationActual
     *
     * @param integer $callDurationActual
     *
     * @return CallDetails
     */
    public function setCallDurationActual($callDurationActual)
    {
        $this->callDurationActual = $callDurationActual;

        return $this;
    }

    /**
     * Get callDurationActual
     *
     * @return integer
     */
    public function getCallDurationActual()
    {
        return $this->callDurationActual;
    }

    /**
     * Set callMeasure1
     *
     * @param integer $callMeasure1
     *
     * @return CallDetails
     */
    public function setCallMeasure1($callMeasure1)
    {
        $this->callMeasure1 = $callMeasure1;

        return $this;
    }

    /**
     * Get callMeasure1
     *
     * @return integer
     */
    public function getCallMeasure1()
    {
        return $this->callMeasure1;
    }

    /**
     * Set callMeasure2
     *
     * @param integer $callMeasure2
     *
     * @return CallDetails
     */
    public function setCallMeasure2($callMeasure2)
    {
        $this->callMeasure2 = $callMeasure2;

        return $this;
    }

    /**
     * Get callMeasure2
     *
     * @return integer
     */
    public function getCallMeasure2()
    {
        return $this->callMeasure2;
    }

    /**
     * Set callMeasure3
     *
     * @param integer $callMeasure3
     *
     * @return CallDetails
     */
    public function setCallMeasure3($callMeasure3)
    {
        $this->callMeasure3 = $callMeasure3;

        return $this;
    }

    /**
     * Get callMeasure3
     *
     * @return integer
     */
    public function getCallMeasure3()
    {
        return $this->callMeasure3;
    }

    /**
     * Set callMeasure4
     *
     * @param integer $callMeasure4
     *
     * @return CallDetails
     */
    public function setCallMeasure4($callMeasure4)
    {
        $this->callMeasure4 = $callMeasure4;

        return $this;
    }

    /**
     * Get callMeasure4
     *
     * @return integer
     */
    public function getCallMeasure4()
    {
        return $this->callMeasure4;
    }

    /**
     * Set callMeasure5
     *
     * @param integer $callMeasure5
     *
     * @return CallDetails
     */
    public function setCallMeasure5($callMeasure5)
    {
        $this->callMeasure5 = $callMeasure5;

        return $this;
    }

    /**
     * Get callMeasure5
     *
     * @return integer
     */
    public function getCallMeasure5()
    {
        return $this->callMeasure5;
    }

    /**
     * Set callDetailscol1
     *
     * @param string $callDetailscol1
     *
     * @return CallDetails
     */
    public function setCallDetailscol1($callDetailscol1)
    {
        $this->callDetailscol1 = $callDetailscol1;

        return $this;
    }

    /**
     * Get callDetailscol1
     *
     * @return string
     */
    public function getCallDetailscol1()
    {
        return $this->callDetailscol1;
    }

    /**
     * Set callDetailscol
     *
     * @param string $callDetailscol
     *
     * @return CallDetails
     */
    public function setCallDetailscol($callDetailscol)
    {
        $this->callDetailscol = $callDetailscol;

        return $this;
    }

    /**
     * Get callDetailscol
     *
     * @return string
     */
    public function getCallDetailscol()
    {
        return $this->callDetailscol;
    }

    /**
     * Set callDetails1
     *
     * @param string $callDetails1
     *
     * @return CallDetails
     */
    public function setCallDetails1($callDetails1)
    {
        $this->callDetails1 = $callDetails1;

        return $this;
    }

    /**
     * Get callDetails1
     *
     * @return string
     */
    public function getCallDetails1()
    {
        return $this->callDetails1;
    }

    /**
     * Set callDetails2
     *
     * @param string $callDetails2
     *
     * @return CallDetails
     */
    public function setCallDetails2($callDetails2)
    {
        $this->callDetails2 = $callDetails2;

        return $this;
    }

    /**
     * Get callDetails2
     *
     * @return string
     */
    public function getCallDetails2()
    {
        return $this->callDetails2;
    }

    /**
     * Set callDetails3
     *
     * @param string $callDetails3
     *
     * @return CallDetails
     */
    public function setCallDetails3($callDetails3)
    {
        $this->callDetails3 = $callDetails3;

        return $this;
    }

    /**
     * Get callDetails3
     *
     * @return string
     */
    public function getCallDetails3()
    {
        return $this->callDetails3;
    }

    /**
     * Set callDetails4
     *
     * @param string $callDetails4
     *
     * @return CallDetails
     */
    public function setCallDetails4($callDetails4)
    {
        $this->callDetails4 = $callDetails4;

        return $this;
    }

    /**
     * Get callDetails4
     *
     * @return string
     */
    public function getCallDetails4()
    {
        return $this->callDetails4;
    }

    /**
     * Set mediaDelivery1
     *
     * @param integer $mediaDelivery1
     *
     * @return CallDetails
     */
    public function setMediaDelivery1($mediaDelivery1)
    {
        $this->mediaDelivery1 = $mediaDelivery1;

        return $this;
    }

    /**
     * Get mediaDelivery1
     *
     * @return integer
     */
    public function getMediaDelivery1()
    {
        return $this->mediaDelivery1;
    }

    /**
     * Set mediaDelivery2
     *
     * @param integer $mediaDelivery2
     *
     * @return CallDetails
     */
    public function setMediaDelivery2($mediaDelivery2)
    {
        $this->mediaDelivery2 = $mediaDelivery2;

        return $this;
    }

    /**
     * Get mediaDelivery2
     *
     * @return integer
     */
    public function getMediaDelivery2()
    {
        return $this->mediaDelivery2;
    }

    /**
     * Set mediaDelivery3
     *
     * @param integer $mediaDelivery3
     *
     * @return CallDetails
     */
    public function setMediaDelivery3($mediaDelivery3)
    {
        $this->mediaDelivery3 = $mediaDelivery3;

        return $this;
    }

    /**
     * Get mediaDelivery3
     *
     * @return integer
     */
    public function getMediaDelivery3()
    {
        return $this->mediaDelivery3;
    }

    /**
     * Set mediaDelivery4
     *
     * @param integer $mediaDelivery4
     *
     * @return CallDetails
     */
    public function setMediaDelivery4($mediaDelivery4)
    {
        $this->mediaDelivery4 = $mediaDelivery4;

        return $this;
    }

    /**
     * Get mediaDelivery4
     *
     * @return integer
     */
    public function getMediaDelivery4()
    {
        return $this->mediaDelivery4;
    }

    /**
     * Set mediaDelivery5
     *
     * @param integer $mediaDelivery5
     *
     * @return CallDetails
     */
    public function setMediaDelivery5($mediaDelivery5)
    {
        $this->mediaDelivery5 = $mediaDelivery5;

        return $this;
    }

    /**
     * Get mediaDelivery5
     *
     * @return integer
     */
    public function getMediaDelivery5()
    {
        return $this->mediaDelivery5;
    }

    /**
     * Set mediaCollection1
     *
     * @param integer $mediaCollection1
     *
     * @return CallDetails
     */
    public function setMediaCollection1($mediaCollection1)
    {
        $this->mediaCollection1 = $mediaCollection1;

        return $this;
    }

    /**
     * Get mediaCollection1
     *
     * @return integer
     */
    public function getMediaCollection1()
    {
        return $this->mediaCollection1;
    }

    /**
     * Set mediaCollection2
     *
     * @param integer $mediaCollection2
     *
     * @return CallDetails
     */
    public function setMediaCollection2($mediaCollection2)
    {
        $this->mediaCollection2 = $mediaCollection2;

        return $this;
    }

    /**
     * Get mediaCollection2
     *
     * @return integer
     */
    public function getMediaCollection2()
    {
        return $this->mediaCollection2;
    }

    /**
     * Set mediaCollection3
     *
     * @param integer $mediaCollection3
     *
     * @return CallDetails
     */
    public function setMediaCollection3($mediaCollection3)
    {
        $this->mediaCollection3 = $mediaCollection3;

        return $this;
    }

    /**
     * Get mediaCollection3
     *
     * @return integer
     */
    public function getMediaCollection3()
    {
        return $this->mediaCollection3;
    }

    /**
     * Set mediaCollection4
     *
     * @param integer $mediaCollection4
     *
     * @return CallDetails
     */
    public function setMediaCollection4($mediaCollection4)
    {
        $this->mediaCollection4 = $mediaCollection4;

        return $this;
    }

    /**
     * Get mediaCollection4
     *
     * @return integer
     */
    public function getMediaCollection4()
    {
        return $this->mediaCollection4;
    }

    /**
     * Set mediaCollection5
     *
     * @param integer $mediaCollection5
     *
     * @return CallDetails
     */
    public function setMediaCollection5($mediaCollection5)
    {
        $this->mediaCollection5 = $mediaCollection5;

        return $this;
    }

    /**
     * Get mediaCollection5
     *
     * @return integer
     */
    public function getMediaCollection5()
    {
        return $this->mediaCollection5;
    }

    /**
     * Set callNotes1
     *
     * @param string $callNotes1
     *
     * @return CallDetails
     */
    public function setCallNotes1($callNotes1)
    {
        $this->callNotes1 = $callNotes1;

        return $this;
    }

    /**
     * Get callNotes1
     *
     * @return string
     */
    public function getCallNotes1()
    {
        return $this->callNotes1;
    }

    /**
     * Set callNotes2
     *
     * @param string $callNotes2
     *
     * @return CallDetails
     */
    public function setCallNotes2($callNotes2)
    {
        $this->callNotes2 = $callNotes2;

        return $this;
    }

    /**
     * Get callNotes2
     *
     * @return string
     */
    public function getCallNotes2()
    {
        return $this->callNotes2;
    }

    /**
     * Set callNotes3
     *
     * @param string $callNotes3
     *
     * @return CallDetails
     */
    public function setCallNotes3($callNotes3)
    {
        $this->callNotes3 = $callNotes3;

        return $this;
    }

    /**
     * Get callNotes3
     *
     * @return string
     */
    public function getCallNotes3()
    {
        return $this->callNotes3;
    }

    /**
     * Set callNotes4
     *
     * @param string $callNotes4
     *
     * @return CallDetails
     */
    public function setCallNotes4($callNotes4)
    {
        $this->callNotes4 = $callNotes4;

        return $this;
    }

    /**
     * Get callNotes4
     *
     * @return string
     */
    public function getCallNotes4()
    {
        return $this->callNotes4;
    }

    /**
     * Set callNotes5
     *
     * @param string $callNotes5
     *
     * @return CallDetails
     */
    public function setCallNotes5($callNotes5)
    {
        $this->callNotes5 = $callNotes5;

        return $this;
    }

    /**
     * Get callNotes5
     *
     * @return string
     */
    public function getCallNotes5()
    {
        return $this->callNotes5;
    }

    /**
     * Set callCancelled
     *
     * @param boolean $callCancelled
     *
     * @return CallDetails
     */
    public function setCallCancelled($callCancelled)
    {
        $this->callCancelled = $callCancelled;

        return $this;
    }

    /**
     * Get callCancelled
     *
     * @return boolean
     */
    public function getCallCancelled()
    {
        return $this->callCancelled;
    }

    /**
     * Set callCancelNotes
     *
     * @param string $callCancelNotes
     *
     * @return CallDetails
     */
    public function setCallCancelNotes($callCancelNotes)
    {
        $this->callCancelNotes = $callCancelNotes;

        return $this;
    }

    /**
     * Get callCancelNotes
     *
     * @return string
     */
    public function getCallCancelNotes()
    {
        return $this->callCancelNotes;
    }

    /**
     * Set callProductName
     *
     * @param string $callProductName
     *
     * @return CallDetails
     */
    public function setCallProductName($callProductName)
    {
        $this->callProductName = $callProductName;

        return $this;
    }

    /**
     * Get callProductName
     *
     * @return string
     */
    public function getCallProductName()
    {
        return $this->callProductName;
    }

    /**
     * Set callPosition
     *
     * @param integer $callPosition
     *
     * @return CallDetails
     */
    public function setCallPosition($callPosition)
    {
        $this->callPosition = $callPosition;

        return $this;
    }

    /**
     * Get callPosition
     *
     * @return integer
     */
    public function getCallPosition()
    {
        return $this->callPosition;
    }

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return CallDetails
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
     * Set schedule
     *
     * @param \NTPBundle\Entity\Schedule $schedule
     *
     * @return CallDetails
     */
    public function setSchedule(\NTPBundle\Entity\Schedule $schedule)
    {
        $this->schedule = $schedule;

        return $this;
    }

    /**
     * Get schedule
     *
     * @return \NTPBundle\Entity\Schedule
     */
    public function getSchedule()
    {
        return $this->schedule;
    }
}
