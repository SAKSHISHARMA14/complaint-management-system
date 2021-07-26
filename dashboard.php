<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:scall.php');
}
else{ ?>
<html>
<head><link rel="stylesheet" type="text/css" href="s.css"></head>
<body>
<header></header>
<div class="main">
<div class="nav">Complaint Mangement System </div>
<div class="left">
	<form>
	<table> 
		<tr><td><a href="dashboard.php">Dashboard</a><br><br></td></tr>
		<tr><td><a href="register-complaint.php">Lodge Complaint</a><br><br></td></tr>
		<tr><td><a href="complaint-history.php">Complaint History</a><br><br> </td></tr>
	</table>
	</form>
</div>
<div class="content">
<a href="logout.php" class="btnn">logout</a>
<h1>Dashboard:</h1>
<div class="co">
<div>               	
   <div>
      <div>
<?php 
$rt = mysqli_query($conn,"SELECT * FROM tblcomplaints where userId='".$_SESSION['id']."' and status is null");
$num1 = mysqli_num_rows($rt);
{?>
    <h3><?php echo "<h3>$num1</h3>";?></h3>
    </div>
    <?php echo "<p>Complaints not Process yet1</p>";?>
    </div>
    <?php }?>
 <div>
    <div>
 <?php 
  $status="in Process";                   
$rt = mysqli_query($conn,"SELECT * FROM tblcomplaints where userId='".$_SESSION['id']."' and  status='$status'");
$num1=mysqli_num_rows($rt);
{?>
    <?php echo "<h3>$num1</h3>";?>
    </div>
    <?php echo "<p>Complaints Status in process</p>";?> 
    </div>
  <?php }?>
  <div>
    <div>
 <?php 
  $status="closed";                   
$rt = mysqli_query($conn,"SELECT * FROM tblcomplaints where userId='".$_SESSION['id']."' and  status='$status'");
$num1 = mysqli_num_rows($rt);
{?>
    <?php echo $num1;?>
    </div>
    <?php echo "<p>Complaint has been closed</p>";?>
    </div>
<?php }?>          	
</div>
</div>
</div>
</div>
<hr>
<footer>
</footer>
</body>
</html>
<?php } ?>