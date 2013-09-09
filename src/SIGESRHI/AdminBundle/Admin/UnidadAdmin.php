<?php


//src/SIGESRHI/AdminBundle/Admin/UnidadAdmin.php

namespace SIGESRHI\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

class UnidadAdmin extends Admin
{
   // public $supportsPreviewMode = true;
    //Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('nombreunidad', null, array('label' => 'Unidad Organizativa'))
            ->add('descripcionunidad', null, array('label' => 'Descripción'))
            ->add('idcentro',null,array('required'=>'required', 'label'=>'Centro Atención'))
            ->setHelps(array('nombreunidad'=>'Ingresa una unidad organizativa'))
           
             ;
    }
    
        //Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nombreunidad', null, array('label' => 'Unidad Organizativa'))
            ->add('descripcionunidad', null, array('label' => 'Descripción'))
            ->add('idcentro',null,array('label'=>'Centro Atención'))
        ;
    }
    
        //Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('nombreunidad', null,array('label' => 'Unidad Organizativa'))
            ->add('descripcionunidad', null, array('label' => 'Descripción'))
            ->add('idcentro',null,array('label'=>'Centro Atención'))
       
        ;
    }
    
}
