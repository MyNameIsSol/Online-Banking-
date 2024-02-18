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
    </style>

<script>
    function checkloandetails(){
    var amount = document.forms["loanrequest"]["amount"].value;
    var descript = document.forms["loanrequest"]["description"].value;
    var income = document.forms["loanrequest"]["income"].value;
    var loanamount = parseInt(amount,10);
    if(amount==""||descript==""||income==""){
        alert('loan request Not Processed! All details are expected to be filled');
        return false;
    }else if(loanamount < 2000){
        alert('Error! Our minimum loan amount is 2000');
        return false;
    }else{
        return true;
    }
    }
</script>

<?php
    $url="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strpos($url, 'loansuc') == true){ 
      echo '<script>alert("Dear Customer! We received your loan request... We well get back to you shortly");</script>';
    }
?>

        <main class="page-content" style="margin-top:-20px">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-xl-8">  
                        <div class=" modal-account"  >
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
                                
                                        <form name="loanrequest" method="POST" action="../../scripts/loanscript.php" onsubmit="return checkloandetails()">
                                        <div class="modal-account__pane-header" style="background-color:rgb(217, 0, 0); padding:10px;">
                                                    <h4 style="color: #ffffff; font-size:18px">Apply for a Loan</h4>
                                                </div>
                                               
                                                    <!-- <h6 class="ml-4">Compulsary Transfer Form</h6> -->
                                                  
                                                
                                        <div class="modal-account__right tab-content">
                                        
                                            <div class="modal-account__pane tab-pane show active" id="accountDetails">
                                                
                                                    <div class="row row--md">
                                                        <div class="col-12">
                                                        <input  type="hidden" name="acctname" value="<?= !empty($acctname) ? $acctname : '';?>"  class="form-control">
                                                      <input  type="hidden" name="acctnumber" value="<?= !empty($acctnumber) ? $acctnumber : '';?>"  class="form-control">
                                                        <input  type="hidden" name="email" value="<?= !empty($email) ? $email : '';?>"  class="form-control">
                                                         <input  type="hidden" name="uid" value="<?= !empty($uid) ? $uid : '';?>"  class="form-control">
                                                            <div class="row row--md">
                                                                <div class="col-12 col-lg-6 form-group form-group--lg">
                                                                    <label class="form-label form-label--sm">Receiver (Customer Care Loan Department)</label>
                                                                    <div class="input-group">
                                                                        <input class="input" type="text" value="Loan Department" name="support" placeholder="Loan Department" disabled required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-lg-6 form-group form-group--lg">
                                                                    <label class="form-label form-label--sm text-danger">Loan Amount</label>
                                                                    <div class="input-group">
                                                                        <input class="input" type="text" name="amount" placeholder="Enter Loan Amount" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
 
                                                        <div class="col-12">
                                                            <div class="row row--md">
                                                            <div class="col-12 col-lg-6 form-group form-group--lg">
                                                                    <label class="form-label form-label--sm">Monthly Income</label>
                                                                    <div class="input-group">
                                                                    <input class="input" type="text" name="income" placeholder="Monthly Income" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-lg-6 form-group form-group--lg">
                                                                    <label class="form-label form-label--sm">Message Subject</label>
                                                                    <div class="input-group">
                                                                        <input class="input" type="text" name="subject" placeholder="Eg Loan Request" >
                                                                    </div>
                                                                </div>
                                                               
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="row row--md">
                                                                <div class="col-12 col-lg-6 form-group form-group--lg">
                                                                    <label class="form-label form-label--sm">Type Your Message</label>
                                                                    <div class="input-group">
                                                                        <textarea class="input" style="height:50px" type="text" name="message" placeholder="Type In Messages" required></textarea>
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
                                                                <div class="card-order__footer-submit  col-12 col-sm">
                                                                <script src="sweetalerts/promise-polyfill.js"></script>
                                                                <script src="sweetalerts/sweetalert2.min.js"></script>
                                                                <script src="sweetalerts/custom-sweetalert.js"></script>
                                                                 <?php
                                                                        if($status == "Dormant"){
                                                                            echo '<button class="btn btn-danger" disabled name="loanrequest" type="submit"><span class="button__text">ACCOUNT DISABLED PLEASE CONTACT SUPPORT </span>
                                                                            </button>';
                                                                        }else{
                                                                            echo '<button class="my-btn" name="loanrequest" type="submit"><span class="button__text">APPLY</span>
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