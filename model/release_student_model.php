<?php 

require_once "student_model.php";

class Release_student
{	
	

	private $db;
		
	function __construct()
	{
		require_once "database.php";
		$this->db=Database::Connect();
		
	}

	
	function get_all_students()
	{	
		$students=array();
		$c=0;

		$sql="SELECT student.id,student.id_user,student.id_course, user.DNI,user.name,user.last_name,user.email,user.password,user.phone,user.date_birth,user.photo
FROM student INNER JOIN user ON student.id_user = user.id;  ORDER BY id DESC";

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

/*	function insert_student(Student $student)
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