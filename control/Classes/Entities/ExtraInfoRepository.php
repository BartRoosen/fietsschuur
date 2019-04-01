<?php

namespace Classes\Entities;

class ExtraInfoRepository extends AbstractRepository
{
    public function insert(ExtraInfo $info)
    {
        $sql = 'INSERT INTO extra_info (AI_INFO, AI_BIKE, CD_INFO, DT_CREATE, DT_MODIFY)
                VALUES
                  (:AI_INFO, :AI_BIKE, :CD_INFO, NOW(), NULL)
                ON DUPLICATE KEY UPDATE
                  AI_INFO   = VALUES(AI_INFO),
                  AI_BIKE   = VALUES(AI_BIKE),
                  CD_INFO   = VALUES(CD_INFO),
                  DT_MODIFY = NOW();';
        $binds = [
            'AI_INFO' => $info->getId(),
            'AI_BIKE' => $info->getBikeId(),
            'CD_INFO' => $info->getInfo(),
        ];

        $this->executeQuery($sql, $binds);
    }
}
