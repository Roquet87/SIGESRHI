<?php

namespace SIGESRHI\EvaluacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use APY\DataGridBundle\Grid\Mapping as GRID;

/**
 * Puntaje
 *
 * @ORM\Table(name="puntaje")
 * @ORM\Entity
 * @GRID\Source(columns="id, nombrepuntaje, puntajemin, puntajemax", groups={"grupo_puntaje"})
 */
class Puntaje
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="puntaje_id_seq", allocationSize=1, initialValue=1)
     * @GRID\Column(field="id", groups={"grupo_puntaje"},visible=false, filterable=false)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombrepuntaje", type="string", length=15, nullable=false)
     * @Assert\NotNull(message="Debe ingresar el nombre del puntaje")
     * @Assert\Length(
     * max = "15",
     * maxMessage = "El nombre del puntaje no debe exceder los {{limit}} caracteres"
     * )
     * @GRID\Column(field="nombrepuntaje", title="Nombre", groups={"grupo_puntaje"},visible=true, filterable=false, align="center")
     */
    private $nombrepuntaje;

    /**
     * @var integer
     *
     * @ORM\Column(name="puntajemin", type="integer", nullable=false)
     * @Assert\NotNull(message="Debe ingresar el puntaje minimo")
     * @GRID\Column(field="puntajemin", title="Puntaje Minimo", groups={"grupo_puntaje"},visible=true, filterable=false, align="center")
     */
    private $puntajemin;

    /**
     * @var integer
     *
     * @ORM\Column(name="puntajemax", type="integer", nullable=false)
     * @Assert\NotNull(message="Debe ingresar el puntaje maximo")
     * @GRID\Column(field="puntajemax", title="Puntaje Máximo", groups={"grupo_puntaje"},visible=true, filterable=false, align="center")
     */
    private $puntajemax;

     /**
     *
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\ManyToMany(targetEntity="Formularioevaluacion", mappedBy="Puntajes", cascade={"persist"})
    */
    private $idformulario;

     /**
     * @var string
     *
     * @ORM\Column(name="nombreabreviado", type="string", length=2, nullable=false)
     * @Assert\NotNull(message="Debe ingresar el nombre abreviado del puntaje")
     * @Assert\Length(
     * max = "2",
     * maxMessage = "El nombre del puntaje no debe exceder los {{limit}} caracteres"
     * )
     */
    private $nombreabreviado;

    /**
     * @var integer
     *
     * @ORM\Column(name="pescalafon", type="integer", nullable=false)
     * @Assert\NotNull(message="Debe ingresar el % de escalafón")
     */
    private $pescalafon;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idformulario = new \Doctrine\Common\Collections\ArrayCollection();
    }


    public function __toString() {
        return $this->nombrepuntaje;
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
     * Set nombrepuntaje
     *
     * @param string $nombrepuntaje
     * @return Puntaje
     */
    public function setNombrepuntaje($nombrepuntaje)
    {
        $this->nombrepuntaje = $nombrepuntaje;
    
        return $this;
    }

    /**
     * Get nombrepuntaje
     *
     * @return string 
     */
    public function getNombrepuntaje()
    {
        return $this->nombrepuntaje;
    }

    /**
     * Set puntajemin
     *
     * @param integer $puntajemin
     * @return Puntaje
     */
    public function setPuntajemin($puntajemin)
    {
        $this->puntajemin = $puntajemin;
    
        return $this;
    }

    /**
     * Get puntajemin
     *
     * @return integer 
     */
    public function getPuntajemin()
    {
        return $this->puntajemin;
    }

    /**
     * Set puntajemax
     *
     * @param integer $puntajemax
     * @return Puntaje
     */
    public function setPuntajemax($puntajemax)
    {
        $this->puntajemax = $puntajemax;
    
        return $this;
    }

    /**
     * Get puntajemax
     *
     * @return integer 
     */
    public function getPuntajemax()
    {
        return $this->puntajemax;
    }

    /**
     * Add idformulario
     *
     * @param \SIGESRHI\EvaluacionBundle\Entity\Formularioevaluacion $idformulario
     * @return Puntaje
     */
    public function addIdformulario(\SIGESRHI\EvaluacionBundle\Entity\Formularioevaluacion $idformulario)
    {
        $idformulario->addPuntajes($this);
        $this->idformulario[] = $idformulario;
    
        return $this;
    }

    /**
     * Remove idformulario
     *
     * @param \SIGESRHI\EvaluacionBundle\Entity\Formularioevaluacion $idformulario
     */
    public function removeIdformulario(\SIGESRHI\EvaluacionBundle\Entity\Formularioevaluacion $idformulario)
    {
        $this->idformulario->removeElement($idformulario);
    }

    /**
     * Get idformulario
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdformulario()
    {
        return $this->idformulario;
    }


    /**
     * Set nombreabreviado
     *
     * @param string $nombreabreviado
     * @return Puntaje
     */
    public function setNombreabreviado($nombreabreviado)
    {
        $this->nombreabreviado = $nombreabreviado;
    
        return $this;
    }

    /**
     * Get nombreabreviado
     *
     * @return string 
     */
    public function getNombreabreviado()
    {
        return $this->nombreabreviado;
    }

     /**
     * Set pescalafoon
     *
     * @param integer $pescalafon
     * @return Puntaje
     */
    public function setPescalafon($pescalafon)
    {
        $this->pescalafon = $pescalafon;
    
        return $this;
    }

    /**
     * Get pescalafon
     *
     * @return integer 
     */
    public function getPescalafon()
    {
        return $this->pescalafon;
    }


}