<?php

namespace Classes\Services;

use Classes\Config\Tables;
use Classes\Entities\AbstractRepository;
use Classes\Entities\Bike;
use Classes\Entities\BikeRepository;
use Classes\Entities\ExtraInfo;
use Classes\Entities\ExtraInfoRepository;
use Classes\Entities\Type;
use Classes\Entities\TypeRepository;

class FormSubmitter
{
    public function addBike(array $post)
    {
        $bikeRepo = new BikeRepository();
        $bike     = new Bike();

        if (isset($post['id'])) {
            $bike->setId($post['id']);
        }

        '' === $post['price'] ? $bike->setPrice(0.00) : $bike->setPrice($post['price']);
        $post['sold'] = '' === $post['sellDate'] ? 0 : 1;
        '' === $post['sellDate'] ? $bike->setSellDate(null) : $bike->setSellDate($post['sellDate']);
        $bike->setSold($post['sold']);
        '' === $post['gender'] ? $bike->setGenderId(null) : $bike->setGenderId($post['gender']);
        '' === $post['type'] ? $bike->setTypeId(null) :  $bike->setTypeId($post['type']);
        '' === $post['frameSize'] ? $bike->setSizeFrameId(null) : $bike->setSizeFrameId($post['frameSize']);
        '' === $post['wheelSize'] ? $bike->setSizeWheelId(null) : $bike->setSizeWheelId($post['wheelSize']);
        '' === $post['brand'] ? $bike->setBrandId(null) : $bike->setBrandId($post['brand']);

        $bikeRepo->insert($bike);
    }

    /**
     * @param $post
     */
    public function addType($post)
    {
        $typeRepo = new TypeRepository();

        if (isset($post['type'])) {
            $type = new Type();
            $type->setTypeName($post['type']);

            $typeRepo->insert($type);
        }
    }

    /**
     * @param $id
     * @param $visibility
     */
    public function toggleVisibility($id, $visibility)
    {
        $bikeRepo  = new BikeRepository();
        $isVisible = !$visibility;
        $bikeRepo->changeVisibility($id, $isVisible);
    }

    public function addSettings($post)
    {
        $tables = new Tables();
        $table  = $column = $value = '';
        $format = 'INSERT INTO %s (%s) VALUES (\'%s\');';

        if (isset($post['table'], $post['value']) && array_key_exists($post['table'], $tables::TABLES)) {
            $table = $post['table'];
            $value = $post['value'];
        }

        if (isset($tables::TABLES[$table])) {
            $column = $tables::TABLES[$table];
        }
//        $table = $post['table']
//
//        switch ($post['table']) {
//            case $tables::TABLE_BRANDS:
//                $table  = $tables::TABLE_BRANDS;
//                $column = $tables::TABLES[$tables::TABLE_BRANDS];
//                $value  = $post['value'];
//                break;
//            case $tables::TABLE_SIZE_FRAME:
//                break;
//            case $tables::TABLE_SIZE_WHEEL:
//                break;
//        }

        if ('' !== $table && '' !== $column && '' !== $value) {
            $sql  = sprintf($format, $table, $column, $value);
            $repo = new AbstractRepository();
            $repo->executeQuery($sql);
        }
    }

    public function addExtraInfo($post)
    {
        $info     = new ExtraInfo();
        $infoRepo = new ExtraInfoRepository();

        if ('' !== $post['info_id']) {
            $info->setId($post['info_id']);
        }

        $info->setBikeId($post['bike_id']);
        $info->setInfo($post['info']);

        $infoRepo->insert($info);
    }
}