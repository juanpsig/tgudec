<?php

namespace TG\UdecBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ArchivostgType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('resumen','file',array('label'  => 'Resumen: ','required'=>false))
            //->add('abstrc','file',array('label'  => 'Abstrac: ','required'=>false))
            ->add('articulo','file',array('label'  => 'Artículo: ','required'=>false))
            ->add('doc','file',array('label'  => 'Documento: ','required'=>false))
            ->add('manualTecn','file',array('label'  => 'Manual Técnico: ','required'=>false))
            ->add('manualUsr','file',array('label'  => 'Manual Usuario: ','required'=>false))
            //->add('codigoSw','file',array('label'  => 'Código Fuente: ','required'=>false))
            //->add('software','file',array('label'  => 'Software: ','required'=>false))
            ->add('idTrabajo')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TG\UdecBundle\Entity\Archivostg'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tg_udecbundle_archivostg';
    }
}
