<?php

	include 'db.php';
	if(isset($_POST['updateuser'])){
		$fname = mysqli_real_escape_string($conn,$_POST['fname']);
        $mname = mysqli_real_escape_string($conn,$_POST['mname']);
        $username = mysqli_real_escape_string($conn,$_POST['uname']);
        $acctnum = mysqli_real_escape_string($conn,$_POST['acctnum']);
        $password = mysqli_real_escape_string($conn,$_POST['pword']);
        $pin = mysqli_real_escape_string($conn,$_POST['pin']);
        $phone = mysqli_real_escape_string($conn,$_POST['phone']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $occupation = mysqli_real_escape_string($conn,$_POST['occupation']);
        $birth = mysqli_real_escape_string($conn,$_POST['dob']);
        $marital = mysqli_real_escape_string($conn,$_POST['m_status']);
        $gender = mysqli_real_escape_string($conn,$_POST['gender']);
        $acctbal = mysqli_real_escape_string($conn,$_POST['acctbal']);
        $tlimit = mysqli_real_escape_string($conn,$_POST['tlimit']);
        $tac = mysqli_real_escape_string($conn,$_POST['tac']);
        $tax = mysqli_real_escape_string($conn,$_POST['tax']);
        $country = mysqli_real_escape_string($conn,$_POST['country']);
        $addr = mysqli_real_escape_string($conn,$_POST['addr']);
        $accttype = mysqli_real_escape_string($conn,$_POST['accttype']);           
        $currency = mysqli_real_escape_string($conn,$_POST['currency']);

        $uid = $_POST['uid'];

		// IMAGE 
        $sql = "UPDATE users

        SET acctname ='$fname',midname='$mname',username='$username',acctnumber='$acctnum',password='$password',pin='$pin',phone='$phone',email='$email',occupation='$occupation',birth ='$birth',marital='$marital',gender='$gender',acctbal='$acctbal',tlimit='$tlimit',tac='$tac',tax='$tax',country='$country',addrs='$addr',accttype='$accttype',currency='$currency'

        WHERE uid = '$uid'
        ";
        mysqli_query($conn,$sql);
        header("Location:../account/admin/edit_account.php?updated&uid=".$uid);
        exit();

        }else{
            $error = "Sorry, we could not update user details...";
            header("Location:../account/admin/edit_account.php?error=".$error."&uid=".$uid);
            exit();
        }

   