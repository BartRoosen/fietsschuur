<?php

namespace Classes\Entities;

class ExtraInfo
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $bikeId;

    /**
     * @var string
     */
    private $info;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param string $info
     */
    public function setInfo($info)
    {
        $this->info = $info;
    }

    /**
     * @return int
     */
    public function getBikeId()
    {
        return $this->bikeId;
    }

    /**
     * @param int $bikeId
     */
    public function setBikeId($bikeId)
    {
        $this->bikeId = $bikeId;
    }
}
