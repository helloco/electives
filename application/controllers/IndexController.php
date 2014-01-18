<?php
require_once 'BaseController.php';
<<<<<<< HEAD
require_once APPLICATION_PATH.'/models/Classes.php';
=======
>>>>>>> 163df2f6e4b7afb07235098dc3e2a4c7b870aaf0
class IndexController extends BaseController
{

   

    public function indexAction()
    {
<<<<<<< HEAD
       $classesModel=new Classes();
       $res=$classesModel->showclasses();
       $this->view->classes=$res;
=======
        // action body
       
>>>>>>> 163df2f6e4b7afb07235098dc3e2a4c7b870aaf0
    }


}

