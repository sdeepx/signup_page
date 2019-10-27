<?php

session_start();
include_once "database.php";


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
    <title>Sign Up</title>

  
 
  </head>
<body>


 

<?php
define('DBNAME', 'USER_DATA');

$conn =  new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $fname = trim($_POST['fname']);
    $fname = strip_tags($fname);
    $fname = htmlspecialchars($fname);
    
    $lname = trim($_POST['sname']);
    $lname = strip_tags($lname);
    $lname = htmlspecialchars($lname);
    
    $uname = trim($_POST['uname']);
    $uname = strip_tags($uname);
    $uname = htmlspecialchars($uname);
    
    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);
    
    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);
    
    $cpass = trim($_POST['cpass']);
    $cpass = strip_tags($cpass);
    $cpass = htmlspecialchars($cpass);
    
    $phno = trim($_POST['phno']);
    $phno = strip_tags($phno);
    $phno = htmlspecialchars($phno);

    $gender = $_POST['gender'];

    $dob = trim($_POST['dob']);
    $dob = strip_tags($dob);
    $dob = htmlspecialchars($dob);

    $opt = $_POST["opt"];

    # -------------------------------------------

    if (empty($fname)) {
        $error = true;
        $fnameerr = "[-] Please enter your First name";  
        
       } 

        else if (!preg_match("/^[a-zA-Z ]+$/", $fname)) {
          $error = true;
          $fnameerr = "[-] Please enter a valid name";
        } else if (strlen($fname) <=2 ) {
          $error = true;
          $fnameerr = "[-] Your first name is too short!";
        } else if (strlen($fname) >=20 ) {
              $error = true;
              $fnameerr = "[-] Your first name is too long";
      
          }
  
    // } elseif (!preg_match("/^[a-zA-Z ]+$/", $fname)) {
    //     $error = true;
    //     $fnameerr = "<span id='empty' class='text-danger'>Opss! Please enter a valid name</span>";
    // } 
         

    // } 

    // first name validation done..

    // surename starts..

    if (empty($lname)) {
        $error = true;
        $lnameerr = "<i> [-] Please enter your Last name</i>";    
    
    } else if (!preg_match("/^[a-zA-Z ]+$/", $lname)) {
        $error = true;
        $lnameerr = "<i> [-] Please enter a valid name</i>";
    } else if (strlen($lname) <=2 ) {
        $error = true;
        $lnameerr = "<i> [-] Your last name is too short!</i>";

    } else if (strlen($lname) >=15 ) {
        $error = true;
        $lnamerr = "<i> [-] Your last name is too lomg!<i>";

    }

//     // lname done.
    
    if (empty($dob)) {
      $error = true;
      $doberr = "<i> [-] Submit your date of birth </i>";
    }

//     //email validation..
    if (empty($email)) {
      $error = true;
      $emailerr = "<i> [-] Please enter your email address.</i>";
    }
   else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $emailerr = "<i> [-] Please enter valid email address.</i>";}
//     } else {
        
//     // check email exist or not
//     $query = "SELECT Email FROM users WHERE Email='$email'";
//     $result = mysql_query($query);
//     $count = mysql_num_rows($result);

//     if ($count != 0) {
//         $error = true;
//         $emailerr = "An Account already exists with this email.";

//     } 
// }

// //Username
if (empty($uname)) {
    $error = true;
    $unameerr = "<span id='empty' class='text-danger'><i>[-] Please create a Username.</i></span>";
}
//  else
// {
//     $uquery = "SELECT 'Username' FROM 'users' WHERE 'Username'='$uname'";
//     $uresult = mysql_query($uquery);
//     $ucount = mysql_num_rows($uresult);

//     if ($ucount != 0) {
//         $error = true;
//         $unameerr = "<span id='empty' class='text-danger'>This Username already exists.</span>";

//     } 
// }

// // gender
if (!isset($gender)) {
    $error = true;
    $gendererr = "<span id='empty' class='text-danger'><i> [-] Please select Gender </i></span>";
}

// if (empty($dob)) {
//     $error = true;
//     $doberr = "<span id='empty' class='text-danger'>Please Enter your Date of Birth</span>";
// }



if  (empty($pass)) {
    $error = true;
    $passerr = "<span id='empty' class='text-danger'><i>[-] Please create password.</i></span>";
    
} else if (!empty($pass) && empty($cpass)) {
  $cpasserr = "<span id='empty' class='text-danger'><i> [-] Please confirm new password.</i></span>";
}

else if ((strlen($pass) < 6) || (strlen($cpass) < 6 )) {
    $error = true;
    $passerr = "<span id='empty' class='text-danger'><i> [-] Password must have atleast 6 characters.</i></span>";
    

} else if (($pass == 123456) || ($pass == 1234567) || ($pass == 12345678)) {
    $error = true;
    $passerr = "<span id='empty' class='text-danger'><i> [-] Please choose more secure password.</i></span>";

} else if ($pass != $cpass) {
    $error = true;
    $cpasserr = "<span id='empty' class='text-danger'><i> [-] Password not matched.</i></span>";
}





if (empty($phno)) {
  $error = true;
  $pherr = "<i> [-] Please Enter your phone number</i>";  
 } else if ((strlen($phno) <= 9) || (strlen($phno) >= 11)) {
  $error = true;
  $pherr = "<i> [-] Please Enter Valid Phone number</i>";
 }


$password = $pass;
$cpassword = $cpass;

$password = md5($password);
$password = sha1($password);
$password = sha1($password);
$password = md5($password);

$cpassword = md5($cpassword);
$cpassword = sha1($cpassword);
$cpassword = sha1($cpassword);
$cpassword = md5($cpassword);

if (!$error) {
  # code...

    $sql_data = "INSERT INTO users(First_Name, Surname, Gender, Dob, Username, Email, Create_Password, Confirm_Password, Country, Phone_No)
VALUES('$fname', '$lname', '$gender', '$dob', '$uname', '$email', '$password', '$cpassword', '$opt', '$phno')";
if ($conn->query($sql_data) === TRUE) {
   if (isset($_POST["btn-signup"])) {
     
    header("location: home.php");
   }
} else {
    echo "Error ".$sql_data."<br>".$conn->error;
} }
}



$conn->close();

?>


<div class="container">

    <div class="login-container d-flex align-items-center justify-content-center">

    <form class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);  ?>" method="POST">

      <h1 class="text-center mt-3">Create Account</h1> 
      <hr class="mt-5">

      <div class="row">
        <div class="col">
        <div class="form-group mt-4">
          <label>First Name<span class="required"> *</span></label>
          <input type="text" name="fname" class="form-control rounded-pill form-control-lg" placeholder="Enter First Name" >
          <span class="text-danger"><i><?php echo $fnameerr;  ?></i></span>  
        </div> </div>

        <div class="col">

         <div class="form-group  mt-4">
          <label>Surname<span class="required"> *</span></label>
          <input type="text" name="sname" class="form-control rounded-pill form-control-lg"  placeholder="Enter Last Name" >
          <span class="text-danger"><?php echo $lnameerr; ?></span>
        </div>  </div>

      </div>

      <div class="row">
        <div class="col">

         <div class="form-group">
          <label>Select Gender<span class="required"> *</span></label>
          <select class="form-control rounded-pill form-control-lg text-capitalize" name="gender"  id="exampleFormControlSelect1" required>
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
         
          </select>
          
        </div><span><?php echo $gendererr;  ?></span> </div>

        <div class="col">

          <div class="form-group">
              <label class="control-label"> Date of Birth <span class="required">*</span></label>
              <div class='input-group date' id='datetimepicker1'>
                  <input type='text' name="dob" class="form-control rounded-pill form-control-lg" placeholder="MM/dd/yyyy"  />
                  
                  <span class="input-group-addon ">
                      <span class="glyphicon  glyphicon-calendar"></span>
                  </span>
                 
              </div> 
              <span class="text-danger"><?php echo $doberr;  ?></span>
          </div>
      </div>   
      </div>

      <div class="row">
        <div class="col">

         <div class="form-group">
          <label>Create Username<span class="required"> *</span></label>
          <input type="text" name="uname" class="form-control rounded-pill form-control-lg"  placeholder="Cteate User Name" >
          <span><?php echo $unameerr; ?></span>
        </div> </div>

        <div class="col">

        <div class="form-group">
          <label for="exampleInputPassword1">Email<span class="required"> *</span></label>
          <input type="email" name="email" class="form-control rounded-pill form-control-lg" id="exampleInputPassword1" placeholder="Enter Email" >
          <span class="text-danger"><?php echo $emailerr; ?></span> 
        </div> </div>

      </div>

      <div class="row">
        <div class="col">

         <div class="form-group">
          <label for="reg_password"> Create Password<span class="required"> *</span></label>
          <input type="password" name="pass" class="form-control rounded-pill form-control-lg"  placeholder="Password" >
          <span><?php echo $passerr; ?></span>
        </div> </div>

        <div class="col">
        <div class="form-group">
          <label for="reg_password"> Confirm Password<span class="required"> *</span></label>
          <input type="password" name="cpass" class="form-control rounded-pill form-control-lg"  placeholder="Password" >
          <span><?php echo $cpasserr; ?></span>
        </div>  </div>

      </div>

      <div class="row">
        <div class="col">

         <div class="form-group">
          <label>Select Country<span class="required"> *</span></label>
          <select name="opt" class="form-control rounded-pill form-control-lg text-capitalize" id="exampleFormControlSelect1">
            <option>India</option>
            <option>Usa</option>
            <option>Uk</option>
            <option>Norway</option>
            <option>China</option>
            <option>Netherlands</option>
            <option>Canada</option>
            <option>Germany</option>
            <option>Belgium</option>
            <option>Switzerland</option>
            <option>Denmark</option>
          </select>
          
        </div> </div>

        <div class="col">

         <div class="form-group">
          <label> Phone No <span class="required">*</span></label>
          <input type="tel" name="phno" class="form-control rounded-pill form-control-lg"  placeholder="Enter Phone Number" >
          <span class="text-danger"><?php  echo $pherr; ?></span>
        </div></div>
      </div>

        <button type="submit" name="btn-signup" class="btn btn-custom btn-block rounded-pill form-control-lg mt-5" >Sign Up</button>

        <div class="text-center rounded-pill mt-4" >
        <small>Already have an account? <a href="../index.html"> Log in </a></small><br>
        <small>By clicking "Sign up" you agree to our <a href=""> Terms of Service.</a></small>

      </div>


    </form>
  </div>
  </div>
    
  <script type="text/javascript">
          $(function () {
              $('#datetimepicker1').datetimepicker();
          });
      </script>
</body>
</html>