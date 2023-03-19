<?php
namespace App\Http\Services;
class FileItem {

    public $thumb;
    public $name;
    public $path;
    public $date;
    public $subFiles;
    private static $thumbFolder = ".thumbs/images";
    public function __construct($root, $name, $path, $date, $files = array()){
        $this -> name = $name;
        $this -> path = $path;
        $this -> subFiles = $files;
        $this -> date = $date;
        //$path_parts = pathinfo($path);
        $this -> thumb = $path;
    }
}

