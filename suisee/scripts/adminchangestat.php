<?php
	include 'db.php';
	if(isset($_POST['changestat'])){
		$uid = mysqli_real_escape_string($conn,$_POST['uid']);
        $status = mysqli_real_escape_string($conn,$_POST['status']);

        if($status == "Active"){
            //send active mail to client
        }elseif($status == "Dormant"){
            //send dormant mail to client
        }elseif($status == "Inactive"){
            //send client mail to client
        }elseif($status == "Disabled"){
            //send disabled mail to client
        }elseif($status == "Suspended"){
            //send suspend mail to client
        }


        $sql = "UPDATE users

        SET status ='$status'

        WHERE uid = '$uid'
        ";
        mysqli_query($conn,$sql);
        header("Location:../account/admin/set_status.php?updated");
        exit();

        }else{
            $error = "Sorry, we could not update user status...";
            header("Location:../account/admin/set_status.php?error=".$error);
            exit();
        }
