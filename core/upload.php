<?php

class upload{
    public $src = "../assets/images/";
    public $tmp;
    public $filename;
    public $type;
    public $uploadfile;

    public function __contruct($string){
        $this->filename = $_FILES["file"]["name"];
        $this -> tmp = $_FILES["file"]["tmp_name"];
        $this -> uploadfile = $this -> src . basename($this -> filename);
    }
    public function uploadfile($file){
        if(move_uploaded_file($this -> tmp, $this -> uploadfile)){
            return true;
        }
    }


}
