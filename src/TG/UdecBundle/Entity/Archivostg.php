<?php

namespace TG\UdecBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Archivostg
 *
 * @ORM\Table(name="archivostg")
 * @ORM\Entity
 */
class Archivostg
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IdArchiv", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idarchiv;

    /**
     * @var string
     *
     * @ORM\Column(name="Resumen", type="string", length=250, nullable=true)
     */
    private $resumen;

    /**
     * @var string
     *
     * @ORM\Column(name="Abstrc", type="string", length=250, nullable=true)
     */
    private $abstrc;

    /**
     * @var string
     *
     * @ORM\Column(name="Articulo", type="string", length=250, nullable=true)
     */
    private $articulo;

    /**
     * @var string
     *
     * @ORM\Column(name="Doc", type="string", length=250, nullable=false)
     */
    private $doc;

    /**
     * @var string
     *
     * @ORM\Column(name="ManualTecn", type="string", length=250, nullable=true)
     */
    private $manualtecn;

    /**
     * @var string
     *
     * @ORM\Column(name="ManualUsr", type="string", length=250, nullable=true)
     */
    private $manualusr;

    /**
     * @var string
     *
     * @ORM\Column(name="CodigoSW", type="string", length=250, nullable=true)
     */
    private $codigosw;

    /**
     * @var string
     *
     * @ORM\Column(name="Software", type="string", length=250, nullable=true)
     */
    private $software;



    /**
     * Get idarchiv
     *
     * @return integer 
     */
    public function getIdarchiv()
    {
        return $this->idarchiv;
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
     * Set manualtecn
     *
     * @param string $manualtecn
     * @return Archivostg
     */
    public function setManualtecn($manualtecn)
    {
        $this->manualtecn = $manualtecn;

        return $this;
    }

    /**
     * Get manualtecn
     *
     * @return string 
     */
    public function getManualtecn()
    {
        return $this->manualtecn;
    }

    /**
     * Set manualusr
     *
     * @param string $manualusr
     * @return Archivostg
     */
    public function setManualusr($manualusr)
    {
        $this->manualusr = $manualusr;

        return $this;
    }

    /**
     * Get manualusr
     *
     * @return string 
     */
    public function getManualusr()
    {
        return $this->manualusr;
    }

    /**
     * Set codigosw
     *
     * @param string $codigosw
     * @return Archivostg
     */
    public function setCodigosw($codigosw)
    {
        $this->codigosw = $codigosw;

        return $this;
    }

    /**
     * Get codigosw
     *
     * @return string 
     */
    public function getCodigosw()
    {
        return $this->codigosw;
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
}
