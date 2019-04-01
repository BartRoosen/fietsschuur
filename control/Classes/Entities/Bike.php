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
     * @var int
     */
    private $genderId;

    /**
     * @var string
     */
    private $type;

    /**
     * @var int
     */
    private $typeId;

    /**
     * @var string
     */
    private $sizeWheel;

    /**
     * @var int
     */
    private $sizeWheelId;

    /**
     * @var string
     */
    private $sizeFrame;

    /**
     * @var int
     */
    private $sizeFrameId;

    /**
     * @var string
     */
    private $pictureLink;

    /**
     * @var string
     */
    private $brand;

    /**
     * @var int
     */
    private $brandId;

    /**
     * @var bool
     */
    private $display;

    /**
     * @var string
     */
    private $extraInfo;

    /**
     * @var int
     */
    private $extraInfoId;

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
     * @return int
     */
    public function getGenderId()
    {
        return $this->genderId;
    }

    /**
     * @param int $genderId
     */
    public function setGenderId($genderId)
    {
        $this->genderId = $genderId;
    }

    /**
     * @return int
     */
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * @param int $typeId
     */
    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;
    }

    /**
     * @return int
     */
    public function getSizeWheelId()
    {
        return $this->sizeWheelId;
    }

    /**
     * @param int $sizeWheelId
     */
    public function setSizeWheelId($sizeWheelId)
    {
        $this->sizeWheelId = $sizeWheelId;
    }

    /**
     * @return int
     */
    public function getSizeFrameId()
    {
        return $this->sizeFrameId;
    }

    /**
     * @param int $sizeFrameId
     */
    public function setSizeFrameId($sizeFrameId)
    {
        $this->sizeFrameId = $sizeFrameId;
    }

    /**
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    /**
     * @return int
     */
    public function getBrandId()
    {
        return $this->brandId;
    }

    /**
     * @param int $brandId
     */
    public function setBrandId($brandId)
    {
        $this->brandId = $brandId;
    }

    /**
     * @return bool
     */
    public function isDisplay()
    {
        return $this->display;
    }

    /**
     * @param bool $display
     */
    public function setDisplay($display)
    {
        $this->display = $display;
    }

    /**
     * @return string
     */
    public function getExtraInfo()
    {
        return $this->extraInfo;
    }

    /**
     * @param string $extraInfo
     */
    public function setExtraInfo($extraInfo)
    {
        $this->extraInfo = $extraInfo;
    }

    /**
     * @return int
     */
    public function getExtraInfoId()
    {
        return $this->extraInfoId;
    }

    /**
     * @param int $extraInfoId
     */
    public function setExtraInfoId($extraInfoId)
    {
        $this->extraInfoId = $extraInfoId;
    }
}
