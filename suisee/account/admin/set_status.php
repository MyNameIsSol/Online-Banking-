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
if(strpos($url, 'updated') == true){
echo '<script>alert("Success! status updated successfully");</script>';
}
?>


        <main class="page-content">
            <div class="container">
            <div class="modal-account__pane-header col-12 " style="background-color:rgb(217, 0, 0); padding:10px;">
                    <h4 style="color: #ffffff; font-size:16px">Change User Account Status:<span style="font-size:15px; font-weight:400; margin-left:25px"> </span></h4>
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
                            <form method="POST" action="../../scripts/adminchangestat.php">

                                <div class="modal__body">
                                        <!-- <h6 class="ml-4">Transfer history associated with your account:</h6> -->
                                    <div class="modal-account__right tab-content">
                                        <div class="modal-account__pane tab-pane show active" id="accountDetails"> 
                                                       
                                        <div class="modal-account__pane-header pl-0 mb-4" >
                                                <span style="color: rgb(217, 0, 0); font-weight:600">Set Status</span>
                                            </div>
                                            <div class="row row--md">
                                            <div class="col-12 pl-0">
                                            <div class="col-12 col-lg-4 col-xl-4 form-group form-group--lg">
                                                <label class="form-label form-label--sm">Select Account</label>
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

                                            <div class="col-12 pl-0">
                                            <div class="col-12 col-lg-4 form-group form-group--lg">
                                                <label class="form-label form-label--sm">Change Status: *</label>
                                                <div class="input-group input-group--append">
                                                    <select name="status" class="input js-input-select input--fluid" data-placeholder="Select Status">
                                                    <option value="<?= isset($stat) ? $stat : ""; ?>" selected="selected"><?= isset($stat) ? $stat : ""; ?>
                                                        </option>
                                                        <option value="Active">Active
                                                        </option>
                                                        <option value="Dormant">Dormant
                                                        </option>
                                                        <option value="Inactive">Inactive
                                                        </option>
                                                        <option value="Disabled">Disabled
                                                        </option>
                                                        <option value="Suspended">Suspended
                                                        </option>
                                                    </select><span class="input-group__arrow">
                                                    <svg class="icon-icon-keyboard-down">
                                                        <use xlink:href="#icon-keyboard-down"></use>
                                                    </svg></span>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    <div class="">
                                            
                                            <button class="my-btn"  type="submit" name="changestat"><span class="button__text">Set</span>
                                            </button>
                                    </div>

            <div class="divider mt-4" style="border-top:1px solid #F1EDEB"></div>
            <div class="statustip1 mt-4">
                <h6 style="display: flex;align-items:center; margin-bottom:0;"><span class="chart-tooltip-custom__marker">
                    <span style="display:inline-block;margin-right:4px;border-radius:10px;width:10px;height:10px;background-color:#09B66D;"></span>
                </span>
                    <span class="chart-tooltip-custom__value">Active</span></h6>
                    <p style="margin-left:17px; margin-bottom:5px;">This means that the client can access all functions within his or her account</p>
            </div>

            <div class="statustip1 mt-2">
                <h6 style="display: flex;align-items:center; margin-bottom:0;"><span class="chart-tooltip-custom__marker">
                    <span style="display:inline-block;margin-right:4px;border-radius:10px;width:10px;height:10px;background-color:#F7C427;"></span>
                </span>
                    <span class="chart-tooltip-custom__value">Dormant/Inactive</span></h6>
                    <p style="margin-left:17px; margin-bottom:5px;">A notice that the account is Dormant/Inactive will be shown on the client's dashboard. Also, he/she will not be able to make any transfers.</p>
            </div>

            <div class="statustip1 mt-2">
                <h6 style="display: flex;align-items:center; margin-bottom:0;"><span class="chart-tooltip-custom__marker">
                    <span style="display:inline-block;margin-right:4px;border-radius:10px;width:10px;height:10px;background-color:#FF8A48;"></span>
                </span>
                    <span class="chart-tooltip-custom__value">Inactive</span></h6>
                    <p style="margin-left:17px; margin-bottom:5px;">When the account is set to INACTIVE, it brings up a message when the client tries to login, saying that this Account is inactive. Kindly contact customer care.</p>
            </div>

            <div class="statustip1 mt-2">
                <h6 style="display: flex;align-items:center; margin-bottom:0;"><span class="chart-tooltip-custom__marker">
                    <span style="display:inline-block;margin-right:4px;border-radius:10px;width:10px;height:10px;background-color:#FF3D57"></span>
                </span>
                    <span class="chart-tooltip-custom__value">Disabled</span></h6>
                    <p style="margin-left:17px; margin-bottom:5px;">A client will be notified when they try loggin in that their account has been disabled due to violation in terms. He will be asked to contact the customer care to rectify the issue. </p>
            </div>

            <div class="statustip1 mt-2">
                <h6 style="display: flex;align-items:center; margin-bottom:0;"><span class="chart-tooltip-custom__marker">
                    <span style="display:inline-block;margin-right:4px;border-radius:10px;width:10px;height:10px;background-color:#BA2931"></span>
                </span>
                    <span class="chart-tooltip-custom__value">Suspended</span></h6>
                    <p style="margin-left:17px; margin-bottom:5px;">A client will be notified when they try loggin in that their account has been disabled due to violation in terms. He will be asked to contact the customer care to rectify the issue. </p>
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