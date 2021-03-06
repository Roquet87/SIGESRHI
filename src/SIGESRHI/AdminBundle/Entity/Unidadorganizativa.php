<?php

namespace SIGESRHI\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Unidadorganizativa
 *
 * @ORM\Table(name="unidadorganizativa")
 * @ORM\Entity
 */
class Unidadorganizativa
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="unidadorganizativa_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreunidad", type="string", length=75, nullable=false)
     * @Assert\NotNull(message="Debe ingresar un nombre de Unidad")
     * @Assert\Length(
     * max = "75",
     * maxMessage = "El nombre de unidad no debe exceder los {{limit}} caracteres"
     * )
     * 
     */
    private $nombreunidad;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcionunidad", type="string", length=500, nullable=true)
     * @Assert\Length(
     *  max = "500",
     * maxMessage = "La descripcion no debe exceder los 500 caracteres"
     * )
     */
    private $descripcionunidad;

    /**
     * @var \Centrounidad
     *
     * @ORM\ManyToOne(targetEntity="Centrounidad", inversedBy="idunidad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcentro", referencedColumnName="id")
     * })
     */
    private $idcentro;

    /**
     * @ORM\OneToMany(targetEntity="SIGESRHI\AdminBundle\Entity\RefrendaAct", mappedBy="idunidad")
     */
    private $idrefrenda;


    public function __toString() {
        return $this->getNombreunidad();
    } 
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
     * Set nombreunidad
     *
     * @param string $nombreunidad
     * @return Unidadorganizativa
     */
    public function setNombreunidad($nombreunidad)
    {
        $this->nombreunidad = $nombreunidad;
    
        return $this;
    }

    /**
     * Get nombreunidad
     *
     * @return string 
     */
    public function getNombreunidad()
    {
        return $this->nombreunidad;
    }

    /**
     * Set descripcionunidad
     *
     * @param string $descripcionunidad
     * @return Unidadorganizativa
     */
    public function setDescripcionunidad($descripcionunidad)
    {
        $this->descripcionunidad = $descripcionunidad;
    
        return $this;
    }

    /**
     * Get descripcionunidad
     *
     * @return string 
     */
    public function getDescripcionunidad()
    {
        return $this->descripcionunidad;
    }

    /**
     * Set idcentro
     *
     * @param \SIGESRHI\AdminBundle\Entity\Centrounidad $idcentro
     * @return Unidadorganizativa
     */
    public function setIdcentro(\SIGESRHI\AdminBundle\Entity\Centrounidad $idcentro = null)
    {
        $this->idcentro = $idcentro;
    
        return $this;
    }

    /**
     * Get idcentro
     *
     * @return \SIGESRHI\AdminBundle\Entity\Centrounidad 
     */
    public function getIdcentro()
    {
        return $this->idcentro;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idrefrenda = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add idrefrenda
     *
     * @param \SIGESRHI\AdminBundle\Entity\RefrendaAct $idrefrenda
     * @return Unidadorganizativa
     */
    public function addIdrefrenda(\SIGESRHI\AdminBundle\Entity\RefrendaAct $idrefrenda)
    {
        $this->idrefrenda[] = $idrefrenda;
    
        return $this;
    }

    /**
     * Remove idrefrenda
     *
     * @param \SIGESRHI\AdminBundle\Entity\RefrendaAct $idrefrenda
     */
    public function removeIdrefrenda(\SIGESRHI\AdminBundle\Entity\RefrendaAct $idrefrenda)
    {
        $this->idrefrenda->removeElement($idrefrenda);
    }

    /**
     * Get ididrefrenda
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdrefrenda()
    {
        return $this->idrefrenda;
    }
}