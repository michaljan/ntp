<?php
// src/AppBundle/Form/RegistrationType.php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('storeNumber');
    }

    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getStoreName()
    {
        return 'app_user_registration';
    }
}
