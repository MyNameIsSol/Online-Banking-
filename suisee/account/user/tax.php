<?php 
include 'userhead.php';

if(!isset($_POST['transfer'])){
    header("Location: index.php");
    exit;
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
?>

        <style>
        @media screen and (max-width:768px) {
            .title-name {
                font-size: 18px;
                font-weight: 500;
            }
            .balance{
                display: inline-block;
                margin-top: 10px;
            }
        }
        .ptext{
            font-size: 16px;
            font-weight: 500;
        }
    </style>


<script>
function validateForm() {

var inputedtax = document.forms["transfer"]["inputedtax"].value;
  var tax = document.forms["transfer"]["tax"].value;
  
  if(inputedtac != tax){

    alert('Invalid Tax Code! please provide a valid Tax Code..');
    return false;

  }else {
    return true;

  }

}
</script>

        <main class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-8 col-lg-8 col-xl-8">  
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
                                
                                <form class="" name="transfer" method="POST" action="otp.php" onsubmit="return validateForm()">
                                        <div class="modal-account__pane-header" style="background-color:rgb(217, 0, 0); padding:10px;">
                                                    <h4 style="color: #ffffff; font-size:16px">Almost finished! </h4>
                                                </div>
                                               
                                                    <h6 class="ml-4">Provide the Tax Code  and click continue to <br> proceed. </h6>

                                        <div class="modal-account__right tab-content">
                                        
                                            <div class="modal-account__pane tab-pane show active" id="accountDetails">
                                                
                                                    <div class="row row--md">
                                                        <div class="col-12 col-lg-12 form-group form-group--lg">
                                                            <label class="form-label form-label--sm text-danger">Enter Tax Code</label>
                                                            <div class="input-group">
                                                                <input class="input"  type="text" name="inputedtax" placeholder="Enter your Tax Code" >
                                                            </div>
                                                        </div>
                                                        <h5 style="font-size:10px;">Don't know your Tax code? <a href="mailto:finance@clickstateonline.com" class="text-primary">Send us a message.</a></h5>
                                                    </div>
                                                   
                                                    <div class="form-group  mb-4">
                                                        <input type="hidden" name="bname" value='<?php echo $bname?>'>
                                                        <input type="hidden" name="bnacct" value='<?php echo $bnacct?>'>
                                                        <input type="hidden" name="bbank" value='<?php echo $bbank?>'>
                                                        <input type="hidden" name="bemail" value='<?php echo $bemail?>'>
                                                        <input type="hidden" name="amount" value='<?php echo $amount?>'>
                                                        <input type="hidden" name="bcountry" value='<?php echo $bcountry?>'>
                                                        <input type="hidden" name="brtn" value='<?php echo $brtn?>'>
                                                        <input type="hidden" name="descrip" value='<?php echo $descrip?>'>
                                                        <input type="hidden" name="swift" value='<?php echo $swift?>'>
                                                        <input type="hidden" name="bal" value='<?php echo $acctbal?>'>
                                                        <input type="hidden" name="tac" value='<?php echo $tac?>'>
                                                        <input type="hidden" name="tax" value='<?php echo $tax?>'>
                                                    </div>
                                                   
                                                    <div class="card-order__footer-total pt-3">
                                                   
                                                        <div class="card__container p-0">
                                                            <div class="row gutter-bottom-sm justify-content-end">
                                                          
                                                                <div class="card-order__footer-submit col-12 col-sm">
                                                                    <button class="my-btn" name='transfer' type="submit"><span class="button__text">Validate Transfer </span><span class="ml-1"></span>
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