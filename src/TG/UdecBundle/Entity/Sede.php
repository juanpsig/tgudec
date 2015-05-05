<?php

namespace TG\UdecBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sede
 *
 * @ORM\Table(name="sede")
 * @ORM\Entity
 */
class Sede
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idsede", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idsede;

    /**
     * @var string
     *
     * @ORM\Column(name="nomSede", type="string", length=70, nullable=false)
     */
    private $nomsede;

    /**
     * @var string
     *
     * @ORM\Column(name="tiposed", type="string", length=27, nullable=false)
     */
    private $tiposed;

    /**
     * @var string
     *
     * @ORM\Column(name="munici", type="string", length=27, nullable=false)
     */
    private $munici;

    /**
     * @var string
     *
     * @ORM\Column(name="dept", type="string", length=50, nullable=true)
     */
    private $dept;



    /**
     * Get idsede
     *
     * @return integer 
     */
    public function getIdsede()
    {
        return $this->idsede;
    }

    /**
     * Set nomsede
     *
     * @param string $nomsede
     * @return Sede
     */
    public function setNomsede($nomsede)
    {
        $this->nomsede = $nomsede;

        return $this;
    }

    /**
     * Get nomsede
     *
     * @return string 
     */
    public function getNomsede()
    {
        return $this->nomsede;
    }

    /**
     * Set tiposed
     *
     * @param string $tiposed
     * @return Sede
     */
    public function setTiposed($tiposed)
    {
        $this->tiposed = $tiposed;

        return $this;
    }

    /**
     * Get tiposed
     *
     * @return string 
     */
    public function getTiposed()
    {
        return $this->tiposed;
    }

    /**
     * Set munici
     *
     * @param string $munici
     * @return Sede
     */
    public function setMunici($munici)
    {
        $this->munici = $munici;

        return $this;
    }

    /**
     * Get munici
     *
     * @return string 
     */
    public function getMunici()
    {
        return $this->munici;
    }

    /**
     * Set dept
     *
     * @param string $dept
     * @return Sede
     */
    public function setDept($dept)
    {
        $this->dept = $dept;

        return $this;
    }

    /**
     * Get dept
     *
     * @return string 
     */
    public function getDept()
    {
        return $this->dept;
    }
}
