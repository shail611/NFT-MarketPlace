<?php

$host = "localhost:3308";
$dbname = "project";
$username = "root";
$password = "";

$mysqli = new mysqli($host,
                      $username,
                      $password,
                      $dbname);
                     
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}
$sql1="create table if not exists user(userid int(11) auto increment primary key, name varchar(25), email varchar(25), password_hash varchar(255), nft varchar(25));";
$sql2="create table if not exists images(id int(11) auto increment primary key, nft varchar(100), price int(11), ownerid varchar(10), path varchar(100));";
$sql3="create table if not exists auction(id int(11) auto increment primary key, nft varchar(100), price int(11), path varchar(100), ownerid varchar(25));";



return $mysqli;
?>
