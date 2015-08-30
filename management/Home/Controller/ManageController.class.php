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
            header('Location: '.__MODULE__.'/index/index');
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

            		//只低一级,不能升职...
            		$map['role_id']  = 2;   
            		$people1 = $User->where($map)->order('role_id')->select();
            		//把角色名弄到people1数组里面,方便模板输出
            		for ($i=0; $i < count($people1); $i++) { 
            			$na['role_id'] = $people1[$i]['role_id']; 
            			$ro_name = $Role->field('role_name')->where($na)->select();
            			$people1[$i]['role_name'] = $ro_name[0]['role_name'];
            		}

            		$map['role_id']  = array('in','3');   //role_id大于1的
            		$people = $User->where($map)->order('role_id')->select();
            		//把角色名弄到people数组里面,方便模板输出
            		for ($i=0; $i < count($people); $i++) { 
            			$na['role_id'] = $people[$i]['role_id']; 
            			$ro_name = $Role->field('role_name')->where($na)->select();
            			$people[$i]['role_name'] = $ro_name[0]['role_name'];
            		}

            		$map['role_id']  = 4;   //最低级了...
            		$people2 = $User->where($map)->order('role_id')->select();
            		//把角色名弄到people2数组里面,方便模板输出
            		for ($i=0; $i < count($people2); $i++) { 
            			$na['role_id'] = $people2[$i]['role_id']; 
            			$ro_name = $Role->field('role_name')->where($na)->select();
            			$people2[$i]['role_name'] = $ro_name[0]['role_name'];
            		}
            		break;
            	case 2:

            		//只低一级,不能升职...
            		$map['role_id']  = 3;  
            		$people1 = $User->where($map)->order('role_id')->select();
            		//把角色名弄到people1数组里面,方便模板输出
            		for ($i=0; $i < count($people1); $i++) { 
            			$na['role_id'] = $people1[$i]['role_id']; 
            			$ro_name = $Role->field('role_name')->where($na)->select();
            			$people1[$i]['role_name'] = $ro_name[0]['role_name'];
            		}

            		// $map['role_id']  = array('gt',3);   //role_id大于1的
            		// $people = $User->where($map)->order('role_id')->select();
            		// //把角色名弄到people数组里面,方便模板输出
            		// for ($i=0; $i < count($people); $i++) { 
            		// 	$na['role_id'] = $people[$i]['role_id']; 
            		// 	$ro_name = $Role->field('role_name')->where($na)->select();
            		// 	$people[$i]['role_name'] = $ro_name[0]['role_name'];
            		// }

            		$map['role_id']  = 4;   //最低级了...
            		$people2 = $User->where($map)->order('role_id')->select();
            		//把角色名弄到people2数组里面,方便模板输出
            		for ($i=0; $i < count($people2); $i++) { 
            			$na['role_id'] = $people2[$i]['role_id']; 
            			$ro_name = $Role->field('role_name')->where($na)->select();
            			$people2[$i]['role_name'] = $ro_name[0]['role_name'];
            		}
            		break;

            	case 3:
            		
            		$map['role_id']  = 4;   //最低级了...
            		$people2 = $User->where($map)->order('role_id')->select();
            		//把角色名弄到people2数组里面,方便模板输出
            		for ($i=0; $i < count($people2); $i++) { 
            			$na['role_id'] = $people2[$i]['role_id']; 
            			$ro_name = $Role->field('role_name')->where($na)->select();
            			$people2[$i]['role_name'] = $ro_name[0]['role_name'];
            		}
            		break;
            	case 4:    //校工,革命尚未成功,同志仍需努力
            		
            		break;
            	
            	default:
            		$this->error('对不起,你已经被辞职了','#');
            		break;
            }

            			// var_dump($people);
            // var_dump($people1);
            $this->assign('people',$people);
            $this->assign('people2',$people2);
            $this->assign('people1',$people1);
            $this->display('index');

    	}else {
    		$this->error('请先登录!',__MODULE__.'/index/index');
    	}
    }
    /**
     * 登出
     */
    public function outlogin() {
    	session('user_id',null);
        header('Location: '.__MODULE__.'/index/index');
    }

    /**
     * 升职
     */
    public function up() {
    	$id = I('get.id');
    	$User = M('user');
    	$data['user_num'] = $id;
		$res = $User->where($data)->setDec('role_id');   //升职,role_id减1
        header('Location: '.__MODULE__.'/index/index');
    }

    /**
     * 降职
     */
    public function down() {
    	$id = I('get.id');
    	$User = M('user');
    	$data['user_num'] = $id;
		$res = $User->where($data)->setInc('role_id');   //降职,role_id加1
        header('Location: '.__MODULE__.'/index/index');
    }

    /**
     * gg,炒鱿鱼
     */
    public function out() {
    	$id = I('get.id');
    	$User = M('user');
    	$data['user_num'] = $id;
    	$name = $User->field('user_name')->where($data)->select();
    	$da['role_id'] = 0;
    	$res = $User->where($data)->data($da)->save();
   		$this->success($name[0]['user_name'].'已经被你辞咯');
    }


    public function add() {
    	if (session('user_id')) {
            $user_id['user_id'] = session('user_id');

            $User = M('user');
            $name = $User->field('user_name,role_id')->where($user_id)->select();
                      
            switch ($name[0]['role_id']) {
            	case 1:    //校长

            		//可以任科研人员,教师,校工
            		$content = "<select class='style' name = 'role'>
								  <option value='2'>科研人员</option>
								  <option value='3'>教师</option>
								  <option value='4'>校工</option>
								</select>";
					break;
				case 2:
					$content = "<select class='style' name = 'role'>
								  <option value='3'>教师</option>
								  <option value='4'>校工</option>
								</select>";
					break;
				case 3:
					$content = "<select class='style' name = 'role'>
								  <option value='4'>校工</option>
								</select>";
					break;
				
				default:
  		   			$this->success('您的权限不够哦!',__MODULE__.'/index/index');
					break;
			}



			$this->assign('con',$content);
    		$this->display('add');
    }else {
            header('Location: '.__MODULE__.'/index/index');
    }
    }

    public function doAdd() {
    	$user_name = I('post.user_name');
    	$user_num = I('post.user_num');
    	$role_id = I('post.role');
    	$user_id_num = I('post.user_id_num');
    	if ($user_name&&$user_num&&$role_id&&$user_id_num) {
  		   	$User = M('user');
	    	$User_info = M('user_info');
	    	$data = array(
	    		'user_num' => $user_num,
	    		'user_name' => $user_name,
	    		'role_id' => $role_id
	    		 );
	    	$res = $User->add($data);
	    	$re = D('User')->add($user_num,$user_id_num);
	    	if ($re&&$res) {
	  		   	$this->success('添加成功!',__MODULE__.'/index/index');
	    	}
    	}else {
	    	
	    	$this->error('所有的信息都是必填的哦');
	    }
    }
}