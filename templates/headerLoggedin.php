<?php  
  if(!isset($_SESSION['email'])){
      header('Location:login.php');
    }
    // else echo $_SESSION['email'];
    
    if(isset($_POST['logout'])){
      session_destroy();
      header('Location:home.php');
    }
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Course Material</title>
    <link rel="stylesheet" href="css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/28e6d5bc0f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
<header class="text-gray-600 body-font" style="background-color: #0275d8; height: 120px; width :100%;" >
  <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
    <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0" href="index.php" style="text-decoration: none;">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-yellow-500 rounded-full" viewBox="0 0 24 24">
        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
      </svg>
      <span class="ml-3 text-xl text-white">Course Material</span>
    </a>
    <nav class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400	flex flex-wrap items-center text-base justify-center">
      <a class="mr-5 hover:text-gray-900 text-white text-decoration-none" href="index.php">Home</a>
      <a class="mr-5 hover:text-gray-900 text-white text-decoration-none" href="request.php" >Make request</a>
      <a class="mr-5 hover:text-gray-900 text-white text-decoration-none" href="#download">Download course</a>
      <a class="mr-5 hover:text-gray-900 text-white text-decoration-none" href="#upload">Upload course</a>
      <a class="mr-5 hover:text-gray-900 text-white text-decoration-none" href="#counselling">Get counsel</a>
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

