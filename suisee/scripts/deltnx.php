<?php
include 'db.php';
session_start();
	if(isset($_POST['tid'])){
		$tid = mysqli_real_escape_string($conn,$_POST['tid']);

		$sql = "SELECT * FROM transactions WHERE transactionid='$tid'";
		$result = mysqli_query($conn,$sql);
		$result_check = mysqli_num_rows($result);
		if($result_check > 0){
			while($data = mysqli_fetch_assoc($result)){
				$sql = "DELETE FROM transactions WHERE transactionid='$tid'";
				mysqli_query($conn,$sql);
				header("Location:../account/admin/user_transfers.php?txdel");
				exit();

			}
		}	
	}
    ?>