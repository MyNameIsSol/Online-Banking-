<?php
include_once('phpmaile/PHPMailerAutoload.php');
include 'db.php';
    if(isset($_POST['debit'])){
        $uid = mysqli_real_escape_string($conn,$_POST['uid']);
        $sql = "SELECT * FROM users WHERE uid ='$uid'";
        $result = mysqli_query($conn,$sql);
        $result_checker = mysqli_num_rows($result);
        
        if($result_checker > 0){
            while($data = mysqli_fetch_assoc($result)){
                $acctbal = (float)$data['acctbal'];
                $acctname = $data['acctname'];
                $email = $data['email'];
                $acctnumber = $data['acctnumber'];
                $currency = $data['currency'];
            }
        }

        $_POST['dname'] ? $dname = mysqli_real_escape_string($conn,$_POST['dname']) : $dname ="";
        $bname = $acctname;
        $bnacct = $acctnumber;
        $_POST['bbank'] ? $bbank = mysqli_real_escape_string($conn,$_POST['bbank']) : $bbank ="Clickstate Bank";
        $bemail = $email;
        $bcountry = "";
        $brtn = "";
        $amount = mysqli_real_escape_string($conn,$_POST['amount']);
        $swift = "";
        $comment = mysqli_real_escape_string($conn,$_POST['descrip']);
       
        $_POST['date'] ? $date = mysqli_real_escape_string($conn,$_POST['date']) : $date = date('Y-m-d H:i:s');
        $status ="Successful";

        $transferid="DR".uniqid();
        $transtype = "debit";
        $descrip = "Debit of $".$amount." from Account ".$bnacct." For: ".$comment;

        
        $sql = "SELECT * FROM users WHERE uid ='$uid'";
        $result = mysqli_query($conn,$sql);
        $result_checker = mysqli_num_rows($result);
        
        if($result_checker > 0){
            while($data = mysqli_fetch_assoc($result)){
                $acctnumber = $data['acctnumber'];
                $finalacctbal = $acctbal - (float)$amount;

                // updating the accountbal after transfer is completed
                $sql = "UPDATE users
				SET acctbal='$finalacctbal'
				WHERE uid = '$uid'
		        ";
                mysqli_query($conn,$sql);

                // updating transaction history
                $sql="INSERT INTO transactions (sendername,senderemail,senderacctnum,bname,bnumber,bbank,description,amount,transactionid,transact_date,bemail,country,rtn,status,initiator_id,transact_type,comment) 
                                    VALUES ('$dname','','','$bname','$bnacct','$bbank','$descrip','$amount','$transferid','$date','$email','$bcountry','$brtn','$status','$uid','$transtype','$comment')";
                if(!mysqli_query($conn,$sql)){
                    die("Error! ".mysqli_error($conn));
                }
                //send transfer successful mail
                  //Mail to user on credit
//from: site domain name
$site_domain = 'clickstateonline.com';
//from: sender name
$site_name = 'Clickstate';
//from: sender email
$sitesupport_email = "support@clickstateonline.com";
//to: receiver name
$receiver_name = $acctname;
//to: receiver email
$receiver_email = $bemail;

$title = 'Debit Alert';
$mail = new PHPMailer(true);
// $mail->SMTPDebug = 2;
$mail->isSMTP();                                           
$mail->Host = 'server2.lytehosting.com';                 
$mail->SMTPAuth = true;                               
$mail->Username   = $sitesupport_email;         
$mail->Password   = 'click100%';                       
$mail->SMTPSecure  = 'tls'; 
$mail->SMTPOptions = array('ssl' => array('verify_peer' => false,
                    'verify_peer_name'  => false,
                    'allow_self_signed' => true));
$mail->Port       = 587;  

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
        <img alt="" src="https://clickstateonline.com/images/clickstate_logo.png"  style="max-height: 240px; max-width: 70px;" border="0">
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
          <p style="font-size: 14px; font-weight: 600; margin: 10px 13px;">Dear '.$receiver_name.',</p>
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
            <p style="margin:10px 13px; font-size: 14px; text-align:center; color:blue;">We wish to inform you that a Debit transaction occurred on your account with us.</p>
      </td>
      </tr>

      <!-- COPY HEADING -->
      <tr>
      <td bgcolor="#ffffff" align="left" style="padding: 10px 10px 40px 10px; color: #111111; font-family: "Poppins", sans-serif; font-size: 14px; font-weight: 400; line-height: 25px;">
        <h2 style="font-size: 13px; font-weight: 600; margin: 10px 13px; color:red; text-align:center;">Transaction Notification:</h2>
      </td>
      </tr>
      <!-- COPY -->
      <tr>
      <td bgcolor="#ffffff" align="center" style="padding: 10px 10px 20px 10px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
        <p style="margin: 10px 13px; font-size: 12px;">Account Number: '. $acctnumber .'</p>
        <p style="margin: 10px 13px; font-size: 12px;">Description: '.$comment.'</p>
                  <p style="margin: 10px 13px; font-size: 12px;">Amount: '.$currency.$amount.'</p>
                  <p style="margin: 10px 13px; font-size: 12px;">Time of transaction: '.$date.'</p>
                  <p style="margin: 10px 13px; font-size: 12px;">Current Balance: '.$currency.$finalacctbal.'</p>
                  <p style="margin: 10px 13px; font-size: 12px;">Available Balance: '.$currency.$finalacctbal.'</p>
      </td>
      </tr>
      <!-- COPY -->
      <tr>
      <td bgcolor="#ffffff" align="left" style="padding: 10px 10px 20px 10px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
        <p style="margin:10px 13px; font-size: 12px;">Thank you for choosing us.</p>
      </td>
      </tr>
      
      <!-- COPY -->
      <tr>
      <td bgcolor="#ffffff" align="left" style="padding: 10px 10px 40px 10px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
        <p style="margin:10px 13px; font-size: 12px;">From ' . $site_name . ' Bank</p>
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

                 $msg = "Transaction Successful";
                 header("Location:../account/admin/debit.php?suc");
                 exit();
            } 
        }
    }else{
        $error = "sorry! Your transaction was terminated. try again...";
		header("Location:../account/admin/debit.php?error=".$error);
		exit();
    }

?>