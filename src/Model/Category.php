<?php

namespace AuPenDuick\Model;


class Category
{
    private $id;
    private $text;

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
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     * @return Category
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }
}