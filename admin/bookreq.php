<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Request</title>
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
			background-color: yellowgreen;
			color: black;
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
	<br>

<div class="container">
	<div class="srch">
		<br>
		<form method="post" action="" name="form1">
			<input type="text" name="userid" class="form-control"  placeholder="UserID Of Borrower" required=""><br>
			<input type="number" name="bkid" class="form-control" placeholder="BookID" required=""><br>
			<button class="btn btn-default" name="submit" type="submit">Submit</button><br>
		</form>
	</div>
  
	<h3 style="text-align: center;">List Of Book Request</h3> <br>

	<?php
	
	if(isset($_SESSION['login_user']))
	{
		$sql= "SELECT userr.userid,roll,first,books.bkid,bktitle,authors,bkedition,status FROM `userr` inner join book_issue ON userr.userid=book_issue.userid inner join books ON book_issue.bkid=books.bkid WHERE book_issue.approve =''";
		$res= mysqli_query($db,$sql);

		if(mysqli_num_rows($res)==0)
			{
				echo "<h2><b>";
				echo "There's no pending request.";
				echo "</h2></b>";
			}
		else
		{
			echo "<table class='table table-bordered' >";
			echo "<tr style='background-color: darkgreen;'>";
				//Table header
				
				echo "<th>"; echo "UserID";  echo "</th>";
				echo "<th>"; echo "Roll No";  echo "</th>";
				echo "<th>"; echo "First Name";  echo "</th>";
				echo "<th>"; echo "Book ID";  echo "</th>";
				echo "<th>"; echo "Book Title";  echo "</th>";
				echo "<th>"; echo "Authors";  echo "</th>";
				echo "<th>"; echo "Book Edition";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
				
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				echo "<td>"; echo $row['userid']; echo "</td>";
				echo "<td>"; echo $row['roll']; echo "</td>";
				echo "<td>"; echo $row['first']; echo "</td>";
				echo "<td>"; echo $row['bkid']; echo "</td>";
				echo "<td>"; echo $row['bktitle']; echo "</td>";
				echo "<td>"; echo $row['authors']; echo "</td>";
				echo "<td>"; echo $row['bkedition']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";
				
				echo "</tr>";
			}
		echo "</table>";
		}
	}
	else
	{
		?>
		<br>
			<h4 style="text-align: center;color: yellow;">You must sigin to know the request.</h4>
			
		<?php
	}

	if(isset($_POST['submit']))
	{
		$_SESSION['name']=$_POST['userid'];
		$_SESSION['bid']=$_POST['bkid'];

		?>
			<script type="text/javascript">
				window.location="approve.php"
			</script>
		<?php
	}

	?>
	</div>
</div>
</body>
</html>