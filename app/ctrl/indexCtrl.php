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
        $data['title'] = post('title');
        $data['content'] = post('content');
        if($data['title']==''||$data['content']==''){
            p('title or content cant be blank');
            jump('/index/add');
        }
        $data['createtime'] = time();
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
        $id = get('id',0,'int');

        if($id){
            $model = new guestbookModel();
            $ret = $model->delOne($id);
            if($ret){
                jump('/');
            }else{
                p('delete error');
            }
        }else{
            exit('params error');
        }

    }

}