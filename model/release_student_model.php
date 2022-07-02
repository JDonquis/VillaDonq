<?php 

require_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/model/student_model.php";

class Release_student
{	
	

	private $db;
		
	function __construct()
	{
		require_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/model/database.php";
		$this->db=Database::Connect();
		
	}

	function get_all_students()
	{	
		$students=array();
		$c=0;

		$sql="SELECT student.id,student.id_user,student.id_course, user.DNI,user.name,user.last_name,user.email,user.password,user.phone,user.date_birth,user.photo FROM student INNER JOIN user ON student.id_user = user.id;  ORDER BY id DESC";

		$result=$this->db->prepare($sql);
		$result->execute(array());


		while ($row=$result->fetch(PDO::FETCH_ASSOC))
		{
			$student=new Student();

			$student->set_id($row['id']);
			$student->set_id_user($row['id_user']);
			$student->set_DNI($row['DNI']);
			$student->set_name($row['name']);
			$student->set_last_name($row['last_name']);
			$student->set_course($row['id_course']);
			$student->set_email($row['email']);
			$student->set_password($row['password']);
			$student->set_phone($row['phone']);
			$student->set_date_birth($row['date_birth']);
			$student->set_photo($row['photo']);

			$students[$c]=$student;
			$c++;

		}
		return $students;
	}

	function get_one_student($id_user)
	{	
		$student=new Student();
		$c=0;

		$sql="SELECT student.id,student.id_course,student.id_user,user.DNI,user.name,user.last_name,user.email,user.password,user.phone,user.photo,user.date_birth FROM student INNER JOIN user ON student.id_user = user.id WHERE user.id=".$id_user;

		$result=$this->db->prepare($sql);
		$result->execute();

		$row=$result->fetch(PDO::FETCH_ASSOC);
		
			$student->set_id($row['id']);
			$student->set_id_user($row['id_user']);
			$student->set_DNI($row['DNI']);
			$student->set_name($row['name']);
			$student->set_last_name($row['last_name']);
			$student->set_course($row['id_course']);
			$student->set_email($row['email']);
			$student->set_password($row['password']);
			$student->set_phone($row['phone']);
			$student->set_date_birth($row['date_birth']);
			$student->set_photo($row['photo']);

		
		return $student;
	}



}



 ?>