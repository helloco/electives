<?php
class User extends Zend_Db_Table{
	protected $_name='user';
	
	public function getuser($userid){
		$sql="select * from user where id=$userid";
		$db=$this->getAdapter();
		return $db->query($sql)->fetchAll();
	}
	
	public function checkusername($username){
		$db=$this->getAdapter();
		$sql="select id from user where name=$username";
		return $db->query($sql)->fetchAll();
	}
}