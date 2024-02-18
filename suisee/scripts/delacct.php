<?php
	include 'db.php';
	if(isset($_POST['delacct'])){
		$uid = mysqli_real_escape_string($conn,$_POST['uid']);
		$aid = mysqli_real_escape_string($conn,$_GET['id']);

		$sql = "SELECT * FROM users WHERE uid='$uid'";
		$result = mysqli_query($conn,$sql);
		$result_check = mysqli_num_rows($result);

		if($result_check > 0){

			$sql = "DELETE FROM users WHERE uid='$uid'";
			mysqli_query($conn,$sql);

			$msg = "Selected user have been deleted";
			header("Location:../account/admin/user_account.php?delsuc");
			exit();
		}
	}