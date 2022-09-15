<?php 
    //connet to database
    $conn = mysqli_connect('localhost', 'root', '', 'uiu_course');

	// check connection
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}
?>