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

            .ptext {
                font-size: 16px;
                font-weight: 500;
            }
            .cardtypes img{
                width: 60px;
                height: 30px;
            }
            .cardtypes{
                margin-left:38px;
            }
        </style>

        <main class="page-content">
            <div class="container">
       
                <div class="content ">

                <div class="col-12 ">
                    <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <!-- <div class="customer-account"> -->
                   <div class=" modal-account mb-5">
            
                    <div class="modal__window">
                        <div class="modal__content">
                            <!-- <a class="modal__close text-danger">
                                <svg class="icon-icon-help">
                                    <use xlink:href="#icon-help"></use>
                                </svg>
                            </a> -->
                                 <div class="modal__body">
                                <form>
                                    <div class="modal-account__pane-header" style="background-color:rgb(217, 0, 0); padding:10px;">
                                        <h4 style="color: #ffffff; font-size:18px">My Bank Card</h4>
                                    </div>
                                    <div class="cardtypes">
                                            <img src="../../img/visa.jpg" alt="visa card">
                                            <img src="../../img/western.jpg" alt="western card">
                                            <img src="../../img/master.jpg" alt="master card">
                                            <img src="../../img/discovery.jpg" alt="discover card">
                                        </div>
                                    <div class="modal-account__right tab-content">
                                        <div class="modal-account__pane tab-pane show active" id="accountDetails">
                                        <div class="row row--md">
                                            <div class="col-12">
                                                <div class="row row--md">
                                                    <div class="col-12 col-lg-6 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Card Holder Name</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="acctname" value="<?= isset($acctname) ? $acctname : "";?>" placeholder="card name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-6 form-group form-group--lg">
                                                        <label class="form-label form-label--sm"><?= isset($cardoption) ? $cardoption : "";?> Card Number</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="cardnumber" value="<?= isset($cardnum) ? $cardnum : "";?>" placeholder="Card Number">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="row row--md">
                                                    <div class="col-12 col-lg-6 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Exp Month</label>
                                                        <div class="input-group">
                                                            <input class="input" style="height:50px" type="text" value="<?= isset($expmonth) ? $expmonth : "";?>" name="exmonth" placeholder="Expiry Month" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="row row--md">
                                                    <div class="col-12 col-lg-6 form-group form-group--lg">
                                                        <label class="form-label form-label--sm text-danger">Exp Year</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="expyear" value="<?= isset($expyear) ? $expyear : "";?>" placeholder="Expiry Year" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-6 form-group form-group--lg">
                                                        <label class="form-label form-label--sm text-danger"> Card Cvv</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="cardcvv" value="<?= isset($cardcvv) ? $cardcvv : "";?>" placeholder="Card Cvv">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="row row--md">
                                                    <div class="col-12 col-lg-6 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Card Pin</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="cardpin" value="<?= isset($cardpin) ? $cardpin : "";?>" placeholder="Card Pin" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-6 form-group form-group--lg">
                                                        <label class="form-label form-label--sm"> Card Balance</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="cardbal" value="<?= isset($acctbal) ? $acctbal : "";?>" placeholder="Card Balance">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <!-- <h6 class="">Account Owner Authorization:</h6> -->
                                        <!-- <div class="card-order__footer-total pt-3">

                                            <div class="card__container pl-0">
                                                <div class="row gutter-bottom-sm justify-content-end">
                                                    <div class="card-order__footer-submit  col-12 col-sm">
                                                        <button class="button button--secondary" type="button"><span class="button__text">APPLY FOR LOAN </span>
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div> -->
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                        </div>
                        </div>
                </div>
                 
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                    <div class="col-md-12 col-lg-12 col-xl-12 p-0">
                    <div class=" card ">
                        <div class="card__wrapper">
                        
                            <div class="card__container">
                            
                                <div class="card__header">
                                    <div class="card__header-left">
                                        <h3 class="card__header-title text-danger">Card Details</h3>
                                    </div>
                                    <div class="customer-card__header-right">
                                        <!-- <button class="button-icon button-icon--transparent" data-modal="#accountEdit" data-toggle-tab="#accountPayment"><span class="button-icon__icon">
                                            <svg class="icon-icon-task">
                                                <use xlink:href="#icon-task"></use>
                                            </svg></span>
                                        </button> -->
                                    </div>
                                </div>
                                <div class="card__body">
                                    <div class="card__credit-card">
                                        <div class="credit-card">
                                            <?php if($cardtype == "master"){
                                                        echo'<img class="credit-card__image credit-card__image--light" src="img/content/credit-mastercard-dark.svg" alt="#" />';
                                                    }elseif($cardtype == "visa"){
                                                        echo '<img class="credit-card__image" src="img/content/credit-card.svg" alt="#" />';
                                                    }else{
                                                        echo '<img class="credit-card__image" src="img/content/credit-card.svg" alt="#" />';
                                                    }
                                                    ?>
                                            <div class="credit-card__number-wrapper">
                                                <input class="credit-card__number-input" type="text" value="0123456789101112" readonly="readonly" />
                                                <div class="credit-card__number">
                                                    <div class="credit-card__number-item"><?= isset($firstno) ? $firstno : '0123' ?></div>
                                                    <div class="credit-card__number-item"><?= isset($secondno) ? $secondno : '4567' ?></div>
                                                    <div class="credit-card__number-item"><?= isset($thirdno) ? $thirdno : '8910' ?></div>
                                                    <div class="credit-card__number-item"><?= isset($forthno) ? $forthno : '1112' ?></div>
                                                </div>
                                            </div>
                                            <div class="credit-card__name">
                                                <div class="credit-card__caption">Card Holder</div><?= isset($acctname) ? $acctname : '' ?>
                                            </div>
                                            <div class="credit-card__date">
                                                <div class="credit-card__caption">Expire</div><span><?= isset($exmonth) ? $exmonth : '' ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card__footer">
                                    <div class="card__container">
                                        <div class="card__credit-list">
                                            <ul class="card-list">
                                                <li class="row row--xs">
                                                    <div class="card-list__title col-auto">Card Type</div>
                                                    <div class="card-list__value col"><?= isset($cardtype) ? $cardtype : ""?> </div>
                                                </li>
                                                <li class="row row--xs">
                                                    <div class="card-list__title col-auto">Card Holder</div>
                                                    <div class="card-list__value col"><?= isset($acctname) ? $acctname : "";?></div>
                                                </li>
                                                <li class="row row--xs">
                                                    <div class="card-list__title col-auto">Expire</div>
                                                    <div class="card-list__value col"><?= isset($exmonth) ? $exmonth : "";?></div>
                                                </li>
                                                <li class="row row--xs">
                                                    <div class="card-list__title col-auto">Card Number</div>
                                                    <div class="card-list__value col"><?= isset($cardnum) ? $cardnum : "";?></div>
                                                </li>
                                                <li class="row row--xs">
                                                    <div class="card-list__title col-auto">Balance</div>
                                                    <div class="card-list__value col"><?= isset($currency) ? $currency.$acctbal : "";?><?= isset($cardbal) ? $cardbal : "";?></div>
                                                </li>
                                            </ul>
                                        </div>
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