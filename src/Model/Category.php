<?php

namespace AuPenDuick\Model;


class Category
{
    private $id;
    private $name;
    private $type_id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Category
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
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getTypeId()
    {
        return $this->type_id;
    }

    /**
     * @param mixed $type_id
     * @return Category
     */
    public function setTypeId($type_id)
    {
        $this->id = $type_id;

        return $this;
    }
}