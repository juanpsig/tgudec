<?php

namespace TG\UdecBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sedes
 *
 * @ORM\Table(name="sedes")
 * @ORM\Entity
 */
class Sedes
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
     * @ORM\Column(name="nombre", type="string", length=70, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_sede", type="string", length=27, nullable=true)
     */
    private $tipoSede;

    /**
     * @var string
     *
     * @ORM\Column(name="municipio", type="string", length=27, nullable=true)
     */
    private $municipio;

    /**
     * @var string
     *
     * @ORM\Column(name="departamento", type="string", length=27, nullable=true)
     */
    private $departamento;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=1, nullable=true)
     */
    private $estado = '1';



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
     * Set nombre
     *
     * @param string $nombre
     * @return Sedes
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set tipoSede
     *
     * @param string $tipoSede
     * @return Sedes
     */
    public function setTipoSede($tipoSede)
    {
        $this->tipoSede = $tipoSede;

        return $this;
    }

    /**
     * Get tipoSede
     *
     * @return string 
     */
    public function getTipoSede()
    {
        return $this->tipoSede;
    }

    /**
     * Set municipio
     *
     * @param string $municipio
     * @return Sedes
     */
    public function setMunicipio($municipio)
    {
        $this->municipio = $municipio;

        return $this;
    }

    /**
     * Get municipio
     *
     * @return string 
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }

    /**
     * Set departamento
     *
     * @param string $departamento
     * @return Sedes
     */
    public function setDepartamento($departamento)
    {
        $this->departamento = $departamento;

        return $this;
    }

    /**
     * Get departamento
     *
     * @return string 
     */
    public function getDepartamento()
    {
        return $this->departamento;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Sedes
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
    
    public function __toString(){
        return $this->getNombre();
    }
}
