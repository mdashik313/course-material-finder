<?php 
    include('config/db_connect.php');
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<?php include('templates/points.php');?>
<?php    include('templates/headerLoggedin.php');?>

    
    <section class="text-gray-600 body-font" id="download">
  <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
      <img class="object-cover object-center rounded" alt="hero" src="assets/3801388.jpg">
    </div>
    <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">UIU course material system
        <br class="hidden lg:inline-block">Get your course here
      </h1>
      <p class="mb-8 leading-relaxed" style="padding-left: 50px;">Download your coures now.</p>
      <div class="flex justify-center" style="padding-left: 50px;">
        <a href="download.php" class="link-danger" style="text-decoration: none;" ><button class="inline-flex text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded text-lg">Download now</button></a>
      </div>
    </div>
  </div>
</section>

<section class="text-gray-400 bg-gray-900 body-font" id="upload">
  <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
    <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-white">UIU course material system
        <br class="hidden lg:inline-block">Upload your course here
      </h1>
      <p class="mb-8 leading-relaxed" style="padding-left: 50px;">Share your course here.</p>
      <div class="flex justify-center" style="padding-left: 50px;">
      <a href="upload-file.php" class="link-danger" style="text-decoration: none;" ><button class="inline-flex text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded text-lg">Upload here</button></a>
      </div>
    </div>
    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
      <img class="object-cover object-center rounded" alt="hero" src="assets/6461.jpg">
    </div>
  </div>
</section>

<section class="text-gray-600 body-font" id="counselling">
  <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
      <img class="object-cover object-center rounded" alt="hero" src="assets/experts.jpg">
    </div>
    <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Experts are here for you
        <br class="hidden lg:inline-block">Get help from experts
      </h1>
      <p class="mb-8 leading-relaxed" style="padding-left: 50px;">Click get counsel button and fixed time with your experts.</p>
      <div class="flex justify-center" style="padding-left: 50px;">
        <a href="counselling.php" class="link-danger" style="text-decoration: none;" ><button class="inline-flex text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded text-lg">Get Counsel</button></a>
      </div>
    </div>
  </div>
</section>
<?php include('templates/footer.php');?>
</body>
</html>