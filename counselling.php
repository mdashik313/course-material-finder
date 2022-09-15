<?php 
    include('config/db_connect.php');
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #EAB308;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<?php include('templates/points.php');?>
<?php include('templates/profileHeader.php');?>
<section style="margin: 150px;">
    <div>
<table>
<tr style="padding: 30px;">
<th>Name</th>
<th>Student-Id</th>
<th>Email</th>
<th>Expertise</th>
</tr>
<?php
    $sql = "Select student_name,student_id,email,expertise from student";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0){
        $flag = 1;
        while($row = mysqli_fetch_assoc($result)){
            if($row['expertise']!=''){
                $flag = 0;
                echo "<tr><td>" . $row["student_name"]."</td><td>" . $row["student_id"]. "</td><td>" . $row["email"] . "</td><td>"
                . $row["expertise"]. "</td></tr>";
            } 
        }
        
    echo "</table>";
    if($flag) echo "No expert available";
    
} else { echo "0 results"; }

$conn->close();

    ?>
</table>
</div>
</section>

<?php include('templates/footer.php');?>