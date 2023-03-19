<?php
namespace App\Http\Services;

use Illuminate\Support\Facades\File;

class FileService {
    public function saveItem($folder, $request){
        try{
            $file = $request->file('file');
            $fileName =  $file->getClientOriginalName();
            $pathinfo = pathinfo($fileName);
            $fileName = $pathinfo['filename'].'-'. $this -> incrementalHash().'.'. $pathinfo['extension'];
            $fileName = str_replace("(", "-", $fileName);
            $fileName = str_replace(")", "-", $fileName);
            $fileName = str_replace(" ", "-", $fileName);
            //$fileName = $folder . $fileName;
            $request->file->move(public_path($folder ), $fileName);

            return true;

        } catch (\Exception $err) {
                echo $err->getMessage() . PHP_EOL;
            }
    }
    public function getItem($folder){
        return $this -> dirToArray($folder);
    }

    public function dirToArray($dir) {
        if(!File::exists($dir)) {
            File::makeDirectory($dir, 0755, true, true);
        }
        $result = array();
        $strHmtl = "";
        $root = $dir;
        // if (file_exists($dir) === false) {
        //     mkdir($dir);
        // }
        $cdir = scandir($dir, SCANDIR_SORT_DESCENDING);
        foreach ($cdir as $key => $value) {
            if (!in_array($value, array(".", "..", ".htaccess", ".thumbs", "tmp.txt"))) {
                $path = $dir  . $value;
                if (strpos($path, '.pdf') === false) {
                    if (is_dir($path)) {
                        $result[] = new FileItem($root, $value, '/' . $path, filemtime($path), $this -> dirToArray($path));
                    } else {
                        $result[] = new FileItem($root, $value, '/' . $path, filemtime($path));
                    }
                }
            }
        }
        return $this -> sortBydate($result);
    }


    public function sortBydate($arrFile) {
        usort($arrFile, function($a, $b)
        {
            return (-1 * strcmp($a->date, $b->date));
        });
        foreach ($arrFile as $item) {
            if(count ($item -> subFiles) > 0) {
                $item -> subFiles = $this -> sortBydate($item -> subFiles);
            }
        }
        return $arrFile;
    }

    public function getStree($arrFile) {
        $strHtml = "";
        foreach ($arrFile as $item) {
            //is folder
            if (count($item -> subFiles) > 0) {

                $strHtml .= '<li class="colored-icon" data-jstree="">';
                $strHtml .= $item -> name;
                $strHtml .= '   <ul>';
                $strHtml .= $this -> getStree($item -> subFiles);
                $strHtml .= '   </ul>';
                $strHtml .= '</li>';

            } else {
                $strHtml .= '<li data-jstree=\'{ "icon" : "fa fa-picture-o" }\' data-path="' . $item -> path . '">';
                $strHtml .= $item -> name;
                $strHtml .= '</li>';
            }
        }
        return $strHtml;
    }
    public function incrementalHash($len = 3){
        $charset = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $base = strlen($charset);
        $result = '';
         $arr = explode(' ', microtime());
        $now1 = explode(".",$arr[0]);
        $now = $now1[1];
        while ($now >= $base){
          $i = $now % $base;
          $result = $charset[$i] . $result;
          $now /= $base;
        }
        return substr($result, -$len).substr($now1[1], -3);
  }
}
