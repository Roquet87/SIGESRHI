<?php

namespace SIGESRHI\ExpedienteBundle\Repositorio;

use Doctrine\ORM\EntityRepository;
//use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use SIGESRHI\ExpedienteBundle\Entity\Departamento;


/**
 * DepartamentoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DepartamentoRepository extends EntityRepository
{

/*
 	var $doctrine;
    var $repositorio;
    var $em;    
	
	
    public function __construct($doctrine){ 
        $this->doctrine=$doctrine;      	
        $this->em=$this->doctrine->getManager();
        $this->repositorio=$this->doctrine->getRepository('ExpedienteBundle:Departamento');
        
    } 

  */  
    /*
     *  Obtiene todos los departamento del sistema.
     */    
/*
    public function getDepartamentos() {	    
        $departamento=$this->repositorio->findAll();
        return $departamento;
    }
    
*/
    /*
     * Obtiene los municipios 
     */
 /*  
     public function consultarMunicipioDpto($idDto){              
             $em=$this->getDoctrine()->getEntityManager(); //agregado
             $departamento = $em->getRepository('ExpedienteBundle:Departamento')->find($idDto); //$this->repositorio->find($idDto); //
             $municipios = $departamento->getMunicipios();        
             
             return $municipios;
    }
*/
}
