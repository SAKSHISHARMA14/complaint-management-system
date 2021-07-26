<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
if(isset($_POST['submit']))
{
$uid=$_SESSION['id'];
$complaintdetials=$_POST['complaindetails'];
$query=mysqli_query($conn,"insert into tblcomplaints(userId,complaintDetails) values('$uid','$complaintdetials')");
$sql=mysqli_query($conn,"select complaintNumber from tblcomplaints  order by complaintNumber desc limit 1");
while($row=mysqli_fetch_array($sql))
{
 $cmpn=$row['complaintNumber'];
}
$complainno=$cmpn;
echo '<script> alert("Your complain has been successfully filled and your complaintno is  "+"'.$complainno.'")</script>';
}
?>
<html>
<head><link rel="stylesheet" type="text/css" href="s.css"></head>
<style>
 form input[type="submit"]
 {
	 font-size:23px;
 }
</style>
<body>
<div class="main">
<div class="nav">Complaint Mangement System </div>
<div class="left">
			<form>
			<table> 
			<tr><td><a href="dashboard.php">Dashboard</a> <br><br> </td></tr>
			<tr><td> <a href="register-complaint.php">Lodge Complaint</a><br><br> </td></tr>
			<tr><td> <a href="complaint-history.php">Complaint History</a><br><br> </td></tr>
			
			</table>
			</form>
</div>
<div class="content"><a href="logout.php" class="btnn">logout</a>
<h1>Register complaint:</h1>
<div class="co">
<form method="post">
<h2><label> &nbsp;Complaint Details (max 200 words):</label></h2>

<center><textarea align="left" name="complaindetails" id="complaindetails" required="required" cols="45" rows="40" class="form-control" maxlength="2000" placeholder="Enter Your Complaint here."></textarea></center><br>
<center><input  type="submit" name="submit" value="submit"></center>
</form>
</div>
</div>
</div>
</body>
</html>
<?php } ?>