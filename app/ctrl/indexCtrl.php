<?php
namespace app\ctrl;
use app\model\guestbookModel;

class indexCtrl extends \core\mypro
{
    //显示所有留言
    public function index()
    {
        // $temp = \core\lib\conf::all('database');

        $model = new guestbookModel();
        $data = $model->all();
        //p($data);
        $this->assign('data',$data);
        $this->display('index.html');
    }

    //添加留言
    public function add()
    {
        if(loggedin()){
            $this->display('add.html');
        }else{
            jump('/user/login/');
        }
        
    }

    //保存留言
    public function save()
    {
        if(!isset($_SESSION)){
            session_start();
        }
        if(!isset($_SESSION['user'])){
            p('<a href="/user/login/">plz login</a>');
            exit();
        }
        $data['title'] = post('title');
        $data['content'] = post('content');
        if($data['title']==''||$data['content']==''){
            p('title or content cant be blank');
            jump('/index/add');
        }
        $data['createtime'] = time();
        session_start();
        $data['id'] = $_SESSION['user']['id'];
        $model = new guestbookModel();
        $ret = $model->addOne($data);
        if($ret){
            jump('/');
        }else{
            p('error');
        }
    }

    public function del()
    {
        if(!isset($_SESSION)){
            session_start();
        }
        $id = get('id',0,'int');          
        if($id){
            $model = new guestbookModel();
            //权限判断
            //dp($_SESSION['user']['id']);
            if(isset($_SESSION['user']) && $model->getUserByPage($id)==$_SESSION['user']['id'])
            {
                $ret = $model->delOne($id);
                if($ret){
                    jump('/');
                }else{
                    p('delete error');
                }

            }else{
                p('illegal');
            }

        }else{
            exit('params error');
        }


        
    }


}