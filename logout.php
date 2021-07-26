<?php
session_start();
include("includes/config.php");
$_SESSION['login']=="";
mysqli_query($conn,"UPDATE userlog  SET logout = '$ldate' WHERE username = '".$_SESSION['login']."' ORDER BY id DESC LIMIT 1");
session_unset();
 
?>
<script language="javascript">
document.location="over.php";
</script>