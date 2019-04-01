<?php

namespace Classes\Entities;

class WheelSizeRepository extends AbstractRepository
{
    public function getWheelSizes()
    {
        $sql = 'SELECT
                  AI_SIZE_WHEEL AS id,
                  CD_SIZE_WHEEL AS size
                FROM size_wheel
                WHERE FL_DELETED = 0
                ORDER BY CD_SIZE_WHEEL;';

        return $this->hydrate($this->fetchAll($sql));
    }

    private function hydrate($rows)
    {
        $result = [];
        foreach ($rows as $row) {
            $size = new WheelSize();
            $size->setId($row['id']);
            $size->setSize($row['size']);

            $result[] = $size;
        }

        return $result;
    }
}
