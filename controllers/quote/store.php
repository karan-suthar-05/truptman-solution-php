<?php

use Core\Database;

$attributes = [
    "name"=>$_POST["Name"],
    "email"=>$_POST["Email"],
    "phone"=>$_POST["Phone"],
    "country"=>$_POST["Country"],
    "service"=>$_POST["Service"],
    "budget"=>$_POST["Budget"]
];

// check for form validation
$form = new ValidateForm();
$form->validate($attributes);

if($form->failed())
{
    $_SESSION["errors"] = $form->errors();
    return redirect("/get-a-quote");
}


// check for already record exist or not
$config = require base_path("config.php");
$db = new Database($config["Database"],"root","");

$user = $db->query("select * from quote where email = :email",[
    "email" => $attributes["email"],
])->find();

if($user)
{
    $_SESSION["errors"] = [
        "email" => "email alreay exist! try another email address!!!",
    ];
    return redirect("/get-a-quote");
}

// add record into the database
$db->query("insert into quote(name,email,phone,country,service,budget) values (:name,:email,:phone,:country,:service,:budget)",[
    "name" => $attributes["name"],
    "email" => $attributes["email"],
    "phone" => $attributes["phone"],
    "country" => $attributes["country"],
    "service" => $attributes["service"],
    "budget" => $attributes["budget"]
    
]);


$_SESSION["message"] = "Form submitted successfuly";

return redirect("/get-a-quote");
