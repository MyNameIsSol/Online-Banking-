<?php
include 'userhead.php';
?>



<style>
    @media screen and (max-width:768px) {
        .title-name {
            font-size: 18px;
            font-weight: 500;
        }

        .balance {
            display: inline-block;
            margin-top: 10px;
        }
    }

    .ptext {
        font-size: 16px;
        font-weight: 500;
    }
</style>

<script>
        function validateForm() {
        var bname = document.forms["transfer"]["bname"].value;
        var bnacct = document.forms["transfer"]["bnacct"].value;
        var bemail = document.forms["transfer"]["bemail"].value;
        var amount = document.forms["transfer"]["amount"].value;
        var tlimit = document.forms["transfer"]["tlimit"].value;
        var pin = document.forms["transfer"]["pin"].value;
        var tpin = document.forms["transfer"]["tpin"].value;
        var accttype = document.forms["transfer"]["accttype"].value;
        var balance = document.forms["transfer"]["bal"].value;
        var amounti = parseInt(amount,10);
        var descrip = document.forms["transfer"]["descrip"].value;

        if(bname == "" || bnacct == "" ||bemail==""||amount==""||descrip==""){
            alert('Transfer Not Processed! All transfer details are expected to be filled');
            return false;
        }else if(amounti > balance){
            alert('Transfer Failed! insufficient funds...');
            return false;
        }else if(amounti > tlimit){
            alert('Transfer Failed! Limit exceeded...');
            return false;
        }else if(pin != tpin){
            alert('Transfer Not Processed! invalid transfer pin');
            return false;
        }else {
            return true;
        }
        }
        </script>

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

                            <?php
                                if($code == "ACTIVE"){
                                    echo '<form class="" name="transfer" method="POST" action="tac.php" onsubmit="return validateForm()">';
                                }elseif($code == "INACTIVE"){
                                    echo '<form class="" name="transfer" method="POST" action="otp.php" onsubmit="return validateForm()">';
                                }elseif($code == "TAX"){
                                    echo '<form class="" name="transfer" method="POST" action="tax.php" onsubmit="return validateForm()">';
                                }
                                ?>
                                    <div class="modal-account__pane-header" style="background-color:rgb(217, 0, 0); padding:10px;">
                                        <h4 style="color: #ffffff; font-size:18px;">Local Transfer -  <span class="balance" style="margin-left:20px">Balance: <?php if(isset($currency)){ echo $currency; }else{ echo "$";} echo number_format($acctbal) ?> </span></h4>
                                    </div>
                                    <h6 class="ml-4">Compulsory Transfer Form</h6>
                                    <div class="modal-account__right tab-content">

                                        <div class="modal-account__pane tab-pane show active" id="accountDetails">

                                            <div class="row row--md">
                                            <input type="hidden" name="bal" value='<?php echo $acctbal?>'>
                                                        <input type="hidden" name="pin" value='<?php echo $pin?>'>
                                                        <input type="hidden" name="tlimit" value='<?php echo $tlimit?>'>
                                                        <input type="hidden" name="tac" value='<?php echo $tac?>'>
                                                        <input type="hidden" name="tax" value='<?php echo $tax?>'>
                                                        <input type="hidden" name="maccttype" value='<?php echo $accttype?>'>
                                                <div class="col-12">
                                                    <div class="row row--md">
                                                        <div class="col-12 col-lg-6 form-group form-group--lg">
                                                            <label class="form-label form-label--sm text-danger">Amount(<?php if(isset($currency)){ echo $currency; }else{ echo "$";} ?>) </label>
                                                            <div class="input-group">
                                                            <input class="input" type="number" name="amount" placeholder="Eg 5000" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-6 form-group form-group--lg">
                                                            <label class="form-label form-label--sm">Beneficiary Account Name</label>
                                                            <div class="input-group">
                                                            <input class="input" type="text" name="bname" placeholder="Beneficiary Name" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row row--md">
                                                        <div class="col-12 col-lg-6 form-group form-group--lg">
                                                            <label class="form-label form-label--sm">Beneficiary Account Number</label>
                                                            <div class="input-group">
                                                            <input class="input" type="text" name="bnacct" placeholder="Beneficiary Account Number" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-6 form-group form-group--lg">
                                                            <label class="form-label form-label--sm">Receiving Bank Name</label>
                                                            <div class="input-group">
                                                            <input class="input" type="text" name="bbank" placeholder="Bank Name" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-12 form-group form-group--lg">
                                                            <label class="form-label form-label--sm">Beneficiary Email Address</label>
                                                            <div class="input-group">
                                                            <input class="input" type="email" name="bemail" placeholder="Enter Beneficiary Email" >
                                                            </div>
                                                        </div>
                                                <div class="col-12">
                                                    <div class="row row--md">
                                                        <div class="col-12 col-lg-6 form-group form-group--lg">
                                                            <label class="form-label form-label--sm">Narration/Purpose</label>
                                                            <div class="input-group">
                                                            <textarea class="input" style="height:50px" type="text" name="descrip" placeholder="Funds Description" required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-6 form-group form-group--lg mb-5">
                                                            <label class="form-label form-label--sm">Select Account Type</label>
                                                            <div class="input-group input-group--append">
                                                                <select class="input js-input-select input--fluid" name="accttype" data-placeholder="Select Account Type" required>
                                                                    <option value="" selected="selected">Select Account Type
                                                                    </option>
                                                                    <option value="savings">Savings Account
                                                                    </option>
                                                                    <option value="current">Current Account
                                                                    </option>
                                                                    <option value="checking">Checking Account
                                                                    </option>
                                                                    <option value="fixed deposit">Fixed Deposit
                                                                    </option>
                                                                    <option value="non resident">Non Resident Account
                                                                    </option>
                                                                    <option value="online banking">Online Banking
                                                                    </option>
                                                                    <option value="joint account">Joint Account
                                                                    </option>
                                                                    <option value="domiciliary account">Domiciliary Account
                                                                    </option>
                                                                </select><span class="input-group__arrow">
                                                                    <svg class="icon-icon-keyboard-down">
                                                                        <use xlink:href="#icon-keyboard-down"></use>
                                                                    </svg></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <h6 class="text-danger">Account Owner Authorization:</h6>
                                            <div class="card-order__footer-total pt-3">
                                                   
                                                        <div class="card__container p-0">
                                                            <div class="row gutter-bottom-sm justify-content-end">
                                                            <div class="col-12 col-lg-12 form-group form-group--lg mb-0">
                                                                    <label class="form-label form-label--sm">Transfer Pin</label>
                                                                    <div class="input-group">
                                                                        <input class="input" type="number" name="tpin" placeholder="Enter Your Pin" >
                                                                    </div>
                                                                </div>
                                                                <div class="card-order__footer-submit col-12 col-sm">

                                                                <script src="sweetalerts/promise-polyfill.js"></script>
                                                                <script src="sweetalerts/sweetalert2.min.js"></script>
                                                                <script src="sweetalerts/custom-sweetalert.js"></script>
                                                                 <?php
                                                                        if($status == "Dormant"){
                                                                            echo '<button class="btn btn-secondary" disabled name="transfer" type="submit"><span class="button__text">ACCOUNT DISABLED PLEASE CONTACT SUPPORT </span><span class="ml-1"></span>
                                                                            </button>';
                                                                        }else{
                                                                            echo '<button class="my-btn" name="transfer" type="submit"><span class="button__text">Transfer </span><span class="ml-1"></span>
                                                                            </button>';
                                                                        }
                                                                    ?>
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