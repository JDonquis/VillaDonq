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

	static function get_lessons($id)
	{
		$release =  new Release_teacher();
		$lessons = $release->get_lessons_one($id);

		return $lessons;
	}


}

if(isset($_GET['lesson']) )
{
	$array_obj = Teacher_controller::get_lessons($_GET['lesson']);

	$resp = array();

	foreach($array_obj as $key => $value)
	{	
		$a = (array) $value;
		array_push($resp,$a);	
	}

	

	echo json_encode($resp);


// $matter = array();

	// $section = array();

	// $year = array();

	// foreach($array_obj as $key => $value)
	// {
	// 	array_push($matter, $value->get_id_matter());
	// 	array_push($section, $value->get_id_section());
	// 	array_push($year, $value->get_id_course());	
	// }

	// $resp = array($matter,$section,$year);

}

 ?>

