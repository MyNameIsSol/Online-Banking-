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
        .box.box-body.p-1{
            display: none !important;
        }
        .column a{
            display: none !important;
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
    if(strpos($url, 'error') == true){ 
        $error = $_GET['error'];
        echo '<script>alert("'.$error.'");</script>';
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
                                
                                        <form method="POST" name="deposit" method="POST" action="../../scripts/btcdepositscript.php" enctype="multipart/form-data" onsubmit="return checkdepositdetails()">
                                        <div class="modal-account__pane-header" style="background-color:rgb(217, 0, 0); padding:10px;">
                                                    <h4 style="color: #ffffff; font-size:18px">Online Deposit</h4>
                                                </div>
                                               
                                        <div class="modal-account__right tab-content">
                                        
                                            <div class="modal-account__pane tab-pane show active" id="accountDetails">

                                            <div class="box">
						<!-- <div class="box-header">
							<h4 class="box-title mb-5">
								Check the exchange rate..
							</h4>
						</div> -->
						<div class="box-body">							
						<!-- Crypto Converter ⚡ Widget -->
                        <!-- <crypto-converter-widget shadow symbol live background-color="#fff" color="#303A50" box-shadow="0 8px 16px rgba(169, 194, 209, 0.1)" border-radius="0.60rem" fiat="united-states-dollar" crypto="bitcoin" amount="1" decimal-places="2"></crypto-converter-widget><script async src="https://cdn.jsdelivr.net/gh/dejurin/crypto-converter-widget@1.5.2/dist/latest.min.js"></script> -->
                        <!-- /Crypto Converter ⚡ Widget -->
					</div>
                                      
                    <!-- <h6 class=" mt-5 text-danger">Use the below account information to make deposit. kindly inform the customer billing department by opening a support ticket after payment stating clearly your deposit details for approval</h6> -->
                                                    <div class="row row--md">
                                                    <div class="col-12">
                                                    <label class="form-label form-label--sm text-danger">Crypto Type:  </label> 
                                                            <div class="row row--md">
                                                                <div class="col-12 col-md-9 col-lg-9 col-xl-9 form-group form-group--lg">
                                                                    <div class="input-group input-group--append">
                                                                        <!-- <input class="input" type="text" name="fname" id="copybtc" value="THd9d3MCJDak8zFfaLyoL6RegogxoEqo7f" placeholder="Customer Billing" required> -->
                                                                        <select class="input js-input-select input--fluid" id="paytype" name="transtype" onchange="selectPay()" name="paytype" data-placeholder="Select deposit method" required>
                                                        <option value="btc" selected="selected">Bitcoin (BTC)
                                                        </option>
                                                        <option value="eth">Ethereum (ETH)
                                                        </option>
                                                        <option value="usdt">Tether (USDT Trc20)
                                                        </option>
                                                        <option value="doge">Doge coin
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
                                                    <label class="form-label form-label--sm text-danger">Copy Wallet Address:  </label>  <label class=" text-success" id="alat"></label>
                                                            <div class="row row--md">
                                                                <div class="col-12 col-md-9 col-lg-9 col-xl-9 form-group form-group--lg">
                                                                    <div class="input-group">
                                                                        <input class="input" type="text" name="" id="copycrypto" placeholder="Payment Address" required>
                                                                    </div>
                                                                 </div>
                                                                 <div class="col-12 col-md-3 col-lg-3 col-xl-3 form-group form-group--lg">
                                                                <button class="btn btn-outline-danger" type="button" onClick="mycopy()"><span class="button__text">copy </span>
                                                                    </button>
                                                                </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                    <input  type="hidden" name="acctname" value="<?= !empty($acctname) ? $acctname : '';?>"  class="form-control">
                                                      <input  type="hidden" name="acctnumber" value="<?= !empty($acctnumber) ? $acctnumber : '';?>"  class="form-control">
                                                        <input  type="hidden" name="email" value="<?= !empty($email) ? $email : '';?>"  class="form-control">
                                                         <input  type="hidden" name="uid" value="<?= !empty($uid) ? $uid : '';?>"  class="form-control">
                                                         <input  type="hidden" name="currency" value="<?= !empty($currency) ? $currency : '';?>"  class="form-control">
                                                         <!-- <input  type="hidden" name="transtype" value="btc transfer"  class="form-control"> -->
                                                            <div class="row row--md">
                                                                <div class="col-12 col-lg-6 form-group form-group--lg">
                                                                    <label class="form-label form-label--sm">Receiver (Customer Care Loan Department)</label>
                                                                    <div class="input-group">
                                                                        <input class="input" type="text" name="support" placeholder="Customer Billing" disabled required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-lg-6 form-group form-group--lg">
                                                                    <label class="form-label form-label--sm">Cash Deposit Amount</label>
                                                                    <div class="input-group">
                                                                        <input class="input" type="text" name="amount" placeholder="Enter deposit amount" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                    <label class="form-label form-label--sm text-danger">Upload Payment:  </label>
                                                            <div class="row row--md">
                                                                <div class="col-12 col-md-9 col-lg-9 col-xl-9 form-group form-group--lg">
                                                                    <div class="input-group">
                                                                        <input class="input" type="file" name="file_upload"  placeholder="Choose file" required>
                                                                    </div>
                                                                 </div>
                                                        </div>
                                                    </div>

 
                                                        <div class="col-12">
                                                            <div class="row row--md">
                                                                <div class="col-12 col-lg-6 form-group form-group--lg">
                                                                    <label class="form-label form-label--sm">Comment</label>
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
                                                                    <button class="my-btn" name="deposit" type="submit"><span class="button__text">Submit Ticket </span>
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

var btc = "3NRgs29JTx6XRCmAjaUCuVm31aeo16DbiD";
    var eth = "0x4471c3dd120daed466b8cc115375a67776d54c02";
    var usdt = "THd9d3MCJDak8zFfaLyoL6RegogxoEqo7f";
    var doge = "DPrMtD6KaWimpW546JURdZqnPRzsPcU3ax";
    var paytype = document.getElementById("paytype").value;
    var payaddr = document.getElementById("copycrypto");
    if(paytype == "btc"){
        payaddr.value = btc;
    }else if(paytype == "eth"){
        payaddr.value = eth;
    }else if(paytype == "usdt"){
        payaddr.value = usdt;
    }else if(paytype == "doge"){
        payaddr.value = doge;
    }

    function selectPay(){
        var btc = "3NRgs29JTx6XRCmAjaUCuVm31aeo16DbiD";
    var eth = "0x4471c3dd120daed466b8cc115375a67776d54c02";
    var usdt = "THd9d3MCJDak8zFfaLyoL6RegogxoEqo7f";
    var doge = "DPrMtD6KaWimpW546JURdZqnPRzsPcU3ax";
    var paytype = document.getElementById("paytype").value;
    var payaddr = document.getElementById("copycrypto");
    if(paytype == "btc"){
        payaddr.value = btc;
    }else if(paytype == "eth"){
        payaddr.value = eth;
    }else if(paytype == "usdt"){
        payaddr.value = usdt;
    }else if(paytype == "doge"){
        payaddr.value = doge;
    }
    }

    function mycopy(){
    var copyTxt = document.getElementById("copycrypto");
    var alat = document.getElementById("alat");
    alat.innerText = "Copied";
    // alat.style.color = "blue";
    copyTxt.select();
    document.execCommand("copy");
    }



    </script>
</body>

</html>