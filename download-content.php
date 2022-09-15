<?php 
    include('config/db_connect.php');
    session_start();
    $email = $_SESSION['email'];


    if(!empty($_GET['file'])){
      $fileName  = basename($_GET['file']);
      $filePath  = "uploads/".$fileName;
      
      if(!empty($fileName) && file_exists($filePath)){
          
          $sql = "SELECT points FROM student WHERE email='$email'";
          $result = mysqli_query($conn,$sql);
          $point = mysqli_fetch_array($result);
          
          if($point['points'] >= 2) {
            //define header
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$fileName");
            header("Content-Type: application/zip");
            header("Content-Transfer-Encoding: binary");
            
            //read file 
            readfile($filePath);
            exit;
          }
          else {
            echo "<script>alert('Sorry! You have not enough points to download course materials. Please upload to incease points')</script>";
          }
      }
      else{
          echo "file not exist";
      }
    }


?>