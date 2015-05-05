<?php

namespace TG\UdecBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trabgrado
 *
 * @ORM\Table(name="trabgrado", indexes={@ORM\Index(name="ClasificacionTG", columns={"ClasificacionTG"}), @ORM\Index(name="Programa", columns={"Programa"})})
 * @ORM\Entity
 */
class Trabgrado
{
    /**
     * @var string
     *
     * @ORM\Column(name="Titulo", type="string", length=250, nullable=false)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="Concepto", type="string", length=50, nullable=false)
     */
    private $concepto;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FechaGrad", type="date", nullable=false)
     */
    private $fechagrad;

    /**
     * @var string
     *
     * @ORM\Column(name="PalabrasClavs", type="string", length=250, nullable=true)
     */
    private $palabrasclavs;

    /**
     * @var string
     *
     * @ORM\Column(name="TipoTG", type="string", length=50, nullable=false)
     */
    private $tipotg;

    /**
     * @var \Archivostg
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Archivostg")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Idtg", referencedColumnName="IdArchiv")
     * })
     */
    private $idtg;

    /**
     * @var \Clasificaciontg
     *
     * @ORM\ManyToOne(targetEntity="Clasificaciontg")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ClasificacionTG", referencedColumnName="IdClasfTG")
     * })
     */
    private $clasificaciontg;

    /**
     * @var \Programa
     *
     * @ORM\ManyToOne(targetEntity="Programa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Programa", referencedColumnName="idprog")
     * })
     */
    private $programa;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Personas", inversedBy="idasesortg")
     * @ORM\JoinTable(name="asesores",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idasesortg", referencedColumnName="Idtg")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="IdAsesor", referencedColumnName="idper")
     *   }
     * )
     */
    private $idasesor;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Personas", inversedBy="idtgautor")
     * @ORM\JoinTable(name="autores",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idtgautor", referencedColumnName="Idtg")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="IdAutor", referencedColumnName="idper")
     *   }
     * )
     */
    private $idautor;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idasesor = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idautor = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set titulo
     *
     * @param string $titulo
     * @return Trabgrado
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set concepto
     *
     * @param string $concepto
     * @return Trabgrado
     */
    public function setConcepto($concepto)
    {
        $this->concepto = $concepto;

        return $this;
    }

    /**
     * Get concepto
     *
     * @return string 
     */
    public function getConcepto()
    {
        return $this->concepto;
    }

    /**
     * Set fechagrad
     *
     * @param \DateTime $fechagrad
     * @return Trabgrado
     */
    public function setFechagrad($fechagrad)
    {
        $this->fechagrad = $fechagrad;

        return $this;
    }

    /**
     * Get fechagrad
     *
     * @return \DateTime 
     */
    public function getFechagrad()
    {
        return $this->fechagrad;
    }

    /**
     * Set palabrasclavs
     *
     * @param string $palabrasclavs
     * @return Trabgrado
     */
    public function setPalabrasclavs($palabrasclavs)
    {
        $this->palabrasclavs = $palabrasclavs;

        return $this;
    }

    /**
     * Get palabrasclavs
     *
     * @return string 
     */
    public function getPalabrasclavs()
    {
        return $this->palabrasclavs;
    }

    /**
     * Set tipotg
     *
     * @param string $tipotg
     * @return Trabgrado
     */
    public function setTipotg($tipotg)
    {
        $this->tipotg = $tipotg;

        return $this;
    }

    /**
     * Get tipotg
     *
     * @return string 
     */
    public function getTipotg()
    {
        return $this->tipotg;
    }

    /**
     * Set idtg
     *
     * @param \Acme\DemoBundle\Entity\Archivostg $idtg
     * @return Trabgrado
     */
    public function setIdtg(\Acme\DemoBundle\Entity\Archivostg $idtg)
    {
        $this->idtg = $idtg;

        return $this;
    }

    /**
     * Get idtg
     *
     * @return \Acme\DemoBundle\Entity\Archivostg 
     */
    public function getIdtg()
    {
        return $this->idtg;
    }

    /**
     * Set clasificaciontg
     *
     * @param \Acme\DemoBundle\Entity\Clasificaciontg $clasificaciontg
     * @return Trabgrado
     */
    public function setClasificaciontg(\Acme\DemoBundle\Entity\Clasificaciontg $clasificaciontg = null)
    {
        $this->clasificaciontg = $clasificaciontg;

        return $this;
    }

    /**
     * Get clasificaciontg
     *
     * @return \Acme\DemoBundle\Entity\Clasificaciontg 
     */
    public function getClasificaciontg()
    {
        return $this->clasificaciontg;
    }

    /**
     * Set programa
     *
     * @param \Acme\DemoBundle\Entity\Programa $programa
     * @return Trabgrado
     */
    public function setPrograma(\Acme\DemoBundle\Entity\Programa $programa = null)
    {
        $this->programa = $programa;

        return $this;
    }

    /**
     * Get programa
     *
     * @return \Acme\DemoBundle\Entity\Programa 
     */
    public function getPrograma()
    {
        return $this->programa;
    }

    /**
     * Add idasesor
     *
     * @param \Acme\DemoBundle\Entity\Personas $idasesor
     * @return Trabgrado
     */
    public function addIdasesor(\Acme\DemoBundle\Entity\Personas $idasesor)
    {
        $this->idasesor[] = $idasesor;

        return $this;
    }

    /**
     * Remove idasesor
     *
     * @param \Acme\DemoBundle\Entity\Personas $idasesor
     */
    public function removeIdasesor(\Acme\DemoBundle\Entity\Personas $idasesor)
    {
        $this->idasesor->removeElement($idasesor);
    }

    /**
     * Get idasesor
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdasesor()
    {
        return $this->idasesor;
    }

    /**
     * Add idautor
     *
     * @param \Acme\DemoBundle\Entity\Personas $idautor
     * @return Trabgrado
     */
    public function addIdautor(\Acme\DemoBundle\Entity\Personas $idautor)
    {
        $this->idautor[] = $idautor;

        return $this;
    }

    /**
     * Remove idautor
     *
     * @param \Acme\DemoBundle\Entity\Personas $idautor
     */
    public function removeIdautor(\Acme\DemoBundle\Entity\Personas $idautor)
    {
        $this->idautor->removeElement($idautor);
    }

    /**
     * Get idautor
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdautor()
    {
        return $this->idautor;
    }
}
