<?php

namespace TG\UdecBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TrabgradoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		    ->add('fechaRg', 'datetime' )
            ->add('titulo','text',array('label'=>'Título: '))
            ->add('concepto')
            ->add('fechaGrado','date',array('years'=>range('2003',date("Y"))))
            ->add('palabrasClave')
            ->add('tipoTrabajo')
            ->add('estado')
            ->add('idClasificacion')
            ->add('idPrograma')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TG\UdecBundle\Entity\Trabgrado'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tg_udecbundle_trabgrado';
    }
}
