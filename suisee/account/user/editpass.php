<?php
include 'userhead.php';
?>

<style>
    @media screen and (max-width:768px) {
        .title-name {
            font-size: 18px;
            font-weight: 500;
        }
    }

    .ptext {
        font-size: 16px;
        font-weight: 500;
    }
</style>

<script>
    function passwddetails(){
        var oldpass = document.forms["changepass"]["oldpass"].value;
        var password = document.forms["changepass"]["password"].value;
        var cpassword = document.forms["changepass"]["cpassword"].value;

        if(oldpass == "" || password == "" || cpassword == ""){
            alert('Error! Please fill in all form.');
            return false;
        }else if(password != cpassword){
                alert('Error! Password does not match');
                return false;
            }else{
                return true;
            }
        }
    
</script>

<?php
    $url="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strpos($url, 'psuc') == true){ 
      echo '<script>alert("Success! You have successfully changed your password");</script>';
    }elseif(strpos($url, 'perror') == true){ 
        echo '<script>alert("Sorry! the old password you entered is wrong...");</script>';
    }elseif(strpos($url, 'error') == true){ 
    echo '<script>alert("Sorry! we could not update your password. Try later...");</script>';
    }
?>

<main class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-8">
                <div class=" modal-account">
                    <div class="modal__overlay" data-dismiss="modal"></div>
                    <!-- <div class="modal__wrap"> -->
                    <div class="modal__window">
                        <div class="modal__content">
                            <!-- <button class="modal__close" data-dismiss="modal">
                        <svg class="icon-icon-cross">
                            <use xlink:href="#icon-cross"></use>
                        </svg>
                    </button> -->

                            <!-- <a class="modal__close text-danger">
                                <svg class="icon-icon-help">
                                    <use xlink:href="#icon-help"></use>
                                </svg>
                            </a> -->
                            <div class="modal__body">

                                <form name="changepass" method="POST" action="../../scripts/changepass.php" onsubmit="return passwddetails()">
                                    <div class="modal-account__pane-header" style="background-color:rgb(217, 0, 0); padding:10px;">
                                        <h4 style="color: #ffffff; font-size:18px;">Change Account Password</h4>
                                    </div>

                                    <!-- <h6 class="ml-4">Compulsary Transfer Form</h6> -->


                                    <div class="modal-account__right tab-content">

                                        <div class="modal-account__pane tab-pane show active" id="accountDetails">

                                            <div class="row row--md">
                                            <input  type="hidden" name="uid" value="<?= !empty($uid) ? $uid : '';?>"  class="form-control">
                                                <div class="col-12">
                                                    <div class="row row--md">
                                                        <div class="col-12 form-group form-group--lg">
                                                            <label class="form-label form-label--sm">New Password</label>
                                                            <div class="input-group">
                                                                <input class="input" type="password" name="password" placeholder="*******" required>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="row row--md">
                                                        <div class="col-12form-group form-group--lg mb-5">
                                                            <label class="form-label form-label--sm">Retype New Password</label>
                                                            <div class="input-group">
                                                                <input class="input" type="password" name="cpassword" placeholder="********" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h6 class="text-danger">Account Owner Authorization:</h6>
                                            <div class="card-order__footer-total pt-3">

                                                <div class="card__container pl-0">
                                                    <div class="row gutter-bottom-sm justify-content-end">
                                                        <div class="col-12 col-lg-12 form-group form-group--lg mb-0">
                                                            <label class="form-label form-label--sm">Old Password</label>
                                                            <div class="input-group">
                                                                <input class="input" type="text" name="oldpass" placeholder="Enter old password">
                                                            </div>
                                                        </div>
                                                        <div class="card-order__footer-submit col-12 col-sm">
                                                            <button class="my-btn" name="changepass" type="submit"><span class="button__text">Update Password </span>
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
<div class="text-center" style="margin-top:; margin-bottom:10px">
    <span class="text-center">© All Rights Reserved Clickstate Bank.</span>
</div>
<script src="js/photoswipe/photoswipe-lightbox.esm.min.js" type="module"></script>
<script src="js/photoswipe/photoswipe.esm.min.js" type="module"></script>
<script src="js/gsap/gsap.min.js"></script>
<script src="js/gsap/ScrollToPlugin.min.js"></script>
<script src="js/gsap/ScrollTrigger.min.js"></script>
<script src="js/vendor.min.js"></script>
<script src="js/common.js"></script>
<script>
    $(document).ready(function() {
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