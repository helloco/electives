<?php
/*
 * 		echo "<pre>";
		print_r($res);
		echo "</pre>";
		后台管理控制器
		
 */
<<<<<<< HEAD
require_once 'BaseController.php';
require_once APPLICATION_PATH.'/models/Admin.php';
require_once APPLICATION_PATH.'/models/Classes.php';
=======
require_once APPLICATION_PATH.'/models/User.php';
require_once 'BaseController.php';
>>>>>>> 163df2f6e4b7afb07235098dc3e2a4c7b870aaf0
class AdminController extends BaseController{
	//loginui
	public function indexAction(){
		
	}
<<<<<<< HEAD
	//
	public function loginAction(){
		$admin_name=$this->getRequest()->getParam("admin_name");
		$admin_pwd=$this->getRequest()->getParam("admin_pwd");
		$adminModel=new Admin();
		$db=$adminModel->getAdapter();
		$where=$db->quoteInto("name=?", $admin_name).$db->quoteInto("AND pwd=?", md5($admin_pwd));
		$res=$adminModel->fetchAll($where)->toArray();
		if (count($res)==1) {
			session_start();
			$_SESSION['user_message']=$res[0];
			$this->render('main');
		}else{
			$this->render('index');
		}
	}
	public function addclassuiAction(){
		$adminModel=new Admin();
		if ($adminModel->checkLogin()==0) {
			$this->_forward("index","admin");
		}else {
			$this->render('addclassui');
		}
	}
	
	public function addclassAction(){
		$class_id=$this->getRequest()->getParam('class_id');
		$class_name	=$this->getRequest()->getParam('class_name');
		$class_teacher=$this->getRequest()->getParam('class_teacher');
		$class_score=$this->getRequest()->getParam('class_score');
		$classesModel=new Classes();
		$res=$classesModel->addclass($class_id, $class_name, $class_teacher, $class_score);
		if ($res) {
			$this->view->info="添加课程成功";
			$this->view->href="/admin/addclassui";
			$this->_forward("log","global");
		}else{
			$this->view->info="添加课程失败";
			$this->view->href="/admin/addclassui";
			$this->_forward("log","global");
		}
		
	}
	public function manageclassAction(){
		$adminModel=new Admin();
		if ($adminModel->checkLogin()==0) {
			$this->_forward("index","admin");
		}else {
			$classesModel=new Classes();
			$res=$classesModel->showclasses();
			$this->view->classes=$res;
			$this->render('manageclass');
		}	
	}
	
	public function deleteclassesAction(){
		$classesid=$this->getRequest()->getParam('classesid');
		$classesModel=new Classes();
		$res=$classesModel->deleteclass($classesid);
		if ($res) {
			$this->view->info="删除课程成功";
			$this->view->href="/admin/manageclass";
			$this->_forward("log","global");;
		}
	}
}


=======
	
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
>>>>>>> 163df2f6e4b7afb07235098dc3e2a4c7b870aaf0
