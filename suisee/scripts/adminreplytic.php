<?php
include 'db.php';
    if(isset($_POST['reply'])){
        $tid = mysqli_real_escape_string($conn,$_POST['tid']);
        $uid = mysqli_real_escape_string($conn,$_POST['uid']);
        $sql = "SELECT * FROM users WHERE uid ='$uid'";
        $result = mysqli_query($conn,$sql);
        $result_checker = mysqli_num_rows($result);
        if($result_checker > 0){
            while($data = mysqli_fetch_assoc($result)){
                $acctname = $data['acctname'];
                $email = $data['email'];
            }
        }

        $support = $_POST['support'];
        $account = $_POST['acctname'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        


    //send ticket reply mail
        header("Location:../account/admin/reply_ticket.php?suc&tid=".$tid);
        exit();
          
    }else{
        $error = "sorry! Your transaction was terminated. try again...";
		header("Location:../account/admin/reply_ticket.php?error=".$error."&tid=".$tid);
		exit();
    }

?>