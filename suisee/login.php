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
    <link href="sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="sweetalerts/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    
    <style type="text/css">
                                
        a.gflag {vertical-align:middle;font-size:16px;padding:1px 0;background-repeat:no-repeat;background-image:url(gtranslate.net/flags/16.png);}
        a.gflag img {border:0;}
        a.gflag:hover {background-image:url(gtranslate.net/flags/16a.png);}
        #goog-gt-tt {display:none !important;}
        .goog-te-banner-frame {display:none !important;}
        .goog-te-menu-value:hover {text-decoration:none !important;}
        body {top:0 !important;}
        #google_translate_element2 {display:none!important;}
        
        </style>

<script src="//code.tidio.co/3jt1adiakombahrnqevuxuutn8a8jppa.js" async></script>
    </head>

<body class="nk-body ui-rounder npc-default pg-auth no-touch nk-nio-theme">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                <script src="account/assets/js/libs/jquery-3.1.1.min.js"></script>
                    <script src="sweetalerts/promise-polyfill.js"></script>
                    <script src="sweetalerts/sweetalert2.min.js"></script>
                    <script src="sweetalerts/custom-sweetalert.js"></script>
            <?php
                $url="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            
                if(strpos($url, 'status') == true){
                    $status = $_GET['status'];
                    if($status == "Inactive"){
                        echo '<script> 
                        swal("warning","INACTIVE ACCOUNT, PLEASE CONTACT CUSTOMER SUPPORT TO ACTIVATE YOUR ACCOUNT.", "warning");
                        </script>';
                    }elseif($status == "Dormant"){
                        echo '<script> 
                        swal("warning","DORMANT ACCOUNT, DEAR CUSTOMER, YOUR ACCOUNT HAS BEEN DORMANT. KINDLY CONTACT CUSTOMER SUPPORT TO RE-ACTIVATE...", "warning");
                        </script>';
                    }elseif($status == "Disabled"){
                        echo '<script> 
                        swal("warning","ACCOUNT DISABLED, DEAR CUSTOMER, YOUR ACCOUNT HAS BEEN DISABLED. KINDLY CONTACT CUSTOMER SUPPORT TO RECTIFY THE ISSUE...", "warning");
                        </script>';
                    }elseif($status == "Suspended"){
                        echo '<script> 
                        swal("warning","ACCOUNT SUSPENDED!!! DEAR CUSTOMER, YOUR ACCOUNT HAS BEEN SUSPENDED DUE TO VIOLATION IN TERMS. KINDLY CONTACT CUSTOMER SUPPORT TO RECTIFY THE ISSUE...", "error");
                        </script>';
                    } 
                }

                if(strpos($url, 'invalidemail') == true){
                    echo '<script>alert("Error! Invalid Email Address");</script>';
                  }
            
                  if(strpos($url, 'uidtaken') == true){
                    echo '<script> alert("Error! Email already exist");</script>';
                  }
            
                  if(strpos($url, 'regsuc') == true){
                    echo '<script>alert("Registration successful! Your Login details has been sent to your email...");</script>';
                  }
            
                  if(strpos($url, 'regerror') == true){
                      $error = $_GET['regerror'];
                      echo '<script>alert("Error! "+"'.$error.'");</script>';
                  }
            
                  if(strpos($url, 'loginempty') == true){
                    echo '<script> alert("Error! Please, fill out all inputs");</script>';
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
                  if(strpos($url, 'session_expire') == true){
                    echo '<script> alert("warning, session expired, please login again");</script>';
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
                                        <h4 class="nk-block-title">Sign-In</h4>
                                        <div class="nk-block-des">
                                            <p>Access your banking panel using your account number and password.</p>
                                        </div>
                                    </div>
                                </div>
                                    <form method="POST" action="scripts/loginscript.php" >
                                                                        <div class="response" style="display:none"></div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="acct">Account Number</label>
                                        </div>
                                        <input type="number" autofocus="" class="form-control form-control-lg" name="acct_no" placeholder="Enter your account number" required="">
                                    </div>
                                     <input type="hidden" name="code" value=""><div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="pass">Password</label>
                                            <a class="link link-primary link-sm" href="reset_password.php.html">Forgot Password?</a>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a href="#" class="form-icon form-icon-right passcode-switch" id="toggle-password" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                           
                                            <input type="password" id="password" autofocus="" class="form-control form-control-lg" name="pword" placeholder="Enter your password" required="">
                                        </div>
                                    </div>
                                    <script src="1/api.js" async="" defer=""></script>
  
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Sign in</button>
                                        <button class="btn btn-lg btn-primary btn-block" style="display:none" id="authHide" disabled="">
                                            <div class="spinner-border spinner-border-sm" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                            <div class="spinner-grow spinner-grow-sm" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                             Authenticating Account
                                        </button>
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
                        <!-- <a class="dropdown-toggle dropdown-indicator has-indicator nav-link" data-toggle="dropdown" data-offset="0,10"><span>Translate</span></a>
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                            <ul class="language-list">
                                <li> -->
                                <div class="lang" style="margin:0 auto;">
                                <a href="#" onclick="doGTranslate('en|ar');return false;" title="Arabic" class="gflag nturl" style="background-position:-100px -0px;"><img src="gtranslate.net/flags/blank.png" height="16" width="16" alt="Arabic" /></a><a href="#" onclick="doGTranslate('en|en');return false;" title="English" class="gflag nturl" style="background-position:-0px -0px;"><img src="gtranslate.net/flags/blank.png" height="16" width="16" alt="English" /></a><a href="#" onclick="doGTranslate('en|fr');return false;" title="French" class="gflag nturl" style="background-position:-200px -100px;"><img src="gtranslate.net/flags/blank.png" height="16" width="16" alt="French" /></a><a href="#" onclick="doGTranslate('en|de');return false;" title="German" class="gflag nturl" style="background-position:-300px -100px;"><img src="gtranslate.net/flags/blank.png" height="16" width="16" alt="German" /></a><a href="#" onclick="doGTranslate('en|it');return false;" title="Italian" class="gflag nturl" style="background-position:-600px -100px;"><img src="gtranslate.net/flags/blank.png" height="16" width="16" alt="Italian" /></a><a href="#" onclick="doGTranslate('en|es');return false;" title="Spanish" class="gflag nturl" style="background-position:-600px -200px;"><img src="gtranslate.net/flags/blank.png" height="16" width="16" alt="Spanish" /></a>

                                <div id="google_translate_element"></div>
                                <script type="text/javascript"> 
                                    function googleTranslateElementInit() { 
                                        new google.translate.TranslateElement( 
                                            {pageLanguage: "en"}, 
                                            "google_translate_element" 
                                        ); 
                                    } 
                                </script> 
                                <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                                <script type="text/javascript">
                                    /* <![CDATA[ */
                                    eval(function(p,a,c,k,e,r){e=function(c){
                                        return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))
                                        };
                                        if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){
                                            return'\\w+'};
                                            c=1};
                                            while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);
                                            return p
                                            }('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
                                    /* ]]> */
                                    </script> 
                            </div>
                                <!-- <div id="google_translate_element">
                                    <div class="skiptranslate goog-te-gadget" dir="ltr" s="">
                                        <div id=":0.targetLanguage" class="goog-te-gadget-simple" style="white-space: nowrap;"></div> 
                                    </div>
                                    <script type="text/javascript">
                                        function googleTranslateElementInit() {
                                            new google.translate.TranslateElement({pageLanguage: 'en', 
                                            layout: google.translate.TranslateElement.InlineLayout.SIMPLE,autoDisplay: false, includedLanguages: ''}, 'google_translate_element');}
                                    </script>   
                                    <script type="text/javascript" src="translate_a/element.js?cb=googleTranslateElementInit"></script>
                                </div> -->
                                <!-- </li>
                            </ul> -->
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6 mt-2">
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
  
    <script src="account/bootstrap/js/popper.min.js"></script>
    <script src="account/bootstrap/js/bootstrap.min.js"></script>
    <script src="auth/assets/js/bundle.js?ver=2.0.0"></script>
    <script src="auth/assets/js/scripts.js?ver=2.0.0"></script>

    <!-- <script src="auth/include/js/login.js"></script> -->

    <script>
        var togglePassword = document.getElementById("toggle-password");
if (togglePassword) {
	togglePassword.addEventListener('click', function() {
	  var x = document.getElementById("password");
	  if (x.type === "password") {
	    x.type = "text";
	  } else {
	    x.type = "password";
	  }
	});
}
    </script>


</body></html>
