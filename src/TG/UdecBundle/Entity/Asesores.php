<?php

namespace TG\UdecBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Asesores
 *
 * @ORM\Table(name="asesores", indexes={@ORM\Index(name="FK_asesores_personas", columns={"id_persona"})})
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
     * @var string
     *
     * @ORM\Column(name="director", type="string", length=1, nullable=true)
     */
    private $director = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="jurado", type="string", length=1, nullable=true)
     */
    private $jurado = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="asesmetd", type="string", length=1, nullable=true)
     */
    private $asesmetd = '0';

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
     * @param string $director
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
     * @return string 
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * Set jurado
     *
     * @param string $jurado
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
     * @return string 
     */
    public function getJurado()
    {
        return $this->jurado;
    }

    /**
     * Set asesmetd
     *
     * @param string $asesmetd
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
     * @return string 
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
     * @param \TG\UdecBundle\Entity\Personas $idPersona
     * @return Asesores
     */
    public function setIdPersona(\TG\UdecBundle\Entity\Personas $idPersona = null)
    {
        $this->idPersona = $idPersona;

        return $this;
    }

    /**
     * Get idPersona
     *
     * @return \TG\UdecBundle\Entity\Personas 
     */
    public function getIdPersona()
    {
        return $this->idPersona;
    }
}
