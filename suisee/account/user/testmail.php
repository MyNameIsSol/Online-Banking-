<?php
 // SEND MAIL FOR FORGETTEN PASSWORD
            //password reset.php
    //from: site domain name
    $site_domain = "clickstateonline.com";
    //from: sender name
    $site_name = "Clickstate";
    //from: sender email
    $sitesupport_email = "support@clickstateonline.com";
    //to: receiver name
    $receiver_name = $acctname;
    //to: receiver email
    $receiver_email = $email;

    $title = 'Your confirmation code';
$headers = "MIME-Version: 1.0" . PHP_EOL;
$headers .= "Content-type: text/html; charset=utf-8" . PHP_EOL;
$headers .= "From: $site_name <$sitesupport_email>" . PHP_EOL;
$headers .= "Organization: $site_name" . PHP_EOL;
$headers .= "Reply-To: $site_name Support Team <$sitesupport_email>" . PHP_EOL;
$headers .= "Return-Path: <$sitesupport_email>" . PHP_EOL;
$headers .= "X-Priority: 3" . PHP_EOL;
$headers .= "X-Mailer: PHP/" . phpversion() . PHP_EOL;
$message ='<!DOCTYPE html>
<html>
<head>
<title>'.$title. '</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<style type="text/css">
/* FONTS */
@import url("https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i");

/* CLIENT-SPECIFIC STYLES */
body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
img { -ms-interpolation-mode: bicubic; }

/* RESET STYLES */
img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
table { border-collapse: collapse !important; }
body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }

/* iOS BLUE LINKS */
a[x-apple-data-detectors] {
color: inherit !important;
text-decoration: none !important;
font-size: inherit !important;
font-family: inherit !important;
font-weight: inherit !important;
line-height: inherit !important;
}

/* MOBILE STYLES */
@media screen and (max-width:600px){
h1 {
font-size: 32px !important;
line-height: 32px !important;
}
}

/* ANDROID CENTER FIX */
div[style*="margin: 16px 0;"] { margin: 0 !important; }
</style>
</head>
<body style="background-color: #f3f5f7; margin: 0 !important; padding: 0 !important;">

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
     <img alt="logo" src="clickstateonline.com/assets/img/pnglogo.png"  style="max-height: 60px; max-width: 110px;" border="0">
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
         <p style="font-size: 18px; font-weight: 600; margin: 10px 13px;">Hello '.$receiver_name.',</p>
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
     <p style="margin: 10px 13px; font-size: 14px;">Enter the code below as your one time confirmation code to continue.</p>
     <p style="margin: 10px 13px; font-size: 14px;">Your code '.$otp.' </p>
     <p style="margin: 10px 13px; font-size: 14px;">Please do inform us if you did not initiate this.</p>
     <p style="margin: 10px 13px; font-size: 14px;">customer support: <a href="mailto:support@clickstateonline.com">support@clickstateonline.com</a></p>
     
   </td>
 </tr>
 <!-- COPY -->
 <tr>
   <td bgcolor="#ffffff" align="left" style="padding: 10px 10px 20px 10px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
     <p style="margin:10px 13px; font-size: 14px;">Warm regards,</p>
   </td>
 </tr>

</table>
</td>
</tr>

</table>
</body>
</html>';

@mail($receiver_email,$title,$message,$headers);   
?>