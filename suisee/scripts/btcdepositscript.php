<?php
include 'db.php';

$tbname = 'deposit';
$tbcols = 'id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        acctname VARCHAR(225) NOT NULL,
        acctnumber VARCHAR(225) NOT NULL,
        email VARCHAR(225) NOT NULL,
        amount VARCHAR(22) NOT NULL,
        proof VARCHAR(255) NOT NULL,
        comment varchar(255) not null,
        department varchar(255) not null,
        uid VARCHAR(225) NOT NULL,
        transact_type VARCHAR(225) NOT NULL,
        transactionid VARCHAR(225) NOT NULL,
        status VARCHAR(225) NOT NULL,
        transact_date DATETIME NOT NULL';

$sql = "CREATE TABLE IF NOT EXISTS $tbname($tbcols)";
mysqli_query($conn, $sql);
   
if(isset($_POST['deposit'])){
    $acctname=mysqli_real_escape_string($conn,$_POST['acctname']);
	$acctnumber=mysqli_real_escape_string($conn,$_POST['acctnumber']);
	$amount=mysqli_real_escape_string($conn,$_POST['amount']);
	$email=mysqli_real_escape_string($conn,$_POST['email']);
    $currency=mysqli_real_escape_string($conn,$_POST['currency']);
    $dept= "Customer Billing Department";
	$descrip=mysqli_real_escape_string($conn,$_POST['comment']);
    $uid=mysqli_real_escape_string($conn,$_POST['uid']);
    $comment = "Deposit of ".$currency.$amount." to Account ".$acctnumber." ( click state Bank )";

    $img =  $_FILES['file_upload']['name'];

    $transtype = mysqli_real_escape_string($conn,$_POST['transtype']);
    $transtype = $transtype.' transfer';
	$requestid = "DP".uniqid();
	
	$date= date('Y-m-d H:i:s');
	$status="Pending";
	
	$sql = "SELECT * FROM users WHERE uid='$uid' ";
	$result= mysqli_query($conn,$sql);
	$result_checker= mysqli_num_rows($result);
	
	if($result_checker > 0){
	// while($data = mysqli_fetch_assoc($result)){
        while($data = mysqli_fetch_assoc($result)){
            $acctnumbe = $data['acctnumber'];
            $dbcountry = $data['country'];
         }

         $target = "../account/user/payment/".basename($_FILES['file_upload']['name']);
$fileType = strtolower(pathinfo($target, PATHINFO_EXTENSION));
$fileSize = $_FILES['file_upload']['size'];
$returned_val = validateImageUpload($target, $fileType, $fileSize);
if($target == $returned_val){ 

	$sql="INSERT INTO deposit(acctname,acctnumber,email,amount,proof,comment,department,uid,transact_type,transactionid,status,transact_date) VALUES ('$acctname','$acctnumber','$email','$amount','$img','$descrip','$dept','$uid','$transtype','$requestid','$status','$date')";
	move_uploaded_file($_FILES['file_upload']['tmp_name'], $target);
    if(!mysqli_query($conn,$sql)){
        die("Error: ".mysqli_error($conn));
        exit;
    }

    $sql="INSERT INTO transactions (sendername,senderemail,senderacctnum,bname,bnumber,bbank,description,amount,transactionid,transact_date,bemail,country,rtn,status,initiator_id,transact_type,comment) 
    VALUES ('$acctname','$email','$acctnumber','$acctname','$acctnumber','click state Bank','$comment','$amount','$requestid','$date','$email','$dbcountry','','$status','$uid','$transtype','$descrip')";
    if(!mysqli_query($conn,$sql)){
        die("Error: ".mysqli_error($conn));
        exit;
    }

    $sql="INSERT INTO ticket(acctname,acctnumber,email,ticket_type,amount,proof,department,subject,message,uid,ticketid,status,request_date) VALUES ('$acctname','$acctnumber','$email','$transtype','$amount','$img','$dept','Not Required','Not Required','$uid','$requestid','$status','$date')";
	if(!mysqli_query($conn,$sql)){
        die("Error".mysqli_error($conn));
        exit;
    }

         //send loan mail to user

           $msg = "Deposit request have been sent";
header("Location:../account/user/btc_deposit.php?deposuc");
exit;
}
}else{
    $error = $returned_val;
    header("Location:../account/user/btc_deposit.php?error=".$error);
}
}else{
    header("Location:../account/user/btc_deposit.php");
    exit();
}

//standard image validation
function validateImageUpload($file,$fileExe,$fileSize){
    $exeArray = array("jpg","png","jpeg","pdf");
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
    ?>  