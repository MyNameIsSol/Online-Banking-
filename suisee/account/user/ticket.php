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
    function ticketdetails(){
    var subject = document.forms["ticket"]["subject"].value;
    var message = document.forms["ticket"]["message"].value;
    if(subject==""||message==""){
        alert('Ticket Not Processed! All details are expected to be filled');
        return false;
    }else{
        return true;
    }
    }
</script>

<?php
    $url="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strpos($url, 'ticketsuc') == true){ 
      echo '<script>alert("Dear Customer! We received your ticket... We well get back to you shortly");</script>';
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
                                <!-- <a href="index.php" class="modal__close text-primary">
                                <svg class="icon-icon-home breadcrumbs__icon">
                                    <use xlink:href="#icon-home"></use>
                                </svg>
                             </a> -->
                                <div class="modal__body">
                                        <form name="ticket" method="POST" action="../../scripts/ticketscript.php" onsubmit="return ticketdetails()">
                                    <div class="modal-account__pane-header" style="background-color:rgb(217, 0, 0); padding:10px;">
                                                <h4 style="color: #ffffff;font-size:18px">Customer Service Support</h4>
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
                                                                    <label class="form-label form-label--sm">Receiver (Customer Care) </label>
                                                                    <div class="input-group">
                                                                        <input class="input" type="text" value="Customer Care" name="support" placeholder="Customer Care" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-lg-6 form-group form-group--lg">
                                                                    <label class="form-label form-label--sm">Message Subject</label>
                                                                    <div class="input-group">
                                                                        <input class="input" type="text" name="subject" placeholder="Subject" >
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
                                                    <!-- <h6 class="">Account Owner Authorization</h6> -->
                                                    <div class="card-order__footer-total pt-3">
                                                   
                                                        <!-- <div class="card__container"> -->
                                                            <div class="row gutter-bottom-sm justify-content-end">
                                                                <div class="card-order__footer-submit col-12 col-sm">
                                                                    <button class="my-btn" name="help" type="submit"><span class="button__text">SUBMIT TICKET </span>
                                                                    </button>
                                                                </div>
                                                            
                                                            </div>
                                                        <!-- </div> -->
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