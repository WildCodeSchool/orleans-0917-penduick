<?php
/**
 * Created by PhpStorm.
 * User: wilder11
 * Date: 07/11/17
 * Time: 09:47
 */

namespace AuPenDuick\Model;


class Extra
{
    public $id;
    public $title;
    public $price;
    public $type_id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Extra
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Extra
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     * @return Extra
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTypeId()
    {
        return $this->type_id;
    }

    /**
     * @param mixed $type_id
     * @return Extra
     */
    public function setTypeId($type_id)
    {
        $this->type_id = $type_id;
        return $this;
    }
}
