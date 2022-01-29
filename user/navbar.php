<?php 
 session_start()
 ?>

<!DOCTYPE html>
<html>
<head>
	
	<title></title>

	<link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	 <nav class="navbar navbar-inverse">
      <div class="container-fluid">

        <div class="navbar-header">
           <a class="navbar-brand active">KUET_CSE BOOK HELP CENTRE</a>
        </div>
          <ul class="nav navbar-nav">
            <li><a href="index.php">HOME</a></li>
            <li><a href="books.php">BOOKS</a></li>
            <li><a href="feedback.php">FEEDBACK</a></li>
          </ul>

         <?php
            if(isset($_SESSION['login_user']))
            {
              ?>
              <ul class="nav navbar-nav">
               <li><a href="profile.php">PROFILE</a></li>
                <li><a href="fine.php">FINES</a></li>
 
              </ul> 

                <ul class="nav navbar-nav navbar-right">
                  <li><a href="profile.php">
                    <div style="color: white">
                      <?php
                        echo "<img class='img-circle profile_img' height=40 width=40  src='images/".$_SESSION['picus']."'>";
                        echo " ".$_SESSION['login_user'];
                      ?>
                    </div>
                  </a></li>
                  <li><a href="signout.php"><span class="glyphicon glyphicon-log-out"> SIGNOUT</span></a></li>
                </ul>
              <?php
            }
            else
            {   ?>
              <ul class="nav navbar-nav navbar-right">

                <li><a href="user_login.php"><span class="glyphicon glyphicon-log-in"> SIGNIN</span></a></li>
                
                <li><a href="registration.php"><span class="glyphicon glyphicon-user"> SIGNUP</span></a></li>
              </ul>
                <?php
            }
          ?>

    </div>
  </nav>
</body>
</html> 
<!--
  
      if(isset($_SESSION['login_user']))
      {
        $day=0;

        $exp='<p style="color:yellow; background-color:red;">EXPIRED</p>';
      $res= mysqli_query($db,"SELECT * FROM `book_issue` where userid ='$_SESSION[login_user]' and approve ='$exp' ");
       
      while($row=mysqli_fetch_assoc($res))
      {
        $d= strtotime($row['returndate']);
        $c= strtotime(date("Y-m-d"));
        $diff= $c-$d;

        if($diff>=0)
        {
          $day= $day+floor($diff/(60*60*24)); 
        } //Days
        
      }
      $_SESSION['fine']=$day*.10;
    }
    ?>

</body>
</html>
-->