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
}