<?php

namespace SIGESRHI\ExpedienteBundle\Repositorio;

use Doctrine\ORM\EntityRepository;

/**
 * ContratacionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ContratacionRepository extends EntityRepository
{
	public function obtenerAspiranteValido($idexp)
    {
    return $this->getEntityManager()
            ->createQuery("SELECT e.id,
                                  s.id idsolicitud,
                                  ps.id idprueba,
      	                          s.nombrecompleto, 
      	                          CONCAT(m.nombremunicipio,CONCAT(', ',d.nombredepartamento))  direccion, 
      	                          s.estadocivil, 
      	                          s.telefonofijo,
                                  s.telefonomovil, 
                                  s.email,
                                  s.lugarnac, 
                                  s.fechanac, 
                                  s.fotografia,
                                  s.dui,
                                  s.nit,
                                  s.isss,
                                  s.nup,
                                  s.nip,
                                  s.sexo,
                                  s.fechadui,
                                  s.lugardui,
                                  p.nombreplaza
                           FROM ExpedienteBundle:Solicitudempleo s JOIN s.idexpediente e JOIN s.idplaza p
                                JOIN s.idmunicipio m JOIN m.iddepartamento d LEFT JOIN e.idpruebapsicologica ps
                           WHERE e.id=:idexp
                           ")
            ->setParameter('idexp',$idexp)
            ->getResult();
    }

   public function actualizarEstadoExpediente($idexp)
    {
    return $this->getEntityManager()
                ->createQuery("UPDATE ExpedienteBundle:Expediente e SET e.tipoexpediente='E'
                               WHERE e.id=:idexp
                              ")
                ->setParameter('idexp',$idexp)
                ->getResult();
    }
}