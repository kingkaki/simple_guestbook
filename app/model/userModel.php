<?php
namespace app\model;

use core\lib\model;

class userModel extends model
{
	public $table = 'user';

	public function addOne($data)
    {
        $sql = $this->prepare("INSERT INTO ".$this->table."(`username`,`password`,`last_ip`,`is_admin`) VALUES (?,?,?,?)");
        return $sql->execute(array($data['username'],$data['password'],$data['last_ip'],$data['is_admin']));
        
    }

}