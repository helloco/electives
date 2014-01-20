<?php
class Comments extends Zend_Db_Table{
	protected $_name="comments";
	protected $_primary = 'classid';
	
	//show comments details
	public function getcomments($classid){
		//$sql="select co.classid,co.time,co.comment,cl.id,cl.name,cl.teacher,cl.score from comments co,classes cl where co.classid=cl.id AND classid=$classid";
		$sql="select co.userid,co.time,co.comment from comments co where classid=$classid";
		//$sql="select co.userid,co.time,co.comment,u.class from comments co ,user u where co.userid=u.id AND classid=$classid";
		//$sql="select co.userid,co.time,co.comment,u.class from comments co ,user u where co.userid=u.id AND classid=$classid";
		
		$db=$this->getAdapter();
		return $db->query($sql)->fetchAll();
	}
	
	
	public function addcomment($classid,$userid,$comment){
		$time=date("Y-m-d H:i:s");
		$data=array(
			'classid'=>$classid,
			'userid'=>$userid,
			'time'=>$time,
			'comment'=>$comment
		);
		$this->insert($data);
		return true;
	}
}