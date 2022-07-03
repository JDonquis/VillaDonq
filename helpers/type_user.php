  <?php 

    require_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/routes/routes.php";

    session_start();
    if(isset($_SESSION['id']))
    { 
       require_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/controller/login_controller.php"; 
        
        $type=$_SESSION['id_position'];

        if($type==4)
        {
            require_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/controller/student_controller.php"; 
            $user=Students_controller::get_one($_SESSION['id']);
        }

        else if($type==3)
        {
            require_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/controller/manager_controller.php";
            $user=Manager_controller::get_one($_SESSION['id']);
        }

        else if($type==2)
        {
            require_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/controller/administrative_controller.php";
            $user=Administrative_controller::get_one($_SESSION['id']);
        }

           else if($type==1)
        {
            require_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/controller/teacher_controller.php";
            $user=Teacher_controller::get_one($_SESSION['id']);
        }

            
        
    }

    else{

        
         header("location:".URL_VIEWS."login.php");
         exit();
    }

     ?>