<?php

namespace SIGESRHI\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Segurovida
 *
 * @ORM\Table(name="segurovida")
 * @ORM\Entity
 */
class Segurovida
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="segurovida_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaseguro", type="date", nullable=false)
     */
    private $fechaseguro;

    /**
     * @var string
     *
     * @ORM\Column(name="estadoseguro", type="string", nullable=false)
     */
    private $estadoseguro;

    /**
     * @var \Expediente
     *
     * @ORM\ManyToOne(targetEntity="Expediente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idexpediente", referencedColumnName="id")
     * })
     */
    private $idexpediente;



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
     * Set fechaseguro
     *
     * @param \DateTime $fechaseguro
     * @return Segurovida
     */
    public function setFechaseguro($fechaseguro)
    {
        $this->fechaseguro = $fechaseguro;
    
        return $this;
    }

    /**
     * Get fechaseguro
     *
     * @return \DateTime 
     */
    public function getFechaseguro()
    {
        return $this->fechaseguro;
    }

    /**
     * Set estadoseguro
     *
     * @param string $estadoseguro
     * @return Segurovida
     */
    public function setEstadoseguro($estadoseguro)
    {
        $this->estadoseguro = $estadoseguro;
    
        return $this;
    }

    /**
     * Get estadoseguro
     *
     * @return string 
     */
    public function getEstadoseguro()
    {
        return $this->estadoseguro;
    }

    /**
     * Set idexpediente
     *
     * @param \SIGESRHI\AdminBundle\Entity\Expediente $idexpediente
     * @return Segurovida
     */
    public function setIdexpediente(\SIGESRHI\AdminBundle\Entity\Expediente $idexpediente = null)
    {
        $this->idexpediente = $idexpediente;
    
        return $this;
    }

    /**
     * Get idexpediente
     *
     * @return \SIGESRHI\AdminBundle\Entity\Expediente 
     */
    public function getIdexpediente()
    {
        return $this->idexpediente;
    }
}