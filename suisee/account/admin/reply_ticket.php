<?php
include 'header.php';
if(isset($_POST['tid'])){
    $tid = $_POST['tid'];
}elseif(isset($_GET['tid'])){
    $tid = $_GET['tid'];
}

$sql = "SELECT * FROM ticket WHERE ticketid='$tid'";
    $result = mysqli_query($conn,$sql);
    $result_check = mysqli_num_rows($result);
    if($result_check > 0){
    while($data = mysqli_fetch_assoc($result)){
    $ticketid  = $data['ticketid'];
    $acctname = $data['acctname'];
    $email = $data['email'];
    $uid = $data['uid'];
    $department = $data['department'];
    $subject = $data['subject'];
    $message = $data['message'];
    $stat = $data['status'];
    $rdate = $data['request_date']; 
}
}
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
echo '<script>alert("Success! Reply sent successful");</script>';
}
?>

<main class="page-content">
    <div class="container">
    <div class="modal-account__pane-header col-12 " style="background-color:rgb(217, 0, 0); padding:10px;">
            <h4 style="color: #ffffff; font-size:16px">Reply Customer's Ticket:<span style="font-size:15px; font-weight:400; margin-left:25px"> </span></h4>
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
                            <form method="POST" action="../../scripts/adminreplytic.php" >

                                <div class="modal__body">
                                        <!-- <h6 class="ml-4">Transfer history associated with your account:</h6> -->
                                    <div class="modal-account__right tab-content">
                                        <div class="modal-account__pane tab-pane show active" id="accountDetails"> 
                                                       
                                        <div class="modal-account__pane-header pl-0 mb-4" >
                                                <span style="color: rgb(217, 0, 0); font-weight:600">Customer Support</span>
                                            </div>
                               
                                            <div class="row row--md">
                                     
                                            <!-- <div class="row"> -->
                                    <div class="col-12 form-group form-group--lg">
                                    <input class="input" type="hidden" name="uid" value="<?= isset($uid) ? $uid : "" ?>">
                                    <input class="input" type="hidden" name="tid" value="<?= isset($tid) ? $tid : "" ?>">
                                        <div class="row row--sm align-items-center justify-content-between">
                                            <div class="col-auto form-group form-group--inline form-group--label">
                                                <label class="form-label">From</label>
                                            </div>
                                            <div class="col-auto form-group form-group--inline form-group--label">
                                                <label class="form-label text-light-dark-theme">Show CC & BCC</label>
                                                <label class="checkbox-toggle">
                                                    <input type="checkbox"><span class="checkbox-toggle__range"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="input-group input-group--append">
                                            <select class="input js-input-select input--fluid" value="<?= isset($department) ? $department : "" ?>" name="support" data-placeholder="Select Support Department" required>
                                                <option value="<?= isset($department) ? $department : "" ?>" selected="selected"><?= isset($department) ? $department : "" ?>
                                                </option>
                                                <option value="Customer Care">Customer Care
                                                </option>
                                                <option value="Account Office">Account Office
                                                </option>
                                                <option value="Service Department">Service Department
                                                </option> 
                                            </select><span class="input-group__arrow">
                                            <svg class="icon-icon-keyboard-down">
                                                <use xlink:href="#icon-keyboard-down"></use>
                                            </svg></span>
                                        </div>
                                    </div> 
                                    <div class="col-12 form-group form-group--lg">
                                        <label class="form-label form-label--sm">To</label>
                                        <div class="input-group">
                                            <input class="input" type="text" name="acctname" value="<?= isset($acctname) ? $acctname : "" ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-12 form-group form-group--lg">
                                        <label class="form-label form-label--sm">Subject</label>
                                        <div class="input-group">
                                            <input class="input" type="text" name="subject" value="<?= isset($subject) ? "Reply: ".$subject : "" ?>"  required>
                                        </div>
                                    </div>
                                    <div class="col-12 form-group form-group--lg">
                                        <label class="form-label form-label--sm">Message</label>
                                        <div class="input-group">
                                            <textarea class="input" style="height: 100px;" type="text" name="message" placeholder="Write a message" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                    <div class="modal-account__form-submit">
                                            <a href="tickets.php" class="btn btn-primary mr-3" type="reset"><span class="button__text">Cencel</span>
                                            </a>
                                            <button class="my-btn" type="submit" name="reply"><span class="button__text">Send</span>
                                            </button>
                                    </div>
                                    </form>
        
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