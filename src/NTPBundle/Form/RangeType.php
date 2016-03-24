<?php

namespace NTPBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RangeType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('startDate', 'date', array('widget' => 'single_text',
                    'format' => 'dd-MM-yyyy',
                    'data' => new \DateTime(),
                    'attr' => array('class' => 'form-control')))
                ->add('endDate', 'date', array('widget' => 'single_text',
                    'format' => 'dd-MM-yyyy',
                    'data' => new \DateTime(),
                    'attr' => array('class' => 'form-control')))
                ->add('submit', SubmitType::class,array('attr' => array('class' => 'btn btn-default')))
        ;
    }


}