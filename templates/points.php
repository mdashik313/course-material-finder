<?php 
    include('config/db_connect.php');
    // session_start();
    $email = $_SESSION['email'];
    $sql = "SELECT points FROM student WHERE email='$email'";
    $result2 = mysqli_query($conn,$sql);
    $studentTemp = mysqli_fetch_array($result2);
?>
<p style="width: 100%;background-color :black;color:white;padding-left: 80px;margin:0%"> Points : <?php echo $studentTemp['points'];?></p>
