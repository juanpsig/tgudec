<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 */
class User
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $usuario;

    /**
     * @var string
     */
    private $contrase¤a;


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
     * Set usuario
     *
     * @param string $usuario
     * @return User
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return string 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set contrase¤a
     *
     * @param string $contrase¤a
     * @return User
     */
    public function setContrase¤a($contrase¤a)
    {
        $this->contrase¤a = $contrase¤a;

        return $this;
    }

    /**
     * Get contrase¤a
     *
     * @return string 
     */
    public function getContrase¤a()
    {
        return $this->contrase¤a;
    }
}
