<?php 
include 'userhead.php';

if(isset($_GET['tid'])){
    $tid = mysqli_real_escape_string($conn,$_GET['tid']);

    $sql = "SELECT * FROM transactions WHERE transactionid='$tid'";
    $result = mysqli_query($conn,$sql);
    $result_check = mysqli_num_rows($result);
    if($result_check > 0){
        while($data = mysqli_fetch_assoc($result)){
            $tnum = $data['bnumber'];
            $tname = $data['bname'];
            $tbank = $data['bbank'];
            $txno = $data['transactionid'];
            $tamount = $data['amount'];
            $tdate = $data['transact_date'];
        }
    }	
}
?>

        <style>
        @media screen and (max-width:768px) {
            .title-name {
                font-size: 18px;
                font-weight: 500;
            }
            .invoice-w{
                    padding:10px !important;
            }
            /* .divholder{
                width: 100%;
                margin:0 auto;
            } */
        }
        /* .divholder{
                width: 90%;
                margin:0 auto;
            } */
        .ptext{
            font-size: 16px;
            font-weight: 500;
        }
        .logged-user-w{
                        display: none;
                    }
            .sucess-img img{
                width:70px;
                height: 50px;
            }
    </style>

        <main class="page-content">
            <div class="container">
                <div class="row">
                    <div class="divholder">  
                        <div class="col-12 modal-account"  >
                            <div class="modal__overlay" data-dismiss="modal"></div>
                            
                            <!-- <div class="modal__wrap"> -->
                            <div class="modal__window" id="invoice-w">
                                
                                <div class="modal__content">
                              
                                <a class="modal__close text-primary" id="d-pdf" style="top:30px; right:30px">
                                <svg class="icon-icon-print">
                        <use xlink:href="#icon-print"></use>
                      </svg>
                             </a>
                                <div class="modal__body" >
                                                <div class="modal-account__pane-header " style="background-color:rgb(217, 0, 0); padding:10px; margin:20px 20px 15px">
                                                            <h4 style="color: #ffffff;font-size:18px">Download Receipt:</h4>
                                                        </div>
                                               
                                                    
                                                <div class="modal-account__right tab-content">
                                                    <div class="modal-account__pane tab-pane show active" id="accountDetails"> 
                                                    <div class="sucess-img" style=" text-align:center;">
                                            <img id="pdf-img" src="img/content/done-new.gif" alt="success" width="85" height="60">
                                            <p style="font-size: 12px">Transfer Confirmation:</p>
                                        </div>
                                        <h6 class="pl-2">Description of Transaction:</h6>
                <div class=" scrollbar-thin scrollbar-visible" data-simplebar>
                            <table class="table table--lines table--groups ">
                                <!-- <colgroup>
                                    <col class="colgroup-1">
                                        <col class="colgroup-2">
                                            <col>
                                                <col>
                                                    <col>
                                </colgroup> -->
                                <thead class="table__header">
                                    <!-- <tr class="table__header-row">
                                        <th class="text-center"><span>BANK</span>
                                        </th>
                                        <th class="text-center"><span>AMOUNT($)</span>
                                        </th>
                                    </tr> -->
                                </thead>
                                <div class="divider" style="border:1px solid #959491"></div>
                                <tbody>
                                    <tr class="table__row">
                                        <td class="pl-2 table__td">
                                            <div class=""><span class="">From Account: <?= ($acctnumber) ? $acctnumber : ""  ?></span>
                                            </div>
                                        </td>
                                        <td class="table__td">To</td>
                                        <td class="table__td text-right pr-2"><?= ($tname) ? $tname : " "?> - <?= ($tnum) ? $tnum :" " ?></td>
                                    </tr>
                                    <tr class="table__row">
                                        <td class="pl-2 table__td">
                                            <div class=""><span class="">Bank Name: <?= ($tbank) ? $tbank : " " ?></span>
                                            </div>
                                        </td>
                                        <td class="table__td">|</td>
                                        <td class="table__td text-right pr-2">Ref: <?= ($txno) ? $txno : " " ?></td>
                                    </tr>
                                    <tr class="table__row">
                                        <td class="pl-2 table__td" style="border-bottom:2px solid #959491">
                                            <div class=""><span class="">Amount Sent: <?= $currency.$tamount ?></span>
                                            </div>
                                        </td>
                                        <td class="table__td" style="border-bottom:2px solid #959491">|</td>
                                        <td class="table__td text-right pr-2" style="border-bottom:2px solid #959491">Transfer Date: <?= $tdate ?></td>
                                    </tr>
                                   
                                </tbody>
                                
                                <tfoot >
                                        <tr class="table__row">
                                            <td class="pl-2" style="font-weight:400; font-size:20px">Balance</td>
                                            <td class="text-right pr-2" style="font-weight:400; font-size:20px" colspan="2"><?php if(!empty($currency)){ echo $currency; }else{ echo "$"; }?><?= !empty($acctbal) ? number_format($acctbal) : '0'; ?>.00</td>
                                        </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="terms" style="margin:10px auto">
                                            <div class="terms-header" style="font-size:14px; font-weight:300">Faster payment</div>
                                            <p class="terms-content" style="font-size:12px; color:#959491; font-weight:300">Thank you for making a trasfer from your cooperate account. Please be advised your transfer has been executed. And it will take 3-5 business days for funds to arrive at the destination account.</p>
                                        </div>
                        <div class="card-order__footer-total">
                            <div class="card__container p-0">
                                <div class="row gutter-bottom-sm justify-content-end">
                                    <div class="card-order__footer-submit col-12 col-sm text-center">
                                        <a href="index.php" class="my-btn" type="reset"><span class="button__text">Back To Dashboard</span>
                                            </a>
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
    <script src="js/photoswipe/photoswipe-lightbox.esm.min.js" type="module"></script>
    <script src="js/photoswipe/photoswipe.esm.min.js" type="module"></script>
    <script src="js/gsap/gsap.min.js"></script>
    <script src="js/gsap/ScrollToPlugin.min.js"></script>
    <script src="js/gsap/ScrollTrigger.min.js"></script>
    <script src="js/vendor.min.js"></script>
    <script src="js/common.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
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
    var success_icon = document.querySelector('#pdf-img');
     d_pdf.onclick = function (e) {
         e.preventDefault();
         success_icon.style.width = "60px";
         success_icon.style.height = "60px";
         document.querySelector('#pdf-img').src="img/content/success-icon-1.jpg";
         setTimeout(function(){ CreatePDFfromHTML(); }, 1000);
         
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