<?php
/*
 * 		echo "<pre>";
		print_r($res);
		echo "</pre>";
		后台管理控制器
		
 */
require_once APPLICATION_PATH.'/models/User.php';
require_once 'BaseController.php';
class AdminController extends BaseController{
	//loginui
	public function indexAction(){
		
	}
	
	public function loginAction(){
		$admin_name=$this->getRequest()->getParam("admin_name");
		$admin_pwd=$this->getRequest()->getParam("admin_pwd");
		$userModel=new User();
		$db=$userModel->getAdapter();
		$where=$db->quoteInto("name=?", $admin_name).$db->quoteInto("AND pwd=?", md5($admin_pwd));
		$res=$userModel->fetchAll($where)->toArray();
		if (count($res==1)) {
			session_start();
			$_SESSION['user_message']=$res[0];
			$this->render('main');
		}
	}
}