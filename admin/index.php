<?php
session_start();
error_reporting(0);
include("include/config.php");
if(isset($_POST['submit']))
{
$ret=mysqli_query($conn,"SELECT * FROM admin WHERE username='".$_POST['username']."' and password='".($_POST['password'])."'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$_SESSION['login']=$_POST['username'];
$_SESSION['id']=$num['id'];
header("location:http://localhost/com/admin/manage-users.php");
exit();
}
else
{
$_SESSION['errmsg']="Invalid username or password";
header("location:index.php");
exit();
}
}
?>		
<html>
<head>
<title>ADMIN</title>
<link rel="stylesheet" type="text/css" href="style6.css">
<body>
	<div class="one"><h1>&nbsp;&nbsp;&nbsp;COMPLAINT    ||  ADMIN</h1>
   <div class="two"><form method="post"><br>
   <div class="three"><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SIGN_IN</h3>
   <span style="color:red;">
   <?php echo ($_SESSION['errmsg']);?><?php echo ($_SESSION['errmsg']="");?></span>
   <div class="four">&nbsp;&nbsp;&nbsp;Username:<input type="text" id="inputusername" name="username"    placeholder="Username"><br><br>
   &nbsp;&nbsp;&nbsp;Password:<input type="password" id="inputPassword" name="password" placeholder="Password">
	<br><br>
	<div class="controls clearfix">
	<button type="submit" class="btn btn-primary pull-right" name="submit">Login</button>					
	</div>
	</div>
	<b class="copyright">&copy; 
  <font color="black"><b><u>2020 SAC COMPLAINT BOX :):) &nbsp; Creator & Admin  Sakshi  </b>All rights reserved.</u>
</font>                                    

	</div>
	</form></div>
	<div class="buttonn">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://localhost/com/" class="btnn">Home</a>
</div>
</div>
</body>
</head>
</html>