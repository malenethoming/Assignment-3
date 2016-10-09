<?php
const DB_HOST = 'malenethoming.com.mysql';
const DB_USER = 'malenethoming_c';
const DB_PASS = 'ruS5iiTS';
const DB_NAME = 'malenethoming_c';

$link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($link->connect_error) { 
   die('Connect Error ('.$link->connect_errno.') '.$link->connect_error);
}
$link->set_charset('utf8'); 
?>

