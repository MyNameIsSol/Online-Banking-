<?php

	include 'db.php';
	if(isset($_POST['routuser'])){
		$code = mysqli_real_escape_string($conn,$_POST['router']);
        $uid = $_POST['uid'];

        $sql = "UPDATE users

        SET code='$code'

        WHERE uid = '$uid'
        ";
        mysqli_query($conn,$sql);
        header("Location:../account/admin/direct_billing.php?updated");
        exit();

        }else{
            $error = "Sorry, we could not update user billing method...";
            header("Location:../account/admin/direct_billing.php?error=".$error."&uid=".$uid);
            exit();
        }
