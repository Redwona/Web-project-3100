<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Kuet_CSE Book Help centre
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">

  	nav
  	{
       float: right;
       word-spacing: 25px;
       padding: 20px;
    }
    nav li 
    {
      display: inline-block;
      line-height: 100px;
    }
    </style>	
</head>


<body>
	<div class="myDiv">
	     <header>
	     	
	     
         <div class="logo">
	     	<img src="images/kl.png">
	     	<h1 style="color: white;font-size: 30px">KUET_CSE BOOK HELP CENTRE</h1>
		</div>
    
   <?php
		if(isset($_SESSION['login_user']))
		{
			?>
				<nav>
					<ul>
						<li><a href="index.php">HOME</a></li>
						<li><a href="books.php">BOOKS</a></li>
						<li><a href="signout.php">SIGNOUT</a></li>
						<li><a href="feedback.php">FEEDBACK</a></li>
					</ul>
				</nav>
			<?php
		}
		else
		{
			?>
						<nav>
							<ul>
								<li><a href="index.php">HOME</a></li>
								<li><a href="books.php">BOOKS</a></li>
								<li><a href="admin_login.php">SIGNIN</a></li>
								<li><a href="registration.php">SIGNUP</a></li>
								<li><a href="feedback.php">FEEDBACK</a></li>
							</ul>
						</nav>
		<?php
		}
			
		?>

		
	     </header>

	     <section>
         <div class="sec_img"> 
         	
			<br><br><br>
			<div class="show">
				<br><br><br><br>
				<h1 style="text-align: center; font-size: 35px;">WELCOME!!!</h1><br><br>
				<h1 style="text-align: center;font-size: 30px;">Saturday - Thursday  </h1><br>
				<h1 style="text-align: center;font-size: 30px;">Opens at: 09:00 AM </h1><br>
				<h1 style="text-align: center;font-size: 30px;">Closes at: 08:00 PM </h1><br>
			</div>
		 </div>

	     </section>
</div>
<?php 
   include "footer.php";
 ?>  


</body>
</html>