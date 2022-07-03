<?php 

require_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/model/release_teacher_model.php";

class Teacher_controller
{	
		
	function __construct()
	{	
	}

	

	static function get_teachers(){

		$release=new Release_teacher();

		$teachers=$release->get_all_teachers();

		return $teachers;
	
	}

		static function get_one($id_user)
	{
		$release=new Release_teacher();

		$teacher=$release->get_one_teacher($id_user);

		return $teacher;
	}


}

 ?>