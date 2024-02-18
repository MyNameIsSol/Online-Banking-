<?php
include 'db.php';

$tbname = 'loan';
$tbcols = 'id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        acctname VARCHAR(225) NOT NULL,
        acctnumber VARCHAR(225) NOT NULL,
        email VARCHAR(225) NOT NULL,
        amount VARCHAR(22) NOT NULL,
        income varchar(255) not null,
        purpose varchar(255) not null,
        department varchar(255) not null,
        uid VARCHAR(225) NOT NULL,
        transact_type VARCHAR(225) NOT NULL,
        transactionid VARCHAR(225) NOT NULL,
        status VARCHAR(225) NOT NULL,
        transact_date DATETIME NOT NULL';

$sql = "CREATE TABLE IF NOT EXISTS $tbname($tbcols)";
mysqli_query($conn, $sql);
   
if(isset($_POST['loanrequest'])){
    $acctname=mysqli_real_escape_string($conn,$_POST['acctname']);
	$acctnumber=mysqli_real_escape_string($conn,$_POST['acctnumber']);
	$amount=mysqli_real_escape_string($conn,$_POST['amount']);
	$email=mysqli_real_escape_string($conn,$_POST['email']);
    $income=mysqli_real_escape_string($conn,$_POST['income']);
    $dept= "Loan Department";
    $subject=mysqli_real_escape_string($conn,$_POST['subject']);
	$message=mysqli_real_escape_string($conn,$_POST['message']);
    $uid=mysqli_real_escape_string($conn,$_POST['uid']);


    $transtype = "loan";
    $ticket_type = "Loan Request";
	$requestid = "LN".uniqid();
	
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

	$sql="INSERT INTO loan(acctname,acctnumber,email,amount,income,purpose,department,uid,transact_type,transactionid,status,transact_date) VALUES ('$acctname','$acctnumber','$email','$amount','$income','$message','$dept','$uid','$transtype','$requestid','$status','$date')";
	if(!mysqli_query($conn,$sql)){
        die("Error".mysqli_error($conn));
        exit;
    }

    $sql="INSERT INTO ticket(acctname,acctnumber,email,ticket_type,amount,department,subject,message,uid,ticketid,status,request_date) VALUES ('$acctname','$acctnumber','$email','$ticket_type','$amount','$dept','$subject','$message','$uid','$requestid','$status','$date')";
	if(!mysqli_query($conn,$sql)){
        die("Error".mysqli_error($conn));
        exit;
    }

         //send loan mail to user

           $msg = "Loan request have been sent";
header("Location:../account/user/loan.php?loansuc");
exit;
}
}else{
    header("Location:../account/user/loan.php");
    exit();
}
    ?>            
	