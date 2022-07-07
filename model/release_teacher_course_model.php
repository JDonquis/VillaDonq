<?php 

require_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/model/teacher_course_model.php";

class Release_teacher_course
{
	
	private $db;
		
	function __construct()
	{
		require_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/model/database.php";
		$this->db=Database::Connect();
		
	}

	function get_all_one_teacher($id)
	{
		$sql = "SELECT t.id_course,c.name AS course_name,t.id_matter,m.name AS matter_name, t.id_section FROM teacher_courses t INNER JOIN matter m on t.id_matter = m.id INNER JOIN course c ON t.id_course = c.id WHERE t.id_teacher =".$id;

		$result=$this->db->prepare($sql);
		$result->execute(array());

		$c=0;
		while ($row=$result->fetch(PDO::FETCH_ASSOC))
		{
			$lesson = new Teacher_course();

			$lesson->set_id_matter($row['id_matter']);
			$lesson->set_name_matter($row['matter_name']);
			$lesson->set_id_course($row['id_course']);
			$lesson->set_name_course($row['course_name']);
			$lesson->set_id_section($row['id_section']);

			$lessons[$c]=$lesson;
			$c++;

		}
		return $lessons;

	}
}



 ?>