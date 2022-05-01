  <?php 

    session_start();
    if(isset($_SESSION['id']))
    {
       require_once "/var/www/html/development/VillaDonq/controller/Login_controller.php";

        
        $type=$_SESSION['id_position'];

        if($type==4)
        {
            require_once "/var/www/html/development/VillaDonq/controller/Student_controller.php";

            $user=Students_controller::get_one($_SESSION['id']);
        }
        else if($type==1)
        {
            require_once "/var/www/html/development/VillaDonq/controller/Personal_controller.php";
            $user=Personal_controller::get_one($_SESSION['id']);
        }
        
    }

    else{

        
         header("location:/development/VillaDonq/views/login.php");
         exit();
    }

     ?>