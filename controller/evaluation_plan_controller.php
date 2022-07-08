<?php 

require_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/model/release_evaluation_plan_model.php";
// require_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/model/release_activity_model.php";


class Evaluation_plan_controller
{	

	function __construct(){}

	static function get_plan_all($id_teacher)
	{

		$release = new Release_evaluation_plan();

		$plans = $release->get_plan_all($id_teacher);

		return $plans;		
	}

	static function insert_plan(Evaluation_plan $plan)
	{
		$release = new Release_evaluation_plan();

		$resp = $release->insert_plan($plan);

		return $resp;		
	}
}

if(isset($_POST['insert']) and $_POST['insert']==1)
{		


		 $plan = new Evaluation_plan();

		 $a = new Release_activity();

		 $plan->set_id_teacher(htmlentities(addslashes($_POST['teacher_id'] ) ) );

		 $plan->set_name_teacher(htmlentities(addslashes($_POST['name_teacher'] ) ),htmlentities(addslashes($_POST['last_name_teacher'] ) ) );

		 $plan->set_id_lapse(htmlentities(addslashes($_POST['customRadio'] ) ) );

		 $id = Evaluation_plan_controller::insert_plan($plan);

		 $n = (int) $_POST['unidades'];

		 for($i=0; $i < $n ; $i++)
		 { 		
		 	$c = $i+1;

		 	$activity = new Activity();

		 	$activity->set_id_plan($id);
		 	$activity->set_title($_POST['tema'.$c]);
		 	$activity->set_description($_POST['contenido'.$c]);
		 	$activity->set_strategy($_POST['estrategia'.$c] );
		 	$activity->set_value($_POST['valor'.$c] );

		 	$resp = $a->insert_activity($activity);

		 }

		 
		 echo 1;
		 	

		
}





 ?>