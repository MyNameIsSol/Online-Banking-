<?php

	include 'db.php';
	if(isset($_POST['updatetrans'])){
		$sender = mysqli_real_escape_string($conn,$_POST['sender']);
        $senderemail = mysqli_real_escape_string($conn,$_POST['senderemail']);
        $senderacctnum = mysqli_real_escape_string($conn,$_POST['senderacctnum']);
        $bname = mysqli_real_escape_string($conn,$_POST['bname']);
        $bemail = mysqli_real_escape_string($conn,$_POST['bemail']);
        $rtn = mysqli_real_escape_string($conn,$_POST['rtn']);
        $bnumber = mysqli_real_escape_string($conn,$_POST['bnumber']);
        $bbank = mysqli_real_escape_string($conn,$_POST['bbank']);
        $amount = mysqli_real_escape_string($conn,$_POST['amount']);
        $descrip = mysqli_real_escape_string($conn,$_POST['descrip']);
        $status = mysqli_real_escape_string($conn,$_POST['status']);
        $tdate = mysqli_real_escape_string($conn,$_POST['date']);
        $tid = $_POST['tid'];

        if($status == "Pending"){
            //send pending mail to client
        }elseif($status == "Processing"){
            //send processing mail to client
        }elseif($status == "Successful"){
            //send successful mail to client
        }elseif($status == "Cancelled"){
            //send cancelled mail to client
        }elseif($status == "Failed"){
            //send failed mail to client
        }


        $sql = "UPDATE transactions

        SET sendername ='$sender',bname='$bname',bemail='$bemail',rtn='$rtn',bnumber='$bnumber',bbank='$bbank',amount='$amount',description='$descrip',status ='$status',transact_date='$tdate'

        WHERE transactionid = '$tid'
        ";
        mysqli_query($conn,$sql);
        header("Location:../account/admin/edit_transfers.php?updated&tid=".$tid);
        exit();

        }else{
            $error = "Sorry, we could not update user transfer...";
            header("Location:../account/admin/edit_transfers.php?error=".$error."&tid=".$tid);
            exit();
        }
