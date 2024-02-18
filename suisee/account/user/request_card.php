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
    var subject = document.forms["card"]["subject"].value;
    var message = document.forms["card"]["message"].value;
    if(subject==""||message==""){
        alert('Card request Not Processed! All details are expected to be filled');
        return false;
    }else{
        return true;
    }
    }
</script>

<?php
    $url="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strpos($url, 'cardsuc') == true){ 
      echo '<script>alert("Dear Customer! We received your card request... We will get back to you shortly");</script>';
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
                                
                                        <form method="POST" name="card" method="POST" action="../../scripts/cardrequestscript.php" onsubmit="return checkrequest()">
                                        <div class="modal-account__pane-header" style="background-color:rgb(217, 0, 0); padding:10px;">
                                                    <h4 style="color: #ffffff; font-size:18px">Request Debit Card</h4>
                                                </div>      
                                        <div class="modal-account__right tab-content">
                                        
                                            <div class="modal-account__pane tab-pane show active" id="accountDetails">
                                                
                                                    <div class="row row--md">
                                                    <input  type="hidden" name="acctname" value="<?= !empty($acctname) ? $acctname : '';?>"  class="form-control">
                                                      <input  type="hidden" name="acctnumber" value="<?= !empty($acctnumber) ? $acctnumber : '';?>"  class="form-control">
                                                        <input  type="hidden" name="email" value="<?= !empty($email) ? $email : '';?>"  class="form-control">
                                                         <input  type="hidden" name="uid" value="<?= !empty($uid) ? $uid : '';?>"  class="form-control">
                                                        
                                                        <div class="col-12">
                                                            <div class="row row--md">
                                                                <div class="col-12 col-lg-6 form-group form-group--lg">
                                                                    <label class="form-label form-label--sm text-danger">Receiver (Card Issuer Department)</label>
                                                                    <div class="input-group">
                                                                        <input class="input" type="text" name="support" value="Card Issuer Department" placeholder="Card Issuer Department" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-lg-6 form-group form-group--lg">
                                                                    <label class="form-label form-label--sm">Subject</label>
                                                                    <div class="input-group">
                                                                        <input class="input" type="text" name="subject" placeholder="Subject" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="row row--md">
                                                            <div class="col-12 col-lg-6 form-group form-group--lg mb-5">
                                                                    <label class="form-label form-label--sm text-danger">Card Type</label>
                                                                    <div class="input-group input-group--append">
                                                                        <select class="input js-input-select input--fluid" name="cardtype" data-placeholder="Select Card Type" required>
                                                                            <option value="" selected="selected">Select Card Type
                                                                            </option>
                                                                            <option value="visa">Visa
                                                                            </option>
                                                                            <option value="master">Master
                                                                            </option>
                                                                        </select><span class="input-group__arrow">
                                                                        <svg class="icon-icon-keyboard-down">
                                                                            <use xlink:href="#icon-keyboard-down"></use>
                                                                        </svg></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-lg-6 form-group form-group--lg mb-5">
                                                                    <label class="form-label form-label--sm text-danger">Card Options</label>
                                                                    <div class="input-group input-group--append">
                                                                        <select class="input js-input-select input--fluid" name="cardoption" data-placeholder="Select Card Options" required>
                                                                            <option value="" selected="selected">Select Card Options
                                                                            </option>
                                                                            <option value="credit">Credit
                                                                            </option>
                                                                            <option value="debit">Debit
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
                                                                <div class="col-12 col-lg-6 form-group form-group--lg">
                                                                    <label class="form-label form-label--sm">Application(Description)</label>
                                                                    <div class="input-group">
                                                                        <textarea class="input" style="height:50px" type="text" name="message" placeholder="Description" required></textarea>
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
                                                                    <button class="my-btn" type="subnit" name="cardrequest"><span class="button__text">MAKE REQUEST</span>
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