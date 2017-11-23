<?php

namespace Intex\OrgBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('lastname','text', array('label' => 'Last Name',));
        $builder->add('firstname','text', array('label' => 'First Name',));
        $builder->add('middlename','text', array('label' => 'Middle Name',));
        $builder->add('bithday', DateType::class, array('label' => 'Bithday(YYYY-MM-DD)',
            'widget' => 'single_text','format' => 'yyyy-mm-dd','attr'=> array('class'=>'input-group date')));
        $builder->add('inn','text',array('label' => 'ITN (12 digits)',));
        $builder->add('snils', 'text',array('label' => 'INILA (11 digits)',));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Intex\OrgBundle\Entity\User'
        ));
    }

    public function getBlockPrefix()
    {
        return 'intex_orgbundle_usertype';
    }
}
