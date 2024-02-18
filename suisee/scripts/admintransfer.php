<?php
include 'db.php';
    if(isset($_POST['transfer'])){

        $bname = mysqli_real_escape_string($conn,$_POST['bname']);
        $bnacct = mysqli_real_escape_string($conn,$_POST['bnacct']);
        $_POST['bbank'] ? $bbank = mysqli_real_escape_string($conn,$_POST['bbank']) : $bbank ="Clickstate Bank";
        $bemail = mysqli_real_escape_string($conn,$_POST['bemail']);
        $_POST['bcountry'] ? $bcountry = mysqli_real_escape_string($conn,$_POST['bcountry']) : $bcountry ="";
        $_POST['brtn'] ? $brtn = mysqli_real_escape_string($conn,$_POST['brtn']) : $brtn ="";
        $amount = mysqli_real_escape_string($conn,$_POST['amount']);
        $_POST['swift'] ? $swift = mysqli_real_escape_string($conn,$_POST['swift']) : $swift ="";
        $comment = mysqli_real_escape_string($conn,$_POST['descrip']);
        $uid = mysqli_real_escape_string($conn,$_POST['uid']);
        $_POST['date'] ? $date = mysqli_real_escape_string($conn,$_POST['date']) : $date = date('Y-m-d H:i:s');
        $_POST['status'] ? $status = mysqli_real_escape_string($conn,$_POST['status']) : $status ="Pending";

        $transferid="TX".uniqid();
        $transtype = "transfer";
        $descrip = "Fund Transfer of $".$amount." to Account ".$bnacct." ( ".$bname." ) Bank: ".$bbank;


        $sql = "SELECT * FROM users WHERE acctnumber ='$bnacct'";
        $result = mysqli_query($conn,$sql);
        $result_checker = mysqli_num_rows($result);
        if($result_checker > 0){
          while($data = mysqli_fetch_assoc($result)){
              $acctba = $data['acctbal'];
              $emai = $data['email'];
              $acctnam = $data['acctname'];
              $acctnum = $data['acctnumber'];
              $finalacctba = (float)$acctba + (float)$amount;
              $sql = "UPDATE users
              SET acctbal='$finalacctba'
              WHERE acctnumber = '$bnacct'
                  ";
              mysqli_query($conn,$sql);
           
          }
        }
        
        $sql = "SELECT * FROM users WHERE uid ='$uid'";
        $result = mysqli_query($conn,$sql);
        $result_checker = mysqli_num_rows($result);
        
        if($result_checker > 0){
            while($data = mysqli_fetch_assoc($result)){
                $acctbal = (float)$data['acctbal'];
                $acctname = $data['acctname'];
                $email = $data['email'];
                $acctnumber = $data['acctnumber'];
               
                if($acctbal < (float)$amount){
                    header("Location:../account/admin/add_transfer.php?lowbal");
                 exit();
                }
                $finalacctbal = $acctbal - (float)$amount;

                // updating the accountbal after transfer is completed
                $sql = "UPDATE users
				SET acctbal='$finalacctbal'
				WHERE uid = '$uid'
		        ";
        mysqli_query($conn,$sql);

        // updating transaction history
        $sql="INSERT INTO transactions (sendername,senderemail,senderacctnum,bname,bnumber,bbank,description,amount,transactionid,transact_date,bemail,country,rtn,status,initiator_id,transact_type,comment) 
                          VALUES ('$acctname','$email','$acctnumber','$bname','$bnacct','$bbank','$descrip','$amount','$transferid','$date','$email','$country','$brtn','$status','$uid','$transtype','$comment')";
        mysqli_query($conn,$sql);
        //send transfer successful mail
                 $msg = "Transaction Successful";
                 header("Location:../account/admin/add_transfer.php?suc");
                 exit();
            } 
        }
    }else{
        $error = "sorry! Your transfer was terminated. try again...";
		header("Location:../account/admin/add_transfer.php??error=".$error);
		exit();
    }

?>