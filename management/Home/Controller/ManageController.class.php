<?php
namespace Home\Controller;
use Think\Controller;
class ManageController extends Controller {
    public function login(){
    	$User = M('user');
    	$user_id = I('post.user_id');
    	$psw = I('post.user_psw');
   		$data['user_id'] = $user_id;
        $yan = $User->where($data)->select();
        $salt = $yan[0]['salt'];
        $password = md5($psw.$salt);
        
        $data['user_psw'] = $password;
        $name = $User->where($data)->select();
        if ($name) {
            session('user_id',$user_id);
      		// var_dump( $name);
            header('Location: '.VIEW.'/index/index');
        }else{
            $this->error('用户名或密码错误!');
            // echo "用户名或密码错误";
            // $this->display('login');
        }
    }


    public function index() {
    	if (session('user_id')) {
    		//xxx欢迎你
            $user_id['user_id'] = session('user_id');
            $User = M('user');
            $name = $User->field('user_name,role_id')->where($user_id)->select();
            $role_info['role_id'] = $name[0]['role_id'];
            $Role = M('role');
            $role_name = $Role->field('role_name')->where($role_info)->select();
            // echo $role_name[0]['role_name'];
            $this->assign('name',$name[0]['user_name']);
            $this->assign('role',$role_name[0]['role_name']);
            switch ($name[0]['role_id']) {
            	case 1:    //校长
            		$map['role_id']  = 2;   //role_id大于1的
            		$people1 = $User->where($map)->order('role_id')->select();
            		//把角色名弄到people1数组里面,方便模板输出
            		for ($i=0; $i < count($people1); $i++) { 
            			$na['role_id'] = $people1[$i]['role_id']; 
            			$ro_name = $Role->field('role_name')->where($na)->select();
            			$people1[$i]['role_name'] = $ro_name[0]['role_name'];
            		}

            		$map['role_id']  = array('gt',2);   //role_id大于1的
            		$people = $User->where($map)->order('role_id')->select();
            		//把角色名弄到people数组里面,方便模板输出
            		for ($i=0; $i < count($people); $i++) { 
            			$na['role_id'] = $people[$i]['role_id']; 
            			$ro_name = $Role->field('role_name')->where($na)->select();
            			$people[$i]['role_name'] = $ro_name[0]['role_name'];
            		}

            		break;
            	case 2:
            		$map['role_id']  = 3;   //role_id大于1的
            		$people1 = $User->where($map)->order('role_id')->select();
            		//把角色名弄到people1数组里面,方便模板输出
            		for ($i=0; $i < count($people1); $i++) { 
            			$na['role_id'] = $people1[$i]['role_id']; 
            			$ro_name = $Role->field('role_name')->where($na)->select();
            			$people1[$i]['role_name'] = $ro_name[0]['role_name'];
            		}

            		$map['role_id']  = array('gt',3);   //role_id大于1的
            		$people = $User->where($map)->order('role_id')->select();
            		//把角色名弄到people数组里面,方便模板输出
            		for ($i=0; $i < count($people); $i++) { 
            			$na['role_id'] = $people[$i]['role_id']; 
            			$ro_name = $Role->field('role_name')->where($na)->select();
            			$people[$i]['role_name'] = $ro_name[0]['role_name'];
            		}
            		break;
            	case 3:

            		$map['role_id']  = array('gt',3);   //role_id大于1的
            		$people = $User->where($map)->order('role_id')->select();
            		//把角色名弄到people数组里面,方便模板输出
            		for ($i=0; $i < count($people); $i++) { 
            			$na['role_id'] = $people[$i]['role_id']; 
            			$ro_name = $Role->field('role_name')->where($na)->select();
            			$people[$i]['role_name'] = $ro_name[0]['role_name'];
            		}
            		break;
            	case 4:    //校工,革命尚未成功,同志仍需努力
            		$map['role_id']  = array('gt',3);   //role_id大于1的
            		$people = $User->where($map)->order('role_id')->select();
            		//把角色名弄到people数组里面,方便模板输出
            		for ($i=0; $i < count($people); $i++) { 
            			$na['role_id'] = $people[$i]['role_id']; 
            			$ro_name = $Role->field('role_name')->where($na)->select();
            			$people[$i]['role_name'] = $ro_name[0]['role_name'];
            		}
            		break;
            	
            	default:
            		$this->error('对不起,你已经被辞职了');
            		break;
            }

            			// var_dump($people);
            // var_dump($people);
            $this->assign('people',$people);
            $this->assign('people1',$people1);
            $this->display('index');

    	}else {
    		$this->error('请先登录!',VIEW.'/index/index');
    	}
    }
    /**
     * 登出
     */
    public function outlogin() {
    	session('user_id',null);
        header('Location: '.VIEW.'/index/index');
    }

    /**
     * 升职
     */
    public function up() {
    	$id = I('get.id');
    	$User = M('user');
    	$data['user_num'] = $id;
		$res = $User->where($data)->setDec('role_id');   //升职,role_id减1
        header('Location: '.VIEW.'/index/index');
    }

    /**
     * 降职
     */
    public function down() {
    	$id = I('get.id');
    	$User = M('user');
    	$data['user_num'] = $id;
		$res = $User->where($data)->setInc('role_id');   //降职,role_id加1
        header('Location: '.VIEW.'/index/index');
    }

    /**
     * gg,炒鱿鱼
     */
    public function out() {
    	$id = I('get.id');
    	$User = M('user');
    	$data['user_num'] = $id;
    	$da['role_id'] = 0;
    	$res = $User->where($data)->data($da)->save();
    	var_dump($res);
    }

}