<?php

namespace SIGESRHI\ExpedienteBundle\Repositorio;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * ExpedienteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ExpedienteRepository extends EntityRepository
{
	public function obtenerExpediente($idexp)
    {
		return $this->getEntityManager()
			->createQuery('SELECT e.fechaexpediente fechaexpediente, s.nombrecompleto nombres, p.nombreplaza nombreplaza, t.nombretitulo nombretitulo,e.tipoexpediente,e.id id
                           FROM ExpedienteBundle:Solicitudempleo s JOIN s.idexpediente e JOIN s.idplaza p JOIN s.Destudios i JOIN i.idtitulo t
                           WHERE e.id=:idexp order by t.niveltitulo DESC
                           ')
			->setMaxResults(1)
            ->setParameter('idexp',$idexp)
            ->getResult();
	}

  public function obtenerExpedienteInvalido($idexp)
    {
    return $this->getEntityManager()
      ->createQuery("SELECT s.id,e.id as idexpediente,s.nombrecompleto, CONCAT(COALESCE(s.calle,''),CONCAT(', ',s.colonia)) as direccion, s.estadocivil, s.telefonofijo,
                            s.telefonomovil, s.email,s.lugarnac, s.fechanac, s.fotografia,s.dui,s.nit,s.isss,s.nup,s.nip,s.sexo,s.fechadui,s.lugardui,p.nombreplaza
                           FROM ExpedienteBundle:Solicitudempleo s JOIN s.idexpediente e join s.idplaza p
                           WHERE e.id=:idexp
                           ")
            ->setParameter('idexp',$idexp)
            ->getResult();
  }

public function obtenerExpedienteEmpleadoInfo($idexp)
  {
  return $this->getEntityManager()
    ->createQuery("SELECT s.id,e.id as idexpediente,s.nombrecompleto, CONCAT(COALESCE(s.calle,''),CONCAT(', ',s.colonia)) as direccion, s.estadocivil, s.telefonofijo,
                          s.telefonomovil, s.email,s.lugarnac, s.fechanac, s.fotografia,s.dui,s.nit,s.isss,s.nup,s.nip,s.sexo,s.fechadui,s.lugardui, em.codigoempleado
                         FROM ExpedienteBundle:Solicitudempleo s JOIN s.idexpediente e JOIN e.idempleado em
                         WHERE e.id=:idexp 
                         ")
          ->setParameter('idexp',$idexp)
          ->getResult();
}

public function obtenerPlazasEmpleado($idexp)
  {
  return $this->getEntityManager()
    ->createQuery("SELECT p.nombreplaza, ce.nombrecentro
                         FROM ExpedienteBundle:Expediente e JOIN e.idempleado em JOIN em.idcontratacion c JOIN c.idplaza p JOIN c.idunidad u JOIN u.idcentro ce
                         WHERE e.id=:idexp AND  c.fechafincontrato IS NULL
                         ")
          ->setParameter('idexp',$idexp)  
          ->getResult();
}

  public function obtenerExpedientes()
    {
    return $this->getEntityManager()
      ->createQuery('SELECT e.fechaexpediente fechaexpediente, s.nombrecompleto nombres, p.nombreplaza nombreplaza, t.nombretitulo nombretitulo,e.tipoexpediente
                           FROM ExpedienteBundle:Solicitudempleo s JOIN s.idexpediente e JOIN s.idplaza p JOIN s.Destudios i JOIN i.idtitulo t
                           order by t.niveltitulo DESC
                           ')    
       ->getResult();
          //quitamos result para retornar entidad no resultados
  }

  public function obtenerExpedientes2($limit = null)
  {
        $qb = $this->getEntityManager()
                   ->createQueryBuilder('Expediente')
                   ->select('e.id')
                   ->from('Expediente', 'e');                   
        //$qb->add('select','e.id')
           //->add('from', 'ExpedienteBundle\Expediente e')
           //->add('where','e.id = ?1');

        if (false === is_null($limit))
            $qb->setMaxResults($limit);

        return $qb->getQuery();
                  
   }

  public function registrarValido($idexp)
    {
    return $this->getEntityManager()
      ->createQuery("UPDATE ExpedienteBundle:Expediente e SET e.tipoexpediente='A'
                           WHERE e.id=:idexp
                           ")
            ->setParameter('idexp',$idexp)
            ->getResult();
  }

  public function obtenerExpedientesPeriodo($fecha_find)
  {
    return $this->getEntityManager()
                ->createQuery("SELECT e.id id, s.nombrecompleto nombres, p.nombreplaza nombreplaza, e.fechaexpediente fecharegistro, e.tipoexpediente estado
                 FROM ExpedienteBundle:Solicitudempleo s JOIN s.idexpediente e JOIN s.idplaza p WHERE e.fechaexpediente<:F AND (e.tipoexpediente='I' OR e.tipoexpediente='A')")
                ->setParameter('F',$fecha_find)
                ->getResult();
  }

  public function encontrarAcuerdo($idexp){
    return $this->getEntityManager()
                ->createQuery("SELECT a.id
                 FROM ExpedienteBundle:Expediente e JOIN e.idaccion a WHERE a.numacuerdo=:N")
                ->setParameter('N',$idexp)
                ->getResult();
  }

}
