<?php
class IndexController extends Zend_Controller_Action
{

	

	public function indexAction()
	{
		// action body
		echo 'ok';
		exit();
		$this->render('../admin/index.pthml');
	}


}