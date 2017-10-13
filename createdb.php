<?php
include "connect.php";
$sql ="CREATE TABLE info(
  id INT(6) AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(60) NOT NULL,
  email VARCHAR(40) NOT NULL)";
$conn-> query($sql);

 ?>
