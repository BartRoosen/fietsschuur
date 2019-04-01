<?php

namespace Classes\Entities;

class FrameSizeRepository extends AbstractRepository
{
    public function getFrameSizes()
    {
        $sql = 'SELECT
                  AI_SIZE_FRAME AS id,
                  CD_SIZE_FRAME AS size
                FROM size_frame
                WHERE FL_DELETED = 0
                ORDER BY CD_SIZE_FRAME;';

        return $this->hydrate($this->fetchAll($sql));
    }

    private function hydrate($rows)
    {
        $result = [];
        foreach ($rows as $row) {
            $size = new FrameSize();
            $size->setId($row['id']);
            $size->setSize($row['size']);

            $result[] = $size;
        }

        return $result;
    }
}
