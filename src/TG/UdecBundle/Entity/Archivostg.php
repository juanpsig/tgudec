<?php

namespace TG\UdecBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Archivostg
 *
 * @ORM\Table(name="archivostg", indexes={@ORM\Index(name="FK_archivostg_trabgrado", columns={"id_trabajo"})})
 * @ORM\Entity
 */
class Archivostg
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
     * @ORM\Column(name="resumen", type="string", length=250, nullable=true)
     */
    private $resumen;

    /**
     * @var string
     *
     * @ORM\Column(name="abstrc", type="string", length=250, nullable=true)
     */
    private $abstrc;

    /**
     * @var string
     *
     * @ORM\Column(name="articulo", type="string", length=250, nullable=true)
     */
    private $articulo;

    /**
     * @var string
     *
     * @ORM\Column(name="doc", type="string", length=250, nullable=true)
     */
    private $doc;

    /**
     * @var string
     *
     * @ORM\Column(name="manual_tecn", type="string", length=250, nullable=true)
     */
    private $manualTecn;

    /**
     * @var string
     *
     * @ORM\Column(name="manual_usr", type="string", length=250, nullable=true)
     */
    private $manualUsr;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_sw", type="string", length=250, nullable=true)
     */
    private $codigoSw;

    /**
     * @var string
     *
     * @ORM\Column(name="software", type="string", length=250, nullable=true)
     */
    private $software;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=1, nullable=true)
     */
    private $estado = '1';

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
     * Set resumen
     *
     * @param string $resumen
     * @return Archivostg
     */
    public function setResumen($resumen)
    {
        $this->resumen = $resumen;

        return $this;
    }

    /**
     * Get resumen
     *
     * @return string 
     */
    public function getResumen()
    {
        return $this->resumen;
    }

    /**
     * Set abstrc
     *
     * @param string $abstrc
     * @return Archivostg
     */
    public function setAbstrc($abstrc)
    {
        $this->abstrc = $abstrc;

        return $this;
    }

    /**
     * Get abstrc
     *
     * @return string 
     */
    public function getAbstrc()
    {
        return $this->abstrc;
    }

    /**
     * Set articulo
     *
     * @param string $articulo
     * @return Archivostg
     */
    public function setArticulo($articulo)
    {
        $this->articulo = $articulo;

        return $this;
    }

    /**
     * Get articulo
     *
     * @return string 
     */
    public function getArticulo()
    {
        return $this->articulo;
    }

    /**
     * Set doc
     *
     * @param string $doc
     * @return Archivostg
     */
    public function setDoc($doc)
    {
        $this->doc = $doc;

        return $this;
    }

    /**
     * Get doc
     *
     * @return string 
     */
    public function getDoc()
    {
        return $this->doc;
    }

    /**
     * Set manualTecn
     *
     * @param string $manualTecn
     * @return Archivostg
     */
    public function setManualTecn($manualTecn)
    {
        $this->manualTecn = $manualTecn;

        return $this;
    }

    /**
     * Get manualTecn
     *
     * @return string 
     */
    public function getManualTecn()
    {
        return $this->manualTecn;
    }

    /**
     * Set manualUsr
     *
     * @param string $manualUsr
     * @return Archivostg
     */
    public function setManualUsr($manualUsr)
    {
        $this->manualUsr = $manualUsr;

        return $this;
    }

    /**
     * Get manualUsr
     *
     * @return string 
     */
    public function getManualUsr()
    {
        return $this->manualUsr;
    }

    /**
     * Set codigoSw
     *
     * @param string $codigoSw
     * @return Archivostg
     */
    public function setCodigoSw($codigoSw)
    {
        $this->codigoSw = $codigoSw;

        return $this;
    }

    /**
     * Get codigoSw
     *
     * @return string 
     */
    public function getCodigoSw()
    {
        return $this->codigoSw;
    }

    /**
     * Set software
     *
     * @param string $software
     * @return Archivostg
     */
    public function setSoftware($software)
    {
        $this->software = $software;

        return $this;
    }

    /**
     * Get software
     *
     * @return string 
     */
    public function getSoftware()
    {
        return $this->software;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Archivostg
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
     * Set idTrabajo
     *
     * @param \TG\UdecBundle\Entity\Trabgrado $idTrabajo
     * @return Archivostg
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
    
    public function __toString(){
        return $this->getDoc();
    }
}
