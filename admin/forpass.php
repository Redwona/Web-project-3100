<?php 
	include "connection.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Password</title>

	<style type="text/css">
		body
		{   
			height: 698px;
			background-image: url("images/pass.jpg");
			background-repeat: no-repeat;
		}
		.show5
		{
			width: 400px;
			height: 400px;
			margin:200px auto;
			background-color: black;
			opacity: .8;
			color: white;
			padding: 27px 15px;
		}
		.form-control
		{
			width: 300px;
		}
	</style>
</head>
<body>
	<div class="show5">
		<div style="text-align: center;">
			<h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;">Change Your Password</h1>
		</div>
		<div style="padding-left: 30px; ">
		<form action="" method="post" >
			<input type="text" name="userid" class="form-control" placeholder="UserID" required=""><br>
			<input type="text" name="email" class="form-control" placeholder="Email" required=""><br>
			<input type="text" name="password" class="form-control" placeholder="New Password" required=""><br>
			<button class="btn btn-default" type="submit" name="submit" >Update</button>
		</form>

	</div>
	
	<?php

		if(isset($_POST['submit']))
		{
			if(mysqli_query($db,"UPDATE adminr SET password='$_POST[password]' WHERE userid='$_POST[userid]'
			AND email='$_POST[email]' ;"))
			{
				?>
					<script type="text/javascript">
                alert("The Password Updated Successfully.");
              </script> 

				<?php
			}
		}
	?></div>
</body>
</html>