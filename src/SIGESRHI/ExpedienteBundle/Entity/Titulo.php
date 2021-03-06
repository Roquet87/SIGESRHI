<?php

namespace SIGESRHI\ExpedienteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Titulo
 *
 * @ORM\Table(name="titulo")
 * @ORM\Entity
 */
class Titulo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="titulo_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombretitulo", type="string", length=100, nullable=false)
     * @Assert\NotNull(message="Debe ingresar el nombre del titulo")
     * @Assert\Length(
     * max = "100",
     * maxMessage = "El nombre del titulo no debe exceder los {{limit}} caracteres"
     * )
     */
    private $nombretitulo;

    /**
     * @var string
     *
     * @ORM\Column(name="niveltitulo", type="string", length=20, nullable=false)
     * @Assert\NotNull(message="Debe ingresar el nivel del titulo")
     * @Assert\Length(
     * max = "20",
     * maxMessage = "El nivel del titulo no debe exceder los {{limit}} caracteres"
     * )
     */
    private $niveltitulo;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\oneToMany(targetEntity="Informacionacademica", mappedBy="idtitulo")
     */
    private $idinformacionacademica;

    /**
     * @ORM\OneToMany(targetEntity="\SIGESRHI\AdminBundle\Entity\Tituloplaza", mappedBy="idtitulo")
     */
    private $idtituloplaza;
    
    public function __toString(){
        return $this->getNombretitulo();
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
     * Set nombretitulo
     *
     * @param string $nombretitulo
     * @return Titulo
     */
    public function setNombretitulo($nombretitulo)
    {
        $this->nombretitulo = $nombretitulo;
    
        return $this;
    }

    /**
     * Get nombretitulo
     *
     * @return string 
     */
    public function getNombretitulo()
    {
        return $this->nombretitulo;
    }

    /**
     * Set niveltitulo
     *
     * @param string $niveltitulo
     * @return Titulo
     */
    public function setNiveltitulo($niveltitulo)
    {
        $this->niveltitulo = $niveltitulo;
    
        return $this;
    }

    /**
     * Get niveltitulo
     *
     * @return string 
     */
    public function getNiveltitulo()
    {
        return $this->niveltitulo;
    }


    /**
     * Get idinformacionacademica
     *
     * @return \SIGESRHI\AdminBundle\Entity\Informacionacademica 
     */
    public function getIdinformacionacademica()
    {
        return $this->idinformacionacademica;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idinformacionacademica = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idtituloplaza = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add idinformacionacademica
     *
     * @param \SIGESRHI\ExpedienteBundle\Entity\Informacionacademica $idinformacionacademica
     * @return Titulo
     */
    public function addIdinformacionacademica(\SIGESRHI\ExpedienteBundle\Entity\Informacionacademica $idinformacionacademica)
    {
        $this->idinformacionacademica[] = $idinformacionacademica;
    
        return $this;
    }

    /**
     * Remove idinformacionacademica
     *
     * @param \SIGESRHI\ExpedienteBundle\Entity\Informacionacademica $idinformacionacademica
     */
    public function removeIdinformacionacademica(\SIGESRHI\ExpedienteBundle\Entity\Informacionacademica $idinformacionacademica)
    {
        $this->idinformacionacademica->removeElement($idinformacionacademica);
    }

    

    /**
     * Add idtituloplaza
     *
     * @param \SIGESRHI\AdminBundle\Entity\Tituloplaza $idtituloplaza
     * @return Titulo
     */
    public function addIdtituloplaza(\SIGESRHI\AdminBundle\Entity\Tituloplaza $idtituloplaza)
    {
        $this->idtituloplaza[] = $idtituloplaza;
    
        return $this;
    }

    /**
     * Remove idtituloplaza
     *
     * @param \SIGESRHI\AdminBundle\Entity\Tituloplaza $idtituloplaza
     */
    public function removeIdtituloplaza(\SIGESRHI\AdminBundle\Entity\Tituloplaza $idtituloplaza)
    {
        $this->idtituloplaza->removeElement($idtituloplaza);
    }

    /**
     * Get idtituloplaza
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdtituloplaza()
    {
        return $this->idtituloplaza;
    }
}