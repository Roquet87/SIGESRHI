<?php

namespace SIGESRHI\ExpedienteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Memorandum
 *
 * @ORM\Table(name="memorandum")
 * @ORM\Entity
 */
class Memorandum
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="memorandum_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="correlativo", type="integer", nullable=false)
     * @Assert\NotNull(message="Debe ingresar el correlativo")
     */
    private $correlativo;

    /**
     * @var \Concurso
     *
     * @ORM\ManyToOne(targetEntity="Concurso")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idconcurso", referencedColumnName="id")
     * })
     */
    private $idconcurso;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set correlativo
     *
     * @param integer $correlativo
     * @return Memorandum
     */
    public function setCorrelativo($correlativo)
    {
        $this->correlativo = $correlativo;
    
        return $this;
    }

    /**
     * Get correlativo
     *
     * @return integer 
     */
    public function getCorrelativo()
    {
        return $this->correlativo;
    }

    /**
     * Set idconcurso
     *
     * @param \SIGESRHI\ExpedienteBundle\Entity\Concurso $idconcurso
     * @return Memorandum
     */
    public function setIdconcurso(\SIGESRHI\ExpedienteBundle\Entity\Concurso $idconcurso = null)
    {
        $this->idconcurso = $idconcurso;
    
        return $this;
    }

    /**
     * Get idconcurso
     *
     * @return \SIGESRHI\ExpedienteBundle\Entity\Concurso 
     */
    public function getIdconcurso()
    {
        return $this->idconcurso;
    }
}