<?php
require_once 'BaseController.php';
require_once APPLICATION_PATH.'/models/User.php';
class Logincontroller extends BaseController{
	public function loginuiAction(){
		$this->render('loginui');
	}
	
	public function loginAction(){
		$user_name=$this->getRequest()->getParam('user_name');
		$user_pwd=$this->getRequest()->getParam('$user_pwd');
		$userModel=new User();
		$db=$userModel->getAdapter();
		$where=$db->quoteInto("name=?", $user_name).$db->quoteInto("AND pwd=?",md5($user_pwd));
		$res=$userModel->fetchAll($where)->toArray();
		if (count($res)==1) {
			session_start();
			$_SESSION['normal_user_message']=$res[0];
			$this->view->info="��¼�ɹ���������ת...";
			$this->view->href="/index/index";
			$this->_forward("log","global");
		}else {
			$this->view->info="��¼ʧ�ܣ����ڷ��ص�½ҳ��...";
			$this->view->href="/login/loginui";
			$this->_forward("log","global");
		}
	}
	public function registeruiAction(){
		$this->render("registerui");
	}
	public function registerAction(){
		$user_name=$this->getRequest()->getParam('user_name');
		$user_pwd=$this->getRequest()->getParam('$user_pwd');
		$user_pwd_ensure=$this->getRequest()->getParam('$user_pwd_ensure');
// 		if ($user_pwd!=$user_pwd_ensure) {
// 			return ;
// 		}else{
// 		$userModel=new User();
// 		echo $userModel->checkusername($user_name);
		exit();
		//	}
		if ($userModel->checkusername($user_name)) {
			;
		}
	}
	
}