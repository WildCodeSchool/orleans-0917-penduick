<?php

namespace AuPenDuick\Model;

class Type
{
    private $id;
    private $consistency;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Type
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getConsistency()
    {
        return $this->consistency;
    }

    /**
     * @param mixed $consistency
     * @return Type
     */
    public function setConsistency($consistency)
    {
        $this->consistency = $consistency;

        return $this;
    }
}