<?php 
	include "connection.php";
	include "navbar.php";
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>USER Profile</title>
 	<style type="text/css">
 		.wrapper
 		{
 			width: 500px;
 			margin: 0 auto;
 			color: white;
 		}
 	</style>
 </head>
 <body style="background-color: #540512; ">
 	<div class="container">
 		<form action="" method="post">
 			<button class="btn btn-default" style="float: right; width: 70px;" name="submit1" type="submit">Edit</button>
 		</form>
 		<div class="wrapper">
 			<?php
 			   if(isset($_POST['submit1']))
 				{
 					?>
 						<script type="text/javascript">
 							window.location="edit.php"
 						</script>
 					<?php
 				}
                 $q=mysqli_query($db,"SELECT * FROM `userr` where userid='$_SESSION[login_user]' ;");
 			?>
 			<h2 style="text-align: center;">MY PROFILE</h2>

 			<?php
 				$row=mysqli_fetch_assoc($q);

 				echo "<div style='text-align: center'>
 					<img class='img-circle profile-img' height=110 width=110 src='images/".$_SESSION['picus']."'>
 				</div>";
 			?>
 			<div style="text-align: center;"> <b>Welcome,</b>
	 			<h4>
	 				<?php echo $_SESSION['login_user']; ?>
	 			</h4>
 			</div>
 			<?php
 				echo "<b>";
 				echo "<table class='table table-bordered'>";
	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> First Name: </b>";
	 					echo "</td>";

	 					echo "<td>";
	 						echo $row['first'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Last Name: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['last'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> UserID: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['userid'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Password: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['password'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Roll No: </b>";	
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['roll'];
	 					echo "</td>";
	 				echo "</tr>";
                    
                    echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Current Year: </b>";	
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['year'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Email: </b>";	
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['email'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Contact No: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['contact'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Date Of Join: </b>";	
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['joindate'];
	 					echo "</td>";
	 				echo "</tr>";

	 				
 				echo "</table>";
 				echo "</b>";
 			?>
 		</div>
 	</div>
 </body>
 </html>