<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/model/directive_model.php";
require_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/model/request_model.php";


class Release_directive
{	

	protected $db;
	
		
	function __construct()
	{
		require_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/model/database.php";
		$this->db=Database::Connect();

	
		
	}

	
	function get_all_directive()
	{	
		$directives=array();
		$c=0;

		$sql="SELECT personal.id,personal.id_user,user.DNI,user.name,user.last_name,user.email,user.password,user.phone,user.photo,user.date_birth FROM personal INNER JOIN user ON personal.id_user = user.id WHERE user.id_position=3";

		$result=$this->db->prepare($sql);
		$result->execute(array());

		while ($row=$result->fetch(PDO::FETCH_ASSOC))
		{
			$directive=new Directive();

			$directive->set_id($row['id']);
			$directive->set_id_user($row['id_user']);
			$directive->set_DNI($row['DNI']);
			$directive->set_name($row['name']);
			$directive->set_last_name($row['last_name']);
			$directive->set_email($row['email']);
			$directive->set_password($row['password']);
			$directive->set_phone($row['phone']);
			$directive->set_date_birth($row['date_birth']);
			$directive->set_photo($row['photo']);

			$directives[$c]=$directive;
			$c++;

		}
		
		

		return $directives;
	}

	function get_one_directive($id_user)
	{	
		$directive=new Directive();
		$c=0;

		$sql="SELECT personal.id,personal.id_user,user.DNI,user.name,user.last_name,user.email,user.password,user.phone,user.photo,user.date_birth FROM personal INNER JOIN user ON personal.id_user = user.id WHERE user.id_position=3 and user.id=".$id_user;

		$result=$this->db->prepare($sql);
		$result->execute();

		$row=$result->fetch(PDO::FETCH_ASSOC);
		
					
			$directive->set_id($row['id']);
			$directive->set_id_user($row['id_user']);
			$directive->set_DNI($row['DNI']);
			$directive->set_name($row['name']);
			$directive->set_last_name($row['last_name']);
			$directive->set_email($row['email']);
			$directive->set_password($row['password']);
			$directive->set_phone($row['phone']);
			$directive->set_date_birth($row['date_birth']);
			$directive->set_photo($row['photo']);

		
		return $directive;
	}

	
	function insert_student(Request $student,$course)
	{	
		$sql="INSERT INTO user (id, id_position, DNI, name, last_name, email, password, phone, photo, date_birth) VALUES (NULL, '4', :DNI, :name, :last_name,:email,:password, :phone, :photo, :date_birth)";

		$result=$this->db->prepare($sql);

		$result->execute(array(":DNI"=>$student->get_DNI(),":name"=>$student->get_name(),":last_name"=>$student->get_last_name(),":email"=>$student->get_email(),":password"=>$student->get_DNI(),":phone"=>$student->get_phone(),":photo"=>$student->get_photo()));

		if($result->rowCount()!=0)
            {
              $sql="UPDATE student SET representative_name=:rep_name,representative_phone_number=:rep_phone, id_course=:course WHERE id_user IN (SELECT id FROM `user` WHERE DNI=".$student->get_DNI().")";

              	$result=$this->db->prepare($sql);

              	$result->execute(array(":rep_name"=>$student->get_representative_name(),":rep_phone"=>$student->get_representative_phone_number(),":course"=>$course ));

        	}
        else{
            return 2;
        }

	}


}



 ?>