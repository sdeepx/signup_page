<?php

session_start();


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <title>Home</title>

  
 
  </head>
<body>
    <div class="container mt-5">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
   <button class="btn btn-primary ml-10 mt-5" name="btn1">Login</button>
    <button class="btn btn-primary ml-10 mt-5" name="btn2">Signup</button>
    </form>
    </div>

    <?php
    $btn1;$btn2;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $btn1 = $_POST["btn1"];
        $btn2 = $_POST["btn2"];

        if (isset($btn1)) {
            header("location: login.php");
        }
        if (isset($btn2)) {
            header("location: signup.php");
        }
    } 

    ?>




</body>
</html>
<?php ob_end_flush(); ?>