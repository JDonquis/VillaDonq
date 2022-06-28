  <?php 


    session_start();
    if(isset($_SESSION['id']))
    { 
       require_once "../../controller/login_controller.php"; 
        
        $type=$_SESSION['id_position'];

        if($type==4)
        {
            require_once "../../controller/student_controller.php";

            $user=Students_controller::get_one($_SESSION['id']);
        }


        else if($type==1 or $type==2)
        {
            require_once "../../controller/personal_controller.php";
            $user=Personal_controller::get_one($_SESSION['id']);
        }

            else if($type==3)
        {
            require_once "../../controller/personal_controller.php";
            $user=Personal_controller::get_one($_SESSION['id']);
        }
        
    }

    else{

        
         header("location:../../views/login.php");
         exit();
    }

     ?>