<?php 
    include('config/db_connect.php');
    session_start();
    $signupCheck = '';
    
    if(isset($_SESSION['reg'])){
      if($_SESSION['reg']=='success'){
        $signupCheck = "Congratulaions! Your account have been created.";
      }
      $_SESSION['reg'] = '';
    }
    
    if(isset($_POST['Login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM student WHERE email='$email' AND student_pass='$password'";

        //get the result
        $result = mysqli_query($conn,$sql);

        //fetch the result
        $student = mysqli_fetch_array($result);
        
        if($_POST['email']==$student['email'] && $_POST['password']==$student['student_pass']){
            if(is_array($student)){
                $_SESSION['email'] = $student['email'];
                header("Location: index.php");
            }
            echo "<script>alert('Email or password is incorrect.')</script>";
        }
        // else {
        //   echo "<script>alert('Email or password is incorrect.')</script>";
        // }


    }
?>

<!DOCTYPE html>
<html lang="en">
  <?php include('templates/header.php') ?>


        <div class="container-fluid h-custom">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
              <img src="assets/draw2.jpg"
                class="img-fluid" alt="Sample image"> 
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
              <form action="login.php" method="POST">
                <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start" style="padding-top: 100px;">
                  <p class="lead fw-normal mb-0 me-3">Sign in with</p>
                  <button type="button" class="btn btn-primary btn-floating mx-1" style="background-color: #E67F33;">
                    <i class="fab fa-facebook-f" ></i>
                  </button>
      
                  <button type="button" class="btn btn-primary btn-floating mx-1" style="background-color: #E67F33;">
                    <i class="fab fa-twitter"></i>
                  </button>
      
                  <button type="button" class="btn btn-primary btn-floating mx-1" style="background-color: #E67F33;">
                    <i class="fab fa-linkedin-in"></i>
                  </button>
                </div>
      
                <div class="divider d-flex align-items-center my-4">
                  <p class="text-center fw-bold mx-3 mb-0">Or</p>
                </div>
      
                <!-- Email input -->
                <div><p class=" text-center text-success font-bold"><?php echo $signupCheck; ?></p></div>
                <div class="form-outline mb-4">
                  <input type="email" id="form3Example3" class="form-control form-control-lg"
                    placeholder="Email" name="email" />
                  <!-- <label class="form-label" for="form3Example3">Email address</label> -->
                </div>
      
                <!-- Password input -->
                <div class="form-outline mb-3">
                  <input type="password" id="form3Example4" class="form-control form-control-lg"
                    placeholder="Password" name="password" />
                  <!-- <label class="form-label" for="form3Example4">Password</label> -->
                </div>
      
                <div class="d-flex justify-content-between align-items-center">
                  <!-- Checkbox -->
                  <div class="form-check mb-0">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                    <label class="form-check-label" for="form2Example3">
                      Remember me
                    </label>
                  </div>
                  <a href="#!" class="text-body">Forgot password?</a>
                </div>
      
                <div class="text-center text-lg-start mt-4 pt-2">
                <a href="login.php" class="link-danger"><button type="submit" class="btn btn-primary btn-lg" name="Login"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;background-color: #E67F33;" >Login</button></a>
                  <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? 
                    <a href="signup.php"class="link-danger">Register</a></p>
                </div>
      
              </form>
            </div>
          </div>
        </div>
        
      </section>
</body>
</html>