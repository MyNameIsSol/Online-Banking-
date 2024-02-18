<?php
include('scripts/db.php');
session_start();
$uid = $_SESSION['usid'];
if(!isset($uid)){
    header("Location:login.php?session_expire");
}

$sql = "SELECT * FROM users WHERE uid ='$uid'";
$result = mysqli_query($conn,$sql);
$result_checker = mysqli_num_rows($result);

if($result_checker > 0){
while($data = mysqli_fetch_assoc($result)){
    $acctname = ucfirst($data['acctname']);
    $pin = $data['pin'];
    }
}

if(isset($_POST['continue'])){
    //get the user data
    $vpin = mysqli_real_escape_string($conn,$_POST['vpin']);
    if(empty($vpin)){
        header("Location:pin.php?loginempty");
        exit();
    }else{
        if($pin != $vpin){
                header("Location:pin.php?incorrectpin");
                exit();
        }else{
                $_SESSION['usid'] = $uid;
                header("Location:account/user/index.php");
                exit();
            }
    }
}

?>
<title>Login</title>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    
    <meta charset="utf-8">
   
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Fav Icon  -->
    	<link rel="icon" href="images/clickstate_icon.png">
    <!-- Page Title  -->
    <title>Clickstate Bank / Register</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="auth/assets/css/dashlite.css?ver=2.0.0">
    <link id="skin-default" rel="stylesheet" href="auth/assets/css/theme.css?ver=2.0.0">
    </head>

<body class="nk-body ui-rounder npc-default pg-auth no-touch nk-nio-theme">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                <?php
    $url="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

     if(strpos($url, 'invalidemail') == true){
        echo '<script> alert("Error! Invalid Email Address");</script>';
      }

      if(strpos($url, 'uidtaken') == true){
        echo '<script> alert("Error! Email already exist");</script>';
      }

      if(strpos($url, 'regsuc') == true){
        echo '<script> alert("success! Registration successful, Please Login...");</script>';
      }

      if(strpos($url, 'regerror') == true){
          $error = $_GET['regerror'];
          echo '<script> alert("Error! "+"'.$error.'");</script>';
      }

      if(strpos($url, 'loginempty') == true){
        echo '<script> alert("Error! Please, enter your pin");</script>';
      }

      if(strpos($url, 'invaliduid') == true){
       echo '<script> alert("Error! User does not exist"); </script>';
      }
      if(strpos($url, 'incorrectpwd') == true){       
        echo '<script> alert("Error! Invalid Password");</script>';
      }
      if(strpos($url, 'incorrectpin') == true){
        echo '<script> alert("Error! Incorrect Pin");</script>';
      }
      if(strpos($url, 'loginsuc') == true){
        echo '<script> alert("success, Login successfull...Please wait..");</script>';
      }
      if(strpos($url, 'loginerror') == true){
        echo '<script> alert("Error! please try again");</script>';
      }
      if(strpos($url, 'pwdresetsentsuc') == true){
        echo '<script> alert("success,  Your password reset link has been sent to your email");</script>';
      }
      if(strpos($url, 'pwdresetsuc') == true){
        echo '<script> alert("success, Your password has been changed successfully");</script>';
      }
?>

                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="brand-logo pb-4 text-center">
                            <a href="index.html" class="logo-link">
                                <img class="logo-light logo-img logo-img-lg" src="images/clickstate_logo.png" alt="Clickstate Bank" srcset="images/clickstate_logo.png" alt="Clickstate Bank 2x" alt="logo">
                                <img class="logo-dark logo-img logo-img-lg" src="images/clickstate_logo.png" alt="Clickstate Bank" srcset="images/clickstate_logo.png" alt="Clickstate Bank 2x" alt="logo-dark">
                            </a>
                        </div>                        <div class="card card-bordered">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Pin Verification</h4>
                                        <div class="nk-block-des">
                                            <p>Please enter your pin to proceed.</p>
                                        </div>
                                    </div>
                                </div>
                                    <form method="POST" action="pin.php">
                                                                        <div class="response" style="display:none"></div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="acct">Welcome <?= !empty($acctname) ? ucwords($acctname) : "back" ?></label>
                                        </div>Enter Your 2Factor PIN
                                        <input type="password" autofocus="" class="form-control form-control-lg" name="vpin" placeholder="Enter your account number" required="">
                                    </div>
                                    
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block" type="submit" name="continue">Login</button>
                                       
                                    </div>
                                </form>
                                    <div class="form-note-s2 text-center pt-4"> New Customer? <a href="account/signup/verify-registration.php">Create an account</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nk-footer nk-auth-footer-full">
    <div class="container wide-lg">
        <div class="row g-3">
            <div class="col-lg-6 order-lg-last">
                <ul class="nav nav-sm justify-content-center justify-content-lg-end">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Terms & Condition</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Privacy Policy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Help</a>
                    </li>
                    <li class="nav-item dropup">
                        <a class="dropdown-toggle dropdown-indicator has-indicator nav-link" data-toggle="dropdown" data-offset="0,10"><span>Translate</span></a>
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                            <ul class="language-list">
                                <li>
                                <div id="google_translate_element">
                                    <div class="skiptranslate goog-te-gadget" dir="ltr" s="">
                                        <div id=":0.targetLanguage" class="goog-te-gadget-simple" style="white-space: nowrap;"></div> 
                                    </div>
                                    <script type="text/javascript">
                                        function googleTranslateElementInit() {
                                            new google.translate.TranslateElement({pageLanguage: 'en', 
                                            layout: google.translate.TranslateElement.InlineLayout.SIMPLE,autoDisplay: false, includedLanguages: ''}, 'google_translate_element');}
                                    </script>   
                                    <script type="text/javascript" src="translate_a/element.js?cb=googleTranslateElementInit"></script>
                                </div></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="nk-block-content text-center text-lg-left">
                    <p class="text-soft">&copy;  All Rights Reserved Clickstate Bank.</p>
                </div>
            </div>
        </div>
    </div>
   
</div>
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="auth/assets/js/bundle.js?ver=2.0.0"></script>
    <script src="auth/assets/js/scripts.js?ver=2.0.0"></script>
    <!-- <script src="auth/include/js/login.js"></script> -->



</body></html>
