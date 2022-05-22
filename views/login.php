<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">

    <title>VillaDonq</title>
</head>

<body class="<?php if (isset($_GET["try"])) echo 'error' ?>" >
<?php require_once "php_sections/_loader.php"; ?>
    <?php require_once "php_sections/_form-login.php"; ?>



</body>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.3/gsap.min.js"></script> -->
<script src="js/login.js"></script> 
<script src="js/loader.js"></script>
<script src="js/base.js"></script>
<script src="js/feedback_message.js" ></script> 


</html>
