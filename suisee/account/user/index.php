<?php 
include 'userhead.php';
?>
    <link href="assets/css/dashboard/dashh.css" rel="stylesheet" type="text/css" />
        <style>
        @media screen and (max-width:768px) {
            .title-name {
                font-size: 18px;
                font-weight: 500;
            }
            .tool-more{
            width: 100%;
            margin-top: 15px;
            text-align: center;
        }
        .tool-mor{
            margin-top: 15px;
            text-align: center;
        }
        }
        .ptext{
            font-size: 14px;
            font-weight: 400;
        }
        
    </style>
<script src="sweetalerts/promise-polyfill.js"></script>
        <script src="sweetalerts/sweetalert2.min.js"></script>
        <script src="sweetalerts/custom-sweetalert.js"></script>';
<?php
        if($status == "Dormant"){
            echo '<script> 
            swal("warning","ACCOUNT IS IN DORMANT STATUS!!! PLEASE CONTACT CUSTOMER SUPPORT TO ACTIVATE YOUR ACCOUNT AS SOME ACTIVITIES HAS BEEN DISABLED...", "warning");
            </script>';
        }

 $url="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if(strpos($url, 'noticedel') == true){
    echo '<script>alert("Notification Deleted...");</script>';
}
    ?>


        <main class="page-content" style="margin-top:-40px">
            <div class="container">

            <div class="row gutter-bottom-xl">
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">

<div class="widget1 widget1-account-invoice-three">

    <div class="widget1-heading">
        <div class="wallet-usr-info">
            <div class="usr-name">
                <span>
                <?php
                    if(!empty($uimage)){
                        echo' <img src="../images/'.$uimage.'"  alt="user" class="img-fluid" >';
                    }else{
                        echo' <img src="img/content/humans-2/avatar-1.png" alt="user" class="img-fluid">';
                    }
                    ?>
                    <?= isset($acctname) ? $acctname : '' ?></span>
            </div>
            <div class="add">
                <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></span>
            </div>
        </div>
        <div class="wallet-balance">
            <p>Balance</p>
            <h5 class=""><span class=""><?php if(!empty($currency)){ echo $currency; }else{ echo '$'; }?></span><?= !empty($acctbal) ? number_format($acctbal) : '0' ;?>.00</h5>
        </div>
    </div>

    <div class="widget1-amount">

        <div class="w-a-info funds-received">
            <span>Deposit <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up"><polyline points="18 15 12 9 6 15"></polyline></svg></span>
                <div class="btn-group mb-3 mt-3 group d-block text-center">
                    <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Deposit 
                    </button>
                    <div class="dropdown-menu">
                        <a href="btc_deposit.php" class="dropdown-item">Online Deposit</a>
                        <a href="bank_deposit.php" class="dropdown-item">Bank Deposit</a>
                    </div>
                </div>
        </div>

        <div class="w-a-info funds-spent">
            <span>Transfer <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></span>
            <div class="btn-group mb-3 mt-3 group d-block text-center">
                    <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Transfer
                    </button>
                    <div class="dropdown-menu">
                        <a href="int_transfer.php" class="dropdown-item">Domestic Transfer</a>
                        <a href="wire_transfer.php" class="dropdown-item">Wire Transfer</a>
                    </div>
                </div>
        </div>
    </div>

    <div class="widget1-content">

        <div class="bills-stats  text-center">
            <?php
            if($status == "Active"){
                echo '<span class="bg-success">Active</span>';
            }else{
                echo '<span class="bg-danger">Inactive</span>';
            }
            ?>
            
        </div>

        <div class="invoice-list">
                <?php
                    $sql = "SELECT * FROM transactions WHERE initiator_id='$uid' ORDER BY id DESC";
                    $result = mysqli_query($conn,$sql);
                    $result_check = mysqli_num_rows($result);

                    if($result_check > 0){
                    while($data = mysqli_fetch_assoc($result)){
                    $amount = $data['amount'];
                    }
                }
                ?>
                <style>
                    .inv-detail p{
                        font-weight: 400 !important;
                        font-size: 12px !important;
                    }
                    .inv-detail span{
                        font-weight: 400 !important;
                        font-size: 12px !important;
                    }
                </style>
            <div class="inv-detail">
                <div class="info-detail-1">
                    <p>Transfer Limit</p>
                    <p><span class="w-currency text-danger"><?php if(!empty($currency)){ echo $currency; }else{ echo '$'; }?></span> <span class="bill-amount text-danger"><?= !empty($tlimit) ? number_format($tlimit) : '0' ;?></span></p>
                </div>
                <!-- <div class="info-detail-2">
                    <p>Transfer Limit Remain</p>
                    <p><span class="w-currency text-danger"><?php if(!empty($currency)){ echo $currency; }else{ echo '$'; }?></span> <span class="bill-amount text-danger"><?= !empty($amount) ? number_format($tlimit-$amount) : '0' ;?></span></p>
                </div> -->
                <div class="info-detail-3">
                    <p>Last Transaction:</p>
                    <p><span class="w-currency text-dark"><?php if(!empty($currency)){ echo $currency; }else{ echo '$'; }?></span> <span class="bill-amount"><?= !empty($amount) ? number_format($amount) : '0' ;?></span></p>
                </div>
                <!-- <div class="info-detail-4">
                    <p>Last Login IP:</p>
                    <p><span class="bill-amount text-danger"><?= !empty($lastloginip) ? $lastloginip : 'UNKNOWN' ;?></span></p>
                </div>
                <div class="info-detail-5">
                    <p>Last Login Date:</p>
                    <p><span class="bill-amount text-danger"><?= !empty($lastlogindate) ? $lastlogindate : 'UNKNOWN' ;?></span></p>
                </div> -->
            </div>
            <div class="inv-action">
                <a href="statement.php" class="btn btn-outline-primary view-details">View Transactions</a>
                <a href="wire_transfer.php" class="btn btn-outline-primary pay-now">Wire Transfer</a>
            </div>
        </div>
    </div>

</div>
</div>


                        <div class="col-xl-8 col-lg-6 col-md-6 col-sm-12 col-12 d-flex">
                            <div class="card pb-0">
                                <div class="card__wrapper">
                                    <div class="card__container ">
                                        <div class="card__header">
                                            <div class="card__header-left">
                                                <h3 class="card__header-title text-danger">Recent Transactions</h3>
                                            </div>
                                            <div class="card__tools-more">
                                                <button class="items-more__button">
                                                    <svg class="icon-icon-more">
                                                        <use xlink:href="#icon-more"></use>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card__body">
                                            <div class="card__scrollbar card__table">
                                                <div class="card__table-transactions scrollbar-thin scrollbar-visible" data-simplebar="data-simplebar">
                                                    <table class="table table--lines table--striped p-2">
                                                        <colgroup>
                                                            <col class="colgroup-1" />
                                                            <col class="colgroup-2" />
                                                            <col class="colgroup-3" />
                                                            <col class="colgroup-4" />
                                                            <col class="colgroup-5" />
                                                            <col class="colgroup-6" />
                                                            <col/>
                                                        </colgroup>
                                                        <thead class="table__header table__header--sticky">
                                                            <tr>
                                                                <th><span class="text-nowrap">Trans Id.</span>
                                                                </th>
                                                                <th><span>Account Name</span>
                                                                </th>
                                                                <th><span>Date</span>
                                                                </th>
                                                                <th><span>Amount(<?= isset($currency) ? $currency : ""; ?>)</span>
                                                                </th>
                                                                <th><span>Description</span>
                                                                </th>
                                                                <th><span>Status</span>
                                                                </th>
                                                               
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                                $sql = "SELECT * FROM transactions WHERE initiator_id='$uid' ORDER BY id DESC";
                                                                $result = mysqli_query($conn,$sql);
                                                                $result_check = mysqli_num_rows($result);

                                                                if($result_check > 0){
                                                                while($data = mysqli_fetch_assoc($result)){
                                                                $acctnam = $data['bname'];
                                                                $acctnumb = $data['bnumber'];
                                                                $bnkname = $data['bbank'];
                                                                $descrip = $data['description'];
                                                                $tamount = $data['amount'];
                                                                $tdate = $data['transact_date'];
                                                                $stat = $data['status'];
                                                                $transtype = $data['transact_type'];
                                                                $transactid = $data['transactionid'];
                                                           echo' <tr class="table__row">
                                                                <td class="table__td"><span class="text-grey">'.$transactid.'</span>
                                                                </td>
                                                                <td class="table__td">
                                                                    <div class="media-item">
                                                                        <div class="media-item__right">
                                                                            <h5 class="media-item__title">'.$acctnam.'</h5>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="table__td"><span class="text-grey">'.$tdate.'</span>
                                                                </td>
                                                                <td class="table__td"><span>';
                                                                if(!empty($currency)){ echo $currency; }else{ echo "$"; } if(!empty($tamount)){ echo number_format($tamount); }else{ echo "0";}
                                                                echo '</span>
                                                                </td>
                                                                <td class="table__td"><span class="text-grey">'.$descrip.'</span>
                                                                </td>';
                                                                if($stat == "Successful" || $stat == "Approved"){
                                                                echo'<td class="table__td">
                                                                    <div class="table__status"><span class="table__status-icon color-green"></span>'.$stat.'</div>
                                                                </td>';
                                                                }elseif($stat == "Processing"){
                                                                echo'<td class="table__td">
                                                                    <div class="table__status"><span class="table__status-icon color-orange"></span>'.$stat.'</div>
                                                                </td>';
                                                                }elseif($stat == "Cancelled"){
                                                                echo'<td class="table__td">
                                                                    <div class="table__status"><span class="table__status-icon color-red"></span>'.$stat.'</div>
                                                                </td>';
                                                                }elseif($stat == "Pending"){
                                                                echo'<td class="table__td">
                                                                    <div class="table__status"><span class="table__status-icon color-blue"></span>'.$stat.'</div>
                                                                </td>';
                                                                }elseif($stat == "Failed"){
                                                                echo'<td class="table__td">
                                                                    <div class="table__status"><span class="table__status-icon color-red"></span>'.$stat.'</div>
                                                                </td>';
                                                                }else{
                                                                    echo'<td class="table__td">
                                                                    <div class="table__status"><span class="table__status-icon color-orange"></span> Processing</div>
                                                                    </td>';
                                                                }
                                                                }
                                                            }else{
                                                                echo "<p style='color:red; margin-left:20px; font-size:18px; margin-top:10px;'>No  Transactions</p>";
                                                            }
                                                        ?>
                                                              </tr>
                                                         
                                                        
                                                           
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                      

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-8 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="bg-white mt-2 pt-3 pb-3" style="border-radius:5px">
                                        <div class="card__container">
                                <div class="card__header">
                                    <div class="row gutter-bottom-xs justify-content-between flex-grow-1">
                                        <div class="col">
                                            <h3 class="card__title text-danger">Account Details</h3>
                                        </div>
                                        <div class="col-auto"><span class="card__date">Last Updated: <?= $date ?> <span> <?= $time ?></span> </span>
                                        </div>
                                    </div>
                                </div>
                                <ul class="card-order__customer-list">
                                    <li class="card-order__customer-item">
                                        <svg class="icon-icon-user">
                                            <use xlink:href="#icon-user"></use>
                                        </svg> <b>Acc Name:</b>  <span><?= isset($acctname) ? $acctname : '' ?></span>
                                    </li>
                                    <li class="card-order__customer-item">
                                        <svg class="icon-icon-phone">
                                            <use xlink:href="#icon-phone"></use>
                                        </svg> <b>Acc No:</b>  <a><?= isset($acctnumber) ? $acctnumber : '' ?></a>
                                    </li>
                                    <li class="card-order__customer-item">
                                        <svg class="icon-icon-email">
                                            <use xlink:href="#icon-home"></use>
                                        </svg> <b>Acc Type:</b>  <a><?= isset($accttype) ? $accttype : '' ?></a>
                                    </li>
                                </ul>
                            </div>
                            </div>
                            </div>

                    </div>


    </div>
    <div class="text-center mt-3">
    <span class="text-center">© All Rights Reserved Clickstate Bank.</span>
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