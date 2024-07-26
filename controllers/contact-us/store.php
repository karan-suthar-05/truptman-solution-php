<?php

use Core\Database;

$attributes = [
    "name"=>$_POST["name"],
    "email"=>$_POST["email"],
    "phone"=>$_POST["phone"],
    "subject"=>$_POST["subject"],
    "message"=>$_POST["message"]
];

// check for form validation
$form = new ValidateForm();
$form->validate($attributes);

if($form->failed())
{
    echo "Fail to submit the form!!!";   
    die();
}


// check for already record exist or not
$config = require base_path("config.php");
$db = new Database($config["Database"],"root","");

$user = $db->query("select email from contactus where email = :email",[
    "email" => $attributes["email"],
])->find();

if($user)
{
    echo "email already found!!! Try other email address";
    die();
}


// add record into the database
$db->query("insert into contactus(name,email,phone,subject,message) values (:name,:email,:phone,:subject,:message)",[
    "name" => $attributes["name"],
    "email" => $attributes["email"],
    "phone" => $attributes["phone"],
    "subject" => $attributes["subject"],
    "message" => $attributes["message"]
]);


echo "Form submited successfully!";
die();