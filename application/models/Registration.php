<?php
namespace models;


class Registration
{
  public $ErrMess;
  public function __construct()
  {
     require_once __DIR__ .'/../views/Registration.php';
     print_r($this->ErrMess);

  }

  public function setErrMess($ErrMessValue)
  {
     $this->ErrMess = $ErrMessValue;
  }
}
?>вывести ЭРРМЕСС!!!!

