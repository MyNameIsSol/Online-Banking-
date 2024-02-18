<?php
include 'db.php';

$tbname = 'cardrequests';
$tbcols = 'id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        acctname VARCHAR(225) NOT NULL,
        acctnumber VARCHAR(225) NOT NULL,
        email VARCHAR(225) NOT NULL,
        subject varchar(255) not null,
        message varchar(255) not null,
        department varchar(255) not null,
        cardtype varchar(255) not null,
        cardoption varchar(255) not null,
        uid VARCHAR(225) NOT NULL,
        transact_type VARCHAR(225) NOT NULL,
        requestid VARCHAR(225) NOT NULL,
        status VARCHAR(225) NOT NULL,
        request_date DATETIME NOT NULL';

        $sql = "CREATE TABLE IF NOT EXISTS $tbname($tbcols)";
        mysqli_query($conn, $sql);
   
if(isset($_POST['cardrequest'])){
    $acctname=mysqli_real_escape_string($conn,$_POST['acctname']);
	$acctnumber=mysqli_real_escape_string($conn,$_POST['acctnumber']);
	$email=mysqli_real_escape_string($conn,$_POST['email']);
    $subject=mysqli_real_escape_string($conn,$_POST['subject']);
    $cardtype=mysqli_real_escape_string($conn,$_POST['cardtype']);
    $cardoption=mysqli_real_escape_string($conn,$_POST['cardoption']);
    $dept= "Card Issuer Department";
	$message=$_POST['message'];
    $uid=mysqli_real_escape_string($conn,$_POST['uid']);


    $transtype = "card";
	$requestid = "CD".uniqid();

    $ticket_type = "Card Request";
	
	$date= date('Y-m-d H:i:s');
	$status="Pending";
	
	$sql = "SELECT * FROM users WHERE uid='$uid'";
	$result= mysqli_query($conn,$sql);
	$result_checker= mysqli_num_rows($result);
	
	if($result_checker > 0){
	// while($data = mysqli_fetch_assoc($result)){
        while($data = mysqli_fetch_assoc($result)){
            $acctnumbe = $data['acctnumber'];
         }

	$sql="INSERT INTO cardrequests(acctname,acctnumber,email,subject,message,department,cardtype,cardoption,uid,transact_type,requestid,status,request_date) VALUES ('$acctname','$acctnumber','$email','$subject','$message','$dept','$cardtype','$cardoption','$uid','$transtype','$requestid','$status','$date')";
	if(!mysqli_query($conn,$sql)){
        die("Error".mysqli_error($conn));
        exit;
    }

    $sql="INSERT INTO ticket(acctname,acctnumber,email,ticket_type,amount,department,subject,message,uid,ticketid,status,request_date) VALUES ('$acctname','$acctnumber','$email','$ticket_type','Not Required','$dept','$subject','$message','$uid','$requestid','$status','$date')";
	if(!mysqli_query($conn,$sql)){
        die("Error".mysqli_error($conn));
        exit;
    }

         //send loan mail to user

           $msg = "card request have been sent";
header("Location:../account/user/request_card.php?cardsuc");
exit;
}
}else{
    header("Location:../account/user/request_card.php");
    exit();
}
    ?>            
	