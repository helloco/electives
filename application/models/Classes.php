<?php
class Classes extends Zend_Db_Table{
	protected $_name='classes';
	
	public function addclass($class_id,$class_name,$class_teacher,$class_score){
		$data=array(
			'id'=>$class_id,
			'name'=>$class_name,
			'teacher'=>$class_teacher,
			'score'=>$class_score
		);
		if ($this->insert($data)) {
			return true;
		}else {
			return false;
		}
			
	}
	
	public function showclasses(){
		$sql="select * from classes";
		$db=$this->getAdapter();
		return $db->query($sql)->fetchAll();
	}
	
	public function deleteclass($classesid){
		$where="id=$classesid";
		return $res=$this->delete($where);
	}
}