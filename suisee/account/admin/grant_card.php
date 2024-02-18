<?php 
include 'header.php';
if(isset($_POST['tid'])){
    $tid = $_POST['tid'];
}elseif(isset($_GET['tid'])){
    $tid = $_GET['tid'];
}
$sql = "SELECT * FROM cardrequests WHERE requestid='$tid'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
    while($data = mysqli_fetch_assoc($result)){
        $acctname = $data['acctname'];
        $acctnumber = $data['acctnumber'];
        $email = $data['email'];
        $status = $data['status'];
        $cardtype = $data['cardtype'];
        $cardoption = $data['cardoption'];
        $uid = $data['uid'];
    }
    $sql = "SELECT * FROM cards WHERE uid='$uid'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
    while($data = mysqli_fetch_assoc($result)){
        $firstno = $data['firstno'];
        $secondno = $data['secondno'];
        $thirdno = $data['thirdno'];
        $forthno = $data['forthno'];
        $expire = $data['expire'];
        $cardcvv = $data['cardcvv'];
        $cardpin = $data['cardpin'];
        $cardtype = $data['cardtype'];
        $cardoption = $data['cardoption'];
    }
}
}
?>


        <style>
        @media screen and (max-width:768px) {
            .title-name {
                font-size: 18px;
                font-weight: 500;
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
echo '<script>alert("Success! Card updated successfully");</script>';
}
?>

        <main class="page-content">
            <div class="container">
            <div class="modal-account__pane-header col-12 " style="background-color:rgb(217, 0, 0); padding:10px;">
                    <h4 style="color: #ffffff;font-size:16px">Process Customer's Card:<span style="font-size:15px; font-weight:400; margin-left:25px"> </span></h4>
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
                                        <span style=" background-color:#FF3D57 ; color:#fff; font-size:14px; padding:5px; border-radius:4px;">Total Account</span>
                                    <label class="form-label ml-3"><?= isset($total_tickets) ? $total_tickets : "0" ?></label>
                                    <p style="margin-top: 20px; font-size:15px; color:gray; margin-bottom:0">As at <?= $date ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group form-group--inline col-12 col-sm-auto col-lg-3 col-xl-3">
                                <div class="input-group input-group--white input-group--append">
                                    <div class="col-12 " style="background-color: #fff; padding:15px; box-shadow:0 8px 16px rgba(169, 194, 209, 0.1); border-radius:4px;">
                                        <span style=" background-color:#FF8A48; color:#fff; font-size:14px; padding:5px; border-radius:4px;">Total Account</span>
                                    <label class="form-label ml-3"><?= isset($total_trans) ? $total_trans : "0" ?></label>
                                    <p style="margin-top: 20px; font-size:15px; color:gray; margin-bottom:0">As at <?= $date ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group form-group--inline col-12 col-sm-auto col-lg-3 col-xl-3">
                                <div class="input-group input-group--white input-group--append">
                                    <div class="col-12 " style="background-color: #fff; padding:15px; box-shadow:0 8px 16px rgba(169, 194, 209, 0.1); border-radius:4px;">
                                        <span style=" background-color:#0081FF ; color:#fff; font-size:14px; padding:5px; border-radius:4px;">Total Account</span>
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
                            <form method="POST" action="../../scripts/grantcardscript.php" enctype="multipart/form-data">
                                <div class="modal__body">
                                        <!-- <h6 class="ml-4">Transfer history associated with your account:</h6> -->
                                    <div class="modal-account__right tab-content">
                                        <div class="modal-account__pane tab-pane show active" id="accountDetails"> 
                                        <div class="modal-account__pane-header pl-0 mb-4" >
                                                <span style="color: rgb(217, 0, 0); font-weight:600">Edit Card Details</span>
                                            </div>
                                            <div class="row row--md">
                                            <input type="hidden" name="uid" value="<?= isset($uid) ? $uid : ""; ?>">
                                            <input type="hidden" name="requestid" value="<?= isset($tid) ? $tid : ""; ?>">
                                            <div class="col-12">
                                                <div class="row row--md">
                                                    <div class="col-12 col-lg-4 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Account Name: *</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="cardname" value="<?= isset($acctname) ? $acctname : ""; ?>" placeholder="Card Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Account Number: (Optional)</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="acctnumber" value="<?= isset($acctnumber) ? $acctnumber : ""; ?>" placeholder="Acct Number" >
                                                        </div>
                                                    </div> 
                                                    <div class="col-12 col-lg-4 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Email: *</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="email" value="<?= isset($email) ? $email : ""; ?>" placeholder="Email" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row row--md">
                                                    <div class="col-12 col-lg-3 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">FirstNo: *</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="firstno" value="<?= isset($firstno) ? $firstno : ""; ?>" placeholder="First No" >
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-3 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">SecondNo: *</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="secondno" value="<?= isset($secondno) ? $secondno : ""; ?>" placeholder="Second No" >
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-3 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">ThirdNo: *</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="thirdno" value="<?= isset($thirdno) ? $thirdno : ""; ?>" placeholder="Third No">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-3 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">ForthNo: *</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="forthno" value="<?= isset($forthno) ? $forthno : ""; ?>" placeholder="Forth Number" >
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="col-12 form-group form-group--lg">
                                                <label class="form-label form-label--sm">E-Mail: *</label>
                                                <div class="input-group">
                                                    <input class="input" name="email" type="email" placeholder="Email" value="<?= isset($email) ? $email : ""; ?>" value="example@mail.com" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row row--md">
                                                <div class="col-12 col-lg-4 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Card Type: *</label>
                                                        <div class="input-group input-group--append">
                                                            <select name="cardtype" class="input js-input-select input--fluid"  data-placeholder="Card Type" required>
                                                            <option value="" selected="selected">Select Card Type
                                                                </option>
                                                                <option value="Visa">Visa
                                                                </option>
                                                                <option value="Master">Master
                                                                </option>
                                                            </select><span class="input-group__arrow">
                                                            <svg class="icon-icon-keyboard-down">
                                                                <use xlink:href="#icon-keyboard-down"></use>
                                                            </svg></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Card Options: *</label>
                                                        <div class="input-group input-group--append">
                                                            <select name="cardoption" class="input js-input-select input--fluid"  data-placeholder="Card Options" required>
                                                            <option value="" selected="selected">Select Card Options
                                                                </option>
                                                                <option value="Credit">Credit
                                                                </option>
                                                                <option value="Debit">Debit
                                                                </option>
                                                            </select><span class="input-group__arrow">
                                                            <svg class="icon-icon-keyboard-down">
                                                                <use xlink:href="#icon-keyboard-down"></use>
                                                            </svg></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Request Status: *</label>
                                                        <div class="input-group input-group--append">
                                                            <select name="cardstatus" class="input js-input-select input--fluid"  data-placeholder="Change Status" required>
                                                            <option value="" selected="selected">Change Status
                                                                </option>
                                                                <option value="Pending">Pending
                                                                </option>
                                                                <option value="Processing">Processing
                                                                </option>
                                                                <option value="Successful">Successful
                                                                </option>
                                                                <option value="Cancelled">Cancelled
                                                                </option>
                                                            </select><span class="input-group__arrow">
                                                            <svg class="icon-icon-keyboard-down">
                                                                <use xlink:href="#icon-keyboard-down"></use>
                                                            </svg></span>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row row--md">
                                                    <div class="col-12 col-lg-4 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Card Cvv: (i.e 000) *</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="cardcvv" value="<?= isset($cardcvv) ? $cardcvv : ""; ?>" placeholder="Card Cvv" required></input>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Card Pin: </label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="cardpin" value="<?= isset($cardpin) ? $cardpin : ""; ?>"  placeholder="Card Pin" required></input>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Card Exp: (i.e MM/YY) </label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="cardexp" value="<?= isset($expire) ? $expire : ""; ?>"  placeholder="Card Expiry" required></input>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="">
                                            <a href="user_account.php"  class="btn btn-primary mr-3" ><span class="button__text">Cancel</span>
    </a>
                                            <button class="my-btn"  type="submit" name="updatecard"><span class="button__text">Update Card</span>
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