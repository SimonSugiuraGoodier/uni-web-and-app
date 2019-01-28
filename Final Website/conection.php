<?php
 if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
   $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
   header('HTTP/1.1 301 Moved Permanently');
   header('Location: ' . $redirect);
  exit(); //https://stackoverflow.com/questions/5106313/redirecting-from-http-to-https-with-php

    }
// https://www.w3schools.com/php/php_mysql_connect.asp
$servername = "studb.cms.gre.ac.uk";// database location
$userName = "sg4562y";// Username
$password = "sg4562y";// Password
$dbname = "mdb_sg4562y";// database name
    
$conn = mysqli_connect("$servername","$userName","$password","$dbname");// Connection to db

if ($conn->connect_error){
    die("connection failed: ". $conn->connect_error);
}
//echo "Connected successfully";
?>