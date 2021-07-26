<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:scall.php');
}
else{ 
?>
<html>
<head><link rel="stylesheet" type="text/css" href="s.css"></head>
<body>
<div class="main">
<div class="nav">Complaint Mangement System </div>
<div class="left">
			<form>
			<table> 
			<tr><td><a href="dashboard.php">Dashboard</a> <br><br> </td></tr>
			<tr><td><a href="register-complaint.php">Lodge Complaint</a><br><br> </td></tr>
			<tr><td><a href="complaint-history.php">Complaint History</a><br><br></td></tr>
			</table>
			</form>
</div>
<div class="content"><a href="logout.php" class="btnn">logout</a>
<h1>Complaint Detail:</h1>
<?php 
$query=mysqli_query($conn,"select * from tblcomplaints where userId='".$_SESSION['id']."' and complaintNumber='".$_GET['cid']."'");
while($row=mysqli_fetch_array($query))
{?>
          	<div >
            <label><b>Complaint Number : </b></label>
          	<div >
          	<p><?php echo $row['complaintNumber'];?></p>
          	</div>
            <label><b>Reg. Date :</b></label>
            <div>
            <p><?php echo $row['regDate'];?></p>
            </div>
          	</div>
            <div>
            <label><b>Complaint Details </label>
            <div>
            <p><?php echo $row['complaintDetails'];?></p>
            </div>
	        </div> 
<?php 
$ret=mysqli_query($conn,"select complaintremark.remark as remark,complaintremark.status as sstatus,complaintremark.remarkDate as rdate from complaintremark join tblcomplaints on tblcomplaints.complaintNumber=complaintremark.complaintNumber where complaintremark.complaintNumber='".$_GET['cid']."'");
while($rw=mysqli_fetch_array($ret))
{
?>
    <div>
    <label><b>Remark:</b></label>
    <div>
    <?php echo  $rw['remark']; ?>&nbsp;&nbsp; <br /><b>Remark Date: <?php echo  $rw['rdate']; ?></b>
    </div>
    </div> 
    <div>
    <label><b>Status:</b></label>
    <div>
    <?php echo  $rw['sstatus']; ?>
    </div>
    </div>
    <?php } ?>
    <div>         
    <label><b>Final Status :</b></label>
    <div>
    <p style="color:red">
	<?php 
    if($row['status']=="NULL" || $row['status']=="" )
     {
      echo "Not Process yet";
     }
	else
	 {
      echo $row['status'];
     }
     ?>
	</p>
    </div>
    </div> 
    <?php 
} 
?>
<hr>
</body>
</html>
<?php 
} 
?>