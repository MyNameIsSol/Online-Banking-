<?php

	include 'db.php';
	if(isset($_POST['details'])){
		isset($_POST['mname']) ? $mname = mysqli_real_escape_string($conn,$_POST['mname']) : $mname = "-";
        isset($_POST['uname']) ? $username = mysqli_real_escape_string($conn,$_POST['uname']) : $username = "-";
        isset($_POST['phone']) ? $phone = mysqli_real_escape_string($conn,$_POST['phone']) : $phone = "-";
        isset($_POST['dob']) ? $birth = mysqli_real_escape_string($conn,$_POST['dob']) : $birth = "-";
        isset($_POST['marital']) ? $marital = mysqli_real_escape_string($conn,$_POST['marital']) : $marital = "-";
        isset($_POST['occupation']) ? $occupation = mysqli_real_escape_string($conn,$_POST['occupation']) : $occupation = "-";
        isset($_POST['addr']) ? $addr = mysqli_real_escape_string($conn,$_POST['addr']) : $addr = "-";
        $uid = $_POST['uid'];

		$img =  $_FILES['file_upload']['name'];

		// IMAGE 
        if(!empty($img)){
        $target = "../account/images/".basename($_FILES['file_upload']['name']);
        $fileType = strtolower(pathinfo($target, PATHINFO_EXTENSION));
        $fileSize = $_FILES['file_upload']['size'];
        $returned_val = validateImageUpload($target, $fileType, $fileSize);
        if($target == $returned_val){ 
		$sql = "UPDATE users

				SET midname='$mname',username='$username',phone='$phone',birth ='$birth',marital='$marital',occupation='$occupation',addrs='$addr',userimage = '$img'

				WHERE uid = '$uid'
		";

		move_uploaded_file($_FILES['file_upload']['tmp_name'], $target);
		mysqli_query($conn,$sql);

        header("Location:../account/user/profile.php?updated");
		exit();
        }else{
            $error = $returned_val;
            header("Location:../account/user/profile.php?error=".$error);
        }
    }else{
        $sql = "UPDATE users

        SET midname='$mname',username='$username',phone='$phone',birth ='$birth',marital='$marital',occupation='$occupation',addrs='$addr'

        WHERE uid = '$uid'
    ";
    mysqli_query($conn,$sql);
    header("Location:../account/user/profile.php?updated");
    exit();
    }

    }else{
        $error = "Sorry, we could not update your details...";
		header("Location:../account/user/profile.php?error=".$error);
		exit();
	}

    //standard image validation
    function validateImageUpload($file,$fileExe,$fileSize){
        $exeArray = array("jpg","png","jpeg","gif");
        if(file_exists($file)){
            unlink($file);
        }
            if(in_array($fileExe,$exeArray)){
                if($fileSize < 2097152){
                    $message = $file;
                }else{
                    $message = "File size too large, Must be exactly 2 MB";
                }
            }else{
                $message = "File format not allowed, please choose a jpg or png or jpeg or gif file.";
            }
            return $message;
    }