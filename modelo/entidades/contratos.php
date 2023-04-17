<?php
require_once $_SERVER['DOCUMENT_ROOT']. '/lib/config.php';

Class Contrato extends ActiveRecord\Model{

    public static $belongs_to = array(array("usuario"));


  }


?>