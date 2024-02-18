<?php 
include 'userhead.php';

if(!isset($_POST['transfer'])){
    header("Location: index.php");
    exit();
}else{
    $bname = mysqli_real_escape_string($conn,$_POST['bname']);
    $bnacct = mysqli_real_escape_string($conn,$_POST['bnacct']);
    isset($_POST['bbank']) ? $bbank = mysqli_real_escape_string($conn,$_POST['bbank']) : $bbank = "Clickstate Bank";
    $bemail = mysqli_real_escape_string($conn,$_POST['bemail']);
    isset($_POST['bcountry']) ? $bcountry = mysqli_real_escape_string($conn,$_POST['bcountry']) : $bcountry ="";
    isset($_POST['swift']) ? $swift = mysqli_real_escape_string($conn,$_POST['swift']) : $swift ="";
    isset($_POST['brtn']) ? $brtn = mysqli_real_escape_string($conn,$_POST['brtn']) : $brtn ="";
    $amount = mysqli_real_escape_string($conn,$_POST['amount']);
    $descrip = mysqli_real_escape_string($conn,$_POST['descrip']);
    $bal = mysqli_real_escape_string($conn,$_POST['bal']);
    $tac = mysqli_real_escape_string($conn,$_POST['tac']);
    $tax = mysqli_real_escape_string($conn,$_POST['tax']);
}

$sql = "DELETE FROM otp_token WHERE email='$email'";
mysqli_query($conn,$sql);
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
    </style>

        <main class="page-content" style="margin-top:-30px">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-8 col-lg-8 col-xl-8 ">  
                        <div class=" modal-account"  >
                            <div class="modal__overlay" data-dismiss="modal"></div>
                            <!-- <div class="modal__wrap"> -->
                            <div class="modal__window">
                                <div class="modal__content">
                              
                                <div class="modal__body">
                                                <div class="modal-account__pane-header " style="background-color:rgb(217, 0, 0); padding:10px; margin:20px 20px 20px">
                                                            <h4 style="color: #ffffff; font-size:16px;">Confirm Transactions</h4>
                                                        </div>
                                               
                                                    <h6 class="ml-4 text-danger"> Please confirm your transaction and click on transfer <br>
                                        to complete your transfer.</h6>
                                                <div class="modal-account__right tab-content">
                                                    <div class="modal-account__pane tab-pane show active" id="accountDetails"> 
                                                       
                <div class="card-order__product scrollbar-thin scrollbar-visible" data-simplebar>
                            <table class="table table--lines table--groups ">
                                <colgroup>
                                    <col class="colgroup-1">
                                        <col class="colgroup-2">
                                            <col>
                                                <col>
                                                    <col>
                                </colgroup>
                                <thead class="table__header">
                                    <!-- <tr class="table__header-row">
                                        <th class="text-center"><span></span>
                                        </th>
                                        <th class="text-center"><span></span>
                                        </th>
                                    </tr> -->
                                </thead>
                                <tbody>
                                    <tr class="table__row">
                                        <td class="table__td">
                                            <div class="mw-200"><span class="text-dark-theme">Beneficiary Name:</span>
                                            </div>
                                        </td>
                                        <td class="table__td text-nowrap text-dark-theme"><?= !empty($bname) ? $bname : ''; ?></td>  
                                    </tr>  
                                    <tr class="table__row">
                                        <td class="table__td">
                                            <div class="mw-200"><span class="text-dark-theme">Beneficiary Account Number:</span>
                                            </div>
                                        </td>
                                        <td class="table__td text-nowrap text-dark-theme"><?= !empty($bnacct) ? $bnacct : ''; ?></td>  
                                    </tr>
                                    <tr class="table__row">
                                        <td class="table__td">
                                            <div class="mw-200"><span class="text-dark-theme">Beneficiary Bank:</span>
                                            </div>
                                        </td>
                                        <td class="table__td text-nowrap text-dark-theme"><?= !empty($bbank) ? $bbank : ''; ?></td>  
                                    </tr>
                                    <?php
                                    if($brtn != "" && $brtn != "-"){
                                        echo '<tr class="table__row">
                                        <td class="table__td">
                                            <div class="mw-200"><span class="text-dark-theme">Beneficiary Bank Routing Transit Number (RTN):</span>
                                            </div>
                                        </td>';
                                        echo '<td class="table__td text-nowrap text-dark-theme">'.$brtn.'</td>  
                                        </tr>';
                                    }
                                    ?>
                                    <tr class="table__row">
                                        <td class="table__td">
                                            <div class="mw-200"><span class="text-dark-theme">Amount:</span>
                                            </div>
                                        </td>
                                        <td class="table__td text-nowrap text-dark-theme"><?php if(!empty($currency)){ echo $currency; }else{ echo '$'; }?><?= !empty($amount) ? $amount : ''; ?></td>  
                                    </tr>
                                    <tr class="table__row">
                                        <td class="table__td">
                                            <div class="mw-200"><span class="text-dark-theme">Purpose of Transfer:</span>
                                            </div>
                                        </td>
                                        <td class="table__td text-nowrap text-dark-theme"><?= !empty($descrip) ? $descrip : ''; ?></td>  
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                        <form method=post action="../../scripts/confirmtranx.php" >
                                <input type="hidden" name="bname" value='<?php echo $bname?>'>
                                <input type="hidden" name="bnacct" value='<?php echo $bnacct?>'>
                                <input type="hidden" name="bbank" value='<?php echo $bbank?>'>
                                <input type="hidden" name="bemail" value='<?php echo $bemail?>'>
                                <input type="hidden" name="amount" value='<?php echo $amount?>'>
                                <input type="hidden" name="currency" value='<?php echo $currency?>'>
                                <input type="hidden" name="bcountry" value='<?php echo $bcountry?>'>
                                <input type="hidden" name="brtn" value='<?php echo $brtn?>'>
                                <input type="hidden" name="descrip" value='<?php echo $descrip?>'>
                                <input type="hidden" name="swift" value='<?php echo $swift?>'>
                                <input type="hidden" name="bal" value='<?php echo $acctbal?>'>
                                <input type="hidden" name="tac" value='<?php echo $tac?>'>
                                <input type="hidden" name="tax" value='<?php echo $tax?>'>
                                <input type="hidden" name="otp" value='<?php echo $otp?>'>
                                <input type="hidden" name="uid" value='<?php echo $uid?>'>

                        <div class="card-order__footer-total">
                            <div class="card__container">
                                <div class="row gutter-bottom-sm justify-content-end">
                                    <div class="card-order__footer-submit col-12 col-sm">
                                        <button class="btn btn-primary" type="submit" name="transfer"><span class="button__text">Transfer</span>
                                        </button>

                                        <a href="index.php" class="my-btn ml-3" type="reset"><span class="button__text">Cancel</span>
                                            </a>
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