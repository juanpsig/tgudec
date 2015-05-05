<?php

namespace TG\UdecBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Personas
 *
 * @ORM\Table(name="personas")
 * @ORM\Entity
 */
class Personas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idper", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idper;

    /**
     * @var string
     *
     * @ORM\Column(name="PrimerNom", type="string", length=25, nullable=false)
     */
    private $primernom;

    /**
     * @var string
     *
     * @ORM\Column(name="SegunNom", type="string", length=25, nullable=true)
     */
    private $segunnom;

    /**
     * @var string
     *
     * @ORM\Column(name="PrimerApell", type="string", length=25, nullable=false)
     */
    private $primerapell;

    /**
     * @var string
     *
     * @ORM\Column(name="SegunApell", type="string", length=25, nullable=true)
     */
    private $segunapell;

    /**
     * @var string
     *
     * @ORM\Column(name="cod", type="string", length=27, nullable=true)
     */
    private $cod;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="telc", type="string", length=10, nullable=true)
     */
    private $telc;

    /**
     * @var string
     *
     * @ORM\Column(name="celu", type="string", length=12, nullable=true)
     */
    private $celu;

    /**
     * @var string
     *
     * @ORM\Column(name="tipodoc", type="string", length=2, nullable=true)
     */
    private $tipodoc;

    /**
     * @var string
     *
     * @ORM\Column(name="numDoc", type="string", length=10, nullable=true)
     */
    private $numdoc;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Trabgrado", mappedBy="idasesor")
     */
    private $idasesortg;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Trabgrado", mappedBy="idautor")
     */
    private $idtgautor;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idasesortg = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idtgautor = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idper
     *
     * @return integer 
     */
    public function getIdper()
    {
        return $this->idper;
    }

    /**
     * Set primernom
     *
     * @param string $primernom
     * @return Personas
     */
    public function setPrimernom($primernom)
    {
        $this->primernom = $primernom;

        return $this;
    }

    /**
     * Get primernom
     *
     * @return string 
     */
    public function getPrimernom()
    {
        return $this->primernom;
    }

    /**
     * Set segunnom
     *
     * @param string $segunnom
     * @return Personas
     */
    public function setSegunnom($segunnom)
    {
        $this->segunnom = $segunnom;

        return $this;
    }

    /**
     * Get segunnom
     *
     * @return string 
     */
    public function getSegunnom()
    {
        return $this->segunnom;
    }

    /**
     * Set primerapell
     *
     * @param string $primerapell
     * @return Personas
     */
    public function setPrimerapell($primerapell)
    {
        $this->primerapell = $primerapell;

        return $this;
    }

    /**
     * Get primerapell
     *
     * @return string 
     */
    public function getPrimerapell()
    {
        return $this->primerapell;
    }

    /**
     * Set segunapell
     *
     * @param string $segunapell
     * @return Personas
     */
    public function setSegunapell($segunapell)
    {
        $this->segunapell = $segunapell;

        return $this;
    }

    /**
     * Get segunapell
     *
     * @return string 
     */
    public function getSegunapell()
    {
        return $this->segunapell;
    }

    /**
     * Set cod
     *
     * @param string $cod
     * @return Personas
     */
    public function setCod($cod)
    {
        $this->cod = $cod;

        return $this;
    }

    /**
     * Get cod
     *
     * @return string 
     */
    public function getCod()
    {
        return $this->cod;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Personas
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telc
     *
     * @param string $telc
     * @return Personas
     */
    public function setTelc($telc)
    {
        $this->telc = $telc;

        return $this;
    }

    /**
     * Get telc
     *
     * @return string 
     */
    public function getTelc()
    {
        return $this->telc;
    }

    /**
     * Set celu
     *
     * @param string $celu
     * @return Personas
     */
    public function setCelu($celu)
    {
        $this->celu = $celu;

        return $this;
    }

    /**
     * Get celu
     *
     * @return string 
     */
    public function getCelu()
    {
        return $this->celu;
    }

    /**
     * Set tipodoc
     *
     * @param string $tipodoc
     * @return Personas
     */
    public function setTipodoc($tipodoc)
    {
        $this->tipodoc = $tipodoc;

        return $this;
    }

    /**
     * Get tipodoc
     *
     * @return string 
     */
    public function getTipodoc()
    {
        return $this->tipodoc;
    }

    /**
     * Set numdoc
     *
     * @param string $numdoc
     * @return Personas
     */
    public function setNumdoc($numdoc)
    {
        $this->numdoc = $numdoc;

        return $this;
    }

    /**
     * Get numdoc
     *
     * @return string 
     */
    public function getNumdoc()
    {
        return $this->numdoc;
    }

    /**
     * Add idasesortg
     *
     * @param \Acme\DemoBundle\Entity\Trabgrado $idasesortg
     * @return Personas
     */
    public function addIdasesortg(\Acme\DemoBundle\Entity\Trabgrado $idasesortg)
    {
        $this->idasesortg[] = $idasesortg;

        return $this;
    }

    /**
     * Remove idasesortg
     *
     * @param \Acme\DemoBundle\Entity\Trabgrado $idasesortg
     */
    public function removeIdasesortg(\Acme\DemoBundle\Entity\Trabgrado $idasesortg)
    {
        $this->idasesortg->removeElement($idasesortg);
    }

    /**
     * Get idasesortg
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdasesortg()
    {
        return $this->idasesortg;
    }

    /**
     * Add idtgautor
     *
     * @param \Acme\DemoBundle\Entity\Trabgrado $idtgautor
     * @return Personas
     */
    public function addIdtgautor(\Acme\DemoBundle\Entity\Trabgrado $idtgautor)
    {
        $this->idtgautor[] = $idtgautor;

        return $this;
    }

    /**
     * Remove idtgautor
     *
     * @param \Acme\DemoBundle\Entity\Trabgrado $idtgautor
     */
    public function removeIdtgautor(\Acme\DemoBundle\Entity\Trabgrado $idtgautor)
    {
        $this->idtgautor->removeElement($idtgautor);
    }

    /**
     * Get idtgautor
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdtgautor()
    {
        return $this->idtgautor;
    }
}
