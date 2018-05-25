<?php
namespace models;

class BaseModel
{
    protected $DATABASE;
    static public  $DB_count;
    private $i = 0;

    public function __construct()
    {
        if (BaseModel::$DB_count !=0)
        {
            exit ("Critical error with number of Database objects!");
        }else
        {
            $this->DATABASE = new Database();
            $this::$DB_count = (++$this->i);
           // echo "number of 'Database' objects: " . $this::$DB_count . "<br>";
        }
    }
}