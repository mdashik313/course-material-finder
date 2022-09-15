<?php 
    include('config/db_connect.php');
    session_start();

    $sql = "SELECT * FROM course WHERE 1";
    $result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html lang="en">
    <?php include('templates/points.php');?>
    <?php include('templates/profileHeader.php');?>
    
<!-- <div class="flex items-center justify-center mb-10 mt-10">
        <div class="flex border-2 border-black rounded">
            <input type="text" class="px-4 py-2 w-full" placeholder="Search Course...">
            <button class="px-4 text-white bg-gray-600 border-l ">
                Search
            </button>
        </div>
    </div> -->
    

    

    
<div class="grid grid-cols-3 gap-5 ml-20">

        <?php while($course = mysqli_fetch_array($result)) { ?>

            <div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 m-10 p-10">
                <a href="#" class="flex content-center">
                    <img class="rounded-t-lg w-40 justify-center" src="assets/course.png" alt="">
                </a>
                <div class="p-5">
                    <a href="#">
                        <h6 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo $course['course_name'] ?></h6>
                    </a>
                    <p class="mb-3 font-sans text-gray-700 dark:text-gray-400"><?php echo $course['course_code'] ?></p>
                    <a href="download2.php?course_code=<?php echo $course['course_code']; ?> & course_name=<?php echo $course['course_name']; ?>" class="inline-flex items-center py-4 px-6 text-xl font-medium text-center text-white bg-blue-700 rounded-lg  focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Download
                        <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
            </div>

        <?php } ?>

</div>


    <?php include('templates/footer.php');?>
</html>