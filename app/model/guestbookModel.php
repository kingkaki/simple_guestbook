<?php
namespace app\model;

use core\lib\model;

class guestbookModel extends model
{
    public $table = 'guestbook';

    public function all()
    {
        return $this->query('SELECT * FROM '.$this->table);
    }

    public function addOne($data)
    {
        $sql = $this->prepare("INSERT INTO ".$this->table."(`title`,`content`,`createtime`) VALUES (?,?,?)");
        return $sql->execute(array($data['title'],$data['content'],$data['createtime']));
        
    }

    public function delOne($id)
    {
        $sql = $this->prepare("DELETE FROM `".$this->table."` WHERE `id`=?");
        // p($sql);exit();
        $ret = $sql->execute(array($id));
        if($ret !== false){
            return true;
        }else{
            return false;
        }
    }

}