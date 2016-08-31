<?php

namespace NTPBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class WeekType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('week', IntegerType::class, array('widget' => 'single_text',
                    'attr' => array('class' => 'form-control')))
                ->add('submit', SubmitType::class,array('attr' => array('class' => 'btn btn-default')))
        ;
    }


}