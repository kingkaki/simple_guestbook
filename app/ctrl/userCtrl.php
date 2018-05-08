<?php
namespace app\ctrl;
use app\model\userModel;

class userCtrl extends \core\mypro
{
	public function index()
	//显示自己的留言
	{
		jump('/user/register/');
	}

	public function register()
	//注册账号
	{
		$this->display("register.html");
		if(!empty($_POST)){		
			$username = post('username');
			$password = post('password');
			if($username!=='' && $password!== '')
			{
				$data['username'] = $username;
				$data['password'] = md5($password);
				$data['last_ip'] = $_SERVER["REMOTE_ADDR"];
				$data['is_admin'] = 0;
				$model = new userModel();
				$res = $model->addOne($data);
				if($res){
					p("注册成功！");
				}else{
					p("注册失败");
				}

			}else{
				p("username or password cant be blank!");
			}
		}
		
	}
}