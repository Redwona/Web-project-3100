<?php
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>

  <title>Student Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

  <style type="text/css">
    section
    {
      margin-top: -20px;
    }
  </style>   
</head>

<body>

<section>
  <div class="reg_img">
    <br>
    <div class="show2">
        <h1 style="text-align: center; font-size: 30px;">User Registration Form</h1>
       <form name="Registration" action="" method="post">
          <div class="login">
           <input class="form-control" type="text" name="first" placeholder="First Name" required="" style="background-color: yellow;"><br>
           <input class="form-control" type="text" name="last" placeholder="Last Name" required="" style="background-color: yellow;"> <br>
           <input class="form-control" type="text" name="userid" placeholder="UserID" required="" style="background-color: yellow;"><br>
           <input class="form-control" type="password" name="password" placeholder="Password" required="" style="background-color: yellow;"><br>
           <input class="form-control" type="number" name="roll" placeholder="Roll No" required="" style="background-color: yellow;"><br>
           <input class="form-control" type="text" name="year" placeholder="Current Year" required="" style="background-color: yellow;"><br>
           <input class="form-control" type="text" name="email" placeholder="Email" required="" style="background-color: yellow;"><br>
           <input class="form-control" type="text" name="contact" placeholder="Contact No" required="" style="background-color: yellow;"><br>
            <input class="form-control" type="text" name="joindate" placeholder="Date Of Join" required="" style="background-color: yellow;"><br>
           
           <input class="btn btn-default" type="submit" name="submit" value="Sign Up" style="color: black; background-color: lightskyblue; width: 74px; height: 30px;">
         </div>
      
       </form>
     
    </div>
  </div>
</section>

<?php

   if(isset($_POST['submit']))
     
    { 
         $count=0;

         $sql="SELECT userid from `userr`";
         $res=mysqli_query($db,$sql);

        while($row=mysqli_fetch_assoc($res))
        {
          if($row['userid']==$_POST['userid'])
          {
            $count=$count+1;
          }
        }

       if($count==0)
        {
          mysqli_query($db,"INSERT INTO `USERR` VALUES('$_POST[first]', '$_POST[last]', '$_POST[userid]', '$_POST[password]', '$_POST[roll]','$_POST[year]', '$_POST[email]', '$_POST[contact]', '$_POST[joindate]','pu.png');");
       ?>
        <script type="text/javascript">
           alert("Registration successful");
          </script>
      <?php
        }
       else {
             ?>
              <script type="text/javascript">
               alert("The username already exist.");
              </script>
            <?php
            } 
   }        
 ?>

</body>
</html>