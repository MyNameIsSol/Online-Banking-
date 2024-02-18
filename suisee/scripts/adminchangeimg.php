<?php
include 'db.php';
    if(isset($_POST['updateimg'])){
        $uid = mysqli_real_escape_string($conn,$_POST['uid']);
        // IMAGE 
        $img = $_FILES['file_upload']['name'];

    if(!empty($img)){
        $target = "../account/images/".basename($_FILES['file_upload']['name']);
        $fileType = strtolower(pathinfo($target, PATHINFO_EXTENSION));
        $fileSize = $_FILES['file_upload']['size'];
        $returned_val = validateImageUpload($target, $fileType, $fileSize);
        if($target == $returned_val){ 

        $sql = "UPDATE users SET userimage='$img' WHERE uid = '$uid'";

        move_uploaded_file($_FILES['file_upload']['tmp_name'], $target);
        if(!mysqli_query($conn,$sql)){
            die("Error: ".mysqli_error($conn));
            exit;
        }

        header("Location:../account/admin/setuser_image.php?suc");
        exit();
        
        }else{
            $error = $returned_val;
            header("Location:../account/admin/setuser_image.php?error=".$error);
            exit();
        }
        }else{
            header("Location:../account/admin/setuser_image.php?empty");
            exit();
        }
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

    ?>