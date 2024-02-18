<?php
include 'db.php';
session_start();
	if(isset($_POST['tid'])){
		$tid = mysqli_real_escape_string($conn,$_POST['tid']);

		$sql = "SELECT * FROM ticket WHERE ticketid='$tid'";
		$result = mysqli_query($conn,$sql);
		$result_check = mysqli_num_rows($result);
		if($result_check > 0){
				$sql = "DELETE FROM ticket WHERE ticketid='$tid'";
				mysqli_query($conn,$sql);

                $sql = "DELETE FROM cardrequests WHERE requestid='$tid'";
				mysqli_query($conn,$sql);

                $sql = "DELETE FROM deposit WHERE transactionid='$tid'";
				mysqli_query($conn,$sql);

                $sql = "DELETE FROM loan WHERE transactionid='$tid'";
				mysqli_query($conn,$sql);
				header("Location:../account/admin/tickets.php?tkdel");
				exit();

		}	
	}
    ?>