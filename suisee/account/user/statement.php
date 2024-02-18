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
        .statuss{
            display: flex;
            align-items:center; 
            margin-bottom:0;
            
        }

        .status_pend{
            display:inline-block;
            margin-right:4px;
            border-radius:10px;
            width:10px;
            height:10px;
            background-color:#FF8A48;
        }
        .status_process{
            display:inline-block;
            margin-right:4px;
            border-radius:10px;
            width:10px;
            height:10px;
            background-color:#F7C427;
        }
        .status_suc{
            display:inline-block;
            margin-right:4px;
            border-radius:10px;
            width:10px;
            height:10px;
            background-color:#09B66D;
        }
        .status_can{
            display:inline-block;
            margin-right:4px;
            border-radius:10px;
            width:10px;
            height:10px;
            background-color:#FF3D57;
        }
        .status_failed{
            display:inline-block;
            margin-right:4px;
            border-radius:10px;
            width:10px;
            height:10px;
            background-color:#BA2931;
        }
        
        
    </style>

<?php
    $url="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strpos($url, 'txdel') == true){ 
      echo '<script>alert("Transaction history deleted!");</script>';
    }
?>

        <main class="page-content" style="margin-top:-20px">
            <div class="container">
                <div class="row">
                    <div class="col-12 ">  
                        <div class=" modal-account"  >
                            <div class="modal__overlay" data-dismiss="modal"></div>
                            <!-- <div class="modal__wrap"> -->
                            <div class="modal__window" id="invoice-w">
                                <div class="modal__content">
                                <!-- <button class="modal__close" data-dismiss="modal">
                        <svg class="icon-icon-cross">
                            <use xlink:href="#icon-cross"></use>
                        </svg>
                    </button> -->  
                                <a class="modal__close text-primary" id="d-pdf">
                                <svg class="icon-icon-print">
                        <use xlink:href="#icon-print"></use>
                      </svg>
                             </a>
                                <div class="modal__body">
                                                <div class="modal-account__pane-header " style="background-color:rgb(217, 0, 0); padding:10px;">
                                                            <h4 style="color: #ffffff; font-size: 18px;">Account Statement:<span style="font-size:15px; font-weight:400; margin-left:25px"> Download</span></h4>
                                                        </div>
                                               
                                                    <h6 class="ml-4 text-danger">Transfer history:</h6>
                                                <div class="modal-account__right tab-content">
                                                    <div class="modal-account__pane tab-pane show active" id="accountDetails"> 
                                                       
  
                <div class="card-order__product scrollbar-thin scrollbar-visible" data-simplebar>
                            <table class="table table--lines table--groups table--striped">
                                <colgroup>
                                    <col class="colgroup-1">
                                        <col class="colgroup-2">
                                            <col>
                                                <col>
                                                    <col>
                                </colgroup>
                                <thead class="table__header">
                                    <tr class="table__header-row">
                                        <th><span class="text-nowrap">Ref No.</span>
                                        </th>
                                        <th class="text-center"><span>Tnx Type</span>
                                        </th>
                                        <th class="text-center"><span>Amount(<?= isset($currency) ? $currency : ""; ?>)</span>
                                        </th>
                                        <th class="text-center"><span>Bank Name</span>
                                        </th>
                                        <th class="text-center"><span>Acccount Name</span>
                                        </th>
                                        <th class="text-center"><span>Account Number</span>
                                        </th>
                                        <th class="text-center"><span>Description</span>
                                        </th>
                                        <th class="text-center"><span>STATUS</span>
                                        </th>
                                        <th class="text-center"><span>Date</span>
                                        </th>
                                        <th class="table__actions"></th>
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
                                    $amount = $data['amount'];
                                    $tdate = $data['transact_date'];
                                    $stat = $data['status'];
                                    $transtype = $data['transact_type'];
                                    $transactid = $data['transactionid'];

                                    echo'<tr class="table__row">
                                        <td class="table__td">'.$transactid.'</td>
                                        <td class="table__td text-center text-dark-theme">'.$transtype.'</td>
                                        <td class="table__td text-center">
                                        <div ><span class="text-dark-theme">'.$amount.'</span>
                                            </div>
                                        </td>
                                        <td class="table__td text-nowrap text-dark-theme">'.$bnkname.'</td>
                                        <td class="table__td text-nowrap text-dark-theme">'.$acctnam.'</td>
                                        <td class="table__td text-nowrap text-dark-theme">'.$acctnumb.'</td>
                                        <td class="table__td text-nowrap text-dark-theme">'.$descrip.'</td>';
                                        if($stat == "Pending"){
                                        echo '<td class="table__td "><h6 class="statuss"><span class="chart-tooltip-custom__marker">
                                        <span class="status_pend"></span></span><span class="chart-tooltip-custom__value">'.$stat.'</span></h6></td>';

                                        }elseif($stat == "Processing"){
                                        echo '<td class="table__td "><h6 class="statuss"><span class="chart-tooltip-custom__marker">
                                        <span class="status_process"></span></span><span class="chart-tooltip-custom__value">'.$stat.'</span></h6></td>';

                                        }elseif($stat == "Successful" || $stat == "Approved"){
                                        echo '<td class="table__td "><h6 class="statuss"><span class="chart-tooltip-custom__marker">
                                        <span class="status_suc"></span></span><span class="chart-tooltip-custom__value">'.$stat.'</span></h6></td>';

                                        }elseif($stat == "Cancelled"){
                                        echo '<td class="table__td "><h6 class="statuss"><span class="chart-tooltip-custom__marker">
                                        <span class="status_can"></span></span><span class="chart-tooltip-custom__value">'.$stat.'</span></h6></td>';

                                        }elseif($stat == "Failed"){
                                            echo '<td class="table__td "><h6 class="statuss"><span class="chart-tooltip-custom__marker">
                                            <span class="status_failed"></span></span><span class="chart-tooltip-custom__value">'.$stat.'</span></h6></td>';
    
                                        }else{
                                        echo '<td class="table__td "><h6 class="statuss"><span class="chart-tooltip-custom__marker">
                                        <span class="status_span"></span></span><span class="chart-tooltip-custom__value">Processing</span></h6></td>';
                                        }
                                        echo '<td class="table__td text-nowrap text-dark-theme">'.$tdate.'</td>';

                                        echo '<td class="table__td table__actions text-dark-theme"> <a href="../../scripts/deletetrans.php?id='.$transactid.'" class="table__remove text-danger" type="button">
                                                <svg class="icon-icon-trash"> <use xlink:href="#icon-trash"></use> </svg> </a>
                                        </td>';
                                    }
                                }else{
                                    echo "<p style='color:red; margin-left:20px; font-size:18px; margin-top:10px;'>No  Transactions</p>";
                                  }
          
                                ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-order__footer-total">
                            <div class="card__container">
                                <div class="row gutter-bottom-sm justify-content-end">
                                    <div class="card-order__footer-submit col-12 col-sm">
                                        <!-- <a href="index.php" class="button button--secondary" type="button"><span class="button__text">View Dashboard</span> -->
                                        <a href="index.php" class="my-btn" type="button"><span class="button__text">View Dashboard</span>
                                </a>
                                    </div>
                                    <div class="col-12 col-sm-auto">
                                        <ul class="card-order__total">
                                            <li class="card-order__total-item">
                                                <div class="card-order__total-title">Balance:</div>
                                                <div class="card-order__total-value"><?= $currency ?><?= isset($acctbal) ? number_format($acctbal) : ""; ?></div>
                                            </li>
                                            <li class="card-order__total-item">
                                                <div class="card-order__total-title">TAX(0%):</div>
                                                <div class="card-order__total-value"><?= $currency ?>0</div>
                                            </li>
                                            <li class="card-order__total-item">
                                                <div class="card-order__total-title">DISCOUNT:</div>
                                                <div class="card-order__total-value">20%</div>
                                            </li>
                                            <li class="card-order__total-item card-order__total-footer">
                                                <div class="card-order__total-title">Total Balance:</div>
                                                <div class="card-order__total-value"><?= $currency ?><?= isset($acctbal) ? number_format($acctbal) : ""; ?></div>
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
    <script src="js/common.js"></script>    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

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

<script>
    
    const d_pdf = document.querySelector('#d-pdf');
     d_pdf.onclick = function (e) {
         e.preventDefault();
         CreatePDFfromHTML();
     }
     //Create PDf from HTML...
     function CreatePDFfromHTML() {
         var HTML_Width = $("#invoice-w").width();
         var HTML_Height = $("#invoice-w").height();
         var top_left_margin = 10;
         var PDF_Width = HTML_Width + (top_left_margin * 2);
         var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
         var canvas_image_width = HTML_Width;
         var canvas_image_height = HTML_Height;

         var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;
         html2canvas($("#invoice-w")[0]).then(function (canvas) {
             var imgData = canvas.toDataURL("image/jpeg", 1.0);
             var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
             pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
             for (var i = 1; i <= totalPDFPages; i++) { 
                 pdf.addPage(PDF_Width, PDF_Height);
                 pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
             }
             pdf.save("Your_PDF_Name.pdf");
             // $("#invoice-w").hide();
         });
     }

</script>
</body>

</html>