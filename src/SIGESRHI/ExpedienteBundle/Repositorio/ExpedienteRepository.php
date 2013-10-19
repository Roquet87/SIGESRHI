<?php

namespace SIGESRHI\ExpedienteBundle\Repositorio;

use Doctrine\ORM\EntityRepository;

/**
 * ExpedienteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ExpedienteRepository extends EntityRepository
{
	public function obtenerExpedientes($idexp)
    {
		return $this->getEntityManager()
			->createQuery('SELECT e.fechaexpediente fechaexpediente, s.nombres nombres, p.nombreplaza nombreplaza, t.nombretitulo nombretitulo
                           FROM ExpedienteBundle:Solicitudempleo s JOIN s.idexpediente e JOIN s.idplaza p JOIN s.Destudios i JOIN i.idtitulo t
                           WHERE e.id=:idexp order by t.niveltitulo DESC
                           ')
			->setMaxResults(1)
            ->setParameter('idexp',$idexp)
            ->getResult();
	}
}
