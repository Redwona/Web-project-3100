<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Approve Book Request</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
		.srch
		{
			padding-left: 920px;

		}
		.form-control
		{
			width: 340px;
			height: 40px;
			background-color: #601e44fa;
			color: white;
		}
		
		body {
			background-image: url("images/bkreq.jpg");
			background-repeat: no-repeat;
      font-family: "Lato", sans-serif;
      transition: background-color .5s;
   }

.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #222;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: white;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle
{
	margin-left: 25px;
}
.h:hover
{
	color:white;
	width: 300px;
	height: 50px;
	background-color: #00544c;
}
.container
{
	height: 550px;
	width: 1300px;
	background-color: black;
	opacity: .8;
	color: white;
}

.approve
{
  margin-left: 470px;
}

</style>

</head>
<body>
<!--_________________sidenav_______________-->
	
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color: white; margin-left: 40px; font-size: 20px;">

                  <?php
                if(isset($_SESSION['login_user']))

                { 	echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['picu']."'>";
                    echo "</br></br>";

                    echo "Welcome ".$_SESSION['login_user']; 
                }
                ?>
            </div><br><br>

 
  <div class="h"> <a href="books.php">Books</a></div>
  <div class="h"> <a href="bookreq.php">Book Request</a></div>
  <div class="h"> <a href="bookissueinfo.php">Book Issue Information</a></div>
  <div class="h"><a href="expired.php">Expired List</a></div>
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; click</span>


	<script>
	function openNav() {
	  document.getElementById("mySidenav").style.width = "300px";
	  document.getElementById("main").style.marginLeft = "300px";
	  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
	}

	function closeNav() {
	  document.getElementById("mySidenav").style.width = "0";
	  document.getElementById("main").style.marginLeft= "0";
	  document.body.style.backgroundColor = "white";
	}
	</script>

 <div class="container">
    <br><h3 style="text-align: center;">Approve Request</h3><br><br>
    
    <form class="approve" action="" method="post">
        <input class="form-control" type="text" name="approve" placeholder="Yes or No" required=""><br>

        <input type="text" name="issuedate" placeholder="Date Of Issue yyyy-mm-dd" required="" class="form-control"><br>

        <input type="text" name="returndate" placeholder="Date Of Return yyyy-mm-dd" required="" class="form-control"><br>
        <button class="btn btn-default" type="submit" name="submit">Approve</button>
    </form>
  
  </div>
</div>

<?php
  if(isset($_POST['submit']))
  {
    mysqli_query($db,"UPDATE  `book_issue` SET  `approve` =  '$_POST[approve]', `issuedate` = '$_POST[issuedate]', `returndate` =  '$_POST[returndate]' WHERE userid='$_SESSION[name]' and bkid='$_SESSION[bid]';");
     mysqli_query($db,"UPDATE `books` SET quantity = quantity-1 where bkid='$_SESSION[bid]' ;");

      $res=mysqli_query($db,"SELECT quantity from `books` where bkid='$_SESSION[bid]';");
    while($row=mysqli_fetch_assoc($res))
    {
      if($row['quantity']==0)
      {
        mysqli_query($db,"UPDATE `books` SET status='Not Available' where bid='$_SESSION[bid]';");
      }
    }
    ?>
      <script type="text/javascript">
        alert("Request approved successfully!");
        window.location="bookreq.php"
      </script>
    <?php
  }
?>

</body>
</html>