<?php

namespace AuPenDuick\Model;

class CompanyText
{
    public $id;
    public $header;
    public $subHeader;
    public $event;
    public $aboutUs;
    public $telephone;
    public $mail;

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
    public function getSubHeader()
    {
        return $this->subHeader;
    }

    /**
     * @param mixed $subHeader
     * @return CompanyText
     */
    public function setSubHeader($subHeader)
    {
        $this->subHeader = $subHeader;
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

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     * @return CompanyText
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
        return $this;
    }
}

