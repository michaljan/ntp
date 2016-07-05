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
     * @ORM\OneToOne(targetEntity="NTPBundle\Entity\Schedule")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="schedule_id", referencedColumnName="id")
     * })
     */
    private $schedule;


}

