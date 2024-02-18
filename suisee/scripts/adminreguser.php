<?php
    include 'db.php';
            if(isset($_POST['userreg'])){
                $fname = mysqli_real_escape_string($conn,$_POST['fname']);
                $lname = mysqli_real_escape_string($conn,$_POST['lname']);
                $acctname = $fname.' '.$lname;
                isset($_POST['mname']) ? $mname = mysqli_real_escape_string($conn,$_POST['mname']) : $mname = "-";
                isset($_POST['uname']) ? $username = mysqli_real_escape_string($conn,$_POST['uname']) : $username = "-";
                $password = mysqli_real_escape_string($conn,$_POST['pword']);
                isset($_POST['phone']) ? $phone = mysqli_real_escape_string($conn,$_POST['phone']) : $phone = "-";
                $email = mysqli_real_escape_string($conn,$_POST['email']);
                isset($_POST['occupation']) ? $occupation = mysqli_real_escape_string($conn,$_POST['occupation']) : $occupation = "-";
                isset($_POST['dob']) ? $birth = mysqli_real_escape_string($conn,$_POST['dob']) : $birth = "-";
                isset($_POST['m_status']) ? $marital = mysqli_real_escape_string($conn,$_POST['m_status']) : $marital = "-";
                $gender = mysqli_real_escape_string($conn,$_POST['gender']);
                $country = mysqli_real_escape_string($conn,$_POST['country']);
                isset($_POST['addr']) ? $addr = mysqli_real_escape_string($conn,$_POST['addr']) : $addr = "-";
                $accttype = mysqli_real_escape_string($conn,$_POST['accttype']);           
                $currency = mysqli_real_escape_string($conn,$_POST['currency']);
                
                $acctnumber = rand(2000000000,4000000000);
                $encrpt = md5($email.time());
                $uid ="us".substr($encrpt,0,2).substr($encrpt,-2,2);
                $tac=rand(10000,50000);
                $tax=rand(30000,70000);
                $pin=rand(100000,900000);
                $acctbal = 0;
                $code = 'ACTIVE';
                $status = 'Inactive';
                $regdate = date('Y-m-d H:i:s');

                //Card
                $firstno = 5200;
                $secondno = "XXXX";
                $thirdno = "XXXX";
                $forthno = "XXXX";
                $expire = '00/00';
                $cardcvv = '123';
                $cardpin=rand(100000,988787);
                $cardtype = "visa";
                
           
                // IMAGE 
                $img = $_FILES['file_upload']['name'];
        
            if(!empty($img)){
                $target = "../account/images/".basename($_FILES['file_upload']['name']);
                $fileType = strtolower(pathinfo($target, PATHINFO_EXTENSION));
                $fileSize = $_FILES['file_upload']['size'];
                $returned_val = validateImageUpload($target, $fileType, $fileSize);
                if($target == $returned_val){ 
                    if(!filter_var($email,FILTER_SANITIZE_EMAIL)){
                        header ("Location:../account/admin/new_account.php?invalidemail");
                        exit();
                    }
                        $sql = "SELECT * FROM users WHERE email='$email';";
                        $result = mysqli_query($conn,$sql);
                        $result_check = mysqli_num_rows($result);
                        if($result_check == 1){
                            header ("Location:../account/admin/new_account.php?uidtaken");
                            exit();
                        }else{
        
                $sql ="INSERT INTO users (acctname,midname,username,acctnumber,accttype,acctbal,currency,tac,tax,btcwallet,phone,email,password,pin,birth,gender,occupation,marital,country,addrs,uid,userimage,status,code,regdate) VALUES ('$acctname','$mname','$username','$acctnumber','$accttype','$acctbal','$currency','$tac','$tax','','$phone','$email','$password','$pin','$birth','$gender','$occupation','$marital','$country','$addr','$uid','$img','$status','$code','$regdate')";
        
                move_uploaded_file($_FILES['file_upload']['tmp_name'], $target);
                if(!mysqli_query($conn,$sql)){
                    die("Error: ".mysqli_error($conn));
                    exit;
                }

                $sql ="INSERT INTO cards (acctname,firstno,secondno,thirdno,forthno,expire,cardcvv,cardpin,cardtype,cardoption,uid,created_at) VALUES ('$acctname','$firstno','$secondno','$thirdno','$forthno','$expire','$cardcvv','$cardpin','$cardtype','','$uid','$regdate')";
                mysqli_query($conn,$sql);

                //Mail to user on successful registration

                header("Location:../account/admin/new_account.php?regsuc");
                exit();
                }
                }else{
                    $error = $returned_val;
                    header("Location:../account/admin/new_account.php?regerror=".$error);
                    exit();
                }
                }else{
                if(!filter_var($email,FILTER_SANITIZE_EMAIL)){
                    header ("Location:../account/admin/new_account.php?invalidemail");
                    exit();
                }
                    $sql = "SELECT * FROM users WHERE email='$email';";
                    $result = mysqli_query($conn,$sql);
                    $result_check = mysqli_num_rows($result);
        
                    if($result_check == 1){
                        header ("Location:../account/admin/new_account.php?uidtaken");
                        exit();
                    }else{
                    $sql ="INSERT INTO users (acctname,midname,username,acctnumber,accttype,acctbal,currency,tac,tax,btcwallet,phone,email,password,pin,birth,gender,occupation,marital,country,addrs,uid,userimage,status,code,regdate) VALUES ('$acctname','$mname','$username','$acctnumber','$accttype','$acctbal','$currency','$tac','$tax','','$phone','$email','$password','$pin','$birth','$gender','$occupation','$marital','$country','$addr','$uid','$img','$status','$code','$regdate')";
                    if(!mysqli_query($conn,$sql)){
                        die("Error: ".mysqli_error($conn));
                        exit;
                    }

                    $sql ="INSERT INTO cards (acctname,firstno,secondno,thirdno,forthno,expire,cardcvv,cardpin,cardtype,cardoption,uid,created_at) VALUES ('$acctname','$firstno','$secondno','$thirdno','$forthno','$expire','$cardcvv','$cardpin','$cardtype','','$uid','$regdate')";
                    mysqli_query($conn,$sql);

                    //Mail to user on sucessful registration

                    header("Location:../account/admin/new_account.php?regsuc");
                    exit();
                }
                }
            }

             //standard image validation
     function validateImageUpload($file,$fileExe,$fileSize){
        $exeArray = array("jpg","png","jpeg","gif");
        if(file_exists($file)){
            unlink($file);
        }
            if(in_array($fileExe,$exeArray)){
                if($fileSize < 2097152){
                    $message = $file;
                }else{
                    $message = "File size too large, Must be exactly 2 MB";
                }
            }else{
                $message = "File format not allowed, please choose a jpg or png or jpeg or gif file.";
            }
            return $message;
    }

    ?>