<?php
require_once 'BaseController.php';
require_once APPLICATION_PATH.'/models/User.php';
class Logincontroller extends BaseController{
	public function loginuiAction(){
		$this->render('loginui');
	}
	
	public function loginAction(){
		$user_name=$this->getRequest()->getParam('user_name');
		$user_pwd=$this->getRequest()->getParam('user_pwd');
		
		$userModel=new User();
		$db=$userModel->getAdapter();
		$where=$db->quoteInto("name=?", $user_name).$db->quoteInto("AND pwd=?",md5($user_pwd));
		$res=$userModel->fetchAll($where)->toArray();
		if (count($res)==1) {
			session_start();
			$_SESSION['normal_user_message']=$res[0];
			$this->view->info="登录成功！正在跳转...";
			$this->view->href="/index/index";
			$this->_forward("log","global");
		}else {
			$this->view->info="登录失败！正在返回登陆页面...";
			$this->view->href="/login/loginui";
			$this->_forward("log","global");
		}
	}
	
	public function registeruiAction(){
		$this->render("registerui");
	}
	
	public function registerAction(){
		$user_name=$this->getRequest()->getParam('user_name');
		$user_pwd=$this->getRequest()->getParam('user_pwd');
		$user_pwd_ensure=$this->getRequest()->getParam('user_pwd_ensure');
		if ($user_pwd!=$user_pwd_ensure) {
			$this->view->info="两次输入密码不一致";
			$this->view->href="/login/registerui";
			$this->_forward("log","global");
		}else {
			$userModel=new User();
			if (count($userModel->check($user_name))!=0) {
				$this->view->info="用户名已经被注册，请更换用户名";
				$this->view->href="/login/registerui";
				$this->_forward("log","global");
			}else {
				$id=$userModel->adduser($user_name, $user_pwd);
				if ($id!=0) {
					$this->view->info="注册成功！请前往登陆";
					$this->view->href="/login/loginui";
					$this->_forward("log","global");
				}
			}
		}
	
	}
	
}




