<?php
namespace models;

class Database
{
    public $link;
    /**
     * Database constructor.
     */
    public function __construct()
    {
        $this->connect();
    }

    /**
     * @return $this
     */
    private function connect()
    {
        $config = require_once __DIR__ . '/../../config.php';
        $dsn = 'mysql:host='.$config['host'].';dbname='.$config['db_name'].';charset='.$config['charset'];
        $this->link = new \PDO($dsn, $config['username'], $config['password']);
        return $this;
    }

    /**
     * @param $sql
     * @return mixed
     */
    public function execute($sql)
    {
        $id_inquiry = $this->link->prepare($sql);
        return $id_inquiry->execute();
    }

    /**
     * @param $sql
     * @return array
     */
    public function query($sql)
    {
        $id_inquiry = $this->link->prepare($sql);
        $id_inquiry->execute();

        $result = $id_inquiry->fetchAll(\PDO::FETCH_ASSOC);
        if ($result === false)
        {
            return array();
        }
        return $result;
    }
}

