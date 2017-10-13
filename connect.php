<?php
$server = "localhost";
$username ="test2";
$password ="test2";
$dbname ="test2";
$conn =new mysqli($server,$username,$password,$dbname);
if ($conn->connect_error)
{
  die("connection error " .$conn->connect_error);
}

 ?>
