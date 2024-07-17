<?php
use Core\Validator;

class ValidateForm
{
    protected $errors = [];
    public function validate($attributes)
    {
        if(!Validator::string($attributes["name"]))
        {
            $this->errors["name"] = "Name should have at least 1 charecter!!!";
        }
        if(!Validator::string($attributes["email"]))
        {
            $this->errors["email"] = "Please enter valid email!!!";
        }
        if(array_key_exists("job",$attributes))
        {
            if($attributes["job"] == 0)
            $this->errors["job"] = "Please select job!!!";
        }
        if(array_key_exists("service",$attributes))
        {
            if($attributes["service"] == 0)
            $this->errors["service"] = "Please select service!!!";
        }
        if(array_key_exists("budget",$attributes))
        {
            if($attributes["budget"] == 0)
            $this->errors["budget"] = "Please select budget!!!";
        }
        if(array_key_exists("experiance",$attributes))
        {
            if($attributes["experiance"] == 0)
            $this->errors["experiance"] = "Please select experiance!!!";
        }
    }
    public function validateFile($file)
    {   
        
        if($file["size"] > 0)
        {
            $check = getimagesize($file["tmp_name"]);
            $imageFileType = pathinfo($file["name"],PATHINFO_EXTENSION);
            if($check == false) {
                $this->errors["file"] = "Please select image file!!!"; 
            }
            if ($file["size"] > 500000) {
            $this->errors["file"]  = "Sorry, your file is too large.";
            }

            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                $this->errors["file"] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }
        }
    }
    public function uploadFile($file,$path)
    {   
        $targetdir = $path;
        $targetfile = $targetdir . time() . basename($file["name"]);
        $f = move_uploaded_file($file["tmp_name"], $targetfile);
        return $targetfile;
    }
    public function failed()
    {
        return count($this->errors);
    }
    public function errors()    
    {
        return $this->errors;   
    }
}