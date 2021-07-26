<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['login'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'd-m-Y h:i:s A', time () );
?>
<html>
<head>
	<title>Admin| Inprocess Complaints</title>
	<link rel="stylesheet" type="text/css" href="s.css">
<script>
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
		   <tr><td><a href="manage-users.php">Manage Users</a><br><br></td></tr>
		   <tr><td><a href="notprocess-complaint.php">Not Process Yet Complaints  </a></td></tr>
		   <tr><td><a href="inprocess-complaint.php">Pending Complaints</a> </td></tr>
		   <tr><td><a href="closed-complaint.php">Closed Complaints</a> </td></tr>			
			</table>
			</form>
</div>				
<div class="content">
       <a href="logout.php" class="btnn">logout</a>
       <div><h1>Pending Complaints</h1>
	</div>
	<div>
	 <table cellpadding="0" cellspacing="0" border="0">
		<thead>
		  <tr>
			<th>Complaint No</th>
			<th> complaint Name</th>
			<th>Reg Date</th>
			<th>Status</th>									
			<th>Action</th>
		  </tr>
		</thead>						
<tbody>
<?php 
$st='in process';
$query=mysqli_query($conn,"select tblcomplaints.*,users.fullName as name from tblcomplaints join users on users.id=tblcomplaints.userId where tblcomplaints.status='$st'");
while($row=mysqli_fetch_array($query))
{
?>										
   <tr>
	  <td><?php echo $row['complaintNumber'];?></td>
	  <td><?php echo $row['name'];?></td>
	  <td><?php echo $row['regDate'];?></td>
	  <td><button type="button" class="btn btn-warning">In Process</button></td>
	  <td><a href="complaint-details.php?cid=<?php echo $row['complaintNumber'] ;?>"> View Details</a></td>
   </tr>

<?php  } ?>
</tbody>
</table> 
<br> <button onclick="myF()">PRINT </button> 
							</div>
						</div>						
					</div>
				</div>
</body>
<?php } ?>