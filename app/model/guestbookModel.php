<?php
namespace app\model;

use core\lib\model;

class guestbookModel extends model
{
    public $table = 'page';


    public function all()
    {
        return $this->query('SELECT * FROM '.$this->table);
    }



    public function getOne($id)
    {
        $res = $this->query("SELECT * FROM ".$this->table." WHERE `id`= '".$id."'");
        foreach ($res as $r) {
				return $r;
        }
    }

    public function addOne($data)
    {
        $sql = $this->prepare("INSERT INTO ".$this->table."(`userid`,`title`,`content`,`create_time`) VALUES (?,?,?,?)");
        return $sql->execute(array($data['id'],$data['title'],$data['content'],$data['createtime']));
        
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

    public function  getUserByPage($id)
    {
        $res = $this->query("SELECT * FROM ".$this->table." WHERE `id`= '".$id."'");
        foreach ($res as $r) {
				return $r['userid'];
        }
    }

}