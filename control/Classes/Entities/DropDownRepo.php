<?php

namespace Classes\Entities;


class DropDownRepo extends AbstractRepository
{
    /**
     * @param array $rows
     *
     * @return array
     */
    private function hydrate($rows)
    {
        $result = [];
        foreach ($rows as $row) {
            $result[$row['arrayKey']] = $row['arrayValue'];
        }
        return $result;
    }

    /**
     * @return array
     */
    public function getGenders()
    {
        $sql = 'SELECT
                  AI_GENDER as arrayKey,
                  CD_GENDER as arrayValue
                FROM bike_gender
                WHERE FL_DELETED = 0
                ORDER BY CD_GENDER ASC;';

        return $this->hydrate($this->fetchAll($sql));
    }

    /**
     * @return array
     */
    public function getTypes()
    {
        $sql = 'SELECT
                  AI_TYPE as arrayKey,
                  CD_TYPE as arrayValue
                FROM bike_types
                WHERE FL_DELETED = 0
                ORDER BY CD_TYPE;';

        return $this->hydrate($this->fetchAll($sql));
    }

    /**
     * @return array
     */
    public function getFrameSizes()
    {
        $sql = 'SELECT
                  AI_SIZE_FRAME as arrayKey,
                  CD_SIZE_FRAME as arrayValue
                FROM size_frame
                WHERE FL_DELETED = 0;';

        return $this->hydrate($this->fetchAll($sql));
    }

    /**
     * @return array
     */
    public function getWheelSizes()
    {
        $sql = 'SELECT
                  AI_SIZE_WHEEL as arrayKey,
                  CD_SIZE_WHEEL as arrayValue
                FROM size_wheel
                WHERE FL_DELETED = 0;';

        return $this->hydrate($this->fetchAll($sql));

    }

    /**
     * @return array
     */
    public function getBrands()
    {
        $sql = 'SELECT
                  AI_BRAND AS arrayKey,
                  NM_BRAND AS arrayValue
                FROM brands
                WHERE FL_DELETED = 0
                ORDER BY NM_BRAND;';

        return $this->hydrate($this->fetchAll($sql));
    }
}
