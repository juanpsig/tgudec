<?php

namespace TG\UdecBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonasType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('primerNombre','text')
            ->add('segundoNombre')
            ->add('primerApellido','text')
            ->add('segundoApellido')
            ->add('codigo','integer')
            ->add('email','email')
            ->add('telefonoFijo')
            ->add('movil','text')
            //->add('tipoDoc','text')
            ->add('tipoDoc', 'choice', array('choices' => array('CC' => 'Cédula de Ciudadanía', 'CE' => 'Cédula de Extranjería','PA' => 'Pasaporte','TI' => 'Tarjeta Identidad'),'attr' => array('class'=>'form-control'),'empty_value' => 'Seleccione su tipo de Documento'))
            ->add('numeroDoc','text')
            //->add('estado')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TG\UdecBundle\Entity\Personas'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tg_udecbundle_personas';
    }
}
