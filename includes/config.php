<?php
ob_start();
session_start();

//database credentials
define('DBHOST','localhost');
define('DBUSER','Hashisx');
define('DBPASS','d4gBreak1987!');
define('DBNAME','phpbb');

$db = new PDO("mysql:host=".DBHOST.";port=3306;dbname=".DBNAME, DBUSER, DBPASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//set timezone
date_default_timezone_set('America/Los_Angeles');


$user = new User($db); 
?>