<?php
namespace app\model;

use core\lib\model;

class userModel extends model
{
    public $table = 'user';
    public $page_table = 'page';

	public function addOne($data)
    {
        $sql = $this->prepare("INSERT INTO ".$this->table."(`username`,`password`,`last_ip`,`is_admin`) VALUES (?,?,?,?)");
        return $sql->execute(array($data['username'],$data['password'],$data['last_ip'],$data['is_admin']));
        
    }

    public function addAvatar($id,$path)
    {
        $sql = $this->prepare("UPDATE `".$this->table."` SET `avatar`=? WHERE `id`=?");
        return $sql->execute(array($path,$id));
    }

	public function findOne($data)
    {
        $res = $this->query("SELECT * FROM ".$this->table." WHERE `username`= '".$data['username']."' AND `password`= '".md5($data['password'])."' limit 0,1");
        
        foreach ($res as $r) {
				return $r;
        }	
        
    }

    public function getGuestbookById($id)
    {
        $res = $this->query("SELECT * FROM ".$this->page_table." WHERE `userid`= '".$id."'");
        return $res;

    }

}