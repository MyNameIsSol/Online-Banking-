<?php
include 'header.php';
?>
        <style>
        @media screen and (max-width:768px) {
            .title-name {
                font-size: 18px;
                font-weight: 500;
            }
            .acctname{
                display: none;
            }
        }
        .ptext{
            font-size: 16px;
            font-weight: 500;
        }
        .tbcol td{
            background-color: #1B3F6B;
            color: gray;
            border-right: 1px solid #fff;
        }
        .tbcol th{
            background-color: #1B3F6B;
            color: gray;
            border-right: 1px solid #fff;
        }
    </style>

<?php
 $url="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if(strpos($url, 'error') == true){
    $error = $_GET['error'];
    echo '<script>alert("Error! "+"'.$error.'");</script>';
}
if(strpos($url, 'suc') == true){
echo '<script>alert("Success! Image uploaded successfully");</script>';
}

?>
        <main class="page-content">
            <div class="container">
            <div class="modal-account__pane-header col-12 " style="background-color:rgb(217, 0, 0); padding:10px;">
                    <h4 style="color: #ffffff; font-size:16px">Upload Customer's Profile Picture:<span style="font-size:15px; font-weight:400; margin-left:25px"> </span></h4>
                </div>
                <!-- <div class="toolbox mb-5">
            <div class="toolbox__row row gutter-bottom-xs">
                <div class="toolbox__left col-12 col-lg">
                    <div class="toolbox__left-row row row--xs gutter-bottom-xs">
                        <div class="form-group form-group--inline col-12 col-sm-auto col-lg-3 col-xl-3">
                            <div class="input-group input-group--white input-group--append">
                                <div class="col-12 " style="background-color: #fff; padding:15px; box-shadow:0 8px 16px rgba(169, 194, 209, 0.1); border-radius:4px;">
                                    <span style=" background-color:#09B66D ; color:#fff; font-size:14px; padding:5px; border-radius:4px;">Total Account</span>
                                    <label class="form-label ml-3"><?= isset($total_users) ? $total_users : "0" ?></label>
                                    <p style="margin-top: 20px; font-size:15px; color:gray; margin-bottom:0">As at <?= $date ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group form-group--inline col-12 col-sm-auto col-lg-3 col-xl-3">
                            <div class="input-group input-group--white input-group--append">
                                <div class="col-12 " style="background-color: #fff; padding:15px; box-shadow:0 8px 16px rgba(169, 194, 209, 0.1); border-radius:4px;">
                                    <span style=" background-color:#FF3D57 ; color:#fff; font-size:14px; padding:5px; border-radius:4px;">Tickets</span>
                                    <label class="form-label ml-3"><?= isset($total_tickets) ? $total_tickets : "0" ?></label>
                                    <p style="margin-top: 20px; font-size:15px; color:gray; margin-bottom:0">As at <?= $date ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group form-group--inline col-12 col-sm-auto col-lg-3 col-xl-3">
                            <div class="input-group input-group--white input-group--append">
                                <div class="col-12 " style="background-color: #fff; padding:15px; box-shadow:0 8px 16px rgba(169, 194, 209, 0.1); border-radius:4px;">
                                    <span style=" background-color:#FF8A48; color:#fff; font-size:14px; padding:5px; border-radius:4px;">Total Transfer</span>
                                    <label class="form-label ml-3"><?= isset($total_trans) ? $total_trans : "0" ?></label>
                                    <p style="margin-top: 20px; font-size:15px; color:gray; margin-bottom:0">As at <?= $date ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group form-group--inline col-12 col-sm-auto col-lg-3 col-xl-3">
                            <div class="input-group input-group--white input-group--append">
                                <div class="col-12 " style="background-color: #fff; padding:15px; box-shadow:0 8px 16px rgba(169, 194, 209, 0.1); border-radius:4px;">
                                    <span style=" background-color:#0081FF ; color:#fff; font-size:14px; padding:5px; border-radius:4px;">Deposit Request</span>
                                    <label class="form-label ml-3"><?= isset($total_deposit) ? $total_deposit : "0" ?></label>
                                    <p style="margin-top: 20px; font-size:15px; color:gray; margin-bottom:0">As at <?= $date ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
                <div class="row">
                    <div class="col-12 col-lg-12 col-xl-12">  
                        <div class=" modal-account"  >
                            <div class="modal__overlay" data-dismiss="modal"></div>
                            <!-- <div class="modal__wrap"> -->
                            <div class="modal__window">
                                <div class="modal__content">
                            <form method="POST" action="../../scripts/adminchangeimg.php" enctype="multipart/form-data">
                                <div class="modal__body">
                                        <!-- <h6 class="ml-4">Transfer history associated with your account:</h6> -->
                                    <div class="modal-account__right tab-content">
                                        <div class="modal-account__pane tab-pane show active" id="accountDetails"> 
                                                       
                                        <div class="modal-account__pane-header pl-0 mb-4" >
                                                <span style="color: rgb(217, 0, 0); font-weight:600">Set User Profile Picture</span>
                                            </div>
                                            <div class="row row--md">
                                            <div class="col-12 pl-0">
                                            <div class="col-12 col-lg-4 col-xl-4 form-group form-group--lg">
                                                <label class="form-label form-label--sm">Select Image</label>
                                                <!-- <div class="input-group "> -->
                                                   <div class="modal-account__upload profile-upload js-profile-upload">
                                    <input class="profile-upload__input" type="file" name="file_upload" required>
                                    <svg class="profile-upload__thumbnail" viewBox="0 0 252 272" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g filter="url(#filter0)">
                                            <path d="M55 199H197V221C197 221 153.752 224 126 224C98.248 224 55 221 55 221V199Z" fill="white" />
                                        </g>
                                        <g filter="url(#filter1)">
                                            <path d="M18.235 43.2287C19.2494 23.1848 35.1848 7.24941 55.2287 6.23501C76.8855 5.13899 104.551 4 126 4C147.449 4 175.114 5.13898 196.771 6.23501C216.815 7.24941 232.751 23.1848 233.765 43.2287C234.861 64.8855 236 92.5512 236 114C236 135.449 234.861 163.114 233.765 184.771C232.751 204.815 216.815 220.751 196.771 221.765C175.114 222.861 147.449 224 126 224C104.551 224 76.8855 222.861 55.2287 221.765C35.1848 220.751 19.2494 204.815 18.235 184.771C17.139 163.114 16 135.449 16 114C16 92.5512 17.139 64.8855 18.235 43.2287Z"
                                            fill="url(#pattern1)" />
                                        </g>
                                        <path class="profile-upload__overlay" opacity="0.6" d="M18.235 43.2287C19.2494 23.1848 35.1848 7.24941 55.2287 6.23501C76.8855 5.13899 104.551 4 126 4C147.449 4 175.114 5.13899 196.771 6.23501C216.815 7.24941 232.751 23.1848 233.765 43.2287C234.861 64.8855 236 92.5512 236 114C236 135.449 234.861 163.114 233.765 184.771C232.751 204.815 216.815 220.751 196.771 221.765C175.114 222.861 147.449 224 126 224C104.551 224 76.8855 222.861 55.2287 221.765C35.1848 220.751 19.2494 204.815 18.235 184.771C17.139 163.114 16 135.449 16 114C16 92.5512 17.139 64.8855 18.235 43.2287Z"
                                        fill="#44566C" />
                                        <defs>
                                            <filter id="filter0" x="23" y="183" width="206" height="89" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
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
                                            <filter id="filter1" x="0" y="0" width="252" height="252" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
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
                                            <pattern id="pattern1" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                <use xlink:href="#profileImageAddPlaceholder" transform="scale(0.00142857)" />
                                                <use xlink:href="#profileImageAdd" transform="scale(0.00142857)" />
                                            </pattern>
                                            <image id="profileImageAddPlaceholder" width="700" height="700" xlink:href='img/content/placeholder.svg' />
                                            <image id="profileImageAdd" class="profile-upload__image" width="700" height="700" xlink:href='#' />
                                        </defs>
                                    </svg>
                                    <div class="profile-upload__label">
                                        <svg class="icon-icon-camera" width="50px" height="50px">
                                            <use xlink:href="#icon-camera"></use>
                                        </svg>
                                        <p class="mb-0">Click & Drop
                                            <br>to change photo</p>
                                    </div>
                                </div>
                                                <!-- </div> -->
                                            </div>
                                            </div>

                                            <div class="col-12 pl-0">
                                            <div class="col-12 col-lg-6 col-xl-6 form-group form-group--lg">
                                                <label class="form-label form-label--sm">Select Account To Credit</label>
                                                <div class="input-group input-group--append">
                                                    <select name="uid" class="input js-input-select input--fluid" data-placeholder="" required>
                                                        <option value="Select An Account" selected="selected">Select An Account
                                                        </option>
                                                        <?php
                                                        $sql = "SELECT * FROM users ";
                                                        $result = mysqli_query($conn, $sql);
                                                        if (mysqli_num_rows($result) > 0) {
                                                            while ($data = mysqli_fetch_assoc($result)) {
                                                                $acctname = $data['acctname'];
                                                                $uid = $data['uid'];

                                                                echo '<option value="' . $uid . '">' . $acctname . '
                                                                </option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select><span class="input-group__arrow">
                                                        <svg class="icon-icon-keyboard-down">
                                                            <use xlink:href="#icon-keyboard-down"></use>
                                                        </svg></span>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    <div class="ml-1">
                                            
                                            <button class="button button--load" style="background-color: #09B66D; color:#fff" type="submit" name="updateimg"><span class="button__text">Upload Image </span>
                                            </button>
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