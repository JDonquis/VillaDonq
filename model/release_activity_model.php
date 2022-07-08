<?php 

require_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/model/activity_model.php";
class Release_activity
{
	
	protected $db;
		
	function __construct()
	{
		require_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/model/database.php";
		$this->db=Database::Connect();	
	}

	function get_activities($id_plan)
	{
		$sql = "SELECT a.id,a.id_plan,a.title,a.description,a.strategy,a.value FROM activities a INNER JOIN plan_activities p ON a.id_plan = p.id WHERE a.id_plan =".$id_plan;

		$c = 0;

		$result = $this->db->prepare($sql);
		$result->execute(array());

		while ($row = $result->fetch(PDO::FETCH_ASSOC))
		{
			$activity = new Activity();

			$activity->set_id($row['id']);
			$activity->set_id_plan($row['id_plan']);
			$activity->set_title($row['title']);
			$activity->set_description($row['description']);
			$activity->set_strategy($row['strategy']);
			$activity->set_value($row['value']);
			$activities[$c]=$activity;
			$c++;
		}
		
		return $activities;
	}

	function insert_activity(Activity $activity)
	{
		$sql = "INSERT INTO activities (id, id_plan, title, description, strategy, value) VALUES (NULL, :id_plan, :title, :description,:strategy,:value)";

		$result = $this->db->prepare($sql);
		$result->execute(array(

			":id_plan"=>$activity->get_id_plan(),":title"=>$activity->get_title(),
			":description"=>$activity->get_description(),":strategy"=>$activity->get_strategy(),
			":value"=>$activity->get_value() ) );

		// if ($result->rowCount()!=0)
  //           return 1;  
        
  //       else{
  //           return 2;
  //       }

		return 1;
	}




}




 ?>