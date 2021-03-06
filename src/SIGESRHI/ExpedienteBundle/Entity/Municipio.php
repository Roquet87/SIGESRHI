<?php

namespace SIGESRHI\ExpedienteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Municipio
 *
 * @ORM\Table(name="municipio")
 * @ORM\Entity
 */
class Municipio
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="municipio_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombremunicipio", type="string", length=50, nullable=false)
     * @Assert\NotNull(message="Debe ingresar el nombre del Municipio")
     * @Assert\Length(
     * max = "50",
     * maxMessage = "El nombre del municipios no debe exceder los {{limit}} caracteres"
     * )
     */
    private $nombremunicipio;

    /**
     * @var \Departamento
     *
     * @ORM\ManyToOne(targetEntity="Departamento", inversedBy="Municipios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iddepartamento", referencedColumnName="id")
     * })
     */
    private $iddepartamento;

        public function __toString() {
        return $this->nombremunicipio;
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
     * Set nombremunicipio
     *
     * @param string $nombremunicipio
     * @return Municipio
     */
    public function setNombremunicipio($nombremunicipio)
    {
        $this->nombremunicipio = $nombremunicipio;
    
        return $this;
    }

    /**
     * Get nombremunicipio
     *
     * @return string 
     */
    public function getNombremunicipio()
    {
        return $this->nombremunicipio;
    }

    /**
     * Set iddepartamento
     *
     * @param \SIGESRHI\ExpedienteBundle\Entity\Departamento $iddepartamento
     * @return Municipio
     */
    public function setIddepartamento(\SIGESRHI\ExpedienteBundle\Entity\Departamento $iddepartamento = null)
    {
        $this->iddepartamento = $iddepartamento;
    
        return $this;
    }

    /**
     * Get iddepartamento
     *
     * @return \SIGESRHI\ExpedienteBundle\Entity\Departamento 
     */
    public function getIddepartamento()
    {
        return $this->iddepartamento;
    }
}