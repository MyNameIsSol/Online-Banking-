<?php

	include 'db.php';
	if(isset($_POST['changepass'])){
		$oldpasswd = mysqli_real_escape_string($conn,$_POST['oldpass']);
        $pass = mysqli_real_escape_string($conn,$_POST['password']);
		$cpass = mysqli_real_escape_string($conn,$_POST['cpassword']);
		$uid = mysqli_real_escape_string($conn,$_POST['uid']);

        $sql = "SELECT * FROM users WHERE uid='$uid'";
            $result = mysqli_query($conn,$sql);
            $result_check = mysqli_num_rows($result);
            if($result_check > 0){
                while($data=mysqli_fetch_assoc($result)){
                    $dbpassword = $data['password'];
                    $uid = $data['uid'];
                    if($oldpasswd == $dbpassword){
                    $sql = "UPDATE users

                    SET password='$pass'
        
                    WHERE uid = '$uid'
               ";
            mysqli_query($conn,$sql);
            $msg = "Password Changed";
            header("Location:../account/user/editpass.php?psuc");
            exit();
                    }else{
                        $error = "Sorry, the old password you entered is wrong...";
                        header("Location:../account/user/editpass.php?perror");
                        exit();     
                    }
              }   
            }

    }else{
        $error = "Sorry, we could not update your password. Try later...";
        header("Location:../account/user/editpass.php?error");
        exit();
    }

  ?>
 