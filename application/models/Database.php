<?php
namespace models;

class Database
{
    public $link;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $config = require_once __DIR__ . '/../../config.php';
        $dsn = 'mysql:host='.$config['host'].';dbname='.$config['db_name'].';charset='.$config['charset'];
        $this->link = new \PDO($dsn, $config['username'], $config['password']);
        return $this;
    }

    public function execute($sql)
    {
        $id_inquiry = $this->link->prepare($sql);
        return $id_inquiry->execute();
    }

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

