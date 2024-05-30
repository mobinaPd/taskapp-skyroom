<?php 

define("DB_HOST","localhost");
define("DB_USER","root");
define("DB_PASS","");
define("DB_NAME","taskapp");
$mysqli = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if($mysqli->connect_errno > 0){
    die("ERROR:".$mysqli->connect_error );
}