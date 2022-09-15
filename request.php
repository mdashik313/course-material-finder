<?php 
    include('config/db_connect.php');
    session_start();

    $course_name = $course_code = $trimester = $department_name = '';
    $status = 0;
    if (isset($_POST['submit'])) {

		$course_name = $_POST['course_name'];
		$course_code = $_POST['course_code'];
		$trimester = $_POST['trimester'];
		$department_name = $_POST['department_name'];

        $sql = "INSERT INTO `support` ( `course_code`, `course_name`, `trimester`,`department_name`,`status`) VALUES ( '$course_code', '$course_name', '$trimester','$department','0');";
        

        if(mysqli_query($conn,$sql)){
        
            header("Location: request.php");
        }
        else {
          echo 'sql error'. mysqli_errno($conn);
        }
   }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/upload-file.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Make request</title>
    <?php include('templates/points.php');?>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

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
<body>
<?php include('templates/profileHeader.php') ?>
    <form action="request.php" method="POST" enctype="multipart/form-data" >
        <div class="container card-0 justify-content-center ">
            <div class="card-body px-sm-4 px-0" >
                <div class="row justify-content-center mb-5">
                    <div class="col-md-10 col"><h3 class="font-weight-bold ml-md-0 mx-auto text-center text-sm-left"> Make your request</h3></div>
                </div>
                
                <div class="row justify-content-center round">
                    <div class="col-lg-10 col-md-12 ">
                        <div class="card shadow-lg card-1">
                            <div class="card-body inner-card">
                                <div class="row justify-content-center">
                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                        
                                        <div class="form-group"> <label for="">Course Name</label> 
                                        <input type="text" class="form-control" id="time" placeholder="Enter the course name" name="course_name">  
                                    </div>
                                        <div class="form-group"> <label for="">Course Code</label> 
                                        <input type="text" class="form-control" id="Evaluate Budget" placeholder="Enter the course id" name="course_code"> 
                                    </div>                                        
                                        <div class="form-group"> <label for="">Trimester</label> 
                                        <input type="text" class="form-control" id="Evaluate Budget" placeholder="Enter the trimester" name="trimester">
                                    </div>
                                    <div class="form-group"> <label for="">Department</label> 
                                        <input type="text" class="form-control" id="Evaluate Budget" placeholder="Enter the department" name="department">
                                    </div>                                        
                                    </div>
                                    
                                </div>

                                <div class="row justify-content-center">
                                        <div class="row justify-content-end mb-5">
                                            <div class="col-lg-4 col-auto "><button type="submit" name="submit" class="btn btn-primary btn-block"><small class="font-weight-bold">Request</small></button> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <h1 style="text-align: center;">Requests</h1>
    <section style="margin: 150px;">
    <div>
        <table>
        <tr style="padding: 30px;">
        <th>Course code</th>
        <th>Course name</th>
        <th>Trimester</th>
        <th>Department</th>
        </tr>
        <?php
            $sql1 = "Select course_code,course_name,trimester,department_name from support";
            $result = mysqli_query($conn,$sql1);
            $resultCheck = mysqli_num_rows($result);

            if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr><td>" . $row["course_code"]. "</td><td>" . $row["course_name"] . "</td><td>"
                    . $row["trimester"] . "</td><td>" . $row["department_name"] . "</td></tr>";
                }
            echo "</table>";
        } else { echo "0 results"; }
        $conn->close();
            ?>
            </table>
    </div>
    </section>
    <?php include('templates/footer.php');?>