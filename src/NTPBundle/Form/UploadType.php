<?php

namespace NTPBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UploadType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('file')
                ->add('planDate','date',array('widget'=>'single_text',
                                               'format'=>'dd/MM/yyyy',
                                               'data'=> new \DateTime(),
                                               'attr' => array('class' => 'form-control')
                                               
                      ))
                ;
    
    }
     public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'NTPBundle\Entity\ParagonUpload',
        ));
    }
}
