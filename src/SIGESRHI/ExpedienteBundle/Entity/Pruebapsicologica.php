<?php

namespace SIGESRHI\ExpedienteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Pruebapsicologica
 *
 * @ORM\Table(name="pruebapsicologica")
 * @ORM\Entity
 */
class Pruebapsicologica
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="pruebapsicologica_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="resultadocoeficiente", type="string", length=9, nullable=false)
     * @Assert\NotNull(message="Debe ingresar los resutados de CI")
     * @Assert\Length(
     * max = "9",
     * maxMessage = "El resultados de CI no debe exceder los {{limit}} caracteres"
     * )
     */
    private $resultadocoeficiente;

    /**
     * @var integer
     *
     * @ORM\Column(name="calificacioncoeficiente", type="integer", nullable=false)
     * @Assert\NotNull(message="Debe ingresar la calificacion de CI")
     */
    private $calificacioncoeficiente;

    /**
     * @var string
     *
     * @ORM\Column(name="resultadoafectividad", type="string", length=9, nullable=false)
     * @Assert\NotNull(message="Debe ingresar los resutados de Efectividad")
     * @Assert\Length(
     * max = "9",
     * maxMessage = "los resutados de Efectividad no debe exceder los {{limit}} caracteres"
     * )
     */
    private $resultadoafectividad;

    /**
     * @var string
     *
     * @ORM\Column(name="resultadorelaciones", type="string", length=9, nullable=false)
     * @Assert\NotNull(message="Debe ingresar los resutados de Relaciones")
     * @Assert\Length(
     * max = "9",
     * maxMessage = "los resutados de Relaciones no debe exceder los {{limit}} caracteres"
     * )
     */
    private $resultadorelaciones;

    /**
     * @var string
     *
     * @ORM\Column(name="resultadoautoreconocimiento", type="string", length=9, nullable=false)
     * @Assert\NotNull(message="Debe ingresar los resutados de Conocimiento")
     * @Assert\Length(
     * max = "9",
     * maxMessage = "los resutados de Autoreconocimiento no debe exceder los {{limit}} caracteres"
     * )
     */
    private $resultadoautoreconocimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="resultadoseguridad", type="string", length=9, nullable=false)
     * @Assert\NotNull(message="Debe ingresar los resutados de Seguridad")
     * @Assert\Length(
     * max = "9",
     * maxMessage = "los resutados de Seguridad no debe exceder los {{limit}} caracteres"
     * )
     */
    private $resultadoseguridad;

    /**
     * @var \Expediente
     *
     * @ORM\OneToOne(targetEntity="Expediente", inversedBy="idpruebapsicologica")
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
     * Set resultadocoeficiente
     *
     * @param string $resultadocoeficiente
     * @return Pruebapsicologica
     */
    public function setResultadocoeficiente($resultadocoeficiente)
    {
        $this->resultadocoeficiente = $resultadocoeficiente;
    
        return $this;
    }

    /**
     * Get resultadocoeficiente
     *
     * @return string 
     */
    public function getResultadocoeficiente()
    {
        return $this->resultadocoeficiente;
    }

    /**
     * Set calificacioncoeficiente
     *
     * @param integer $calificacioncoeficiente
     * @return Pruebapsicologica
     */
    public function setCalificacioncoeficiente($calificacioncoeficiente)
    {
        $this->calificacioncoeficiente = $calificacioncoeficiente;
    
        return $this;
    }

    /**
     * Get calificacioncoeficiente
     *
     * @return integer 
     */
    public function getCalificacioncoeficiente()
    {
        return $this->calificacioncoeficiente;
    }

    /**
     * Set resultadoafectividad
     *
     * @param string $resultadoafectividad
     * @return Pruebapsicologica
     */
    public function setResultadoafectividad($resultadoafectividad)
    {
        $this->resultadoafectividad = $resultadoafectividad;
    
        return $this;
    }

    /**
     * Get resultadoafectividad
     *
     * @return string 
     */
    public function getResultadoafectividad()
    {
        return $this->resultadoafectividad;
    }

    /**
     * Set resultadorelaciones
     *
     * @param string $resultadorelaciones
     * @return Pruebapsicologica
     */
    public function setResultadorelaciones($resultadorelaciones)
    {
        $this->resultadorelaciones = $resultadorelaciones;
    
        return $this;
    }

    /**
     * Get resultadorelaciones
     *
     * @return string 
     */
    public function getResultadorelaciones()
    {
        return $this->resultadorelaciones;
    }

    /**
     * Set resultadoautoreconocimiento
     *
     * @param string $resultadoautoreconocimiento
     * @return Pruebapsicologica
     */
    public function setResultadoautoreconocimiento($resultadoautoreconocimiento)
    {
        $this->resultadoautoreconocimiento = $resultadoautoreconocimiento;
    
        return $this;
    }

    /**
     * Get resultadoautoreconocimiento
     *
     * @return string 
     */
    public function getResultadoautoreconocimiento()
    {
        return $this->resultadoautoreconocimiento;
    }

    /**
     * Set resultadoseguridad
     *
     * @param string $resultadoseguridad
     * @return Pruebapsicologica
     */
    public function setResultadoseguridad($resultadoseguridad)
    {
        $this->resultadoseguridad = $resultadoseguridad;
    
        return $this;
    }

    /**
     * Get resultadoseguridad
     *
     * @return string 
     */
    public function getResultadoseguridad()
    {
        return $this->resultadoseguridad;
    }

    /**
     * Set idexpediente
     *
     * @param \SIGESRHI\ExpedienteBundle\Entity\Expediente $idexpediente
     * @return Pruebapsicologica
     */
    public function setIdexpediente(\SIGESRHI\ExpedienteBundle\Entity\Expediente $idexpediente = null)
    {
        $this->idexpediente = $idexpediente;
    
        return $this;
    }

    /**
     * Get idexpediente
     *
     * @return \SIGESRHI\ExpedienteBundle\Entity\Expediente 
     */
    public function getIdexpediente()
    {
        return $this->idexpediente;
    }
}