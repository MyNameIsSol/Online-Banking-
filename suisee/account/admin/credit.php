<?php
include 'header.php';
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

    .tbcol td {
        background-color: #1B3F6B;
        color: gray;
        border-right: 1px solid #fff;
    }

    .tbcol th {
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
echo '<script>alert("Success! Transaction successful");</script>';
}

?>

<main class="page-content">
    <div class="container">
        <div class="modal-account__pane-header col-12 col-lg-12 col-xl-12" style="background-color:rgb(217, 0, 0); padding:10px;">
            <h4 style="color: #ffffff; font-size:16px">Credit Customer's Account:<span style="font-size:15px; font-weight:400; margin-left:25px"> </span></h4>
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
            <div class="col-12 col-lg-8 col-xl-8">
                <div class=" modal-account">
                    <div class="modal__overlay" data-dismiss="modal"></div>
                    <!-- <div class="modal__wrap"> -->
                    <div class="modal__window">
                        <div class="modal__content">
                            <form method="POST" action="../../scripts/admincredituser.php">

                                <div class="modal__body">
                                    <!-- <h6 class="ml-4">Transfer history associated with your account:</h6> -->
                                    <div class="modal-account__right tab-content">
                                        <div class="modal-account__pane tab-pane show active" id="accountDetails">

                                            <div class="modal-account__pane-header pl-0 mb-4">
                                                <span style="color: rgb(217, 0, 0); font-weight:600">Credit Customer</span>
                                            </div>
                                            <div class="row row--md">
                                                <div class="col-12">
                                                    <div class="row row--md">
                                                        <div class="col-12 col-lg-6 col-xl-6 form-group form-group--lg">
                                                            <label class="form-label form-label--sm">Select Account To Credit</label>
                                                            <div class="input-group input-group--append">
                                                                <select name="uid" class="input js-input-select input--fluid" data-placeholder="" required>
                                                                    <!-- <option value="" selected="selected">Select An Account
                                                                    </option> -->
                                                                    <?php
                                                                    $sql = "SELECT * FROM users ";
                                                                    $result = mysqli_query($conn, $sql);
                                                                    if (mysqli_num_rows($result) > 0) {
                                                                        while ($data = mysqli_fetch_assoc($result)) {
                                                                            $acctname = $data['acctname'];
                                                                            $uid = $data['uid'];

                                                                            echo '<option value="' . $uid . '" selected="selected">' . $acctname . '
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
                                                        <div class="col-12 col-lg-6 form-group form-group--lg">
                                                            <label class="form-label form-label--sm">From:</label>
                                                            <div class="input-group">
                                                                <input class="input" type="text" name="sname" placeholder="Sender Name" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row row--md">
                                                    <div class="col-12 col-lg-6 form-group form-group--lg">
                                                            <label class="form-label form-label--sm">Sender Bank Name</label>
                                                            <div class="input-group">
                                                                <input class="input" type="text" name="bbank" placeholder="Eg Citi Bank">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-6 form-group form-group--lg">
                                                            <label class="form-label form-label--sm">Amount</label>
                                                            <div class="input-group">
                                                                <input class="input" type="text" name="amount" placeholder="Credit Amount" required>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row row--md">
                                                    <div class="col-12 col-lg-6 form-group form-group--lg">
                                                            <label class="form-label form-label--sm">Description</label>
                                                            <div class="input-group">
                                                                <input class="input" type="text" name="descrip" placeholder="Eg Flight Payment" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-6 form-group form-group--lg">
                                                            <label class="form-label form-label--sm">Date: (eg: 2022-10-02 00:16:19)</label>
                                                            <div class="input-group">
                                                                <input class="input" type="text" name="date" placeholder="Date">
                                                                <span style="color:#1A73E8; font-size:12px;">If empty, default date will be today's date</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-account__form-submit">
                                                <!-- <button style="background-color: #FF8A48; color: #ffffff;" class="button button--load mr-3" type="reset"><span class="button__text">Reset</span>
                                                </button> -->
                                                <button class="my-btn"  type="submit" name="credit"><span class="button__icon button__icon--left">
                                                        <!-- <svg class="icon-icon-refresh">
                                                <use xlink:href="#icon-refresh"></use>
                                                </svg> -->
                                                    </span><span class="button__text">Credit Account</span>
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