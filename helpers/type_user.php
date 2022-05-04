  <?php 

    session_start();
    if(isset($_SESSION['id']))
    {
       require_once "../controller/Login_controller.php";

        
        $type=$_SESSION['id_position'];

        if($type==4)
        {
            require_once "../controller/Student_controller.php";

            $user=Students_controller::get_one($_SESSION['id']);
        }
        else if($type==1)
        {
            require_once "../controller/Personal_controller.php";
            $user=Personal_controller::get_one($_SESSION['id']);
        }
        
    }

    else{

        
         header("location:../views/login.php");
         exit();
    }

     ?>