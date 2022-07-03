<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/model/administrative_model.php";
require_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/model/request_model.php";

class Release_administrative
{	
	
	protected $db;
		
	function __construct()
	{
		require_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/model/database.php";
		$this->db=Database::Connect();
		
	}

		function get_all_administratives()
	{	
		$administratives=array();
		$c=0;

		$sql="SELECT administrative.id,administrative.id_user,user.DNI,user.name,user.last_name,user.email,user.password,user.phone,user.photo,user.date_birth FROM administrative INNER JOIN user ON administrative.id_user = user.id WHERE user.id_position=2";

		$result=$this->db->prepare($sql);
		$result->execute(array());

		while ($row=$result->fetch(PDO::FETCH_ASSOC))
		{
			$administrative=new Administrative();

			$administrative->set_id($row['id']);
			$administrative->set_id_user($row['id_user']);
			$administrative->set_DNI($row['DNI']);
			$administrative->set_name($row['name']);
			$administrative->set_last_name($row['last_name']);
			$administrative->set_email($row['email']);
			$administrative->set_password($row['password']);
			$administrative->set_phone($row['phone']);
			$administrative->set_date_birth($row['date_birth']);
			$administrative->set_photo($row['photo']);

			$administratives[$c]=$administrative;
			$c++;

		}
		
		

		return $administratives;
	}
	
	function get_one_administrative($id_user)
	{	
		$administrative=new Administrative();
		$c=0;

		$sql="SELECT administrative.id,administrative.id_user,user.DNI,user.name,user.last_name,user.email,user.password,user.phone,user.photo,user.date_birth FROM administrative INNER JOIN user ON administrative.id_user = user.id WHERE user.id=".$id_user;

		$result=$this->db->prepare($sql);
		$result->execute();

		$row=$result->fetch(PDO::FETCH_ASSOC);
		
			
			$administrative->set_id($row['id']);
			$administrative->set_id_user($row['id_user']);
			$administrative->set_DNI($row['DNI']);
			$administrative->set_name($row['name']);
			$administrative->set_last_name($row['last_name']);
			$administrative->set_email($row['email']);
			$administrative->set_password($row['password']);
			$administrative->set_phone($row['phone']);
			$administrative->set_date_birth($row['date_birth']);
			$administrative->set_photo($row['photo']);

			return $administrative;
	}

		function insert_student(Request $student,$course)
	{	
		$sql="INSERT INTO user (id, id_position, DNI, name, last_name, email, password, phone, photo, date_birth) VALUES (NULL, '4', :DNI, :name, :last_name,:email,:password, :phone, :photo, :date_birth)";

		$result=$this->db->prepare($sql);

		$result->execute(array(":DNI"=>$student->get_DNI(),":name"=>$student->get_name(),":last_name"=>$student->get_last_name(),":email"=>$student->get_email(),":password"=>$student->get_DNI(),":phone"=>$student->get_phone(),":photo"=>$student->get_photo()));

		if($result->rowCount()!=0)
            {
            	$id_student = $this->db->lastInsertId();
              					
              	$sql="INSERT INTO student (id,id_user,id_course,representative_name,representative_DNI,representative_phone_number) VALUES(NULL,:id_user,:id_course,:representative_name,:representative_DNI,:representative_phone_number)";

              	$result=$this->db->prepare($sql);

              	$result->execute(array(":representative_name"=>$student->get_representative_name(),":representative_phone_number"=>$student->get_representative_phone_number(),":course"=>$course,":id_user"=>$id_student ));

        	}
        else{
            return 2;
        }

	}


	
}



 ?>