<?php 
namespace Home\Model;
use Think\Model;
class UserModel extends Model {
	public function salt() {
		$User = M('user');
		$num = rand(0,1000000);
		$sql = "update `user` SET salt = ".$num;
		$salt = $User->execute($sql);
		return $salt;
	}
	public function add($user_num,$user_id_num) {
		$User_info = M('user_info');
		$sql = "INSERT INTO `user_info` (`user_num`,`user_id_num`) VALUES ('".$user_num."','".$user_id_num."')";
		$add = $User_info->execute($sql);
		return $add;
	}
}