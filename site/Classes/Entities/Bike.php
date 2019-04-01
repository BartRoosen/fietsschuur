<?php

namespace Classes\Entities;

class Bike
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var float
     */
    private $price;

    /**
     * @var bool
     */
    private $sold;

    /**
     * @var \DateTime
     */
    private $sellDate;

    /**
     * @var string
     */
    private $gender;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $sizeWheel;

    /**
     * @var string
     */
    private $sizeFrame;

    /**
     * @var string
     */
    private $pictureLink;

    /**
     * @var \DateTime
     */
    private $createDate;

    /**
     * @var string
     */
    private $brandName;

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
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return bool
     */
    public function isSold()
    {
        return $this->sold;
    }

    /**
     * @param bool $sold
     */
    public function setSold($sold)
    {
        $this->sold = $sold;
    }

    /**
     * @return \DateTime
     */
    public function getSellDate()
    {
        return $this->sellDate;
    }

    /**
     * @param \DateTime $sellDate
     */
    public function setSellDate($sellDate)
    {
        $this->sellDate = $sellDate;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getSizeWheel()
    {
        return $this->sizeWheel;
    }

    /**
     * @param string $sizeWheel
     */
    public function setSizeWheel($sizeWheel)
    {
        $this->sizeWheel = $sizeWheel;
    }

    /**
     * @return string
     */
    public function getSizeFrame()
    {
        return $this->sizeFrame;
    }

    /**
     * @param string $sizeFrame
     */
    public function setSizeFrame($sizeFrame)
    {
        $this->sizeFrame = $sizeFrame;
    }

    /**
     * @return string
     */
    public function getPictureLink()
    {
        return $this->pictureLink;
    }

    /**
     * @param string $pictureLink
     */
    public function setPictureLink($pictureLink)
    {
        $this->pictureLink = $pictureLink;
    }

    /**
     * @return \DateTime
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * @param \DateTime $createDate
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
    }

    /**
     * @return string
     */
    public function getBrandName()
    {
        return $this->brandName;
    }

    /**
     * @param string $brandName
     */
    public function setBrandName($brandName)
    {
        $this->brandName = $brandName;
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
        $infoArray  = explode("\n", $info);
        $this->info = implode('<br>', $infoArray);
    }
}
