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
        /* .tbcol td{
            background-color: #1B3F6B;
            color: gray;
            border-right: 1px solid #fff;
        }
        .tbcol th{
            background-color: #1B3F6B;
            color: gray;
            border-right: 1px solid #fff;
        } */
        .tbcol td:hover{
            background-color: #F7F7F7 !important;
        }
    </style>



        <main class="page-content">
            <div class="container">
            <div class="modal-account__pane-header col-12 " style="background-color:rgb(217, 0, 0); padding:10px;">
                    <h4 style="color: #ffffff;font-size:16px">View and Edit Credit/Debit Transaction:<span style="font-size:15px; font-weight:400; margin-left:25px"> </span></h4>
                </div>
        <!-- <div class="toolbox mb-5">
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
                <div class="row">
                    <div class="col-12 col-lg-12 col-xl-12">  
                        <div class=" modal-account"  >
                            <div class="modal__overlay" data-dismiss="modal"></div>
                            <!-- <div class="modal__wrap"> -->
                            <div class="modal__window">
                                <div class="modal__content">

                                <div class="modal__body">
                                        <!-- <h6 class="ml-4">Transfer history associated with your account:</h6> -->
                                    <div class="modal-account__right tab-content">
                                        <div class="modal-account__pane tab-pane show active" id="accountDetails"> 
                                                       
                                        <div class="modal-account__pane-header pl-0 mb-4" >
                                                <span style="color: rgb(217, 0, 0); font-weight:600">Credit/Debit Transactions</span>
                                            </div>
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
                                    <th><span>Ref No.</span>
                                    </th>
                                    <th><span>Sender (From)</span>
                                    </th>
                                    <th><span>Transaction Type</span>
                                    </th>
                                    <th><span>Amount</span>
                                    </th>
                                    <th><span>Receiver (to)</span>
                                    </th>
                                    <th><span>Account Number</span>
                                    </th>
                                    <th><span>Description</span>
                                    </th>
                                    <th><span>STATUS</span>
                                    </th>
                                    <th><span>Date</span>
                                    </th>
                                    <th colspan="2"><span>Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody >
                            <?php
                                $sql = "SELECT * FROM transactions WHERE transact_type IN ('credit','debit') ORDER BY id DESC";
                                $result = mysqli_query($conn,$sql);
                                $result_check = mysqli_num_rows($result);
                                $i = $result_check;
                                if($result_check > 0){
                                while($data = mysqli_fetch_assoc($result)){
                                $sender = $data['sendername'];
                                $acctnam = $data['bname'];
                                $acctnumb = $data['bnumber'];
                                $bnkname = $data['bbank'];
                                $descrip = $data['description'];
                                $amount = $data['amount'];
                                $tdate = $data['transact_date'];
                                $stat = $data['status'];
                                $transtype = $data['transact_type'];
                                $transactid = $data['transactionid'];

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
                                            <span class="text-nowrap">'.$transactid.'</span>
                                        </div>
                                    </td>
                                    <td class="table__td text-grey">
                                        <div class="d-flex align-items-center">
                                            <span class="text-nowrap">'.$sender.'</span>
                                        </div>
                                    </td>
                                    <td class="table__td text-grey">
                                        <div class="d-flex align-items-center">
                                            <span class="text-nowrap">'.$transtype.'</span>
                                        </div>
                                    </td>
                                    <td class="table__td text-grey">
                                        <div class="d-flex align-items-center">
                                            <span class="text-nowrap">'.$amount.'</span>
                                        </div>
                                    </td>
                                    <td class="table__td text-grey">
                                        <div class="d-flex align-items-center">
                                            <span class="text-nowrap">'.$acctnam.'</span>
                                        </div>
                                    </td>
                                   
                                    <td class="table__td text-grey">
                                        <div class="d-flex align-items-center">
                                            <span class="text-nowrap">'.$acctnumb.'</span>
                                        </div>
                                    </td>
                                    <td class="table__td text-grey">
                                        <div class="d-flex align-items-center">
                                            <span class="text-nowrap">'.$descrip.'</span>
                                        </div>
                                    </td>
                                    <td class="table__td text-grey">
                                        <div class="d-flex align-items-center">
                                            <span class="text-nowrap">'.$stat.'</span>
                                        </div>
                                    </td>
                                    <td class="table__td text-grey">
                                        <div class="d-flex align-items-center">
                                            <span class="text-nowrap">'.$tdate.'</span>
                                        </div>
                                    </td>

                                    <td class="table__td text-grey">
                                    <form method="POST" action="edit_credit_debit.php">    
									  <input type="hidden" name="tid" value="'.$transactid .'">
                                        <button type="submit" name="update" class=" btn btn-success" type="button">
                                        Update</button>
                                        </form>
                                    </td>
                                    <td class="table__td text-grey">
                                    <form method="POST" action="../../scripts/deltnx.php">    
									  <input type="hidden" name="tid" value="'.$transactid .'"> 
                                        <button type="submit" name="deltnx" class="table__remove text-danger" type="button">
                                        <svg class="icon-icon-trash">
                                            <use xlink:href="#icon-trash"></use></svg></button>
                                            </form>
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