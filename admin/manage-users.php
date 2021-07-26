<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['login'])==0)
	{	
header('location:index.php');
}
else{

if(isset($_GET['uid']) && $_GET['action']=='del')
{
$userid=$_GET['uid'];
$query=mysqli_query($conn,"delete from users where id='$userid'");
header('location:manage-users.php');
}
?>
<html>
<head>
		<title>Admin &nbsp; Manage Users</title>
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
       <div class="nav">Admin &nbsp;Complaint Mangement System </div>
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
       <div><h1>Manage Users</h1>
	   </div>
       <table cellpadding="0" cellspacing="0" border="0" >
	   <thead>
	   <tr>
		<th>#</th>
		<th> Name</th>
		<th>Email </th>
		<th>Contact no</th>
		<th>Reg. Date </th>
		<th>Action</th>
		</tr>
		</thead>
		<tbody>
        <?php $query=mysqli_query($conn,"select * from users");
        $cnt=1;
        while($row=mysqli_fetch_array($query))
        {
         ?>									
		   <tr>
			  <td><?php echo $cnt;?></td>
			  <td><?php echo $row['fullName'];?></td>
			  <td><?php echo $row['userEmail'];?></td>
		      <td> <?php echo $row['contactNo'];?></td>
			  <td><?php echo $row['regDate'];?></td>
              <td><a href="javascript:void(0);" onClick="popUpWindow('http://localhost/com/admin/userprofile.php?uid=<?php echo $row['id'];?>');" title="View Details">
              <button type="button" class="btn btn-primary"  >View Detials</button></a>
              <a href="manage-users.php?uid=<?php echo $row['id'];?>&&action=del" title="Delete" onClick="return confirm('Do you really want to delete ?')">
              <button type="button" >Delete</button></a></td>
			  <?php $cnt=$cnt+1; } ?>		
</table> 
<br> <button onclick="myF()">PRINT </button> 
		     </div>
			</div>			
  		   </div>
</body>
<?php } ?>