<?php

include_once("./connect.php");
include_once("./objects/Info.php");

if(@$_POST){

    $Info = new Info($conn->getDB());

    $name = $_POST['name'];
    $email = $_POST["email"];

    $check_email = $Info->isEmailAvailable($email);
    if($check_email === true){
        $Info->name = $name;
        $Info->email = $email;
        $save = $Info->save();

        if($save){
            echo "Record inserted. Name: $name | Email: $email";
        }else{
            echo "Errr while add record data info";
        }
    }else{
        echo "Email that you inserted before, already exist, try with another else!";
    }
}
