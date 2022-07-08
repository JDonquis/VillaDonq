<?php 

require_once $_SERVER["DOCUMENT_ROOT"]."/VillaDonq/model/evaluation_plan_model.php";

class Release_evaluation_plan
{
	protected $db;
		
	function __construct()
	{
		require_once $_SERVER["DOCUMENT_ROOT"]."/VillaDonq/model/database.php";
		$this->db=Database::Connect();
	
	}

	function get_plan_one($id_teacher)
	{
		$sql = "SELECT p.id,p.id_teacher,p.id_lapse,u.name,u.last_name FROM plan_activities p INNER JOIN teacher t ON p.id_teacher = t.id INNER JOIN user u on t.id_user = u.id WHERE p.id_teacher =".$id_teacher;

		$result = $this->db->prepare($sql);
		$result->execute(array()); 

		$row=$result->fetch(PDO::FETCH_ASSOC);

		$plan = new Evaluation_plan();

		$plan->set_id($row['id']);
		$plan->set_id_teacher($row['id_teacher']);
		$plan->set_id_lapse($row['id_lapse']);
		$plan->set_name_teacher($row['name'],$row['last_name']);
		$plan->set_activities($row['id']);

		return $plan;
	}

	function insert_plan(Evaluation_plan $plan)
	{
		$sql="INSERT INTO plan_activities(id, id_teacher, id_lapse) VALUES (NULL, :id_teacher, :id_lapse)";

		$result=$this->db->prepare($sql);

		$result->execute(array( ":id_teacher"=>$plan->get_id_teacher(),":id_lapse"=>$plan->get_id_lapse() ) );

		if($result->rowCount()!=0)
        {
        	$id = $this->db->lastInsertId();

        	$sql2 = "INSERT INTO activities (id, id_plan, title, description, strategy, value) VALUES (NULL, :id_plan, :title, :description, :strategy, :value)";
        } 
        
        else{
            return 2;
        }
	}
}

 ?>