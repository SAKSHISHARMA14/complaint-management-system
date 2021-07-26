<html>
<head>
    <style>
        body{
             background-image: linear-gradient(60deg, #00c6a7, #1e4d92);
        
		overflow: scroll;
		}
    </style>
</head>


<?php
$conn = mysqli_connect("localhost", "root", "", "log");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution   
$sql = "SELECT * FROM users,complaintremark where users.id=complaintremark.id";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo"<h1 align='center'> REPORT</h1>";
        echo "<table border='5' align='center' cellspacing='5' cellpadding='20' overflow='scroll'>";
            echo "<tr>";
                
                echo "<th>fullname</th>";
                echo "<th>email</th>";
                echo "<th>password</th>";
                echo "<th>contactno</th>";
				echo "<th>Complaint Number</th>";
				echo "<th>status</th>";
				echo "<th>remarkDate</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
               
                echo "<td><b>" . $row['fullName'] . "</td>";
                echo "<td><b>" . $row['userEmail'] . "</td>";
                echo "<td><b>" . $row['password'] . "</td>";
                echo "<td> <b>" . $row['contactNo'] . "</td>";
				echo "<td><b>". $row['complaintNumber'] . "</td>";
				echo "<td><b>". $row['status'] . "</td>";
				echo "<td><b>". $row['remarkDate'] ."</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
// Close connection
mysqli_close($conn);
?></html>