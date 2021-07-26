<html>
<head>
<title>login_form</title>
<link rel="stylesheet" type="text/css" href="style1.css">
<style>
.buttonn
{
	position:absolute;
	top:95%;
	left:85%;
	transform:translate(-50%,-50%);
}
.btnn
{
	border:1px solid #000;
	padding:7px 25px;
	color:white;
	text-decoration:excellance;
	background-color:black;
}
.btnn:hover
{
	background-color:white;
	color:black;
}
</style>
<body>
	<div class="login">
	<img src="comimm.jpg" class="comimm">
    <center><h1>login</h1></center>	
	<form action='./sacll.php' method='POST'>
	Email_Id:<input type="text" name="username" placeholder="Email_Id" required>
	Password:<input type="password" name="password" placeholder="Password" required>
	<input type="submit" name="submit" value="login"><hr>
	<center><a href="#">Don't have an account?</a><br>
	<a href="./sacreg.php"><u>create an account</u></a></center>
	<hr>
	</form>
	</div>
	<div class="buttonn">
	<a href="index.php" class="btnn">Home</a>&nbsp;
	<a href="sacreg.php" class="btnn">Back</a>
	</div>
</body>
</head>
</html>
<?php
session_start();
error_reporting(0);
include("includes/config.php");
if(isset($_POST['submit']))
{
$ret=mysqli_query($conn,"SELECT * FROM users WHERE userEmail='".$_POST['username']."' and password='".($_POST['password'])."'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$_SESSION['login']=$_POST['username'];
$_SESSION['id']=$num['id'];
header("location:dashboard.php");
exit();
}
else
{
$_SESSION['login']=$_POST['username'];	
header("location:index.php");
}
}
?>