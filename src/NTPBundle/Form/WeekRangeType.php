<?php

namespace NTPBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;


class WeekRangeType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder 
                ->add('year', IntegerType::class, array('data' => (new \DateTime())->format('Y'),
                    'attr' => array('class' => 'form-control')))
                ->add('startWeek', IntegerType::class , array(
                    'attr' => array('class' => 'form-control')))
                ->add('endWeek', IntegerType::class, array(
                    'attr' => array('class' => 'form-control')))
                ->add('submit', SubmitType::class,array('attr' => array('class' => 'btn btn-default')))
        ;
    }


}