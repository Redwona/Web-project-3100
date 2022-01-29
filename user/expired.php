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
			padding-left: 70%;

		}
		.form-control
		{
			width: 340px;
			height: 40px;
			background-color: yellowgreen;
			color: black;
		}
		
		body {
			background-color: skyblue;
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
	height: 800px;
  width: 85%;
  background-color: black;
  opacity: .8;
  color: white;
  margin-top: -65px
}
.scroll
{
  width: 100%;
  height: 400px;
  overflow: auto;
}
th,td
{
  width: 10%;
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


    <?php
    if(isset($_SESSION['login_user']))
      {
       ?>

      <div style="float: left; padding: 25px;">
      <form method="post" action="">
          <button name="submit2" type="submit" class="btn btn-default" style="background-color: #06861a; color: yellow;">RETURNED</button> 
                      &nbsp&nbsp
          <button name="submit3" type="submit" class="btn btn-default" style="background-color: red; color: yellow;">EXPIRED</button>
      </form>
      </div>
       <div style="float: right;padding-top: 10px;">
          <br>
        <?php
         $var=0;
          $result=mysqli_query($db,"SELECT * FROM `fine` where userid='$_SESSION[login_user]' and status='not paid' ;");
          while($r=mysqli_fetch_assoc($result))
          {
            $var=$var+$r['fine'];
          }
          $var2=$var+$_SESSION['fine'];

         ?>
        <h3>Your fine is: 
          <?php
            echo "$ ".$var2;
          ?>
        </h3>
      </div>
<br><br><br><br>

      
    <?php
   }
     if(isset($_SESSION['login_user']))
      {
        
         $ret='<p style="color:yellow; background-color:green;">RETURNED</p>';
         $exp='<p style="color:yellow; background-color:red;">EXPIRED</p>';

        if(isset($_POST['submit2']))
        {
          
         $sql="SELECT userr.userid,roll,first,books.bkid,bktitle,authors,bkedition,approve,issuedate,returndate FROM userr inner join book_issue ON userr.userid=book_issue.userid inner join books ON book_issue.bkid=books.bkid WHERE book_issue.approve='$ret' ORDER BY `book_issue`.`returndate` DESC";
        $res=mysqli_query($db,$sql);

        }
        else if(isset($_POST['submit3']))
        {
         $sql="SELECT userr.userid,roll,first,books.bkid,bktitle,authors,bkedition,approve,issuedate,returndate FROM userr inner join book_issue ON userr.userid=book_issue.userid inner join books ON book_issue.bkid=books.bkid WHERE book_issue.approve='$exp' ORDER BY `book_issue`.`returndate` DESC";
        $res=mysqli_query($db,$sql);
       }
        else
        {
         $sql="SELECT userr.userid,roll,first,books.bkid,bktitle,authors,bkedition,approve,issuedate,returndate FROM userr inner join book_issue ON userr.userid=book_issue.userid inner join books ON book_issue.bkid=books.bkid WHERE book_issue.approve !='' and book_issue.approve!='' and book_issue.approve!='Yes' ORDER BY `book_issue`.`returndate` DESC";
        $res=mysqli_query($db,$sql);
        }


        
        
        echo "<table class='table table-bordered' style='width:100%;' >";
        //Table header
        echo "<tr style='background-color: darkred;'>";
        echo "<th>"; echo "UserID";  echo "</th>";
        echo "<th>"; echo "Roll No";  echo "</th>";
         echo "<th>"; echo "First Name";  echo "</th>";
        echo "<th>"; echo "BookID";  echo "</th>";
        echo "<th>"; echo "Book Title";  echo "</th>";
        echo "<th>"; echo "Authors";  echo "</th>";
        echo "<th>"; echo "Book_Edition";  echo "</th>";
        echo "<th>"; echo "Status";  echo "</th>";
        echo "<th>"; echo "Date Of Issue";  echo "</th>";
        echo "<th>"; echo "Last Return date";  echo "</th>";

      echo "</tr>"; 
      echo "</table>";

       echo "<div class='scroll'>";
        echo "<table class='table table-bordered' >";
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
          echo "<td>"; echo $row['approve']; echo "</td>";
          echo "<td>"; echo $row['issuedate']; echo "</td>";
          echo "<td>"; echo $row['returndate']; echo "</td>";
        echo "</tr>";
      }
    echo "</table>";
    echo "</div>";
   }
  
  ?>
       
 </div>
</div>
</body>
</html>
