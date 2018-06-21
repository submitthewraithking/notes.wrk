<?php
namespace models;

class BaseModel
{
    static public $DATABASE;
    static public  $DB_initialised = false;

    public function __construct()
    {
        if (!BaseModel::$DB_initialised)
        {
            BaseModel::$DATABASE = new Database();
            $this::$DB_initialised = true;
        }
    }
}