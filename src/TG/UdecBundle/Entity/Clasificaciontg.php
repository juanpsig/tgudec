<?php

namespace TG\UdecBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clasificaciontg
 *
 * @ORM\Table(name="clasificaciontg")
 * @ORM\Entity
 */
class Clasificaciontg
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
     * @ORM\Column(name="nombre", type="string", length=50, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="electiva", type="string", length=50, nullable=true)
     */
    private $electiva;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=250, nullable=true)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="asesoria", type="string", length=50, nullable=true)
     */
    private $asesoria;

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
     * @return Clasificaciontg
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
     * Set electiva
     *
     * @param string $electiva
     * @return Clasificaciontg
     */
    public function setElectiva($electiva)
    {
        $this->electiva = $electiva;

        return $this;
    }

    /**
     * Get electiva
     *
     * @return string 
     */
    public function getElectiva()
    {
        return $this->electiva;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Clasificaciontg
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set asesoria
     *
     * @param string $asesoria
     * @return Clasificaciontg
     */
    public function setAsesoria($asesoria)
    {
        $this->asesoria = $asesoria;

        return $this;
    }

    /**
     * Get asesoria
     *
     * @return string 
     */
    public function getAsesoria()
    {
        return $this->asesoria;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Clasificaciontg
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
