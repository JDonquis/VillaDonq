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
	/*
	function show_main(){

		include_once "/var/www/html/development/php/BLOG/view/images.php";
	}

	function show_header(){

		include_once "/var/www/html/development/php/BLOG/view/header.php";

	}

	function show_banner(){

		$section="contact";

		include "/var/www/html/development/php/BLOG/view/sectionBanner.php";

	}

	function show_contact(){

		include_once "/var/www/html/development/php/BLOG/view/contact.php";

	}

	function show_footer(){

		$section="MauCake";

		include "/var/www/html/development/php/BLOG/view/sectionBanner.php";

	}
	
	*/

}


 ?>