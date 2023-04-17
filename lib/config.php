<?php

/* configuracion de la base de datos */

require_once $_SERVER['DOCUMENT_ROOT'].'/lib/activerecord/ActiveRecord.php';
 
 ActiveRecord\Config::initialize(function($cfg)
 {
     $cfg->set_model_directory('../modelo/entidades');
     $cfg->set_connections(array(
         'development' => 'mysql://root:@localhost/dbactividad'));
 });
