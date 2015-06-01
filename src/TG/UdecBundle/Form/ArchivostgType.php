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
            ->add('resumen','file',array('label'  => 'Resumen: '))
            ->add('abstrc','file',array('label'  => 'Abstrac: '))
            ->add('articulo','file',array('label'  => 'Artículo: '))
            ->add('doc','file',array('label'  => 'Documento: '))
            ->add('manualTecn','file',array('label'  => 'Manual Técnico: '))
            ->add('manualUsr','file',array('label'  => 'Manual Usuario: '))
            ->add('codigoSw','file',array('label'  => 'Código Fuente: '))
            ->add('software','file',array('label'  => 'Software: '))
            //->add('estado')
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
