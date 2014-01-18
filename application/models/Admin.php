<?php
class Admin extends Zend_Db_Table{
	protected $_name='admin';
	
	public function checkLogin(){
		session_start();
		if (empty($_SESSION['user_message'])) {
			return 0;
		}else {
			return 1;
		}
	}
}