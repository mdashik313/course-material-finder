<?php 
    include('config/db_connect.php');
    session_start();

    if(!isset($_SESSION['email'])){
      header('Location:login.php');
    }
    // else echo $_SESSION['email'];
    
    if(isset($_POST['logout'])){
      session_destroy();
      header('Location:home.php');
    }
    if(isset($_SESSION['message']) && $_SESSION['message']=='failed'){
      echo "<script>alert('Sorry! You have not enough points to download course materials. Please upload to incease points')</script>";
      $_SESSION['message'] = '';
    }
    $course_code = $_GET['course_code'];
    $course_name = $_GET['course_name'];
    $email = $_SESSION['email'];

    $sql = "SELECT materials,approveStatus FROM course WHERE course_code = '$course_code'";
    $result = mysqli_query($conn,$sql);

    $sql = "SELECT points FROM student WHERE email='$email'";
    $result2 = mysqli_query($conn,$sql);
    $student = mysqli_fetch_array($result2);

    if(isset($_SESSION['idDownloaded']) && $_SESSION['idDownloaded']=='yes'){
      $_SESSION['idDownloaded'] = 'no';
      $p = $student['points'] - 2.5;
      $sql = "UPDATE student SET points = $p WHERE email='$email'";
      mysqli_query($conn,$sql);  
      $student['points'] = $p;
    }

    
    
    //downloading part:
          if(!empty($_GET['file'])){
          
            if($student['points'] >= .5){
              $fileName  = basename($_GET['file']);
              $filePath  = "uploads/".$fileName;
              $_SESSION['idDownloaded'] = 'yes';
              
              if(!empty($fileName) && file_exists($filePath)){
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
              else{
                  echo "file not exit";
              }
          
            }
            else {
              $_SESSION['message'] = 'failed';
            }
            header('Location: ' . $_SERVER['HTTP_REFERER']);
          }
          

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/28e6d5bc0f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Download</title>
    <?php include('templates/points.php');?>
    <style>
      table {
        border-collapse: collapse;
        width: 100%;
        color: #588c7e;
        font-family: monospace;
        font-size: 25px;
        text-align: left;
      }
      
      tr:nth-child(even) {background-color: #f2f2f2}
    </style>

</head>
<body>

<header class="text-gray-600 body-font" style="background-color: #0275d8; height: 120px; width :100%;" >
  <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
    <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0" href="index.php" style="text-decoration: none;">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-yellow-500 rounded-full" viewBox="0 0 24 24">
        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
      </svg>
      <span class="ml-3 text-xl text-white">Course_materials</span>
    </a>
    <nav class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400	flex flex-wrap items-center text-base justify-center">
      <a class="mr-5 hover:text-gray-900 text-white text-decoration-none" href="index.php">Home</a>
      <a class="mr-5 hover:text-gray-900 text-white text-decoration-none" href="profile.php" target="_blank">Profile</a>
    </nav>
    <form action="" method="POST">
      <button name="logout" type="submit" class="inline-flex items-center bg-gray-100 bg-danger border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-white mt-4 md:mt-0">Logout
        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
          <path d="M5 12h14M12 5l7 7-7 7"></path>
        </svg>
      </button>
    </form>
  </div>
</header>


    <!-- <p class="text-center h3 my-5 text-white bg-primary p-3 font-weight-bold">All Content of "Course Name"</p> -->
    <div class="d-flex justify-content-center mt-4">
        <div class="card mb-3 mx-5 p-4" style="max-width: 540px;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="assets/course.png" class="card-img" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title font-weight-bold"><?php echo $course_name;?></h5>
                  <p class="card-text">Description: </p>
                  <!-- <button type="button" class="btn btn-primary" style="background-color: #0275d8;">Download</button> -->
                </div>
              </div>
              
                <table>
                  <tr style="padding: 30px;">
                  <th></th>
                  <th></th>
                  </tr>
                  <?php 
                    
                    while($content = mysqli_fetch_array($result)){
                      if($content['approveStatus']==1) {
                        echo '<tr>
                                <td>' . $content['materials'] . '</td>
                                <td>' . 
                                  '
                                      <a href="download2.php?file=' . $content['materials'] .'" class="inline-flex items-center py-2 px-6 text-xl font-medium text-center text-white bg-blue-700 rounded-lg  focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                          
                                          <input onclick="clicked(event)" type="submit" name="download" value="Download" />  
                                        
                                      </a>
                                </td> 
                              </tr>';
                      }
                            
                    }
                  ?>
                  <script>
                      function clicked(e)
                      {
                          if(!confirm('Your will lose 2.5 point after downloading this file')) {
                              e.preventDefault();
                          }
                      }
                  </script>
                </table>

              
            </div>
          </div>
    </div>
    
</body>
</html>