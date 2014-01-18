<?php
require_once 'BaseController.php';
require_once APPLICATION_PATH.'/models/Classes.php';
class IndexController extends BaseController
{

   

    public function indexAction()
    {
       $classesModel=new Classes();
       $res=$classesModel->showclasses();
       $this->view->classes=$res;
    }


}

