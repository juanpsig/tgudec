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
     * @ORM\Column(name="IdClasfTG", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idclasftg;

    /**
     * @var string
     *
     * @ORM\Column(name="NomClasfTG", type="string", length=50, nullable=false)
     */
    private $nomclasftg;

    /**
     * @var string
     *
     * @ORM\Column(name="ElectivaTG", type="string", length=50, nullable=true)
     */
    private $electivatg;

    /**
     * @var string
     *
     * @ORM\Column(name="Descripcion", type="string", length=250, nullable=true)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="Asesoria", type="string", length=50, nullable=true)
     */
    private $asesoria;



    /**
     * Get idclasftg
     *
     * @return integer 
     */
    public function getIdclasftg()
    {
        return $this->idclasftg;
    }

    /**
     * Set nomclasftg
     *
     * @param string $nomclasftg
     * @return Clasificaciontg
     */
    public function setNomclasftg($nomclasftg)
    {
        $this->nomclasftg = $nomclasftg;

        return $this;
    }

    /**
     * Get nomclasftg
     *
     * @return string 
     */
    public function getNomclasftg()
    {
        return $this->nomclasftg;
    }

    /**
     * Set electivatg
     *
     * @param string $electivatg
     * @return Clasificaciontg
     */
    public function setElectivatg($electivatg)
    {
        $this->electivatg = $electivatg;

        return $this;
    }

    /**
     * Get electivatg
     *
     * @return string 
     */
    public function getElectivatg()
    {
        return $this->electivatg;
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
}
