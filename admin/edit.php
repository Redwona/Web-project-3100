<?php
	include "navbar.php";
	include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Admin profile</title>
	<style type="text/css">
		.form-control
		{
			width:250px;
			height: 38px;
		}
		.form1
		{
			margin:0 540px;
			padding-left: 90px;
		}
		label
		{
			color: white;
		}

	</style>
</head>
<body style="background-color: #16341c;">

	<h2 style="text-align: center;color: #fff;">Edit Information</h2>
	<?php
		
		$sql = "SELECT * FROM adminr WHERE userid='$_SESSION[login_user]'";
		$result = mysqli_query($db,$sql) or die (mysql_error());

		while ($row = mysqli_fetch_assoc($result)) 
		{
			$first=$row['first'];
			$last=$row['last'];
			$userid=$row['userid'];
			$password=$row['password'];
			$hometown=$row['hometown'];
			$email=$row['email'];
	     	$contact=$row['contact'];
	     	$joindate=$row['joindate'];
		}

	?>

	<div class="profile_info" style="text-align: center;">
		<span style="color: white;">Welcome,</span>	
		<h4 style="color: white;"><?php echo $_SESSION['login_user']; ?></h4>
	</div><br>
	
	<div class="form1">
		<form action="" method="post" enctype="multipart/form-data">

		<input class="form-control" type="file" name="file">

		<label><h4><b>First Name: </b></h4></label>
		<input class="form-control" type="text" name="first" value="<?php echo $first; ?>">

		<label><h4><b>Last Name</b></h4></label>
		<input class="form-control" type="text" name="last" value="<?php echo $last; ?>">

		<label><h4><b>UserID</b></h4></label>
		<input class="form-control" type="number" name="userid" value="<?php echo $userid; ?>">
 
		<label><h4><b>Password</b></h4></label>
		<input class="form-control" type="text" name="password" value="<?php echo $password; ?>">

		<label><h4><b>Hometown</b></h4></label>
		<input class="form-control" type="text" name="hometown" value="<?php echo $hometown; ?>">

        <label><h4><b>Email</b></h4></label>
		<input class="form-control" type="text" name="email" value="<?php echo $email; ?>">

		<label><h4><b>Contact No</b></h4></label>
		<input class="form-control" type="text" name="contact" value="<?php echo $contact; ?>">

		<label><h4><b>Date Of Join</b></h4></label>
		<input class="form-control" type="text" name="joindate" value="<?php echo $joindate; ?>">

		<br>
		<div style="padding-left: 100px;">
			<button class="btn btn-default" type="submit" name="submit">save</button></div>
	</form>
</div>
	<?php 

		if(isset($_POST['submit']))
		{
			move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_FILES['file']['name']);

			$first=$_POST['first'];
			$last=$_POST['last'];
			$userid=$_POST['userid'];
			$password=$_POST['password'];
			$hometown=$_POST['hometown'];
			$email=$_POST['email'];
			$contact=$_POST['contact'];
			$joindate=$_POST['joindate'];
			$picu=$_FILES['file']['name'];

			$sql1= "UPDATE adminr SET picu='$picu', first='$first', last='$last', userid='$userid', password='$password', hometown='$hometown',email='$email', contact='$contact',joindate='$joindate' WHERE userid='".$_SESSION['login_user']."';";

			if(mysqli_query($db,$sql1))
			{
				?>
					<script type="text/javascript">
						alert("Admin Profile Edited  Successfully!");
						window.location="profile.php";
					</script>
				<?php
			}
		}
 	?>
</body>
</html>
