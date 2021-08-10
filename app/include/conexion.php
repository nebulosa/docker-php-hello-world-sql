<?php

include_once(realpath(dirname(__FILE__)."/../")."/config/config_conexion.php");
include_once(realpath(dirname(__FILE__)."/../")."/clases/Sql.php");
include_once(realpath(dirname(__FILE__)."/../")."/clases/Qr.php");
include_once(realpath(dirname(__FILE__)."/../")."/clases/Libros.php");


$_DB_= new Sql(DBHOST,DBUSER,DBPASSWORD,DBDATABASE);

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $url = "https://"; 
  }else{
    $url = "http://"; 
  }
  
  $host = $url. $_SERVER['HTTP_HOST'] .  '/qr';
