<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['login'])==0)
	{	
header('location:index.php');
}
else{
?>
<html>
<head>
<title>Admin| Complaint Details</title>
<link rel="stylesheet" type="text/css" href="s.css">
<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'scrollbars=yes,copyhistory=yes,width='+500+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}	
function myF()
 {
	 window.print();
 }
</script>
</head>
<body>
<div >
	<div class="main">
     <div class="nav">Admin| Complaint Mangement System </div>
       <div class="left">
			<form>
			<table> 
			<tr><td> <a href="manage-users.php">Manage Users</a><br><br> </td></tr>
			<tr><td><a href="notprocess-complaint.php">	Not Process Yet Complaints  </a></td></tr>
			<tr><td><a href="inprocess-complaint.php">	Pending Complaints </a> </td></tr>
			<tr><td><a href="closed-complaint.php">	Closed Complaints </a> </td></tr>
			</table>
			</form>
      </div>
       <div class="content">
       <a href="logout.php" class="btnn">logout</a>
       <div><h1>Complaint Details</h1>
							</div>
								<table cellpadding="0" cellspacing="0" border="0"  width="100%">
									<thead>
										<tr>
											<th>Complaint No</th>
											<th>Reg Date</th>
											<th> complaint Name</th>
										</tr>
									</thead>
<tbody>
<?php $st='closed';
$query=mysqli_query($conn,"select tblcomplaints.*,users.fullName as name from tblcomplaints join users on users.id=tblcomplaints.userId where tblcomplaints.complaintNumber='".$_GET['cid']."'");
while($row=mysqli_fetch_array($query))
{
?>									
<tr>										
	<td><?php echo $row['complaintNumber'];?></td>
	<td><?php echo $row['regDate'];?></td>
	<td><?php echo $row['name'];?></td>
	</tr>
<tr>
	<td><b>Complaint Details </b></td>
	<td colspan="5"> <?php echo $row['complaintDetails'];?></td>		
</tr>
<tr>
<td><b>Final Status</b></td>
<td colspan="5"><?php if($row['status']=="")
{ echo "Not Process Yet";
} 
else {
		echo $row['status'];
	 }?></td>
</tr>
<?php $ret=mysqli_query($conn,"select complaintremark.remark as remark,complaintremark.status as sstatus,complaintremark.remarkDate as rdate from complaintremark join tblcomplaints on tblcomplaints.complaintNumber=complaintremark.complaintNumber where complaintremark.complaintNumber='".$_GET['cid']."'");
while($rw=mysqli_fetch_array($ret))
{
?>
<tr>
<td><b>Remark</b></td>
<td colspan="5"><?php echo $rw['remark']; ?> <b>Remark Date :</b><?php echo $rw['rdate']; ?></td>
</tr>
<tr>
<td><b>Status</b></td>
<td colspan="5"><?php echo $rw['sstatus']; ?></td>
</tr>
<?php }?>
<tr>
	<td><b>Action</b></td>
	<td> <?php if($row['status']=="closed")
	{
     } else {?>
<a href="javascript:void(0);" onClick="popUpWindow('http://localhost/com/admin/updatecomplaint.php?cid=<?php echo $row['complaintNumber'];?>');" title="Update order">
<button type="button" class="btn btn-primary">Take Action</button></td>
											</a><?php } ?></td>
<td colspan="4"><a href="javascript:void(0);" onClick="popUpWindow('http://localhost/com/admin/userprofile.php?uid=<?php echo $row['userId'];?>');" title="Update order">
<button type="button" class="btn btn-primary">View User Detials</button></a></td>
</tr>
<?php  } ?>
</table>
<br><br> <button onclick="myF()">PRINT </button> 
 </div>
 </div>						
 </div>
 </tbody>
</body>
<?php 
} ?>