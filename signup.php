<?php 
  include('config/db_connect.php');
  session_start();
  
    $name = $id = $department =  $email = $password = $passwordRepeat = '';


    $errors = array('name'=>'', 'id'=>'','department'=>'', 'email'=>'', 'password'=>'', 'passwordRepeat'=>'');

    if(isset($_POST['register'])){

        //check name
        if (empty($_POST['name'])) {
          $errors['name'] = 'Name is required';
        } else {
          $name = $_POST['name'];
          if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
				    $errors['name'] = 'Name must be letters only';
			    }
        }
        //Department
        if (empty($_POST['department'])) {
          $errors['department'] = 'Department is required';
        } else {
          $department = $_POST['department'];
          if(!preg_match('/^[a-zA-Z\s]+$/', $department)){
				    $errors['department'] = 'Department must be letters only';
			    }
        }

        //check id
        if (empty($_POST['id'])) {
          $errors['id'] = 'ID is required';
        } else {
          $id = $_POST['id'];
          if(!is_numeric($id)){
				    $errors['id'] = 'ID must be numbers only';
			    }
        }

        // check email
        if (empty($_POST['email'])) {
          $errors['email'] = 'Email is required';
        }
        else if(!strpos($_POST['email'],'@bscse.uiu.ac.bd')){
          $email = $_POST['email'];
          $errors['email']='Please enter UIU provided email';
        } else {
          $email = $_POST['email'];
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email must be a valid email address';
          }
        }

        //check pass
        if (empty($_POST['password'])) {
          $errors['password'] = 'Password is required';
        } else {
          $password = $_POST['password'];
        }
        if (empty($_POST['passwordRepeat'])) {
          $errors['passwordRepeat'] = 'Password is required';
        } else {
          $passwordRepeat = $_POST['passwordRepeat'];
        }
        
        //array_filter returns false is all the element is the array is empty. otherwise true.
        if($password==$passwordRepeat){
          if(!array_filter($errors)){
            $num = (int)$id;
            
            $sql = "INSERT INTO student (student_name,student_id,email,department_name,student_pass) VALUES('$name',$num,'$email','$department','$password')";
            
            if (mysqli_query($conn, $sql)) {
              $_SESSION['reg'] = 'success';
              header('Location: login.php');
            } else {
              echo 'sql error' . mysqli_errno($conn);
            }
          }
        }
        else{
          $errors['passwordRepeat'] = 'Password mismatched.';
        }
    }
?>

<html lang="en">

<?php include('templates/header.php') ?>

<body>
  <section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                 
                  <!-- <p class=" text-center text-success font-bold"><?php echo $regCheck; ?></p> -->
                 
                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                  <form class="mx-1 mx-md-4" action="" method="POST">

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <div class="errors" > <p class=" text-danger font-bold color-red"> <?php echo $errors['name']; ?> </p> </div>
                        <input type="text" id="form3Example1c" class="form-control" name="name" value="<?php echo htmlspecialchars($name) ?>" />
                        <label class="form-label" for="form3Example1c">Your Name</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <div class="errors" > <p class=" text-danger font-bold color-red"> <?php echo $errors['id']; ?> </p> </div>
                        <input type="text" id="form3Example1c" class="form-control" name="id" value="<?php echo htmlspecialchars($id) ?>" />
                        <label class="form-label" for="form3Example1c">Student ID</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <div class="errors" > <p class=" text-danger font-bold color-red"> <?php echo $errors['department']; ?> </p> </div>
                        <input type="text" id="form3Example1c" class="form-control" name="department" value="<?php echo htmlspecialchars($department) ?>" />
                        <label class="form-label" for="form3Example1c">Department</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <div class="errors" > <p class=" text-danger font-bold color-red"> <?php echo $errors['email']; ?> </p> </div>
                        <input type="email" id="form3Example3c" class="form-control" name="email" value="<?php echo htmlspecialchars($email) ?>" />
                        <label class="form-label" for="form3Example3c">Your Email</label>
                      </div>
                    </div>


                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <div class="errors" > <p class=" text-danger font-bold color-red"> <?php echo $errors['password']; ?> </p> </div>
                        <input type="password" id="form3Example4c" class="form-control" name="password" value="<?php echo htmlspecialchars($password) ?>" />
                        <label class="form-label" for="form3Example4c">Password</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <div class="errors" > <p class=" text-danger font-bold color-red"> <?php echo $errors['passwordRepeat']; ?> </p> </div>
                        <input type="password" id="form3Example4cd" class="form-control" name="passwordRepeat" value="<?php echo htmlspecialchars($passwordRepeat) ?>" />
                        <label class="form-label" for="form3Example4cd">Repeat your password</label>
                      </div>
                    </div>

                    <div class="form-check d-flex justify-content-center mb-5">
                      <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                      <label class="form-check-label" for="form2Example3">
                        I agree all statements in <a href="#!">Terms of service</a>
                      </label>
                    </div>

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" class="btn btn-primary bg-primary btn-lg" name="register">Register</button>
                    </div>

                  </form>

                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                  <img src="assets/draw2.jpg" class="img-fluid" alt="Sample image">

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>