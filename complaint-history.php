<?php session_start();
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
<div class="main">
<div class="nav">Complaint Mangement System </div>
<div class="left">
			<form>
			<table> <tr><td><a href="dashboard.php">Dashboard</a> <br><br> </td></tr>
			<tr><td> <a href="register-complaint.php">Lodge Complaint</a><br><br> </td></tr>
			<tr><td> <a href="complaint-history.php">Complaint History</a><br><br> </td></tr>
			</table>
			</form>
</div>
<div class="content"><a href="logout.php" class="btnn">logout</a>
<h1>Complaints History:</h1>
<div class="co">
<table>
<thead>
    <tr style="text-align: center">
    <th style="text-align: center">Complaint Number</th>
    <th style="text-align: center">Reg Date</th>
    <th style="text-align: center">last Updation date</th>
    <th style="text-align: center">Status</th>
    <th style="text-align: center">Action</th>
    </tr>
</thead>
<tbody>
  <?php $query=mysqli_query($conn,"select * from tblcomplaints where userId='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{
  ?>
     <tr>
      <td align="center"><?php echo ($row['complaintNumber']);?></td>
      <td align="center"><?php echo ($row['regDate']);?></td>
      <td align="center"><?php echo  ($row['lastUpdationDate']);?></td>
      <td align="center"><?php $status=$row['status'];if($status=="" or $status=="NULL")
      { ?>
      <button type="button">Not Process Yet</button>
      <?php }
 if($status=="in process"){ ?>
<button type="button" >In Process</button>
<?php }
if($status=="closed") {
?>
<button type="button">Closed</button>
<?php } ?>
      <td align="center"><a href="complaint-details.php?cid=<?php echo ($row['complaintNumber']);?>">
      <button type="button">View Details</button></a></td>
     </tr>
     <?php } ?>                       
     </tbody>
     </table>						  
</div>
</div>
</div>
</body>
</html>
<?php } ?>