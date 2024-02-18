<?php
include 'db.php';

$tbname = 'notification';
$tbcols = 'id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        acctname VARCHAR(225) NOT NULL,
        subject VARCHAR(225) NOT NULL,
        message VARCHAR(225) NOT NULL,
        email VARCHAR(225) NOT NULL,
        department varchar(255) not null,
        uid VARCHAR(225) NOT NULL,
        noticeid VARCHAR(225) NOT NULL,
        status VARCHAR(225) NOT NULL,
        sent_date DATETIME NOT NULL';

$sql = "CREATE TABLE IF NOT EXISTS $tbname($tbcols)";
mysqli_query($conn, $sql);
   
if(isset($_POST['send_msg'])){
    $dept= mysqli_real_escape_string($conn,$_POST['support']);
	$subject=mysqli_real_escape_string($conn,$_POST['subject']);
    $message=$_POST['message'];
    $uid=mysqli_real_escape_string($conn,$_POST['uid']);

	$noticeid = "NT".uniqid();
	$date= $_POST['date'].' '.$_POST['time'];
	$status="seen";
	
	$sql = "SELECT * FROM users WHERE uid='$uid' ";
	$result= mysqli_query($conn,$sql);
	$result_checker= mysqli_num_rows($result);
	
	if($result_checker > 0){
        while($data = mysqli_fetch_assoc($result)){
            $acctname = $data['acctname'];
            $acctnumbe = $data['acctnumber'];
            $uemail = $data['email'];
         }

	$sql="INSERT INTO notification(acctname,subject,message,email,department,uid,noticeid,status,sent_date) VALUES ('$acctname','$subject','$message','$uemail','$dept','$uid','$noticeid','$status','$date')";
	if(!mysqli_query($conn,$sql)){
        die("Error".mysqli_error($conn));
        exit;
    }

         //send loan mail to user

           $msg = "Message sent";
header("Location:../account/admin/send_message.php?msgsuc");
exit;
}
}else{
    header("Location:../account/admin/send_message.php");
    exit();
}
    ?>            
	