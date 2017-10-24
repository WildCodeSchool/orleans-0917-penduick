<?php

namespace AuPenDuick\Model;

class Compagny
{
    public $id;
    public $header;
    public $aboutUs;
    public $telephone;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Compagny
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @param mixed $header
     * @return Compagny
     */
    public function setHeader($header)
    {
        $this->header = $header;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAboutUs()
    {
        return $this->aboutUs;
    }

    /**
     * @param mixed $aboutUs
     * @return Compagny
     */
    public function setAboutUs($aboutUs)
    {
        $this->aboutUs = $aboutUs;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     * @return Compagny
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
        return $this;
    }
}

