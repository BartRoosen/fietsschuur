<?php

namespace Classes\Entities;

class TypeRepository extends AbstractRepository
{
    /**
     * @return array
     */
    public function getTypes()
    {
        $sql = 'SELECT
                  AI_TYPE AS id,
                  CD_TYPE AS typeName
                FROM bike_types
                WHERE FL_DELETED = 0
                ORDER BY CD_TYPE;';

        return $this->hydrate($this->fetchAll($sql));
    }

    /**
     * @param $rows
     *
     * @return array
     */
    private function hydrate($rows)
    {
        $result = [];

        foreach ($rows as $row) {
            $type = new Type();
            $type->setId($row['id']);
            $type->setTypeName($row['typeName']);

            $result[] = $type;
        }

        return $result;
    }

    /**
     * @param Type $type
     */
    public function insert(Type $type)
    {
        $sql   = 'INSERT INTO bike_types (CD_TYPE) VALUES (:CD_TYPE)';
        $binds = [
            'CD_TYPE' => $type->getTypeName(),
        ];

        $this->executeQuery($sql, $binds);
    }
}
