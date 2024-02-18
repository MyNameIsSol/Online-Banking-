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

<?php
 $url="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if(strpos($url, 'error') == true){
    $error = $_GET['error'];
    echo '<script>alert("Error! "+"'.$error.'");</script>';
}
if(strpos($url, 'updated') == true){
echo '<script>alert("Success! You have successfully updated your profile");</script>';
}
?>
<main class="page-content" style="margin-top:-20px">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-8">
                <div class=" modal-account">
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

                                <form method="POST" action="../../scripts/editprofilescript.php" enctype="multipart/form-data">
                                    <div class="modal-account__pane-header" style="background-color:rgb(217, 0, 0); padding:10px;">
                                        <h4 style="color: #ffffff; font-size:18px">User Profile</h4>
                                    </div>

                                    <h6 class="ml-4 ">User information</h6>


                                    <div class="modal-account__right tab-content">

                                        <div class="modal-account__pane tab-pane show active" id="accountDetails">
                                            <div class="row row--md">
                                                <div class="col-12">

                                                    <div class="profimg col-6" id="profimg" style="margin:0 auto;">
                                                        <div class="customer-profile__avatar mb-5">
                                                            <svg viewBox="0 0 252 272" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                                <g filter="url(#filter0_dd)">
                                                                    <path d="M55 199H197V221C197 221 153.752 224 126 224C98.248 224 55 221 55 221V199Z" fill="white" />
                                                                </g>
                                                                <g filter="url(#filter1_dd)">
                                                                    <path d="M18.235 43.2287C19.2494 23.1848 35.1848 7.24941 55.2287 6.23501C76.8855 5.13899 104.551 4 126 4C147.449 4 175.114 5.13898 196.771 6.23501C216.815 7.24941 232.751 23.1848 233.765 43.2287C234.861 64.8855 236 92.5512 236 114C236 135.449 234.861 163.114 233.765 184.771C232.751 204.815 216.815 220.751 196.771 221.765C175.114 222.861 147.449 224 126 224C104.551 224 76.8855 222.861 55.2287 221.765C35.1848 220.751 19.2494 204.815 18.235 184.771C17.139 163.114 16 135.449 16 114C16 92.5512 17.139 64.8855 18.235 43.2287Z" fill="url(#pattern0)" />
                                                                </g>
                                                                <defs>
                                                                    <filter id="filter0_dd" x="23" y="183" width="206" height="89" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" />
                                                                        <feOffset dy="8" />
                                                                        <feGaussianBlur stdDeviation="8" />
                                                                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                                                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow" />
                                                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" />
                                                                        <feOffset dy="16" />
                                                                        <feGaussianBlur stdDeviation="16" />
                                                                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                                                                        <feBlend mode="normal" in2="effect1_dropShadow" result="effect2_dropShadow" />
                                                                        <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow" result="shape" />
                                                                    </filter>
                                                                    <filter id="filter1_dd" x="0" y="0" width="252" height="252" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" />
                                                                        <feOffset dy="12" />
                                                                        <feGaussianBlur stdDeviation="8" />
                                                                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.2 0" />
                                                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow" />
                                                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" />
                                                                        <feOffset dy="2" />
                                                                        <feGaussianBlur stdDeviation="2" />
                                                                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.05 0" />
                                                                        <feBlend mode="normal" in2="effect1_dropShadow" result="effect2_dropShadow" />
                                                                        <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow" result="shape" />
                                                                    </filter>
                                                                    <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                                        <use xlink:href="#profileImage" transform="scale(0.00142857)" />
                                                                    </pattern>
                                                                    <image id="profileImage" alt="Profile Picture" width="700" height="700" xlink:href='../images/<?= isset($uimage) ? $uimage : "" ?>' />
                                                                </defs>
                                                            </svg>
                                                        </div>
                                                        <h4 class="customer-profile__title text-center" style="font-size:18px"><?= isset($acctname) ? $acctname : '' ?></h4>
                                    <div class="customer-profile__balance text-center mb-4">
                                        <div class="label label--primary label--lg my-btn1"><span class="label__icon">
                          <svg class="icon-icon-wallet">
                            <use xlink:href="#icon-wallet"></use>
                          </svg></span> Balance: <?php if(!empty($currency)){ echo $currency; }else{ echo '$'; }?><?= !empty($acctbal) ? number_format($acctbal) : '0' ;?></div>
                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row row--md">
                                                <input type="hidden" name="uid" value='<?php echo $uid?>'>
                                                    <div class="col-12 col-lg-6 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Profile Photo </label>
                                                        <div class="input-group">
                                                            <input class="input" value="<?= isset($uimage) ? $uimage : "" ?>" type="file" name="file_upload" placeholder="Select Photo">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-6 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Account Name: (Default)</label>
                                                        <div class="input-group">
                                                            <input class="input" value="<?= isset($acctname) ? $acctname : "" ?>" type="text" name="fname" placeholder="example" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-6 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Mid Name</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" value="<?= isset($midname) ? $midname : "" ?>" name="mname" placeholder="Edit Middle Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-6 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Account Type: (Default)</label>
                                                        <div class="input-group">
                                                            <input class="input" value="<?= isset($accttype) ? $accttype : ""; ?>" type="text" name="accttype" disabled>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row row--md">
                                                <div class="col-12 col-lg-6 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Username</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" value="<?= isset($username) ? $username : "" ?>" name="uname" placeholder="Edit Username">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-6 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Tel</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="phone" value="<?= isset($phone) ? $phone : "" ?>" placeholder="Edit Phone No">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row row--md">
                                                <div class="col-12 col-lg-6 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Email Address: (Default)</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" value="<?= isset($email) ? $email : "" ?>" name="email" placeholder="Email" disabled>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-12 col-lg-6 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Marital Status</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="marital" value="<?= isset($marital) ? $marital : "" ?>" placeholder="Edit Marital Status">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12  form-group form-group--lg">
                                                <label class="form-label form-label--sm">Date Of Birth</label>
                                                <div class="input-group">
                                                    <input class="input" type="text" name="dob" value="<?= isset($birth) ? $birth : "" ?>" placeholder="YYYY-MM-DD">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="row row--md">
                                                <div class="col-12 col-lg-6 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Work / Employment</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" value="<?= isset($occupation) ? $occupation : "" ?>" name="occupation" placeholder="Edit Occupation">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-6 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Country: (Default)</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="country" value="<?= isset($country) ? $country : "" ?>" placeholder="country" disabled>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                        </div>
                                        <h6 class="ml-3">Contact Information</h6>
                                        <div class="card-order__footer-total pt-3">

                                            <div class="card__container pl-0">
                                                <div class="row gutter-bottom-sm justify-content-end">
                                                    <div class="card-order__footer-submit col-12 ">
                                                        <div class="col-12">
                                                            <div class="row row--md">
                                                                <div class="col-12 col-lg-12 form-group form-group--lg">
                                                                    <label class="form-label form-label--sm">Contact Address</label>
                                                                    <div class="input-group">
                                                                        <input class="input" type="text" name="addr" value="<?= isset($addr) ? $addr : ""; ?>" placeholder="Edit Address">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card-order__footer-submit  col-12 col-sm">
                                                                    <button class="my-btn" name="details" type="submit"><span class="button__text">UPDATE PROFILE </span>
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
        // $(window).on('load', function() {
        if ($(window).width() <= 768) {
            // $("#home-mob").removeClass("card__tools-more");
            // $("#home-mob").addClass("card__tools");
            $("#profimg").removeClass("col-6");
            $("#profimg").addClass("col-12");
        }
        // });
    });
</script>
</body>

</html>