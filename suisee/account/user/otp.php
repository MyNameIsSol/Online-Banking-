<?php 
include_once('phpmaile/PHPMailerAutoload.php');
include 'userhead.php';

if(!isset($_POST['transfer'])){
    header("Location: index.php");
    exit;   
}else{
    $bname = mysqli_real_escape_string($conn,$_POST['bname']);
    $bnacct = mysqli_real_escape_string($conn,$_POST['bnacct']);
    isset($_POST['bbank']) ? $bbank = mysqli_real_escape_string($conn,$_POST['bbank']) : $bbank = "Clickstate Bank";
    $bemail = mysqli_real_escape_string($conn,$_POST['bemail']);
    isset($_POST['bcountry']) ? $bcountry = mysqli_real_escape_string($conn,$_POST['bcountry']) : $bcountry ="";
    isset($_POST['swift']) ? $swift = mysqli_real_escape_string($conn,$_POST['swift']) : $swift ="";
    isset($_POST['brtn']) ? $brtn = mysqli_real_escape_string($conn,$_POST['brtn']) : $brtn ="";
    $amount = mysqli_real_escape_string($conn,$_POST['amount']);
    $descrip = mysqli_real_escape_string($conn,$_POST['descrip']);
    $bal = mysqli_real_escape_string($conn,$_POST['bal']);
    $tac = mysqli_real_escape_string($conn,$_POST['tac']);
    $tax = mysqli_real_escape_string($conn,$_POST['tax']);

    $tbname = "otp_token";
    $tbcols = 'id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                email VARCHAR(225) NOT NULL,
                otp VARCHAR(225) NOT NULL';
    $sql = "CREATE TABLE IF NOT EXISTS $tbname($tbcols)";
    mysqli_query($conn, $sql);

    $token = rand(5000000,1000000000);//create random token...
    $otp =(int)substr($token,0,3).substr($token,-3,3);
    $sql="INSERT INTO otp_token(email,otp) VALUES ('$email','$otp')";
    mysqli_query($conn,$sql);

    // SEND MAIL FOR OTP
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

$title = 'Your confirmation code';
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
            <p style="margin:10px 13px; font-size: 14px; text-align:center; color:blue;">Please enter the code below as your one time passcode to continue.</p>
      </td>
      </tr>

      <!-- COPY -->
      <tr>
      <td bgcolor="#ffffff" align="center" style="padding: 10px 10px 20px 10px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
        <p style="margin: 10px 13px; font-size: 12px;">Your code '. $otp .'</p>
       
      </td>
      </tr>
      <!-- COPY -->
      <tr>
      <td bgcolor="#ffffff" align="left" style="padding: 10px 10px 20px 10px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
        <p style="margin:10px 13px; font-size: 12px;">Please do inform us if you did not initiate this.</p>
      </td>
      </tr>
      
      <!-- COPY -->
      <tr>
      <td bgcolor="#ffffff" align="left" style="padding: 10px 10px 40px 10px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
        <p style="margin:10px 13px; font-size: 12px;">Warm regards.</p>
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

    $otpsuc = "sent";
}

$sql = "SELECT * FROM otp_token WHERE email ='$email'";
$result = mysqli_query($conn,$sql);
$result_checker = mysqli_num_rows($result);

if($result_checker > 0){
while($data = mysqli_fetch_assoc($result)){
    $otp = $data['otp'];
    }
}
?>

        <style>
        @media screen and (max-width:768px) {
            .title-name {
                font-size: 18px;
                font-weight: 500;
            }
            .balance{
                display: inline-block;
                margin-top: 10px;
            }
        }
        .ptext{
            font-size: 16px;
            font-weight: 500;
        }
    </style>

<?php
    if(!empty($otpsuc)){ 
      echo "<script> alert('OTP sent! Please check your mail for your one time passcode.');</script>";
    }
?> 

<?php
    // if(!empty($otpsuc)){ 
    //   echo "<script> alert('Please enter ".$otp." as your one time passcode.');</script>";
    // }
?>

<script>
function validateForm() {

var inputedotp = document.forms["transfer"]["inputedotp"].value;
  var otp = document.forms["transfer"]["otp"].value;
  
  if(inputedotp != otp){

    alert('Invalid OTP! Please provide a valid OTP..');
    return false;

  }else {
    return true;

  }

}
</script>

        <main class="page-content" style="margin-top:-20px">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-8 col-lg-8 col-xl-8">  
                        <div class=" modal-account"  >
                            <div class="modal__overlay" data-dismiss="modal"></div>
                            <!-- <div class="modal__wrap"> -->
                            <div class="modal__window">
                                <div class="modal__content">
                                <!-- <a class="modal__close text-danger">
                                <svg class="icon-icon-help">
                                        <use xlink:href="#icon-help"></use>
                                    </svg>
                             </a> -->
                                <div class="modal__body">
                                
                                <form class="" name="transfer" method="POST" action="confirm.php" onsubmit="return validateForm()">
                                        <div class="modal-account__pane-header" style="background-color:rgb(217, 0, 0); padding:10px;">
                                                    <h4 style="color: #ffffff; font-size:18px">Enter OTP </h4>
                                                </div>
                                               
                                                    <!-- <h6 class="ml-4">Provide your otp and click continue to <br> proceed. </h6> -->

                                        <div class="modal-account__right tab-content">
                                        
                                            <div class="modal-account__pane tab-pane show active" id="accountDetails">
                                                
                                                    <div class="row row--md">
                                                        <div class="col-12 col-lg-12 form-group form-group--lg">
                                                            <label class="form-label form-label--sm text-danger">OTP Required</label>
                                                            <div class="input-group">
                                                                <input class="input"  type="text" name="inputedotp" placeholder="Enter your OTP" >
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <h5 style="font-size:10px;">Your OTP has been sent to your email.</h5>
                            <h5 style="font-size:10px;">Didn't receive an email? Wait for a while and <a href="index.php" class="text-primary">Retry</a> Or <a href="mailto:finance@clickstateonline.com" class="text-primary">Send us a message.</a></h5>
                                                   
                                                    <div class="form-group  mb-4">
                                                        <input type="hidden" name="bname" value='<?php echo $bname?>'>
                                                        <input type="hidden" name="bnacct" value='<?php echo $bnacct?>'>
                                                        <input type="hidden" name="bbank" value='<?php echo $bbank?>'>
                                                        <input type="hidden" name="bemail" value='<?php echo $bemail?>'>
                                                        <input type="hidden" name="amount" value='<?php echo $amount?>'>
                                                        <input type="hidden" name="bcountry" value='<?php echo $bcountry?>'>
                                                        <input type="hidden" name="brtn" value='<?php echo $brtn?>'>
                                                        <input type="hidden" name="descrip" value='<?php echo $descrip?>'>
                                                        <input type="hidden" name="swift" value='<?php echo $swift?>'>
                                                        <input type="hidden" name="bal" value='<?php echo $acctbal?>'>
                                                        <input type="hidden" name="tac" value='<?php echo $tac?>'>
                                                        <input type="hidden" name="tax" value='<?php echo $tax?>'>
                                                        <input type="hidden" name="otp" value='<?php echo $otp?>'>
                                                    </div>
                                                   
                                                    <div class="card-order__footer-total pt-3">
                                                   
                                                        <div class="card__container p-0">
                                                            <div class="row gutter-bottom-sm justify-content-end">
                                                          
                                                                <div class="card-order__footer-submit col-12 col-sm">
                                                                    <button class="my-btn" name='transfer' type="submit"><span class="button__text">Proceed </span><span class="ml-1"></span>
                                                                    </button>
                                                                </div>
                                                            
                                                            </div>
                                                        </div>
                                                    </div>


                                                </form>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>       
        </div>
    </main>
    </div>
    <script src="js/photoswipe/photoswipe-lightbox.esm.min.js" type="module"></script>
    <script src="js/photoswipe/photoswipe.esm.min.js" type="module"></script>
    <script src="js/gsap/gsap.min.js"></script>
    <script src="js/gsap/ScrollToPlugin.min.js"></script>
    <script src="js/gsap/ScrollTrigger.min.js"></script>
    <script src="js/vendor.min.js"></script>
    <script src="js/common.js"></script>
    <script>
    $(document).ready(function(){
        $(window).on('resize load', function() {
        if ($(window).width() <= 768) { 
            $("#home-mob").removeClass("card__tools-more");
            $("#home-mob").addClass("card__tools");
        }
        });
    });
    </script>
</body>

</html>