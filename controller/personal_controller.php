<?php 

require_once "../../model/release_personal_model.php";



class Personal_controller
{	
		
	function __construct()
	{	
	}

	

	static function get_Personal(){

		$release=new Release_personal();

		$personal=$release->get_all_personal();

		return $personal;
	
	}

		static function get_one($id_user)
	{
		$release=new Release_personal();

		$persona=$release->get_one_personal($id_user);

		return $persona;
	}


/*
	static function get_categories()
	{
		$release=new Release_model();

		$array=$release->get_allcategories();

		return $array;
	}

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