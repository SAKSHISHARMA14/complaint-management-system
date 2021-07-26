<?php
include('includes/config.php');
error_reporting(0);
if(isset($_POST['submit']))
{
$fullname=$_POST['fullname'];
$email=$_POST['email'];
$password=$_POST['password'];
$contactno=$_POST['contactno'];
$status=1;
$query=mysqli_query($conn,"insert into users(fullName,userEmail,password,contactNo,status) values('$fullname','$email','$password','$contactno','$status')");
}
?>
<html>
<head>
<title>
REGISTRATION
</title>
<link rel="stylesheet" type="text/css" href="style2.css">
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
<script type="text/javascript">
function Confirm(form){
alert("Record insert successfully!"); 
form.register();
}
</script>
	 <div class="register">
	 <img src="ss13.png" class="ss13">
	 <form name="form" method='POST'>
     <h1>REGISTRATION </h1>
     <p>FullName</p>	 
	 <input type="text" name="fullname" id="fullname" placeholder="Full Name" required>
	 <p>User Email</p>
     <input type="text" name="email" id="email" placeholder="Email Id" required>
	 <p>Password</p>
	 <input type="password" name="password" id="password" placeholder="Password" required>
	 <p>Contact No</p>
     <input type="text" maxlength="10" name="contactno" id="contactno" placeholder="Contact No" required>
	 <center><input  type="submit" name="submit" id="submit" Value="register"onClick="Confirm(this.form)"></center><hr>
     <center><a href="#">Already Register</a><br>
	 <a href="./sacll.php"><font style="color:white"><h2>LOGIN<h2></a></center>
	 <hr>
     </form>
	</div>
	<div class="buttonn">
	<a href="index.php" class="btnn">Home</a>&nbsp;
	<a href="sacll.php" class="btnn">Back</a>
	</div>
</body>
</head>
</html>