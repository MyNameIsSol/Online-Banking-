
<?php
include 'db.php';
session_start();
$tbname = 'admins';
$tbcols = 'id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
username VARCHAR(22) NOT NULL,
acctnbr VARCHAR(225) NOT NULL,
email VARCHAR(225) NOT NULL,
passwd VARCHAR(22) NOT NULL,
aid varchar(255) not null,
profileimg VARCHAR(225) NOT NULL,
admintype VARCHAR(22) NOT NULL';

$sql = "CREATE TABLE IF NOT EXISTS $tbname($tbcols)";
mysqli_query($conn, $sql);
    
$aname = "Bank Manager";
$aemail = "suissepay@gmail.com";
$apasswd = "suisse100%";
$acctnbr = rand(2000000000,4000000000);
$encrpt = md5($aemail.time());
$aid ="ad".substr($encrpt,0,3).substr($encrpt,-3,3);
$atype = "super";
$image = "team-c.jpg";
$sql = "SELECT * FROM admins WHERE email='$aemail'";
$result = mysqli_query($conn,$sql);
$result_check = mysqli_num_rows($result);
if($result_check < 1){
    $sql ="INSERT INTO admins (username,acctnbr,email,passwd,aid,profileimg,admintype) VALUES ('$aname','$acctnbr','$aemail','$apasswd','$aid','$image','$atype')";
    mysqli_query($conn,$sql);
}

if(isset($_POST['login'])){
    //get the user data
    $acct_no = mysqli_real_escape_string($conn,$_POST['acct_no']);
    $password = mysqli_real_escape_string($conn,$_POST['pword']);
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    $logindate = date('Y-m-d H:i:s');
    if(empty($acct_no) || empty($password)){
        header("Location:../login.php?loginempty");
        exit();
    }else{
        $sql = "SELECT * FROM users WHERE acctnumber='$acct_no'";
        $result = mysqli_query($conn,$sql);
        $result_check = mysqli_num_rows($result);
        if($result_check > 0){
            while($data=mysqli_fetch_assoc($result)){
                $dbpassword = $data['password'];
                $dbpin = $data['pin'];
                $dbusid = $data['uid'];
                $status = $data['status'];
                $dblastloginip = $data['currentloginip'];
                $dblastlogindate = $data['currentlogindate'];
                $dbcurrentloginip = $ipaddress;
                $dbcurrentlogindate = $logindate;
            if($password != $dbpassword){
                    header("Location:../login.php?incorrectpwd");
                    exit();
            }elseif($status == "Inactive" || $status == "Disabled" || $status == "Dormant" || $status == "Suspended"){
                header("Location:../login.php?status=".$status);
                exit();
             }else{
                $sql = "UPDATE users
				SET lastloginip='$dblastloginip',lastlogindate='$dblastlogindate',currentloginip='$dbcurrentloginip',currentlogindate ='$dbcurrentlogindate'
				WHERE uid = '$dbusid'";
                mysqli_query($conn,$sql);
                    $_SESSION['usid'] = $dbusid;
                    header("Location:../pin.php");
                    exit();
                }
            }      
        }else{
            $sql = "SELECT * FROM admins WHERE acctnbr='$acct_no'";
            $result = mysqli_query($conn,$sql);
            $result_check = mysqli_num_rows($result);
            if($result_check < 1){
            header("Location:../login.php?invaliduid");
            exit();
        }else{
            if($row=mysqli_fetch_assoc($result)){
                $apwd = $row['passwd'];
                if($password != $apwd){
                header("Location:../login.php?incorrectpwd");
                exit();
                }elseif($password == $apwd){
                    $_SESSION['adminid'] =$row['aid'];     
            header("Location:../account/admin/dashboard.php?loginsuc");
            exit();
        }
        }   
    }
        }
    }
}else{
    header("Location:../login.php?loginerror");
    exit();
}
?>