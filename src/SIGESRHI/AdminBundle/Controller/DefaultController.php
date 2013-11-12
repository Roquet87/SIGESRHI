<?php

namespace SIGESRHI\AdminBundle\Controller;

use SIGESRHI\AdminBundle\Entity\Usuario;
use SIGESRHI\AdminBundle\Entity\Rol;
use SIGESRHI\AdminBundle\Entity\Acceso;
//use SIGESRHI\AdminBundle\Entity\Modulo;

use Doctrine\ORM\EntityRepository;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
      $session = $this->getRequest()->getSession();
        $session->set('seccion',0);

        return $this->render('AdminBundle:Default:index.html.twig');
    }

    public function cambiaopcionAction($acceso){

        //$foo = $session->get('seccion');
        $session = $this->getRequest()->getSession();
        $session->set('seccion',$acceso);

        /*
        $request=$this->container->get('request');
        $routename=$request->get('_route');
        */
        return $this->render('AdminBundle:Default:index.html.twig');
    }


    public function menuAction($nombreUsuario)
    {
  		$em = $this->getDoctrine()->getManager();
  		$query = $em->createQuery('
          SELECT u.id iduser, g.id idrol, a.nombrepagina pagina, a.ruta ruta, a.id acceso, IDENTITY(a.idaccesosup) padre, m.nombremodulo modulo,
          (SELECT COUNT(a2.id) FROM AdminBundle:Acceso a2 where a2.idaccesosup = a.id) hijos
          FROM ApplicationSonataUserBundle:User u
          join u.groups g
          join g.idacceso a
          join a.idmodulo m
          WHERE u.username = :username  and a.idaccesosup is null order by m.nombremodulo'
        )->setParameter('username', $nombreUsuario);  //and a.idaccesosup is null

        $opciones = $query->getResult();
               
        return $this->render('::menuBase.html.twig',array('opciones'=>$opciones));
    
    }


    public function SeccionesAction($idacceso, $nombreUsuario)
    {
      $em = $this->getDoctrine()->getManager();
      $query = $em->createQuery('
          SELECT a.nombrepagina pagina, a.ruta ruta, a.id acceso, IDENTITY(a.idaccesosup) padre, m.nombremodulo modulo, 
          (SELECT a2.nombrepagina FROM AdminBundle:Acceso a2 where a2.id = :idacceso)  opcionpadre
          From ApplicationSonataUserBundle:User u
          join u.groups g
          join g.idacceso a 
          join a.idmodulo m
          WHERE a.idaccesosup = :idacceso and u.username = :username order by m.nombremodulo'
        )->setParameter('idacceso', $idacceso)->setParameter('username', $nombreUsuario);
  
        $opciones = $query->getResult();
               
        return $this->render('::menuSecciones.html.twig',array('opciones'=>$opciones));
    
    }
}
