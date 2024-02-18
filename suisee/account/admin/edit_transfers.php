<?php 
include 'header.php';
if(isset($_POST['tid'])){
    $tid = $_POST['tid'];
}elseif(isset($_GET['tid'])){
    $tid = $_GET['tid'];
}

$sql = "SELECT * FROM transactions WHERE transactionid='$tid' ORDER BY id DESC";
$result = mysqli_query($conn,$sql);
$result_check = mysqli_num_rows($result);

if($result_check > 0){
while($data = mysqli_fetch_assoc($result)){
$sender = $data['sendername'];
$senderemail = $data['senderemail'];
$senderacctnum = $data['senderacctnum'];
$acctnam = $data['bname'];
$bemail = $data['bemail'];
$rtn = $data['rtn'];
$acctnumb = $data['bnumber'];
$bnkname = $data['bbank'];
$descrip = $data['description'];
$amount = $data['amount'];
$tdate = $data['transact_date'];
$stat = $data['status'];
$transtype = $data['transact_type'];
$transactid = $data['transactionid'];
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
echo '<script>alert("Success! transfer updated successfully");</script>';
}
?>

        <main class="page-content">
            <div class="container">
            <div class="modal-account__pane-header col-12 " style="background-color:rgb(217, 0, 0); padding:10px;">
                    <h4 style="color: #ffffff; font-size:16px">Update Customer's Transfers:<span style="font-size:15px; font-weight:400; margin-left:25px"> </span></h4>
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
                            <form method="POST" action="../../scripts/adminupdatetrans.php">
                   
                                <div class="modal__body">
                                        <!-- <h6 class="ml-4">Transfer history associated with your account:</h6> -->
                                    <div class="modal-account__right tab-content">
                                        <div class="modal-account__pane tab-pane show active" id="accountDetails"> 
                                                       
                                        <div class="modal-account__pane-header pl-0 mb-4" >
                                                <span style="color: rgb(217, 0, 0); font-weight:600">Edit Transfers</span>
                                            </div>
                                            <div class="row row--md">
                                            <div class="col-12">
                                                <div class="row row--md">
                                                <input class="input" type="hidden" name="tid" value="<?= isset($tid) ? $tid : ""; ?>">
                                                <input class="input" type="hidden" name="bemail" value="<?= isset($bemail) ? $bemail : ""; ?>">
                                                <input class="input" type="hidden" name="senderacctnum" value="<?= isset($senderacctnum) ? $senderacctnum : ""; ?>">
                                                <div class="col-12 col-lg-4 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Sender (From):</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="sender" value="<?= isset($sender) ? $sender : ""; ?>" placeholder="Sender Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Sender Email:</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="senderemail" value="<?= isset($senderemail) ? $senderemail : ""; ?>" placeholder="Sender Email">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Beneficiary Name:</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="bname" value="<?= isset($acctnam) ? $acctnam : ""; ?>" placeholder="Beneficiary Name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Benficiary Account Number:</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="bnumber" value="<?= isset($acctnumb) ? $acctnumb : ""; ?>"  placeholder="" >
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row row--md">
                                                <div class="col-12 col-lg-4 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Beneficiary Bank:</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="bbank" value="<?= isset($bnkname) ? $bnkname : ""; ?>" placeholder="">
                                                        </div>
                                                    </div> 
                                                <div class="col-12 col-lg-4 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Router Number: *</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="rtn" value="<?= isset($rtn) ? $rtn: ""; ?>" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Amount: *</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="amount" value="<?= isset($amount) ? $amount : ""; ?>" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Description: *</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="descrip" value="<?= isset($descrip) ? $descrip : ""; ?>" placeholder="">
                                                        </div>
                                                    </div>
                                            <div class="col-12">
                                                <div class="row row--md">
                                            <div class="col-12 col-lg-6 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Status: *</label>
                                                        <div class="input-group input-group--append">
                                                            <select name="status" class="input js-input-select input--fluid" data-placeholder="Status">
                                                            <option value="<?= isset($stat) ? $stat : ""; ?>" selected="selected"><?= isset($stat) ? $stat : ""; ?>
                                                                </option>
                                                                <option value="Pending">Pending
                                                                </option>
                                                                <option value="Processing">Processing
                                                                </option>
                                                                <option value="Successful">Successful
                                                                </option>
                                                                <option value="Cancelled">Cancelled
                                                                </option>
                                                                <option value="Failed">Failed
                                                                </option>
                                                            </select><span class="input-group__arrow">
                                                            <svg class="icon-icon-keyboard-down">
                                                                <use xlink:href="#icon-keyboard-down"></use>
                                                            </svg></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-6 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Date: </label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="date" value="<?= isset($tdate) ? $tdate : ""; ?>" placeholder="">
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
    
                                        </div>
                                    <div class="">
                                            <a href="user_transfers.php" class="btn btn-primary mr-3"><span class="button__text">Cancel</span>
    </a>
                                            <button class="my-btn"  type="submit" name="updatetrans"><span class="button__text">Update Transfer</span>
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