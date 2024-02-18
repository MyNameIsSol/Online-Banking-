<?php
include 'db.php';

$tbname = 'deposit';
$tbcols = 'id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        acctname VARCHAR(225) NOT NULL,
        acctnumber VARCHAR(225) NOT NULL,
        email VARCHAR(225) NOT NULL,
        amount VARCHAR(22) NOT NULL,
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
    $dept= "Customer Cash Deposit Department";
	$descrip=mysqli_real_escape_string($conn,$_POST['comment']);
    $uid=mysqli_real_escape_string($conn,$_POST['uid']);


    $transtype = mysqli_real_escape_string($conn,$_POST['transtype']);
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
         }

	$sql="INSERT INTO deposit(acctname,acctnumber,email,amount,comment,department,uid,transact_type,transactionid,status,transact_date) VALUES ('$acctname','$acctnumber','$email','$amount','$descrip','$dept','$uid','$transtype','$requestid','$status','$date')";
	if(!mysqli_query($conn,$sql)){
        die("Error: ".mysqli_error($conn));
        exit;
    }

    $sql="INSERT INTO ticket(acctname,acctnumber,email,ticket_type,amount,department,subject,message,uid,ticketid,status,request_date) VALUES ('$acctname','$acctnumber','$email','$transtype','$amount','$dept','Not Required','Not Required','$uid','$requestid','$status','$date')";
	if(!mysqli_query($conn,$sql)){
        die("Error".mysqli_error($conn));
        exit;
    }

         //email to new registered user
	//from: site domain name
	$site_domain = 'clickstateonline.com';
	//from: sender name
	$site_name = 'Clickstate';
	//from: sender email
	$sitesupport_email = "support@clickstateonline.com";
	//to: receiver name
	$receiver_name = $acctname;
	//to: receiver email
	$receiver_email = $email;

	$title = 'Deposit - Your Deposit Is Been Processed!';

	$mail = new PHPMailer;
	$mail->isSMTP();
	// $mail->SMTPDebug = 2;
	$mail->Host='mail.clickstateonline.com';
	$mail->Port=587;
	$mail->SMTPAuth=true;
	$mail->SMTPSecure='tls';
	$mail->Username=$sitesupport_email;
	$mail->Password='click100%';

	$mail->setFrom($sitesupport_email,$site_name);
	$mail->addAddress($receiver_email);
	$mail->addReplyTo($sitesupport_email,$site_name);

	$mail->isHTML(true);
	$mail->Subject=$title;
	$mail->Body='<body style="background-color: #f3f5f7; margin: 0 !important; padding: 0 !important;">
            
	<!-- HIDDEN PREHEADER TEXT -->
	<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: "Poppins", sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
		
	</div>
	
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<!-- LOGO -->
		<tr>
			<td align="center" style="padding: 0px 10px 0px 10px;">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
					<tr>
					<td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 10px 10px 10px;">
					  <a href="#" target="_blank">
					  <img alt="logo" src="https://clickstateonline.com/images/clickstate_logo.png"  style="max-height: 240px; max-width: 70px;" border="0">
					  </a>
					</td>
				  </tr>
				</table>
			</td>
		</tr>
		<!-- HERO -->
		
		<tr>
			<td align="center" style="padding: 0px 10px 0px 10px;">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
					<tr>
						<td bgcolor="#ffffff" align="left" valign="top" style="padding: 20px 20px 10px 10px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: "Poppins", sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 2px; line-height: 48px;">
						  <p style="font-size: 14px; font-weight: 600; margin: 10px 13px;">Hello '.$receiver_name.',</p>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<!-- COPY BLOCK -->
		<tr>
			<td align="center" style="padding: 0px 10px 0px 10px;">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
				  <!-- COPY -->
				  <tr>
					<td bgcolor="#ffffff" align="left" style="padding: 10px 10px 20px 10px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
							  <p style="margin:10px 13px; font-size: 14px; text-align:center;">Your Deposit is being processed and your account will be credited after confirmation.</p>
					</td>
				  </tr>
				  <!-- COPY -->
				  <tr>
					<td bgcolor="#ffffff" align="left" style="padding: 10px 10px 20px 10px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
					  <p style="margin:10px 13px; font-size: 12px;">Warm regards,</p>
					</td>
				  </tr>
				 
				  <!-- COPY -->
				  <tr>
					<td bgcolor="#ffffff" align="left" style="padding: 10px 10px 40px 10px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
					  <p style="margin:10px 13px; font-size: 12px;">From ' . $site_name . 'Bank</p>
					</td>
				  </tr>
				</table>
			</td>
		</tr>
		<!-- FOOTER -->
		<tr>
			<td align="center" style="padding: 0px 10px 50px 10px;">
		
			<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
		   
			
		<!-- COPYRIGHT -->
			<tr>
			  <td align="center" style="padding: 50px 10px 10px 10px; color: #333333; font-family: "Poppins", sans-serif; font-size: 12px; font-weight: 400; line-height: 18px;">
				<p style="margin: 70px 0 20px; font-size: 12px;">Copyright © Clickstate Bank. All rights reserved.</p>
			  </td>
			</tr>
		  </table>
			</td>
		</tr>
	</table>
	</body>';
	$mail->send();

           $msg = "Deposit request have been sent";
header("Location:../account/user/bank_deposit.php?deposuc");
exit;
}
}else{
    header("Location:../account/user/bank_deposit.php");
    exit();
}
    ?>  