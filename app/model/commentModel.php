<?php
namespace app\model;

use core\lib\model;

class commentModel extends model
{
    private $table = 'comment';
    private $user_table = 'page';
    public function addOne($data)
    {
        $sql = $this->prepare("INSERT INTO ".$this->table."(`userid`,`pageid`,`content`,`create_time`) VALUES (?,?,?,?)");
        return $sql->execute(array($data['userid'],$data['pageid'],$data['content'],$data['create_time']));
        
    }

    public function getcomments($id)
    {
        $res = $this->query("SELECT * FROM ".$this->table." WHERE `pageid`= '".$id."'");
        return $res;
    }

    public function getPageid($id)
    {
        $res = $this->query("SELECT * FROM ".$this->table." WHERE `id`= '".$id."'");
        foreach ($res as $r) {    
            return $r['pageid'];
        }
    }

    public function getUserByComment($id)
    {
        $res = $this->query("SELECT b.userid FROM ".$this->table." AS a JOIN ".$this->user_table." AS b ON a.pageid = b.id where a.id ='".$id."'");
        //dp($res);
        foreach ($res as $r) {    
            return $r['userid'];
        }
    }

    public function delOne($id)
    {
        $sql = $this->prepare("DELETE FROM ".$this->table." WHERE  `id` = ?");
        return $sql->execute(array($id));
    }
}