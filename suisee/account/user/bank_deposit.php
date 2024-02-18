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
        .ptext{
            font-size: 16px;
            font-weight: 500;
        }
        .depo{
            margin-left: 10px;
            margin-bottom: 20px;

        }
        .depo tr td{
            font-size: 16px;
            font-weight: 500;
        }
    </style>

<script>
    function checkdepositdetails(){
    var amount = document.forms["deposit"]["amount"].value;
    var descript = document.forms["deposit"]["comment"].value;
    var depositamount = parseInt(amount,10);
    if(amount==""||descript==""){
        alert('Deposit request Not Processed! All details are expected to be filled');
        return false;
    }else if(depositamount < 500){
        alert('Error! Our minimum deposit amount is 500');
        return false;
    }else{
        return true;
    }
    }
</script>

<?php
    $url="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strpos($url, 'deposuc') == true){ 
      echo '<script>alert("Dear Customer! We received your deposit request... We well get back to you shortly");</script>';
    }
?>

        <main class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-xl-8">  
                        <div class=" modal-account"  >
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
                                
                                        <form name="deposit" method="POST" action="../../scripts/depositscript.php"  onsubmit="return checkdepositdetails()">
                                        <div class="modal-account__pane-header" style="background-color:rgb(217, 0, 0); padding:10px;">
                                                    <h4 style="color: #ffffff; font-size:18px">Cash Deposit</h4>
                                                </div>
                                               
                                                    <h6 class="ml-4 text-danger">Use the below account information to make deposit. kindly inform the customer billing department by opening a support ticket after payment stating clearly your deposit details for approval</h6>   
                                        <div class="modal-account__right tab-content">
                                            <div class="modal-account__pane tab-pane show active" id="accountDetails">
                                                    <div class="row row--md">
                                                    <div class="col-12">
                                                            <div class="row row--md">
                                                                <table class="depo">
                                                                    <thead>
                                                                    <tr>
                                                                    <th></th>
                                                                    <th></th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>Bank Name</td>
                                                                            <td class="pl-4">Clickstate Bank</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Bank Address</td>
                                                                            <td class="pl-4">NRG Wodland Ave Austine #72222 TX USA</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Account No</td>
                                                                            <td class="pl-4">Click <a class="text-success" href="mailto:support@clickstateonline.com">Request Account Number</a> to contact Customer Billing Department for account information</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Account Name</td>
                                                                            <td class="pl-4">Clickstate Bank</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Swift Code</td>
                                                                            <td class="pl-4">VKUZ82664H</td>
                                                                        </tr>
                                                                    </tbody>
                                                                    
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                        <input  type="hidden" name="acctname" value="<?= !empty($acctname) ? $acctname : '';?>"  class="form-control">
                                                      <input  type="hidden" name="acctnumber" value="<?= !empty($acctnumber) ? $acctnumber : '';?>"  class="form-control">
                                                        <input  type="hidden" name="email" value="<?= !empty($email) ? $email : '';?>"  class="form-control">
                                                         <input  type="hidden" name="uid" value="<?= !empty($uid) ? $uid : '';?>"  class="form-control">
                                                         <input  type="hidden" name="currency" value="<?= !empty($currency) ? $currency : '';?>"  class="form-control">
                                                         <input  type="hidden" name="transtype" value="bank"  class="form-control">
                                                            <div class="row row--md">
                                                                <div class="col-12 col-lg-6 form-group form-group--lg">
                                                                    <label class="form-label form-label--sm">Receiver (Customer Cash Deposit)</label>
                                                                    <div class="input-group">
                                                                        <input class="input" type="text" name="support" value="Customer Billing Department" placeholder="Customer Billing Department" disabled required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-lg-6 form-group form-group--lg">
                                                                    <label class="form-label form-label--sm">Cash Deposit Amount</label>
                                                                    <div class="input-group">
                                                                        <input class="input" type="text" name="amount" placeholder="Cash Deposit Amount" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
 
                                                        <div class="col-12">
                                                            <div class="row row--md">
                                                                <div class="col-12 col-lg-6 form-group form-group--lg">
                                                                    <label class="form-label form-label--sm">Comments</label>
                                                                    <div class="input-group">
                                                                        <textarea class="input" style="height:50px" type="text" name="comment" placeholder="Comment" required></textarea>
                                                                    </div>
                                                                </div>
                                                               
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <!-- <h6 class="">Account Owner Authorization:</h6> -->
                                                    <div class="card-order__footer-total pt-3">
                                                   
                                                        <div class="card__container pl-0">
                                                            <div class="row gutter-bottom-sm justify-content-end">
                                                            <!-- <div class="col-12 col-lg-12 form-group form-group--lg mb-0">
                                                                    <label class="form-label form-label--sm">Account Pin</label>
                                                                    <div class="input-group">
                                                                        <input class="input" type="text" name="mname" placeholder="Enter Your Pin" >
                                                                    </div>
                                                                </div> -->
                                                                <div class="card-order__footer-submit col-12 col-sm">
                                                                    <button class="my-btn" name="deposit" type="submit"><span class="button__text">OPEN DEPOSIT TICKET </span>
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