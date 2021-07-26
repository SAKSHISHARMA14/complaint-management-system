<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}
function f3()
{
window.print(); 
}
</script>
<html>
<head>
<title>User Profile</title>
</head>
<body>
<div style="margin-left:50px;">
 <form name="updateticket" id="updateticket" method="post"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php 

$ret1=mysqli_query($conn,"select * FROM users where id='".$_GET['uid']."'");
while($row=mysqli_fetch_array($ret1))
{
?>	
    <tr>
      <td colspan="2"><b><?php echo $row['fullName'];?>'s profile</b></td>
    </tr>  
    <tr>
      <td  >&nbsp;</td>
      <td >&nbsp;</td>
    </tr>
    <tr height="50">
      <td><b>Reg Date:</b></td>
      <td><?php echo $row['regDate']; ?></td>
    </tr>
    <tr height="50">
      <td><b>User Email:</b></td>
      <td><?php echo $row['userEmail']; ?></td>
    </tr>
      <tr height="50">
      <td><b>User Contact no:</b></td>
      <td><?php echo $row['contactNo']; ?></td>
    </tr>
     <tr height="50">
      <td><b>Status:</b></td>
      <td><?php 
	  if($row['status']==1)
      { 
       echo "Active";
      }
      else
      {
       echo "Block";
      }
        ?></td>
      </tr>
      <tr>
      <td colspan="2">   
      <input name="Submit2" type="submit"  value="Close this window " onClick="return f2();" style="cursor: pointer;"  /></td>
      </tr>
<?php } ?>
</table>
 </form>
</div>
</body>
</html>
<?php } ?>