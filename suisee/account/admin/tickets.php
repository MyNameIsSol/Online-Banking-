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

<?php
 $url="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if(strpos($url, 'tkdel') == true){
    echo '<script>alert("Success! Selected ticket have been deleted");</script>';
}
if(strpos($url, 'tapproved') == true){
    echo '<script>alert("Success! User deposit has been approved");</script>';
}
if(strpos($url, 'deperror') == true){
    echo '<script>alert("'.$_GET["deperror"].'");</script>';
}
?>

        <main class="page-content">
            <div class="container">
            <div class="modal-account__pane-header col-12 " style="background-color:rgb(217, 0, 0); padding:10px;">
                    <h4 style="color: #ffffff; font-size:16px">View All Opened Tickets:<span style="font-size:15px; font-weight:400; margin-left:25px"> </span></h4>
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
                                                <span style="color: rgb(217, 0, 0); font-weight:600">Tickets Opened</span>
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
                                    <th><span>Account Name</span>
                                    </th>
                                    <th><span>Email</span>
                                    </th>
                                    <th><span>Ticket Type</span>
                                    </th>
                                    <th><span>Amount</span>
                                    </th>
                                    <th><span>Proof</span>
                                    </th>
                                    <th><span>Department (to)</span>
                                    </th>
                                    <th><span>Subject</span>
                                    </th>
                                    <th><span>Message</span>
                                    </th>
                                    <th><span>STATUS</span>
                                    </th>
                                    <th><span>Date</span>
                                    </th>
                                    <th colspan="3"><span>Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody >
                            <?php
                                $sql = "SELECT * FROM ticket ORDER BY id DESC";
                                $result = mysqli_query($conn,$sql);
                                $result_check = mysqli_num_rows($result);
                                $i = $result_check;
                                if($result_check > 0){
                                while($data = mysqli_fetch_assoc($result)){
                                $uid  = $data['uid'];
                                $ticketid  = $data['ticketid'];
                                $acctname = $data['acctname'];
                                $email = $data['email'];
                                $ticket_type = $data['ticket_type'];
                                $amount = $data['amount'];
                                $proof = $data['proof'];
                                $department = $data['department'];
                                $subject = $data['subject'];
                                $message = $data['message'];
                                $stat = $data['status'];
                                $rdate = $data['request_date'];

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
                                            <span class="text-nowrap">'.$ticketid.'</span>
                                        </div>
                                    </td>
                                    <td class="table__td text-grey">
                                        <div class="d-flex align-items-center">
                                            <span class="text-nowrap">'.$acctname.'</span>
                                        </div>
                                    </td>
                                    <td class="table__td text-grey">
                                        <div class="d-flex align-items-center">
                                            <span class="text-nowrap">'.$email.'</span>
                                        </div>
                                    </td>
                                    <td class="table__td text-grey">
                                        <div class="d-flex align-items-center">
                                            <span class="text-nowrap">'.$ticket_type.'</span>
                                        </div>
                                    </td>
                                    <td class="table__td text-grey">
                                        <div class="d-flex align-items-center">
                                            <span class="text-nowrap">'.$amount.'</span>
                                        </div>
                                    </td>';
                                    if(strpos($ticket_type, 'transfer') == true){ 
                                    echo'<td class="table__td text-grey">
                                    <div class="d-flex align-items-center">
                                        <span class="text-nowrap"><a class="text-danger" href="../user/payment/'.$proof.'"><img src="../user/payment/'.$proof.'" alt="view payment proof"></a></span>
                                    </div>';
                                    }else{
                                     echo '<td class="table__td text-grey">
                                     <div class="d-flex align-items-center">
                                         <span class="text-nowrap">Not Required</span>
                                     </div>
                                 </td>';
                                    }
                                    echo '</td>
                                    <td class="table__td text-grey">
                                        <div class="d-flex align-items-center">
                                            <span class="text-nowrap">'.$department.'</span>
                                        </div>
                                    </td>
                                    <td class="table__td text-grey">
                                        <div class="d-flex align-items-center">
                                            <span class="text-nowrap">'.$subject.'</span>
                                        </div>
                                    </td>
                                   
                                    <td class="table__td text-grey">
                                        <div class="d-flex align-items-center">
                                            <span class="text-nowrap">'.$message.'</span>
                                        </div>
                                    </td>
                                    <td class="table__td text-grey">
                                        <div class="d-flex align-items-center">
                                            <span class="text-nowrap">'.$stat.'</span>
                                        </div>
                                    </td>
                                    <td class="table__td text-grey">
                                        <div class="d-flex align-items-center">
                                            <span class="text-nowrap">'.$rdate.'</span>
                                        </div>
                                    </td>

                                    <td class="table__td text-grey">
                                    <form method="POST" action="reply_ticket.php">    
									  <input type="hidden" name="tid" value="'.$ticketid.'">
                                        <button type="submit" class="btn btn-success" >
                                        Reply</button>
                                        </form>
                                    </td>';
                                    if($stat == "Pending"){
                                    if($ticket_type == 'Card Request'){
                                    echo '<td class="table__td text-grey">
                                    <form method="POST" action="grant_card.php">    
									  <input type="hidden" name="tid" value="'.$ticketid.'">
                                        <button type="submit" class="btn btn-primary" >
                                        Process Card</button>
                                        </form>
                                    </td>';
                                    }else if(strpos($ticket_type, 'transfer') == true){ 
                                        echo '<td class="table__td text-grey">
                                    <form method="POST" action="../../scripts/approvedeposit.php">    
									  <input type="hidden" name="tid" value="'.$ticketid.'">
                                      <input type="hidden" name="uid" value="'.$uid.'">
                                        <button type="submit" name="approvedep" class="btn btn-primary" >
                                        Approve Deposit</button>
                                        </form>
                                    </td>'; 
                                    }
                                }else{
                                    echo '<td class="table__td text-grey">
                                        <button type="button" class="btn btn-danger" >
                                        Deposit Approved</button>
                                    </td>'; 
                                }
                                   echo '<td class="table__td text-grey">
                                    <form method="POST" action="../../scripts/delticket.php">    
									  <input type="hidden" name="tid" value="'.$ticketid.'"> 
                                        <button type="submit" name="deltnx" class="table__remove text-danger" >
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