<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/model/teacher_model.php";

class Release_teacher
{	
	
	protected $db;
		
	function __construct()
	{
		require_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/model/database.php";
		$this->db=Database::Connect();
		
	}

	
	function get_all_teachers()
	{	
		$teachers=array();
		$c=0;

		$sql="SELECT teacher.id,teacher.id_user,user.DNI,user.name,user.last_name,user.email,user.password,user.phone,user.photo,user.date_birth FROM teacher INNER JOIN user ON teacher.id_user = user.id WHERE user.id_position=1";

		$result=$this->db->prepare($sql);
		$result->execute(array());

		while ($row=$result->fetch(PDO::FETCH_ASSOC))
		{
			$teacher=new Teacher();

			$teacher->set_id($row['id']);
			$teacher->set_id_user($row['id_user']);
			$teacher->set_DNI($row['DNI']);
			$teacher->set_name($row['name']);
			$teacher->set_last_name($row['last_name']);
			$teacher->set_email($row['email']);
			$teacher->set_password($row['password']);
			$teacher->set_phone($row['phone']);
			$teacher->set_date_birth($row['date_birth']);
			$teacher->set_photo($row['photo']);

			$teachers[$c]=$teacher;
			$c++;

		}
		
		

		return $teachers;
	}

	function get_one_teacher($id_user)
	{	
		$teacher=new Teacher();
		$c=0;

		$sql="SELECT teacher.id,teacher.id_user,user.DNI,user.name,user.last_name,user.email,user.password,user.phone,user.photo,user.date_birth FROM teacher INNER JOIN user ON teacher.id_user = user.id WHERE user.id=".$id_user;

		$result=$this->db->prepare($sql);
		$result->execute();

		$row=$result->fetch(PDO::FETCH_ASSOC);
		
			
			$teacher->set_id($row['id']);
			$teacher->set_id_user($row['id_user']);
			$teacher->set_DNI($row['DNI']);
			$teacher->set_name($row['name']);
			$teacher->set_last_name($row['last_name']);
			$teacher->set_email($row['email']);
			$teacher->set_password($row['password']);
			$teacher->set_phone($row['phone']);
			$teacher->set_date_birth($row['date_birth']);
			$teacher->set_photo($row['photo']);

			return $teacher;
	}

	function get_matters()
	{
		
	}


	
}



 ?>