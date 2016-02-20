<?php

namespace NTPBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ReportType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('planDate', 'date', array('widget' => 'single_text',
                    'format' => 'dd/MM/yyyy',
                    'data' => new \DateTime(),
                    'attr' => array('class' => 'form-control')))
                ->add('Display', SubmitType::class)
                ;
    }
    public function configureOptions(OptionsResolver $resolver)
{
    $resolver->setDefaults(array(
        'data_class' => 'NTPBundle\Entity\ParagonData',
    ));
}

}
