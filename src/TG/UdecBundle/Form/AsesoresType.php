<?php

namespace TG\UdecBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AsesoresType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idPersona')
            ->add('idTrabajo')
            ->add('director','checkbox',array('label'  => 'Director: ','required'=>false))
            ->add('jurado','checkbox',array('label'  => 'Jurado: ','required'=>false))
            ->add('asesmetd','checkbox',array('label'  => 'Asesor Metd.: ','required'=>false))
            //->add('estado')
            
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TG\UdecBundle\Entity\Asesores'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tg_udecbundle_asesores';
    }
}
