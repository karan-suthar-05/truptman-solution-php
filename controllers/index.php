<?php
use Core\Session;

return view("index.view.php",["errors"=>Session::getErrors(),"message"=>Session::get("message")]);