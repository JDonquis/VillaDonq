<?php 

require_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/model/release_student_model.php";

class Students_controller
{	
	
	function __construct()
	{	
	}

	

	static function get_Students(){

		$release=new Release_student();

		$students=$release->get_all_students();

		return $students;
	
	}



	static function get_one($id_user)
	{
		$release=new Release_student();

		$student=$release->get_one_student($id_user);

		return $student;
	}


}


 ?>