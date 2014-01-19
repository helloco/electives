<?php
class User extends Zend_Db_Table{
	protected $_name='user';
	
	public function getuser($userid){
		$sql="select * from user where id=$userid";
		$db=$this->getAdapter();
		return $db->query($sql)->fetchAll();
	}
	
// 	public function checkusername($username){
// 		$db=$this->getAdapter();
// 		$sql="select * from user where name=$username";
// 		$res=$db->query($sql)->fetchAll();
// 		echo "<pre>";
// 		print_r($res);
// 		echo "</pre>";
// 		exit();
// 	}
	public function checkusername($username){
		$sql="select * from user where id=$username";
		$db=$this->getAdapter();
		return $db->query($sql)->fetchAll();
	}
	public function check($username){
		$db=$this->getAdapter();
		$where=$db->quoteInto("name=?", $username);
		//$res=$this->fetchRow($where)->toArray();
		$res=$this->fetchAll($where)->toArray();
		return $res;
	}
	
	public function adduser($username,$userpwd){
		$data=array(
		'name' => $username,
		'pwd' => md5($userpwd)
		);
		return $this->insert($data);
		
	}
	
}

