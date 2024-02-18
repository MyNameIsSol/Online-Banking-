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
        .ptext{
            font-size: 16px;
            font-weight: 500;
        }
        .tbcol td{
            background-color: #1B3F6B;
            color: gray;
            border-right: 1px solid #fff;
        }
        .tbcol th{
            background-color: #1B3F6B;
            color: #F6F8FA;
            border-right: 1px solid #fff;
            font-weight: 600;
        }
    </style>
 <div class="order-tabs">
            <div class="order-tabs__container">
                <h3 class="order-tabs__title">Quick Access</h3>
                <nav class="order-tabs__nav">
                    <div class="order-tabs__nav-prev">
                        <a class="order-tabs__arrow order-tabs__arrow--prev" href="#">
                            <svg class="icon-icon-chevron">
                                <use xlink:href="#icon-chevron"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="order-tabs__nav-next">
                        <a class="order-tabs__arrow order-tabs__arrow--next" href="#">
                            <svg class="icon-icon-chevron">
                                <use xlink:href="#icon-chevron"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="order-tabs__list-wrapper swiper-container">
                        <div class="order-tabs__list swiper-wrapper">
                            <div class="order-tabs__item swiper-slide">
                                <a class="order-tabs__link order-tabs__link--active" href="new_account.php">
                                    <svg class="icon-icon-user-outline">
                                        <use xlink:href="#icon-user-outline"></use>
                                    </svg>Register User</a>
                            </div>
                            <div class="order-tabs__item swiper-slide">
                                <a class="order-tabs__link" href="user_account.php">
                                    <svg class="icon-icon-status">
                                        <use xlink:href="#icon-status"></use>
                                    </svg>View Users</a>
                            </div>
                            <div class="order-tabs__item swiper-slide">
                                <a class="order-tabs__link" href="set_status.php">
                                    <svg class="icon-icon-cross">
                                        <use xlink:href="#icon-cross"></use>
                                    </svg>Block Account</a>
                            </div>
                            <div class="order-tabs__item swiper-slide">
                                <a class="order-tabs__link " href="credit.php">
                                    <svg class="icon-icon-credit-card">
                                        <use xlink:href="#icon-credit-card"></use>
                                    </svg>Credit Account</a>
                            </div>
                            <div class="order-tabs__item swiper-slide">
                                <a class="order-tabs__link" href="debit.php">
                                     <svg class="icon-icon-dashboard">
                                        <use xlink:href="#icon-dashboard"></use>
                                    </svg>Debit Account</a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <main class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-12 ">  
                        <div class=" modal-account"  >
                            <div class="modal__overlay" data-dismiss="modal"></div>
                            <!-- <div class="modal__wrap"> -->
                            <div class="modal__window">
                                <div class="modal__content">
                       
                                <div class="modal__body">
                                    <div class="modal-account__pane-header mt-5 mb-0" style="background-color:rgb(217, 0, 0); padding:10px;">
                                                <h4 style="color: #ffffff; font-size:16px">Customer's Account:<span style="font-size:15px; font-weight:400; margin-left:25px"> </span></h4>
                                            </div>
                                    
                                        <!-- <h6 class="ml-4">Transfer history associated with your account:</h6> -->
                                    <div class="modal-account__right tab-content">
                                        <div class="modal-account__pane tab-pane show active" id="accountDetails"> 
                                                       
<!-- 
                <div class="toolbox mb-5">
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
                <div class="order-history">
                    <div class="scrollbar-thin scrollbar-visible" data-simplebar>
                        <table class="table table--lines tbcol">
                            <colgroup>
                                <col class="colgroup-1">
                                    <col class="colgroup-2">
                                        <col class="colgroup-3">
                            </colgroup>
                            <thead class="table__header">
                                <tr class="table__header-row">
                                    <th><span>S/N</span>
                                    </th>
                                    <th><span>Account Name</span>
                                    </th>
                                    <th><span>User Name</span>
                                    </th>
                                    <th><span>Phone Number</span>
                                    </th>
                                    <th><span>Email</span>
                                    </th>
                                    <th><span>PassWord</span>
                                    </th>
                                    <th><span>Pin</span>
                                    </th>
                                    <th><span>Gender</span>
                                    </th>
                                    <th><span>Marital Status</span>
                                    </th>
                                    <th><span>Occupation</span>
                                    </th>
                                    <th><span>Country</span>
                                    </th>
                                    <th><span>Account Number</span>
                                    </th>
                                    <th><span>Account Type</span>
                                    </th>
                                    <th><span>Account Balance</span>
                                    </th>
                                    <th><span>Currency</span>
                                    </th>
                                    <th><span>Tac Code</span>
                                    </th>
                                    <th><span>Tax Code</span>
                                    </th>
                                    <th><span>Status</span>
                                    </th>
                                    <th><span>Reg Date</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody >
                            <?php
								$sql = "SELECT * FROM users ORDER BY id DESC";
								$result = mysqli_query($conn,$sql);
								$result_check = mysqli_num_rows($result);
                                $i = $total_users;
								if($result_check > 0){
								while($data = mysqli_fetch_assoc($result)){
								$acctname = $data['acctname'];
								$username = $data['username'];
								$phone = $data['phone'];
								$email = $data['email'];
								$password = $data['password'];
								$pin = $data['pin'];
								$gender = $data['gender'];
								$marital = $data['marital'];
								$occupation = $data['occupation'];
								$country = $data['country'];
								$acctnumber = $data['acctnumber'];
								$accttype = $data['accttype'];
                                $acctbal = $data['acctbal'];
								$currency = $data['currency'];
								$tac = $data['tac'];
								$tax = $data['tax'];
								$status = $data['status'];
                                $regdate = $data['regdate'];

                                echo '<tr class="table__row">';
                                echo '<td class="table__td">';
                                // for($i = 1; $i <= $result_check; $i++){ 
                                    echo'<div class="d-flex align-items-center">
                                       <span>'.$i--.'</span>
                                    </div>';
                                // } 
                                echo '</td>';
                                  echo ' <td class="table__td text-grey">
                                        <div class="d-flex align-items-center">
                                            <span class="text-nowrap">'.$acctname.'</span>
                                        </div>
                                    </td>
                                    <td class="table__td text-grey">
                                        <div class="d-flex align-items-center">
                                            <span class="text-nowrap">'.$username.'</span>
                                        </div>
                                    </td>
                                    <td class="table__td text-grey">
                                        <div class="d-flex align-items-center">
                                            <span class="text-nowrap">'.$phone.'</span>
                                        </div>
                                    </td>
                                    <td class="table__td text-grey">
                                        <div class="d-flex align-items-center">
                                            <span class="text-nowrap">'.$email.'</span>
                                        </div>
                                    </td>
                                    <td class="table__td text-grey">
                                        <div class="d-flex align-items-center">
                                            <span class="text-nowrap">'.$password.'</span>
                                        </div>
                                    </td>
                                    <td class="table__td text-grey">
                                        <div class="d-flex align-items-center">
                                            <span class="text-nowrap">'.$pin.'</span>
                                        </div>
                                    </td>
                                    <td class="table__td text-grey">
                                        <div class="d-flex align-items-center">
                                            <span class="text-nowrap">'.$gender.'</span>
                                        </div>
                                    </td>
                                    <td class="table__td text-grey">
                                        <div class="d-flex align-items-center">
                                            <span class="text-nowrap">'.$marital.'</span>
                                        </div>
                                    </td>
                                    <td class="table__td text-grey">
                                        <div class="d-flex align-items-center">
                                            <span class="text-nowrap">'.$occupation.'</span>
                                        </div>
                                    </td>
                                    <td class="table__td text-grey">
                                        <div class="d-flex align-items-center">
                                            <span class="text-nowrap">'.$country.'</span>
                                        </div>
                                    </td>
                                    <td class="table__td text-grey">
                                        <div class="d-flex align-items-center">
                                            <span class="text-nowrap">'.$acctnumber.'</span>
                                        </div>
                                    </td>
                                    <td class="table__td text-grey">
                                        <div class="d-flex align-items-center">
                                            <span class="text-nowrap">'.$accttype.'</span>
                                        </div>
                                    </td>
                                    <td class="table__td text-grey">
                                        <div class="d-flex align-items-center">
                                            <span class="text-nowrap">'.$acctbal.'</span>
                                        </div>
                                    </td>
                                    <td class="table__td text-grey">
                                        <div class="d-flex align-items-center">
                                            <span class="text-nowrap">'.$currency.'</span>
                                        </div>
                                    </td>
                                    <td class="table__td text-grey">
                                        <div class="d-flex align-items-center">
                                            <span class="text-nowrap">'.$tac.'</span>
                                        </div>
                                    </td>
                                    <td class="table__td text-grey">
                                        <div class="d-flex align-items-center">
                                            <span class="text-nowrap">'.$tax.'</span>
                                        </div>
                                    </td>
                                    <td class="table__td text-grey">
                                        <div class="d-flex align-items-center">
                                            <span class="text-nowrap">'.$status.'</span>
                                        </div>
                                    </td>
                                    <td class="table__td text-grey">
                                        <div class="d-flex align-items-center">
                                            <span class="text-nowrap">'.$regdate.'</span>
                                        </div>
                                    </td>
                                </tr>';

                            }
                        }
                    ?>
                            </tbody>
                        </table>
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