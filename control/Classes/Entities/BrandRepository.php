<?php

namespace Classes\Entities;

class BrandRepository extends AbstractRepository
{
    public function getBrands()
    {
        $sql = 'SELECT
                  AI_BRAND AS id,
                  NM_BRAND AS brandName
                FROM brands
                WHERE FL_DELETED = 0
                ORDER BY NM_BRAND;';

        return $this->hydrate($this->fetchAll($sql));
    }

    private function hydrate($rows)
    {
        $result = [];
        foreach ($rows as $row) {
            $brand = new Brand();
            $brand->setId($row['id']);
            $brand->setBrandName($row['brandName']);

            $result[] = $brand;
        }

        return $result;
    }
}
