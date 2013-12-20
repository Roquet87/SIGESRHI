<?php

namespace SIGESRHI\ExpedienteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AccionpersonalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecharegistroaccion', null, array('label'=>'Fecha de Registro: ','widget' => 'single_text', 'format'=>'dd-MM-yyyy', 'attr' => array('class' => 'input-medium', 'readonly'=>true)))
            ->add('motivoaccion', 'textarea', array('label'=>'Descripción del motivo: ', 'attr' => array('class' => 'input-xmlarge', 'rows'=> 4)))
            ->add('numacuerdo', null, array('label'=>'Numero de Acuerdo: ', 'attr' => array('class' => 'input-medium')))
            ->add('idtipoaccion', null, array('label'=>'Tipo de Acuerdo: ', 'empty_value' => 'Seleccione', 'required' => true, 'attr' => array('class' => 'input-xlarge')))
            //->add('idexpediente')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SIGESRHI\ExpedienteBundle\Entity\Accionpersonal'
        ));
    }

    public function getName()
    {
        return 'sigesrhi_expedientebundle_accionpersonaltype';
    }
}
