<?php
include 'db.php';

$tbname = 'ticket';
$tbcols = 'id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        acctname VARCHAR(225) NOT NULL,
        acctnumber VARCHAR(225) NOT NULL,
        email VARCHAR(225) NOT NULL,
        ticket_type varchar(255) not null,
        amount varchar(255) not null,
        proof varchar(255) not null,
        department varchar(255) not null,
        subject VARCHAR(225) NOT NULL,
        message VARCHAR(225) NOT NULL,
        uid VARCHAR(225) NOT NULL,
        ticketid VARCHAR(225) NOT NULL,
        status VARCHAR(225) NOT NULL,
        request_date DATETIME NOT NULL';

$sql = "CREATE TABLE IF NOT EXISTS $tbname($tbcols)";
mysqli_query($conn, $sql);
   
if(isset($_POST['help'])){
    $acctname=mysqli_real_escape_string($conn,$_POST['acctname']);
	$acctnumber=mysqli_real_escape_string($conn,$_POST['acctnumber']);
	$email=mysqli_real_escape_string($conn,$_POST['email']);
    $dept= "Customer Care";
	$subject=mysqli_real_escape_string($conn,$_POST['subject']);
    $message=$_POST['message'];
    $uid=mysqli_real_escape_string($conn,$_POST['uid']);

	$requestid = "TK".uniqid();
	$date= date('Y-m-d H:i:s');
	$status="Pending";
	
	$sql = "SELECT * FROM users WHERE uid='$uid' ";
	$result= mysqli_query($conn,$sql);
	$result_checker= mysqli_num_rows($result);
	
	if($result_checker > 0){
	// while($data = mysqli_fetch_assoc($result)){
        while($data = mysqli_fetch_assoc($result)){
            $acctnumbe = $data['acctnumber'];
         }

	$sql="INSERT INTO ticket(acctname,acctnumber,email,ticket_type,amount,proof,department,subject,message,uid,ticketid,status,request_date) VALUES ('$acctname','$acctnumber','$email','Help(Support)','Not Required','Not Required','$dept','$subject','$message','$uid','$requestid','$status','$date')";
	if(!mysqli_query($conn,$sql)){
        die("Error".mysqli_error($conn));
        exit;
    }

         //send loan mail to user

           $msg = "Ticket have been sent";
header("Location:../account/user/ticket.php?ticketsuc");
exit;
}
}else{
    header("Location:../account/user/ticket.php");
    exit();
}
    ?>            
	