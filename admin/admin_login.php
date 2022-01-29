<?php
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>

  <title>Admin Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <style type="text/css">

   
    section
    {
      margin-top: -20px;
    }
  </style> 

</head>

<body>

<section>
  <div class="logu_img">
   <br><br><br><br><br>
    <div class="show1">
          <h1 style="text-align: center; font-size: 40px;font-family: Lucida Console;">JOIN HERE!</h1>
          <h1 style="text-align: center; font-size: 30px;">User Login FORM</h1><br>
     <form name="login" action="" method="post">
        <div class="login">
          <input class="form-control" type="text" name="userid" placeholder="UserID" required=""> <br>
          <input class="form-control" type="password" name="password" placeholder="Password" required=""> <br>

          <input class="btn btn-default" type="submit" name="submit" value="Sign In" style="color: black; background-color: lightskyblue; width: 74px; height: 30px;">
         
        </div> 
        <p style="color: white; font-size: 15px; ;">
        Not registered yet?<a style="color: yellowgreen;" href="registration.php">Sign Up</a><br><br><br>
        <a style="color:yellowgreen;" href="forpass.php">Forgot password?</a>
       </p>
      </form> 
    
  </div>
  
</section> 

<?php

    if(isset($_POST['submit']))
    {
      $count=0;
      $res=mysqli_query($db,"SELECT * FROM `adminr` WHERE userid='$_POST[userid]' && password='$_POST[password]';");
      
      $row= mysqli_fetch_assoc($res);
      $count=mysqli_num_rows($res);

      if($count==0)
      {
        ?>
              
          <div class="alert alert-danger" style="width: 280px;margin-left: 380px;background-color: peachpuff;color: darkred;">
            <strong> Invalid UserID or Password !!!</strong>
          </div>    
        <?php
      }
      else   /*---match----*/
      {
        $_SESSION['login_user'] = $_POST['userid'];
        $_SESSION['picu']= $row['picu'];

        ?>
          <script type="text/javascript">
            window.location="index.php"
          </script>
        <?php
      }
    }

  ?>




</body>
</html>