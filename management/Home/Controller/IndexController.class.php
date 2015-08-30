<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$User = M('user');
    	$salt = D('User')->salt();
    	$User_info = M('user_info');
    	$all = $User->field('user_num')->select();
    	$info = $User_info->field('user_num,user_id_num')->select();
    	$num = count($info);
    	for ($i=0; $i < $num; $i++) { 
    		$da['user_num'] = $info[$i]['user_num'];
    		$sa = $User->field('salt')->where($da)->select();
    		$data['user_psw'] = md5($info[$i]['user_id_num'].$sa[0]['salt']);
    		$re = $User->data($data)->where($da)->save();
    	}
    	if (session('user_id')) {
    		header('Location: '.VIEW.'/Manage/index');
    	}else {
    		$this->display('login');
    	}
    }
}