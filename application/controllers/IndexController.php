<?php
require_once 'BaseController.php';
require_once APPLICATION_PATH.'/models/Classes.php';
require_once APPLICATION_PATH.'/models/Comments.php';
require_once APPLICATION_PATH.'/models/User.php';
class IndexController extends BaseController
{

    public function indexAction()
    {
       $classesModel=new Classes();
       $res=$classesModel->showclasses();
       $this->view->classes=$res;
    }

    public function showcommentuiAction(){
    	$classid=$this->getRequest()->getParam('classid');
    	
    	$commentsModel=new Comments();
    	$classesModel=new Classes();
    	$userModel=new User();
    	
    	$classmessage=$classesModel->getclass($classid);
    	$this->view->classmessage=$classmessage[0];
    	$comments=$commentsModel->getcomments($classid);
    	$this->view->comments=$comments;
    	$this->render('details');
    	
    }
   
    public function addcommentAction(){
    	$classid=$this->getRequest()->getParam("classid",'');
    	$comment=$this->getRequest()->getParam('comment','');
    	$time="999999";
    	session_start();
    	$userid=$_SESSION['normal_user_message']['id'];
    	$data=array(
			'classid'=>$classid,
			'userid'=>$userid,
			'time'=>$time,
			'comment'=>$comment
		);
    	$commentsModel=new Comments();
    	$res=$commentsModel->addcomment($classid, $userid, $comment);
    	if ($res) {
    		$this->view->info="ÆÀÂÛ³É¹¦£¡";
			$this->view->href="/index/showcommentui?classid=$classid";
			$this->_forward("log","global");;
    	}
    }
    
    

}

