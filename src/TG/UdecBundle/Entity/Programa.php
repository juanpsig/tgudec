<?php

namespace TG\UdecBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Programa
 *
 * @ORM\Table(name="programa", indexes={@ORM\Index(name="Nomsede", columns={"Nomsede"})})
 * @ORM\Entity
 */
class Programa
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idprog", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idprog;

    /**
     * @var string
     *
     * @ORM\Column(name="nomprog", type="string", length=50, nullable=false)
     */
    private $nomprog;

    /**
     * @var string
     *
     * @ORM\Column(name="Facultad", type="string", length=50, nullable=false)
     */
    private $facultad;

    /**
     * @var \Sede
     *
     * @ORM\ManyToOne(targetEntity="Sede")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Nomsede", referencedColumnName="idsede")
     * })
     */
    private $nomsede;



    /**
     * Get idprog
     *
     * @return integer 
     */
    public function getIdprog()
    {
        return $this->idprog;
    }

    /**
     * Set nomprog
     *
     * @param string $nomprog
     * @return Programa
     */
    public function setNomprog($nomprog)
    {
        $this->nomprog = $nomprog;

        return $this;
    }

    /**
     * Get nomprog
     *
     * @return string 
     */
    public function getNomprog()
    {
        return $this->nomprog;
    }

    /**
     * Set facultad
     *
     * @param string $facultad
     * @return Programa
     */
    public function setFacultad($facultad)
    {
        $this->facultad = $facultad;

        return $this;
    }

    /**
     * Get facultad
     *
     * @return string 
     */
    public function getFacultad()
    {
        return $this->facultad;
    }

    /**
     * Set nomsede
     *
     * @param \Acme\DemoBundle\Entity\Sede $nomsede
     * @return Programa
     */
    public function setNomsede(\Acme\DemoBundle\Entity\Sede $nomsede = null)
    {
        $this->nomsede = $nomsede;

        return $this;
    }

    /**
     * Get nomsede
     *
     * @return \Acme\DemoBundle\Entity\Sede 
     */
    public function getNomsede()
    {
        return $this->nomsede;
    }
}
