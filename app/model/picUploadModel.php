<?php
namespace app\model;

use core\lib\upload;
use core\lib\conf;
class picUploadModel extends upload
{
    public $upload_path;
    public $allow_types;
    public function __construct(){
        $this->upload_path = conf::get('AVATAR','upload');
        $this->allow_types = array('jpg','png','gif');
    }

    public function upload($file)
    {
        $filename = $file['name'];
        $suffix = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($suffix,$this->allow_types))
        {
            $new_name = md5(mt_rand()).".".$suffix;
            $path = $this->upload_path.$new_name;
            move_uploaded_file($file['tmp_name'],$path);
            return $path;
        }else{
            return FALSE;
        }
    }

}