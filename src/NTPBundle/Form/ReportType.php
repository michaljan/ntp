<?php

namespace NTPBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class ReportType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('planDate', 'date', array('widget' => 'single_text',
                    'format' => 'dd/MM/yyyy',
                    'data' => new \DateTime(),
                    'attr' => array('class' => 'form-control')))
                
                ->getForm();

        return $builder;
    }

}
