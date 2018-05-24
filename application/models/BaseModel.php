<?php
namespace models;

class BaseModel
{
    public $DATABASE;

    public function __construct()
    {
        $this->DATABASE = new Database();
    }
}