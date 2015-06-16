<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Asesores
 *
 * @ORM\Table(name="asesores", indexes={@ORM\Index(name="FK_asesores_personas", columns={"id_persona"}), @ORM\Index(name="FK_asesores_trabajos", columns={"id_trabajo"})})
 * @ORM\Entity
 */
class Asesores
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="director", type="boolean", nullable=true)
     */
    private $director;

    /**
     * @var boolean
     *
     * @ORM\Column(name="jurado", type="boolean", nullable=true)
     */
    private $jurado;

    /**
     * @var boolean
     *
     * @ORM\Column(name="asesmetd", type="boolean", nullable=true)
     */
    private $asesmetd;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=1, nullable=true)
     */
    private $estado = '1';

    /**
     * @var \Personas
     *
     * @ORM\ManyToOne(targetEntity="Personas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_persona", referencedColumnName="id")
     * })
     */
    private $idPersona;

    /**
     * @var \Trabgrado
     *
     * @ORM\ManyToOne(targetEntity="Trabgrado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_trabajo", referencedColumnName="id")
     * })
     */
    private $idTrabajo;



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
     * Set director
     *
     * @param boolean $director
     * @return Asesores
     */
    public function setDirector($director)
    {
        $this->director = $director;

        return $this;
    }

    /**
     * Get director
     *
     * @return boolean 
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * Set jurado
     *
     * @param boolean $jurado
     * @return Asesores
     */
    public function setJurado($jurado)
    {
        $this->jurado = $jurado;

        return $this;
    }

    /**
     * Get jurado
     *
     * @return boolean 
     */
    public function getJurado()
    {
        return $this->jurado;
    }

    /**
     * Set asesmetd
     *
     * @param boolean $asesmetd
     * @return Asesores
     */
    public function setAsesmetd($asesmetd)
    {
        $this->asesmetd = $asesmetd;

        return $this;
    }

    /**
     * Get asesmetd
     *
     * @return boolean 
     */
    public function getAsesmetd()
    {
        return $this->asesmetd;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Asesores
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set idPersona
     *
     * @param \Acme\DemoBundle\Entity\Personas $idPersona
     * @return Asesores
     */
    public function setIdPersona(\Acme\DemoBundle\Entity\Personas $idPersona = null)
    {
        $this->idPersona = $idPersona;

        return $this;
    }

    /**
     * Get idPersona
     *
     * @return \Acme\DemoBundle\Entity\Personas 
     */
    public function getIdPersona()
    {
        return $this->idPersona;
    }

    /**
     * Set idTrabajo
     *
     * @param \Acme\DemoBundle\Entity\Trabgrado $idTrabajo
     * @return Asesores
     */
    public function setIdTrabajo(\Acme\DemoBundle\Entity\Trabgrado $idTrabajo = null)
    {
        $this->idTrabajo = $idTrabajo;

        return $this;
    }

    /**
     * Get idTrabajo
     *
     * @return \Acme\DemoBundle\Entity\Trabgrado 
     */
    public function getIdTrabajo()
    {
        return $this->idTrabajo;
    }
}
