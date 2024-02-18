<title>Reset Password</title>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="zxx" class="js">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Fav Icon  -->
    <link rel="icon" href="admin/logo/clickstate_icon.png">
    <!-- Page Title  -->
    <title>SuissePay / Reset Password</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="../auth/assets/css/dashlite.css?ver=2.0.0">
    <link id="skin-default" rel="stylesheet" href="../auth/assets/css/theme.css?ver=2.0.0">
</head>
<div style="text-align:center; width:90%; margin:0 auto;">
    <?php
    $url="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    
        if(strpos($url, 'loginempty') == true){
            echo "<p class='suc alert alert-danger'' style='color:red;font-size:20px;'>Please, fill out the input box  </p>";
            echo "<script>$('.alert-danger').fadeOut(2000)</script>";
        }
        if(strpos($url, 'invaliduid') == true){
            echo "<p class='suc alert alert-danger' style='color:red;font-size:20px;'> Invalid Email</p>";
            echo "<script>$('.alert-danger').fadeOut(2000)</script>";
        }
         if(strpos($url, 'invalidpwd') == true){
            echo "<p class='suc alert alert-danger' style='color:red;font-size:20px;'> Invalid Password</p>";
            echo "<script>$('.alert-danger').fadeOut(2000)</script>";
        }
        if(strpos($url, 'deactiveacct') == true){
            echo "<p class='suc alert alert-danger' style='color:red;font-size:20px;'> Your Investment Account has been deactivated, please contact our support service.</p>";
            echo "<script>$('.alert-danger').fadeOut(2000)</script>";
        }
    ?>
    </div>
<body class="nk-body ui-rounder npc-default pg-auth no-touch nk-nio-theme">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="brand-logo pb-4 text-center">
                            <a href="../index.html" class="logo-link">
                                <img class="logo-light logo-img logo-img-lg" src="../images/clickstate_logo.png"
                                    alt="Demo Bank" srcset="../images/clickstate_logo.png" alt="Demo Bank 2x" alt="logo">
                                <img class="logo-dark logo-img logo-img-lg" src="../images/clickstate_logo.png"
                                    alt="Demo Bank" srcset="../images/clickstate_logo.png" alt="Demo Bank 2x"
                                    alt="logo-dark">
                            </a>
                        </div>



                        <div class="card card-bordered">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">

                                        <h4 class="nk-block-title">Reset Password</h4>
                                        <div class="nk-block-des">
                                            <p>Enter your Email to reset your password.</p>
                                        </div>
                                    </div>
                                </div>

                                <form method="post" action="../scripts/password-resetscript.php">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Enter Your Email Address</label>
                                        </div>
                                        <input type="email" name="email" placeholder="username@email.com"
                                            class="form-control form-control-lg" required="">
                                    </div>
                                    <div class="form-group">

                                        <button class="btn btn-lg btn-primary btn-block" name="reset" type="submit">Reset
                                            Password</button>
                                        <a href='../login.php' class="btn btn-lg btn-primary btn-block">Go back to
                                            login</a>

                                    </div>


                                </form>
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
                            <a class="dropdown-toggle dropdown-indicator has-indicator nav-link" data-toggle="dropdown"
                                data-offset="0,10"><span>Translate</span></a>
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <ul class="language-list">
                                    <li>
                                        <div id="google_translate_element">
                                            <div class="skiptranslate goog-te-gadget" dir="ltr" s="">
                                                <div id=":0.targetLanguage" class="goog-te-gadget-simple"
                                                    style="white-space: nowrap;"></div>
                                            </div>
                                            <script type="text/javascript">
                                                function googleTranslateElementInit() {
                                                    new google.translate.TranslateElement({
                                                        pageLanguage: 'en',
                                                        layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false, includedLanguages: ''
                                                    }, 'google_translate_element');
                                                }
                                            </script>
                                            <script type="text/javascript"
                                                src="../translate_a/element.js?cb=googleTranslateElementInit"></script>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="nk-block-content text-center text-lg-left">
                        <p class="text-soft">&copy; All Rights Reserved Demo Bank.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- wrap @e -->

    <!-- content @e -->

    <!-- main @e -->

    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="../auth/assets/js/bundle.js?ver=2.0.0"></script>
    <script src="../auth/assets/js/scripts.js?ver=2.0.0"></script>
    <script src="../auth/include/js/login.js"></script>



</body>

</html>