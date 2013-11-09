<?php

namespace SIGESRHI\ExpedienteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InformacionacademicaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('centroestudio',null, array('label'=> 'Centro de Estudios ', 'attr' =>array('class'=> 'input-xlarge')))
            ->add('idtitulo',null, array('required'=> true, 'label'=>'Título Obtenido: ', 'empty_value' => 'Seleccione una opción', 'multiple'=>false, 'attr' =>array('class'=> 'input-xlarge')))
            //->add('idtitulo','shtumi_ajax_autocomplete', array('required'=> true,'entity_alias'=>'titulo', 'label'=>'Título Obtenido: ', 'attr' =>array('class'=> 'input-xlarge')))
           /*->add('idtitulo', 'genemu_jqueryselect2_entity', array(
            'class' => 'ExpedienteBundle:Titulo', 'label'=> 'Titulo Obtenido'
        ))*/
   ; 
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SIGESRHI\ExpedienteBundle\Entity\Informacionacademica'
        ));
    }

    public function getName()
    {
        return 'informacionacademica';
    }
}
