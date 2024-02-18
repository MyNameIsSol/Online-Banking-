<?php
include 'db.php';
   
if(isset($_POST['updatecard'])){
    $uid=mysqli_real_escape_string($conn,$_POST['uid']);
    $requestid=mysqli_real_escape_string($conn,$_POST['requestid']);
	$email=mysqli_real_escape_string($conn,$_POST['email']);
    $firstno=mysqli_real_escape_string($conn,$_POST['firstno']);
    $secondno=mysqli_real_escape_string($conn,$_POST['secondno']);
    $thirdno=mysqli_real_escape_string($conn,$_POST['thirdno']);
    $forthno=mysqli_real_escape_string($conn,$_POST['forthno']);
    $cardtype=mysqli_real_escape_string($conn,$_POST['cardtype']);
    $cardoption=mysqli_real_escape_string($conn,$_POST['cardoption']);
    $cardstatus=mysqli_real_escape_string($conn,$_POST['cardstatus']);
    $cardcvv=mysqli_real_escape_string($conn,$_POST['cardcvv']);
    $cardpin=mysqli_real_escape_string($conn,$_POST['cardpin']);
    $cardexp=$_POST['cardexp'];

	
	$status="Successful";
	
	$sql = "SELECT * FROM cardrequests WHERE uid='$uid'";
	$result= mysqli_query($conn,$sql);
	$result_checker= mysqli_num_rows($result);
	
	if($result_checker > 0){
	// while($data = mysqli_fetch_assoc($result)){
        while($data = mysqli_fetch_assoc($result)){
            $acctnumbe = $data['acctname'];
         }

    $sql = "UPDATE cardrequests
    SET status='$status'
    WHERE requestid = '$requestid'";
	if(!mysqli_query($conn,$sql)){
        die("Error".mysqli_error($conn));
        exit;
    }

    $sql = "UPDATE cards
    SET firstno='$firstno',secondno='$secondno',thirdno='$thirdno',forthno='$forthno',cardtype='$cardtype',cardoption='$cardoption',cardcvv='$cardcvv',cardpin='$cardpin',expire='$cardexp'
    WHERE uid = '$uid'";
	if(!mysqli_query($conn,$sql)){
        die("Error".mysqli_error($conn));
        exit;
    }

         //send card mail to user

           $msg = "card request have been sent";
header("Location:../account/admin/grant_card.php?updated&tid=".$requestid);
exit;
}
}else{
    header("Location:../account/admin/grant_card.php");
    exit();
}
    ?>            
	