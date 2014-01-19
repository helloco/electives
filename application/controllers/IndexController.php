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
    	
    	$class_message=$classesModel->getclass($classid);
    	$this->view->class_message=$class_message;
    	
    	$comments=$commentsModel->getcomments($classid);
    	$this->view->comments=$comments;
    	$this->render('details');
//     	echo "<pre>";
//     	print_r($comment);
//     	echo "</pre>";
//     	exit();
    }

}

