<?php

namespace Classes\Entities;

/**
 * Class BikeRepository
 *
 * @package Classes\Entities
 */
class BikeRepository extends AbstractRepository
{
    /**
     * @param int|null $gender
     *
     * @return array
     */
    public function getBikes($gender = null)
    {
        $sql = 'SELECT
                  B.AI_BIKE AS bikeId,
                  B.QY_PRICE AS price,
                  B.FL_SOLD AS sold,
                  B.DT_SOLD AS sellDate,
                  BG.CD_GENDER AS gender,
                  B.AI_GENDER as genderId,
                  BT.CD_TYPE AS bikeType,
                  B.AI_TYPE AS typeId,
                  BR.NM_BRAND AS brand,
                  B.AI_BRAND AS brandId,
                  SF.CD_SIZE_FRAME AS frameSize,
                  B.AI_SIZE_FRAME AS frameSizeId,
                  SW.CD_SIZE_WHEEL AS wheelSize,
                  B.AI_SIZE_WHEEL AS wheelSizeId,
                  P.UL_PICTURE AS pictureLink,
                  B.FL_DISPLAY AS displayed,
                  EI.CD_INFO AS info,
                  EI.AI_INFO AS infoid
                FROM bikes B
                  LEFT JOIN bike_gender BG ON (B.AI_GENDER = BG.AI_GENDER)
                  LEFT JOIN bike_types BT ON (B.AI_TYPE = BT.AI_TYPE)
                  LEFT JOIN size_frame SF ON (B.AI_SIZE_FRAME = SF.AI_SIZE_FRAME)
                  LEFT JOIN size_wheel SW ON (B.AI_SIZE_WHEEL = SW.AI_SIZE_WHEEL)
                  LEFT JOIN pictures P ON (B.AI_BIKE = P.AI_BIKE AND P.FL_COVER = 1)
                  LEFT JOIN brands BR ON (BR.AI_BRAND = B.AI_BRAND)
                  LEFT JOIN extra_info EI ON (EI.AI_BIKE = B.AI_BIKE AND EI.FL_DELETED = 0)
                WHERE B.FL_DELETED = 0';

        if ($gender !== null) {
            $filter = sprintf(' AND B.AI_GENDER = %s', $gender);
            $sql    .= $filter;
        }

        $sql .= ' ORDER BY B.DT_CREATED DESC;';

        $dataRows = $this->fetchAll($sql);

        if (empty($dataRows)) {
            return [];
        }

        return $this->hydrate($dataRows);
    }

    /**
     * @param array $dataRows
     *
     * @return array
     */
    private function hydrate(array $dataRows)
    {
        $bikes = [];
        foreach ($dataRows as $row) {
            $id   = (int) $row['bikeId'];
            $bike = new Bike();
            $bike->setId($id);
            $bike->setPrice($row['price']);
            $bike->setSold($row['sold']);
            $bike->setSellDate($row['sellDate']);
            $bike->setGender($row['gender']);
            $bike->setType($row['bikeType']);
            $bike->setSizeFrame($row['frameSize']);
            $bike->setSizeWheel($row['wheelSize']);
            $bike->setPictureLink($row['pictureLink']);
            $bike->setGenderId($row['genderId']);
            $bike->setTypeId($row['typeId']);
            $bike->setSizeFrameId($row['frameSizeId']);
            $bike->setSizeWheelId($row['wheelSizeId']);
            $bike->setBrandId($row['brandId']);
            $bike->setBrand($row['brand']);
            $bike->setDisplay($row['displayed']);
            $bike->setExtraInfo($row['info']);
            $bike->setExtraInfoId($row['infoid']);

            $bikes[$id] = $bike;
        }

        return $bikes;
    }

    public function insert(Bike $bike)
    {
        $sql = 'INSERT INTO bikes (AI_BIKE, QY_PRICE, FL_SOLD, DT_SOLD, AI_GENDER, AI_TYPE, AI_BRAND, AI_SIZE_WHEEL, AI_SIZE_FRAME)
                VALUES
                  (:AI_BIKE, :QY_PRICE, :FL_SOLD, :DT_SOLD, :AI_GENDER, :AI_TYPE, :AI_BRAND, :AI_SIZE_WHEEL, :AI_SIZE_FRAME)
                ON DUPLICATE KEY UPDATE
                  AI_BIKE        = VALUES(AI_BIKE),
                  QY_PRICE       = VALUES(QY_PRICE),
                  FL_SOLD        = VALUES(FL_SOLD),
                  DT_SOLD        = VALUES(DT_SOLD),
                  AI_GENDER      = VALUES(AI_GENDER),
                  AI_TYPE        = VALUES(AI_TYPE),
                  AI_BRAND       = VALUES(AI_BRAND),
                  AI_SIZE_WHEEL  = VALUES(AI_SIZE_WHEEL),
                  AI_SIZE_FRAME  = VALUES(AI_SIZE_FRAME),
                  DT_MODIFIED    = NOW()';

        $binds = [
            'AI_BIKE'       => $bike->getId(),
            'QY_PRICE'      => $bike->getPrice(),
            'FL_SOLD'       => $bike->isSold(),
            'DT_SOLD'       => '' === $bike->getSellDate() ? null : $bike->getSellDate(),
            'AI_GENDER'     => $bike->getGenderId(),
            'AI_TYPE'       => $bike->getTypeId(),
            'AI_BRAND'      => $bike->getBrandId(),
            'AI_SIZE_WHEEL' => $bike->getSizeWheelId(),
            'AI_SIZE_FRAME' => $bike->getSizeFrameId(),
        ];

        $this->executeQuery($sql, $binds);
    }

    /**
     * @param $id
     * @param $isVisible
     */
    public function changeVisibility($id, $isVisible)
    {
        $sql   = 'UPDATE bikes SET FL_DISPLAY = :FL_DISPLAY WHERE AI_BIKE = :AI_BIKE;';
        $binds = [
            'FL_DISPLAY' => false === $isVisible ? 0 : 1,
            'AI_BIKE'    => $id,
        ];

        $this->executeQuery($sql, $binds);
    }
}
