<?php
include_once('phpmaile/PHPMailerAutoload.php');
    include 'db.php';
    $tbname = 'users';
    $tbcols = 'id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            acctname VARCHAR(225) NOT NULL,
            midname VARCHAR(225) NOT NULL,
            username VARCHAR(225) NOT NULL,
            acctnumber VARCHAR(22) NOT NULL,
            accttype VARCHAR(55) NOT NULL,
            acctbal VARCHAR(225) NOT NULL,
			      tlimit VARCHAR(225) NOT NULL,
            currency VARCHAR(22) NOT NULL,
            tac VARCHAR(22) NOT NULL,
            tax VARCHAR(22) NOT NULL,
            btcwallet VARCHAR(225) NOT NULL,
            phone VARCHAR(55) NOT NULL,
            email VARCHAR(225) NOT NULL,
            password VARCHAR(22) NOT NULL,
            pin VARCHAR(22) NOT NULL,
            birth VARCHAR(55) NOT NULL,
            gender VARCHAR(22) NOT NULL,
            occupation VARCHAR(55) NOT NULL,
            marital VARCHAR(55) NOT NULL,
            country VARCHAR(55) NOT NULL,
            addrs VARCHAR(225) NOT NULL,
            uid varchar(55) not null,
            userimage VARCHAR(225) NOT NULL,
            status VARCHAR(225) NOT NULL,
            code VARCHAR(225) NOT NULL,
            lastloginip VARCHAR(225) NOT NULL,
            lastlogindate VARCHAR(55) NOT NULL,
            currentloginip VARCHAR(225) NOT NULL,
            currentlogindate VARCHAR(55) NOT NULL,
            regdate VARCHAR(225) NOT NULL';
            
            $sql = "CREATE TABLE IF NOT EXISTS $tbname($tbcols)";
            mysqli_query($conn, $sql);
    
            $tbname = 'cards';
            $tbcols = 'id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                    acctname VARCHAR(225) NOT NULL,
                    firstno VARCHAR(22) NOT NULL,
                    secondno VARCHAR(22) NOT NULL,
                    thirdno VARCHAR(22) NOT NULL,
                    forthno VARCHAR(22) NOT NULL,
                    expire VARCHAR(22) NOT NULL,
                    cardcvv VARCHAR(22) NOT NULL,
                    cardpin VARCHAR(55) NOT NULL,
                    cardtype VARCHAR(55) NOT NULL,
                    cardoption VARCHAR(55) NOT NULL,
                    uid VARCHAR(22) NOT NULL,
                    created_at VARCHAR(55) NOT NULL';
                    
                    $sql = "CREATE TABLE IF NOT EXISTS $tbname($tbcols)";
                    mysqli_query($conn, $sql);  

            if(isset($_POST['userreg'])){
                $fname = mysqli_real_escape_string($conn,$_POST['fname']);
                $lname = mysqli_real_escape_string($conn,$_POST['lname']);
                $acctname = $fname.' '.$lname;
                $mname = mysqli_real_escape_string($conn,$_POST['mname']);
                $username = mysqli_real_escape_string($conn,$_POST['uname']);
                $password = mysqli_real_escape_string($conn,$_POST['pword']);
                $phone = mysqli_real_escape_string($conn,$_POST['phone']);
                $email = mysqli_real_escape_string($conn,$_POST['email']);
                $occupation = mysqli_real_escape_string($conn,$_POST['occupation']);
                $birth = mysqli_real_escape_string($conn,$_POST['dob']);
                $marital = mysqli_real_escape_string($conn,$_POST['m_status']);
                $gender = mysqli_real_escape_string($conn,$_POST['gender']);
                $country = mysqli_real_escape_string($conn,$_POST['country']);
                $addr = mysqli_real_escape_string($conn,$_POST['addr']);
                $accttype = mysqli_real_escape_string($conn,$_POST['accttype']);           
                $currency = mysqli_real_escape_string($conn,$_POST['currency']);
                
                $acctnumber = rand(2000000000,4000000000);
                $encrpt = md5($email.time());
                $uid ="us".substr($encrpt,0,2).substr($encrpt,-2,2);
                $tac=rand(10000,50000);
                $tax=rand(30000,70000);
                $pin=rand(100000,900000);
                $acctbal = 0;
                $status = 'Active';
                $code = 'ACTIVE';
                $regdate = date('Y-m-d H:i:s');
				$tlimit = 520000;

                //Card
                $firstno = 5230;
                $secondno = "XXXX";
                $thirdno = "XXXX";
                $forthno = "XXXX";
                $expire = '00/00';
                $cardcvv = '123';
                $cardpin=rand(1000,9887);
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
                        header ("Location:../account/signup/verify-registration.php?invalidemail");
                        exit();
                    }
                        $sql = "SELECT * FROM users WHERE email='$email';";
                        $result = mysqli_query($conn,$sql);
                        $result_check = mysqli_num_rows($result);
                        if($result_check == 1){
                            header ("Location:../account/signup/verify-registration.php?uidtaken");
                            exit();
                        }else{
        
                $sql ="INSERT INTO users (acctname,midname,username,acctnumber,accttype,acctbal,tlimit,currency,tac,tax,btcwallet,phone,email,password,pin,birth,gender,occupation,marital,country,addrs,uid,userimage,status,code,lastloginip,lastlogindate,currentloginip,currentlogindate,regdate) VALUES ('$acctname','$mname','$username','$acctnumber','$accttype','$acctbal','$tlimit','$currency','$tac','$tax','','$phone','$email','$password','$pin','$birth','$gender','$occupation','$marital','$country','$addr','$uid','$img','$status','$code','','','','','$regdate')";
        
                move_uploaded_file($_FILES['file_upload']['tmp_name'], $target);
                if(!mysqli_query($conn,$sql)){
                    die("Error: ".mysqli_error($conn));
                    exit;
                }

                $sql ="INSERT INTO cards (acctname,firstno,secondno,thirdno,forthno,expire,cardcvv,cardpin,cardtype,cardoption,uid,created_at) VALUES ('$acctname','$firstno','$secondno','$thirdno','$forthno','$expire','$cardcvv','$cardpin','$cardtype','','$uid','$regdate')";
                mysqli_query($conn,$sql);

                //Mail to user on successful registration
                        //from: site domain name
                        $site_domain = 'clickstateonline.com';
                        //from: sender name
                        $site_name = 'Clickstate';
                        //from: sender email
                        $sitesupport_email = "support@clickstateonline.com";
                        //to: receiver name
                        $receiver_name = $fname;
                        //to: receiver email
                        $receiver_email = $email;

                        $title = 'Welcome to click state online';
                        $mail = new PHPMailer(true);
                        // $mail->SMTPDebug = 2;
                        $mail->isSMTP();                                           
                        $mail->Host = 'clickstateonline.com';                 
                        $mail->SMTPAuth = true;                               
                        $mail->Username   = $sitesupport_email;         
                        $mail->Password   = 'click100%';                       
                        $mail->SMTPSecure  = 'tls'; 
                        $mail->SMTPOptions = array('ssl' => array('verify_peer' => false,
                                            'verify_peer_name'  => false,
                                            'allow_self_signed' => true));
                        $mail->Port       = 587;  

                      $mail->setFrom($sitesupport_email,$site_name);
                      $mail->addAddress($receiver_email);
                      $mail->addReplyTo($sitesupport_email,$site_name);

                      $mail->isHTML(true);
                      $mail->Subject=$title;
                      $mail->Body='<body style="background-color: #f3f5f7; margin: 0 !important; padding: 0 !important;">
                                
                      <!-- HIDDEN PREHEADER TEXT -->
                      <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: "Poppins", sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
                        
                      </div>

                      <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <!-- LOGO -->
                        <tr>
                          <td align="center" style="padding: 0px 10px 0px 10px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                              <tr>
                              <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 10px 10px 10px;">
                                <a href="#" target="_blank">
                                <img alt="" src="https://clickstateonline.com/images/clickstate_logo.png"  style="max-height: 240px; max-width: 70px;" border="0">
                                </a>
                              </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                        <!-- HERO -->
                        
                        <tr>
                          <td align="center" style="padding: 0px 10px 0px 10px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                              <tr>
                                <td bgcolor="#ffffff" align="left" valign="top" style="padding: 20px 20px 10px 10px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: "Poppins", sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 2px; line-height: 48px;">
                                  <p style="font-size: 14px; font-weight: 600; margin: 10px 13px;">Hello '.$receiver_name.',</p>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                        <!-- COPY BLOCK -->
                        <tr>
                          <td align="center" style="padding: 0px 10px 0px 10px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                              <!-- COPY -->
                              <tr>
                              <td bgcolor="#ffffff" align="left" style="padding: 10px 10px 20px 10px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                                    <p style="margin:10px 13px; font-size: 14px; color:green;">We are thrilled to welcome you to click state online! Thank you for choosing us for your '.$accttype.' account. We are excited to have you as part of our click state family.</p>
                              </td>
                              </tr>
                              
                              <!-- COPY -->
                              <tr>
                              <td bgcolor="#ffffff" align="left" style="padding: 10px 10px 20px 10px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                                <p style="margin: 10px 13px; font-size: 12px;">You can now <a href="https://www.clickstateonline.com/login.php">Login </a>to proceed.</p>
                              </td>
                              </tr>

                              <!-- COPY HEADING -->
                              <tr>
                              <td bgcolor="#ffffff" align="left" style="padding: 10px 10px 40px 10px; color: #111111; font-family: "Poppins", sans-serif; font-size: 14px; font-weight: 400; line-height: 25px;">
                                <h2 style="font-size: 13px; font-weight: 600; margin: 10px 13px; color:red;">Here are your login details to access your account:</h2>
                              </td>
                              </tr>
                              <!-- COPY -->
                              <tr>
                              <td bgcolor="#ffffff" align="center" style="padding: 10px 10px 20px 10px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                                <p style="margin: 10px 13px; font-size: 12px;">Account Number: '. $acctnumber .'</p>
                                <p style="margin: 10px 13px; font-size: 12px;">Password: '.$password.'</p>
                                          <p style="margin: 10px 13px; font-size: 12px;">Account Login Pin: '.$pin.'</p>
                                          <p style="margin: 10px 13px; font-size: 12px;">Available Balance: '.$currency.$acctbal.'</p>
                              </td>
                              <!-- COPY -->
                              <tr>
                              <td bgcolor="#ffffff" align="left" style="padding: 10px 10px 20px 10px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                                <p style="margin:10px 13px; font-size: 12px;">Warm regards,</p>
                              </td>
                              </tr>
                              
                              <!-- COPY -->
                              <tr>
                              <td bgcolor="#ffffff" align="left" style="padding: 10px 10px 40px 10px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                                <p style="margin:10px 13px; font-size: 12px;">From ' . $site_name . ' Online </p>
                              </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                        <!-- FOOTER -->
                        <tr>
                          <td align="center" style="padding: 0px 10px 50px 10px;">
                        
                          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                            
                          <!-- PERMISSION REMINDER -->
                          <tr>
                            <td bgcolor="#ffffff" align="left" style="padding: 10px 10px 10px 10px; color: #aaaaaa; font-family: "Poppins", sans-serif; font-size: 12px; font-weight: 400; line-height: 18px;">
                            <p style="margin:20px 13px; font-size: 12px;">For any questions, concerns, or assistance, our support team is here to help. You can reach us at <a href="mailto:support@clickstateonline.com" target="_blank" style="color: #4188FA; font-weight: 700;"> support@clickstateonline.com. </a> We aim to provide you with the best service and support, so don\'t hesitate to get in touch.</p>
                            </td>
                          </tr>
                          <tr>
                            <td bgcolor="#ffffff" align="left" style="padding: 10px 10px 10px 10px; color: #aaaaaa; font-family: "Poppins", sans-serif; font-size: 12px; font-weight: 400; line-height: 18px;">
                            <p style="margin:20px 13px; font-size: 12px;">Additionally, please remember to keep your account information safe and secure. Never share your login details with anyone.</a>.</p>
                            </td>
                          </tr>
                        <!-- COPYRIGHT -->
                          <tr>
                            <td align="center" style="padding: 50px 10px 10px 10px; color: #333333; font-family: "Poppins", sans-serif; font-size: 12px; font-weight: 400; line-height: 18px;">
                            <p style="margin: 70px 0 20px; font-size: 12px;">Copyright © Clickstate Online. All rights reserved.</p>
                            </td>
                          </tr>
                          </table>
                          </td>
                        </tr>
                      </table>
                      </body>';
                      $mail->send();
                header("Location:../login.php?regsuc");
                exit();
                }
                }else{
                    $error = $returned_val;
                    header("Location:../account/signup/verify-registration.php?regerror=".$error);
                    exit();
                }
                }else{
                if(!filter_var($email,FILTER_SANITIZE_EMAIL)){
                    header ("Location:../account/signup/verify-registration.php?invalidemail");
                    exit();
                }
                    $sql = "SELECT * FROM users WHERE email='$email';";
                    $result = mysqli_query($conn,$sql);
                    $result_check = mysqli_num_rows($result);
        
                    if($result_check == 1){
                        header ("Location:../account/signup/verify-registration.php?uidtaken");
                        exit();
                    }else{
                    $sql ="INSERT INTO users (acctname,midname,username,acctnumber,accttype,acctbal,tlimit,currency,tac,tax,btcwallet,phone,email,password,pin,birth,gender,occupation,marital,country,addrs,uid,userimage,status,code,lastloginip,lastlogindate,currentloginip,currentlogindate,regdate) VALUES ('$acctname','$mname','$username','$acctnumber','$accttype','$acctbal','$tlimit','$currency','$tac','$tax','','$phone','$email','$password','$pin','$birth','$gender','$occupation','$marital','$country','$addr','$uid','$img','$status','$code','','','','','$regdate')";
                    if(!mysqli_query($conn,$sql)){
                        die("Error: ".mysqli_error($conn));
                        exit;
                    }

                    $sql ="INSERT INTO cards (acctname,firstno,secondno,thirdno,forthno,expire,cardcvv,cardpin,cardtype,cardoption,uid,created_at) VALUES ('$acctname','$firstno','$secondno','$thirdno','$forthno','$expire','$cardcvv','$cardpin','$cardtype','','$uid','$regdate')";
                    mysqli_query($conn,$sql);

                   //Mail to user on successful registration
                        //from: site domain name
                        $site_domain = 'clickstateonline.com';
                        //from: sender name
                        $site_name = 'Clickstate';
                        //from: sender email
                        $sitesupport_email = "support@clickstateonline.com";
                        //to: receiver name
                        $receiver_name = $fname;
                        //to: receiver email
                        $receiver_email = $email;

                        $title = 'Welcome to click state online';
                        $mail = new PHPMailer(true);
                        // $mail->SMTPDebug = 2;
                        $mail->isSMTP();                                           
                        $mail->Host = 'clickstateonline.com';                 
                        $mail->SMTPAuth = true;                               
                        $mail->Username   = $sitesupport_email;         
                        $mail->Password   = 'click100%';                       
                        $mail->SMTPSecure  = 'tls'; 
                        $mail->SMTPOptions = array('ssl' => array('verify_peer' => false,
                                            'verify_peer_name'  => false,
                                            'allow_self_signed' => true));
                        $mail->Port       = 587;  

                      $mail->setFrom($sitesupport_email,$site_name);
                      $mail->addAddress($receiver_email);
                      $mail->addReplyTo($sitesupport_email,$site_name);

                      $mail->isHTML(true);
                      $mail->Subject=$title;
                      $mail->Body='<body style="background-color: #f3f5f7; margin: 0 !important; padding: 0 !important;">
                                
                      <!-- HIDDEN PREHEADER TEXT -->
                      <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: "Poppins", sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
                        
                      </div>

                      <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <!-- LOGO -->
                        <tr>
                          <td align="center" style="padding: 0px 10px 0px 10px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                              <tr>
                              <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 10px 10px 10px;">
                                <a href="#" target="_blank">
                                <img alt="" src="https://clickstateonline.com/images/clickstate_logo.png"  style="max-height: 240px; max-width: 70px;" border="0">
                                </a>
                              </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                        <!-- HERO -->
                        
                        <tr>
                          <td align="center" style="padding: 0px 10px 0px 10px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                              <tr>
                                <td bgcolor="#ffffff" align="left" valign="top" style="padding: 20px 20px 10px 10px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: "Poppins", sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 2px; line-height: 48px;">
                                  <p style="font-size: 14px; font-weight: 600; margin: 10px 13px;">Hello '.$receiver_name.',</p>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                        <!-- COPY BLOCK -->
                        <tr>
                          <td align="center" style="padding: 0px 10px 0px 10px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                              <!-- COPY -->
                              <tr>
                              <td bgcolor="#ffffff" align="left" style="padding: 10px 10px 20px 10px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                                    <p style="margin:10px 13px; font-size: 14px; color:green;">We are thrilled to welcome you to click state online! Thank you for choosing us for your '.$accttype.' account. We are excited to have you as part of our click state family.</p>
                              </td>
                              </tr>
                              
                              <!-- COPY -->
                              <tr>
                              <td bgcolor="#ffffff" align="left" style="padding: 10px 10px 20px 10px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                                <p style="margin: 10px 13px; font-size: 12px; ">You can now <a href="https://www.clickstateonline.com/login.php">Login </a>to proceed.</p>
                              </td>
                              </tr>

                              <!-- COPY HEADING -->
                              <tr>
                              <td bgcolor="#ffffff" align="left" style="padding: 10px 10px 40px 10px; color: #111111; font-family: "Poppins", sans-serif; font-size: 14px; font-weight: 400; line-height: 25px;">
                                <h2 style="font-size: 13px; font-weight: 600; margin: 10px 13px; color:red;">Here are your login details to access your account:</h2>
                              </td>
                              </tr>
                              <!-- COPY -->
                              <tr>
                              <td bgcolor="#ffffff" align="center" style="padding: 10px 10px 20px 10px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                                <p style="margin: 10px 13px; font-size: 12px;">Account Number: '. $acctnumber .'</p>
                                <p style="margin: 10px 13px; font-size: 12px;">Password: '.$password.'</p>
                                          <p style="margin: 10px 13px; font-size: 12px;">Account Login Pin: '.$pin.'</p>
                                          <p style="margin: 10px 13px; font-size: 12px;">Available Balance: '.$currency.$acctbal.'</p>
                              </td>
                              <!-- COPY -->
                              <tr>
                              <td bgcolor="#ffffff" align="left" style="padding: 10px 10px 20px 10px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                                <p style="margin:10px 13px; font-size: 12px;">Warm regards,</p>
                              </td>
                              </tr>
                              
                              <!-- COPY -->
                              <tr>
                              <td bgcolor="#ffffff" align="left" style="padding: 10px 10px 40px 10px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                                <p style="margin:10px 13px; font-size: 12px;">From ' . $site_name . ' Online </p>
                              </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                        <!-- FOOTER -->
                        <tr>
                          <td align="center" style="padding: 0px 10px 50px 10px;">
                        
                          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                            
                          <!-- PERMISSION REMINDER -->
                          <tr>
                            <td bgcolor="#ffffff" align="left" style="padding: 10px 10px 10px 10px; color: #aaaaaa; font-family: "Poppins", sans-serif; font-size: 12px; font-weight: 400; line-height: 18px;">
                            <p style="margin:20px 13px; font-size: 12px;">For any questions, concerns, or assistance, our support team is here to help. You can reach us at <a href="mailto:support@clickstateonline.com" target="_blank" style="color: #4188FA; font-weight: 700;"> support@clickstateonline.com. </a> We aim to provide you with the best service and support, so don\'t hesitate to get in touch.</p>
                            </td>
                          </tr>
                          <tr>
                            <td bgcolor="#ffffff" align="left" style="padding: 10px 10px 10px 10px; color: #aaaaaa; font-family: "Poppins", sans-serif; font-size: 12px; font-weight: 400; line-height: 18px;">
                            <p style="margin:20px 13px; font-size: 12px;">Additionally, please remember to keep your account information safe and secure. Never share your login details with anyone.</a>.</p>
                            </td>
                          </tr>
                        <!-- COPYRIGHT -->
                          <tr>
                            <td align="center" style="padding: 50px 10px 10px 10px; color: #333333; font-family: "Poppins", sans-serif; font-size: 12px; font-weight: 400; line-height: 18px;">
                            <p style="margin: 70px 0 20px; font-size: 12px;">Copyright © Clickstate Online. All rights reserved.</p>
                            </td>
                          </tr>
                          </table>
                          </td>
                        </tr>
                      </table>
                      </body>';
                      $mail->send();

 //Mail to admin on new registrant
    
//     $site_name = 'Clickstate';
  
//     $sitesupport_email = "support@clickstateonline.com";
  
//     $receiver_name = "Sir";
    
//     $receiver_email = "support@clickstateonline.com";

//     $title = $site_domain.' - New Registrant';
//     $headers = "MIME-Version: 1.0" . PHP_EOL;
//     $headers .= "Content-type: text/html; charset=utf-8" . PHP_EOL;
//     $headers .= "From: $site_name <$sitesupport_email>" . PHP_EOL;
//     $headers .= "Organization: $site_name" . PHP_EOL;
//     $headers .= "Reply-To: $site_name Support Team <$sitesupport_email>" . PHP_EOL;
//     $headers .= "Return-Path: <$sitesupport_email>" . PHP_EOL;
//     $headers .= "X-Priority: 3" . PHP_EOL;
//     $headers .= "X-Mailer: PHP/" . phpversion() . PHP_EOL;
// $message ='
// Dear '.$receiver_name.',

// A new client just registered on your website:

// Acct Name '.$acctname.'

// Warm regards.
//  ';

// @mail($receiver_email,$title,$message,$headers);   

                    header("Location:../login.php?regsuc");
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