<?php

namespace TG\UdecBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClasificaciontgType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('electiva')
            ->add('descripcion')
            //->add('asesoria')
            //->add('estado')
            ->add('idAsesores')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TG\UdecBundle\Entity\Clasificaciontg'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tg_udecbundle_clasificaciontg';
    }
}
