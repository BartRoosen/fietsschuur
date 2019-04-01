<?php

namespace Classes\Entities;

use Classes\Config\DBConfig;
use PDO;

/**
 * Class AbstractRepository
 *
 * @package Classes\Entities
 */
class AbstractRepository
{
    const TABLE_TYPES      = 'bike_types';
    const TABLE_BRANDS     = 'brands';
    const TABLE_SIZE_FRAME = 'size_frame';
    const TABLE_SIZE_WHEEL = 'size_wheel';
    const TABLE_BIKES      = 'bikes';

    private $validTables = [
        self::TABLE_TYPES      => 'AI_TYPE',
        self::TABLE_BRANDS     => 'AI_BRAND',
        self::TABLE_SIZE_FRAME => 'AI_SIZE_FRAME',
        self::TABLE_SIZE_WHEEL => 'AI_SIZE_WHEEL',
        self::TABLE_BIKES      => 'AI_BIKE',
    ];

    /**
     * @var PDO
     */
    protected $dbh = null;

    /**
     * @var string
     */
    protected $sql;

    /**
     * @var array
     */
    protected $result;

    /**
     * open the connection to the database
     */
    private function connect()
    {
        $this->dbh = new PDO(DBConfig::$DB_CONNECTIONSTRING, DBConfig::$DB_USER, DBConfig::$DB_PASSWORD);
    }

    /**
     *
     */
    private function disconnect()
    {
        $this->dbh = null;
    }

    /**
     * @param       $sql
     * @param array $binds |null
     *
     * @return array
     */
    public function fetchAll($sql, array $binds = null)
    {
        $this->sql = $sql;
        $this->connect();
        $stmt = $this->dbh->prepare($this->sql);
        $stmt->execute($binds);
        $this->result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->disconnect();

        return $this->result;
    }

    /**
     * @param            $sql
     * @param array|null $binds
     */
    public function executeQuery($sql, array $binds = null)
    {
        $this->sql = $sql;
        $this->connect();
        $stmt = $this->dbh->prepare($this->sql);
        $stmt->execute($binds);
        $this->disconnect();
    }

    /**
     * @param $table
     * @param $id
     */
    public function delete($table, $id)
    {
        $format = 'UPDATE %s SET FL_DELETED = 1 WHERE %s = %s;';

        if (array_key_exists($table, $this->validTables) && null !== $id) {
            $this->executeQuery(sprintf($format, $table, $this->validTables[$table], $id));
        }
    }
}
