<?php

namespace AuPenDuick\Model;


class CompanyPicture
{
    public $id;
    public $name;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return CompanyPicture
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return CompanyPicture
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}