<?php

namespace TG\UdecBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Autores
 *
 * @ORM\Table(name="autores", indexes={@ORM\Index(name="FK_autores_personas", columns={"id_persona"}), @ORM\Index(name="FK_autores_trabgrado", columns={"id_trabajo"})})
 * @ORM\Entity
 */
class Autores
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
     * @ORM\Column(name="estado", type="string", length=1, nullable=true)
     */
    private $estado;

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
     * Set estado
     *
     * @param string $estado
     * @return Autores
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
     * @return Autores
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

    /**
     * Set idTrabajo
     *
     * @param \TG\UdecBundle\Entity\Trabgrado $idTrabajo
     * @return Autores
     */
    public function setIdTrabajo(\TG\UdecBundle\Entity\Trabgrado $idTrabajo = null)
    {
        $this->idTrabajo = $idTrabajo;

        return $this;
    }

    /**
     * Get idTrabajo
     *
     * @return \TG\UdecBundle\Entity\Trabgrado 
     */
    public function getIdTrabajo()
    {
        return $this->idTrabajo;
    }
}
