<?php
include 'db.php';
session_start();
	if(isset($_GET['tid'])){
		$tid = mysqli_real_escape_string($conn,$_GET['tid']);

		$sql = "SELECT * FROM notification WHERE noticeid='$tid'";
		$result = mysqli_query($conn,$sql);
		$result_check = mysqli_num_rows($result);
		if($result_check > 0){
				$sql = "DELETE FROM notification WHERE noticeid='$tid'";
				mysqli_query($conn,$sql);
				header("Location:../account/user/index.php?noticedel");
				exit();

		}	
	}
    ?>