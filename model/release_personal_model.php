<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/model/personal_model.php";



class Release_personal
{	
	
	protected $db;
		
	function __construct()
	{
		require_once "database.php";
		$this->db=Database::Connect();
		
	}

	
	// function get_all_personal()
	// {	
	// 	$personal=array();
	// 	$c=0;

	// 	$sql="SELECT * FROM personal ORDER BY id DESC";

	// 	$result=$this->db->prepare($sql);
	// 	$result->execute(array());

	// 	while ($row=$result->fetch(PDO::FETCH_ASSOC))
	// 	{
	// 		$person=new Personal();

	// 		$person->set_id($row['id']);
	// 		$person->set_id_position($row['id_position']);
	// 		$person->set_DNI($row['DNI']);
	// 		$person->set_name($row['name']);
	// 		$person->set_last_name($row['last_name']);
	// 		$person->set_email($row['email']);
	// 		$person->set_password($row['password']);
	// 		$person->set_phone($row['phone']);
	// 		$person->set_date_birth($row['date_birth']);
	// 		$person->set_photo($row['photo']);

	// 		$personal[$c]=$person;
	// 		$c++;

	// 	}
	// 	return $personal;
	// }

		function get_one_personal($id_user)
	{	
		$persona=new Personal();
		$c=0;

		$sql="SELECT personal.id,personal.id_user,user.DNI,user.name,user.last_name,user.email,user.password,user.phone,user.photo,user.date_birth FROM personal INNER JOIN user ON personal.id_user = user.id WHERE user.id=".$id_user;

		$result=$this->db->prepare($sql);
		$result->execute();

		$row=$result->fetch(PDO::FETCH_ASSOC);
		
			
			$persona->set_id($row['id']);
			$persona->set_id_user($row['id_user']);
			$persona->set_DNI($row['DNI']);
			$persona->set_name($row['name']);
			$persona->set_last_name($row['last_name']);
			$persona->set_email($row['email']);
			$persona->set_password($row['password']);
			$persona->set_phone($row['phone']);
			$persona->set_date_birth($row['date_birth']);
			$persona->set_photo($row['photo']);

		
		return $persona;
	}


	/*function insert_student(Student $student)
	{
		$sql="INSERT INTO images (id_category,title,subject,date,image) VALUES (:id_cat,:title,:sub,:date,:image)";
		$result=$this->db->prepare($sql);

		$result->execute(array(":id_cat"=>$image->get_category(),":title"=>$image->get_title(),":sub"=>$image->get_subject(),":date"=>$image->get_date(),":image"=>$image->get_image() ));

		if ($result->rowCount()!=0)
            return 1;  
        
        else{
            return 2;
        }

	}
	*/

	/*function get_allcategories()
	{
		$categories=array();
		$count=0;
		$sql="SELECT name FROM category";

		$result=$this->db->prepare($sql);
		$result->execute(array());

		while ($row=$result->fetch(PDO::FETCH_ASSOC))
		{	
			$categories[$count]=$row["name"];
			$count++;
			

		}
		return $categories;


	}

	
*/
}



 ?>