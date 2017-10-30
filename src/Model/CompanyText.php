<?php

namespace AuPenDuick\Model;

class CompanyText
{
    public $id;
    public $header;
    public $header2;
    public $event;
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
     * @return CompanyText
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
     * @return CompanyText
     */
    public function setHeader($header)
    {
        $this->header = $header;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHeader2()
    {
        return $this->header2;
    }

    /**
     * @param mixed $header_2
     * @return CompanyText
     */
    public function setHeader2($header2)
    {
        $this->header2 = $header2;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param mixed $event
     * @return CompanyText
     */
    public function setEvent($event)
    {
        $this->event = $event;
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
     * @return CompanyText
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
     * @return CompanyText
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
        return $this;
    }
}

