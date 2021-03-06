<?php


//src/SIGESRHI/AdminBundle/Admin/TituloAdmin.php

namespace SIGESRHI\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

class OtrosidiomasAdmin extends Admin
{
   // public $supportsPreviewMode = true;
    //Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('nombreidioma',null, array('label' => 'Nombre idioma'))
            ->setHelps(array('nombreidioma'=>'Ingrese el nombre del idioma'))          
             ;
    }
    
        //Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
         // ->add('idtitulo', null, array('label' => 'Titulo'))
        ;
    }
    
        //Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
          //->addIdentifier('idtitulo', null,array('label' => 'Titulo'))                   
        ;
    }
    
}