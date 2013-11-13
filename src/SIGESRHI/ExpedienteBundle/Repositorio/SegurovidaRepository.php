<?php

namespace SIGESRHI\ExpedienteBundle\Repositorio;

use Doctrine\ORM\EntityRepository;

/**
 * SegurovidaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SegurovidaRepository extends EntityRepository
{
	public function obtenerDatosGenerales($idexp)
    {
		return $this->getEntityManager()
			->createQuery("SELECT e.id idexp,
				                  se.nombrecompleto nombre, 
				                  se.dui, 
				                  se.lugarnac, 
				                  se.fechanac, 
				                  concat(se.colonia,concat(', ',concat(COALESCE(se.calle,''), concat(' ',concat(m.nombremunicipio,concat('. ',d.nombredepartamento)))))) direccion
				           FROM ExpedienteBundle:Solicitudempleo se JOIN se.idexpediente e JOIN se.idmunicipio m JOIN m.iddepartamento d
				           WHERE e.id=:idexp 
                           ")
            ->setParameter('idexp',$idexp)
            ->getResult();
	}
}