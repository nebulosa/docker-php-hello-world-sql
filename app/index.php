<?php 
require __DIR__ . '/vendor/autoload.php';

$db_eng = getenv('DB_ENG');
$db_host = getenv('DB_HOST');
$db_name = getenv('DB_NAME');
$db_user = getenv('DB_USER');
$db_pass = getenv('DB_PASS');
\RedBeanPHP\R::setup( "$db_eng:host=$db_host;dbname=$db_name", $db_user, $db_pass);
?>
