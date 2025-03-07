<?php
use Core\Database;
use Core\Session;

$attributes = [
    "name"=>$_POST["Name"],
    "email"=>$_POST["Email"],
    "phone"=>$_POST["Phone"],
    "job"=>$_POST["Job"],
    "current_company"=>$_POST["CurrentComp"],
    "ctc"=>$_POST["Ctc"],
    "experiance"=>$_POST["Experiance"],
    "file" => $_FILES["file"],
];

// check for form validation
$form = new ValidateForm();
$form->validate($attributes);
$form->validateFile($attributes["file"]);

if($form->failed())
{
    Session::flashErrors($form->errors());
    // dd(Session::getErrors());
    return redirect("/#Career");
}


// check for already record exist or not
$config = require base_path("config.php");
$db = new Database($config["Database"],"root","");

$user = $db->query("select * from career where email = :email",[
    "email" => $attributes["email"],
])->find();

if($user)
{
    Session::flashErrors([
        "email" => "email alreay exist! try another email address!!!",
    ]);
    return redirect("/#Career");
}

// save file to server
$filePath = $form->uploadFile($attributes["file"],"uploads/");

// add record into the database
$db->query("insert into career(name,email,phone,job,current_company,ctc,experiance,filepath) values (:name,:email,:phone,:job,:current_company,:ctc,:experiance,:filepath)",[
    "name" => $attributes["name"],
    "email" => $attributes["email"],
    "phone" => $attributes["phone"],
    "job" => $attributes["job"],
    "current_company" => $attributes["current_company"],
    "ctc" => $attributes["ctc"],
    "experiance" => $attributes["experiance"],
    "filepath" => $filePath,
]);


Session::flash("message","Form submitted successfuly");

return redirect("/");