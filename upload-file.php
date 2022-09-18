<?php
    include('config/db_connect.php');

    session_start();
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM student WHERE email='$email'";

    //get the result
    $result = mysqli_query($conn,$sql);
                
    //fetch the result
    $student = mysqli_fetch_array($result);
    $student_id = (int) $student['student_id'];

	if (isset($_POST['upload'])) {

		$course_code = $_POST['course_code'];
		$course_name = $_POST['course_name'];
		$trimester = $_POST['trimester'];
		$department = $_POST['department'];
		$links = $_POST['links'];

		if (isset($_FILES['pdf_file']['name']))
		{
            $file_name = $_FILES['pdf_file']['name'];
            $file_tmp = $_FILES['pdf_file']['tmp_name'];

            move_uploaded_file($file_tmp,"./uploads/".$file_name);

            // $insertquery = "INSERT INTO course
            //                 SET course_name = '$course_name', 
            //                 course_code = '$course_code', 
            //                 materials = '$file_name', 
            //                 student_id_fk = (
            //                     SELECT student_id
            //                     FROM student
            //                     WHERE email = '$email'
            //                 ) " ;

            $insertquery = "INSERT INTO course (course_name,course_code,materials,links,department_name,trimester,student_id) VALUES('$course_name','$course_code','$file_name','$links','$department','$trimester',$student_id)";
                            
            $iquery = mysqli_query($conn, $insertquery);
            

            if(isset($iquery)){
                echo 'success';
            }
		}
		else
		{
            ?>
                <div class=
                "alert alert-danger alert-dismissible
                fade show text-center">
                <a class="close" data-dismiss="alert"
                    aria-label="close">×</a>
                <strong>Failed!</strong>
                    File must be uploaded in PDF format!
                </div>
            <?php
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<?php include('templates/points.php');?>
<?php include('templates/profileHeader.php') ?>
    <form method="post" enctype="multipart/form-data" >
        <div class="container card-0 justify-content-center " >
            <div class="card-body px-sm-4 px-0" >
                <div class="row justify-content-center mb-5">
                    <div class="col-md-10 col" ><h1 class="font-weight-bold ml-md-0 mx-auto text-center text-sm-left" > Request To Upload</h1><p class="mt-md-4  ml-md-0 ml-2 text-center text-sm-left" > You can upload file here.</p></div>
                </div>
                <div class="row justify-content-center round">
                    <div class="col-lg-10 col-md-12 ">
                        <div class="card shadow-lg card-1">
                            <div class="card-body inner-card">
                                <div class="row justify-content-center">
                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                        
                                        <div class="form-group"> <label for="">Course Name</label> <input type="text" class="form-control" id="time" placeholder="Enter the course name" name="course_name">  </div>
                                        <div class="form-group"> <label for="">Course Code</label> <input type="text" class="form-control" id="Evaluate Budget" placeholder="Enter the course id" name="course_code"> </div>                                        
                                    </div>
                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                        
                                        <div class="form-group"> <label for="">Trimester</label> <input type="text" class="form-control" id="Evaluate Budget" placeholder="Enter the trimester" name="trimester"><br><br> </div>
                                        <div class="form-group"> <label for="cars" >Choose your department  :</label>
                                                    <select id="cars" name="department" style="border-color: black;">
                                                        <option value="">Choose</option>
                                                        <option value="CSE">CSE</option>
                                                        <option value="BBA">BBA</option>
                                                        <option value="CIVIL">CIVIL</option>
                                                        <option value="ECONOMICS">ECONOMICS</option>
                                                    </select> </div>
                                        
                                    </div>
                                    
                                </div>
                                    <br>
                                <div class="row justify-content-center">
                                    <div class="col-md-12 col-lg-10 col-12">
                                        <div class="form-group files">
                                            <!-- <label class="my-auto">Upload Your File </label> -->
                                            
                                            <div class="col-lg-5 col-md-6 col-sm-12">

                                                <!-- <div class="absolute">
                                                
                                                <div class="flex flex-col items-center">
                                                    <i class="fa fa-folder-open fa-4x text-blue-700"></i>
                                                <span class="block text-gray-400 font-normal">Attach you files here</span>
                                                </div>
                                                </div> -->
                                                <!-- <br>
                                                <label for="cars" >Choose your department  :</label>
                                                    <select id="cars" name="department" style="border: solid;">
                                                        <option value="">Choose</option>
                                                        <option value="CSE">CSE</option>
                                                        <option value="BBA">BBA</option>
                                                        <option value="CIVIL">CIVIL</option>
                                                        <option value="ECONOMICS">ECONOMICS</option>
                                                    </select>
                                                    <br> <br> -->
                                                <input type="file"  name="pdf_file">
                                                <br>
                                                <br>
                                                <div class="form-group"> <label for="exampleFormControlTextarea2">Links</label> <textarea class="form-control rounded-0" name="links" placeholder="Links for video lectures" id="exampleFormControlTextarea2" rows="2"></textarea></div>
                                                </div>
                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-12 col-lg-10 col-12">
                                        <div class="row justify-content-end mb-5">
                                            <div class="col-lg-4 col-auto "><button type="submit" name="upload" class="btn btn-primary btn-block" style="background-color : #0275d8;"><small class="font-weight-bold">Request To Upload</small></button> </div>
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
</body>
</html>