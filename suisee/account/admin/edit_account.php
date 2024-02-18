<?php 
include 'header.php';
if(isset($_POST['uid'])){
    $uid = $_POST['uid'];
}elseif(isset($_GET['uid'])){
    $uid = $_GET['uid'];
}
$sql = "SELECT * FROM users WHERE uid='$uid'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
    while($data = mysqli_fetch_assoc($result)){
        $acctname = $data['acctname'];
        $midname = $data['midname'];
        $username = $data['username'];
        $acctnumber = $data['acctnumber'];
        $accttype = $data['accttype'];
        $acctbal = $data['acctbal'];
        $tlimit = $data['tlimit'];
        $currency = $data['currency'];
        $phone = $data['phone'];
        $email = $data['email'];
        $password = $data['password'];
        $pin =$data['pin'];
        $birth = $data['birth'];
        $occupation = $data['occupation'];
        $marital = $data['marital'];
        $gender = $data['gender'];
        $country = $data['country'];
        $addr = $data['addrs'];
        $uid = $data['uid'];
        $uimage = $data['userimage'];

        $tac = $data['tac'];
        $tax = $data['tax'];
    }
}
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
        .tbcol td{
            background-color: #1B3F6B;
            color: gray;
            border-right: 1px solid #fff;
        }
        .tbcol th{
            background-color: #1B3F6B;
            color: gray;
            border-right: 1px solid #fff;
        }
    </style>

<?php
 $url="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if(strpos($url, 'error') == true){
    $error = $_GET['error'];
    echo '<script>alert("Error! "+"'.$error.'");</script>';
}
if(strpos($url, 'updated') == true){
echo '<script>alert("Success! User updated successfully");</script>';
}
?>

        <main class="page-content">
            <div class="container">
            <div class="modal-account__pane-header col-12 " style="background-color:rgb(217, 0, 0); padding:10px;">
                    <h4 style="color: #ffffff;font-size:16px">Edit User Account:<span style="font-size:15px; font-weight:400; margin-left:25px"> </span></h4>
                </div>
            <!-- <div class="toolbox mb-5">
                <div class="toolbox__row row gutter-bottom-xs">
                    <div class="toolbox__left col-12 col-lg">
                        <div class="toolbox__left-row row row--xs gutter-bottom-xs">
                            <div class="form-group form-group--inline col-12 col-sm-auto col-lg-3 col-xl-3">
                                <div class="input-group input-group--white input-group--append">
                                    <div class="col-12 " style="background-color: #fff; padding:15px; box-shadow:0 8px 16px rgba(169, 194, 209, 0.1); border-radius:4px;">
                                        <span style=" background-color:#09B66D ; color:#fff; font-size:14px; padding:5px; border-radius:4px;">Total Account</span>
                                    <label class="form-label ml-3"><?= isset($total_users) ? $total_users : "0" ?></label>
                                    <p style="margin-top: 20px; font-size:15px; color:gray; margin-bottom:0">As at <?= $date ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group form-group--inline col-12 col-sm-auto col-lg-3 col-xl-3">
                                <div class="input-group input-group--white input-group--append">
                                    <div class="col-12 " style="background-color: #fff; padding:15px; box-shadow:0 8px 16px rgba(169, 194, 209, 0.1); border-radius:4px;">
                                        <span style=" background-color:#FF3D57 ; color:#fff; font-size:14px; padding:5px; border-radius:4px;">Total Account</span>
                                    <label class="form-label ml-3"><?= isset($total_tickets) ? $total_tickets : "0" ?></label>
                                    <p style="margin-top: 20px; font-size:15px; color:gray; margin-bottom:0">As at <?= $date ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group form-group--inline col-12 col-sm-auto col-lg-3 col-xl-3">
                                <div class="input-group input-group--white input-group--append">
                                    <div class="col-12 " style="background-color: #fff; padding:15px; box-shadow:0 8px 16px rgba(169, 194, 209, 0.1); border-radius:4px;">
                                        <span style=" background-color:#FF8A48; color:#fff; font-size:14px; padding:5px; border-radius:4px;">Total Account</span>
                                    <label class="form-label ml-3"><?= isset($total_trans) ? $total_trans : "0" ?></label>
                                    <p style="margin-top: 20px; font-size:15px; color:gray; margin-bottom:0">As at <?= $date ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group form-group--inline col-12 col-sm-auto col-lg-3 col-xl-3">
                                <div class="input-group input-group--white input-group--append">
                                    <div class="col-12 " style="background-color: #fff; padding:15px; box-shadow:0 8px 16px rgba(169, 194, 209, 0.1); border-radius:4px;">
                                        <span style=" background-color:#0081FF ; color:#fff; font-size:14px; padding:5px; border-radius:4px;">Total Account</span>
                                    <label class="form-label ml-3"><?= isset($total_deposit) ? $total_deposit : "0" ?></label>
                                    <p style="margin-top: 20px; font-size:15px; color:gray; margin-bottom:0">As at <?= $date ?></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div> -->
                <div class="row">
                    <div class="col-12 col-lg-12 col-xl-12">  
                        <div class=" modal-account"  >
                            <div class="modal__overlay" data-dismiss="modal"></div>
                            <!-- <div class="modal__wrap"> -->
                            <div class="modal__window">
                                <div class="modal__content">
                            <form method="POST" action="../../scripts/adminupdateuser.php" enctype="multipart/form-data">
                                <div class="modal__body">
                                        <!-- <h6 class="ml-4">Transfer history associated with your account:</h6> -->
                                    <div class="modal-account__right tab-content">
                                        <div class="modal-account__pane tab-pane show active" id="accountDetails"> 
                                        <div class="modal-account__pane-header pl-0 mb-4" >
                                                <span style="color: rgb(217, 0, 0); font-weight:600">Edit Transfers</span>
                                            </div>
                                            <div class="row row--md">
                                            <input type="hidden" name="uid" value="<?= isset($uid) ? $uid : ""; ?>">
                                            <div class="col-12">
                                                <div class="row row--md">
                                                    <div class="col-12 col-lg-4 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Account Name: *</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="fname" value="<?= isset($acctname) ? $acctname : ""; ?>" placeholder="Full Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Middle Name: (Optional)</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="mname" value="<?= isset($midname) ? $midname : ""; ?>" placeholder="Middle Name" >
                                                        </div>
                                                    </div> 
                                                    <div class="col-12 col-lg-4 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">User Name: *</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="uname" value="<?= isset($username) ? $username : ""; ?>" placeholder="User Name" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row row--md">
                                                    <div class="col-12 col-lg-3 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Account Number: *</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="acctnum" value="<?= isset($acctnumber) ? $acctnumber : ""; ?>" placeholder="Acct Nunmbe" >
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-3 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Password: *</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="pword" value="<?= isset($password) ? $password : ""; ?>" placeholder="Password" >
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-3 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Pin: *</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="pin" value="<?= isset($pin) ? $pin : ""; ?>" placeholder="Pin" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-3 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Phone: *</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="phone" value="<?= isset($phone) ? $phone : ""; ?>" placeholder="Phone Number" required>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="col-12 form-group form-group--lg">
                                                <label class="form-label form-label--sm">E-Mail: *</label>
                                                <div class="input-group">
                                                    <input class="input" name="email" type="email" placeholder="Email" value="<?= isset($email) ? $email : ""; ?>" value="example@mail.com" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row row--md">
                                                    <div class="col-12 col-lg-3 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Occupation: *</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="occupation" value="<?= isset($occupation) ? $occupation : ""; ?>" placeholder="Occupation" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-3 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Date of Birth: *</label>
                                                        <div class="input-group">
                                                            <input class="input" type="date" name="dob" value="<?= isset($birth) ? $birth : ""; ?>" placeholder="Date of Birth" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-3 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Marital Status: *</label>
                                                        <div class="input-group input-group--append">
                                                            <select name="m_status" class="input js-input-select input--fluid"  data-placeholder="Marital Status" required>
                                                            <option value="<?= isset($marital) ? $marital : ""; ?>" selected="selected"><?= isset($marital) ? $marital : ""; ?>
                                                                </option>
                                                                <option value="single">Single
                                                                </option>
                                                                <option value="married">Married
                                                                </option>
                                                                <option value="divorced">Divorced
                                                                </option>
                                                                <option value="widowed">Widowed
                                                                </option>
                                                            </select><span class="input-group__arrow">
                                                            <svg class="icon-icon-keyboard-down">
                                                                <use xlink:href="#icon-keyboard-down"></use>
                                                            </svg></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-3 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Gender: *</label>
                                                        <div class="input-group input-group--append">
                                                            <select name="gender" class="input js-input-select input--fluid" data-placeholder="Select Gender" required>
                                                            <option value="<?= isset($gender) ? $gender : ""; ?>" selected="selected"><?= isset($gender) ? $gender : ""; ?>
                                                                </option>
                                                                <option value="male" >Male
                                                                </option>
                                                                <option value="female">Female
                                                                </option>
                                                            </select><span class="input-group__arrow">
                                                            <svg class="icon-icon-keyboard-down">
                                                                <use xlink:href="#icon-keyboard-down"></use>
                                                            </svg></span>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row row--md">
                                                    <div class="col-12 col-lg-3 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Account Balance: *</label>
                                                        <div class="input-group">
                                                            <input class="input" type="number" name="acctbal" value="<?= isset($acctbal) ? $acctbal : ""; ?>" placeholder="Acctount Balance" required></input>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-3 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Transfer Limit: *</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="tlimit" value="<?= isset($tlimit) ? $tlimit : ""; ?>" placeholder="Acctount Limit" required></input>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-3 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Tac Code: </label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="tac" value="<?= isset($tac) ? $tac : ""; ?>"  placeholder="Tac Code" required></input>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-3 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Tax Code: </label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="tax" value="<?= isset($tax) ? $tax : ""; ?>"  placeholder="Tax Code" required></input>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="row row--md">
                                                    <div class="col-12 col-lg-3 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Country: *</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="country" value="<?= isset($country) ? $country : ""; ?>" placeholder="country" required></input>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-3 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Home Address: *</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="addr" value="<?= isset($addr) ? $addr : ""; ?>" placeholder="Enter Address"></input>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-3 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Account Type: *</label>
                                                        <div class="input-group input-group--append">
                                                            <select class="input js-input-select input--fluid" name="accttype"  data-placeholder="Select Account">
                                                            <option value="<?= isset($accttype) ? $accttype : ""; ?>" selected="selected"><?= isset($accttype) ? $accttype : ""; ?>
                                                                </option>
                                                                <option value="savings">Savings
                                                                </option>
                                                                <option value="current">Current
                                                                </option>
                                                                <option value="checking">Checking
                                                                </option>
                                                                <option value="fixed deposit">Fixed Deposit
                                                                </option>
                                                                <option value="non resident">Non-Resident
                                                                </option>
                                                                <option value="online banking">Online Banking
                                                                </option>
                                                                <option value="joint account">Joint Account
                                                                </option>
                                                                <option value="domiciliary account">Domiciliary Account
                                                                </option>
                                                            </select><span class="input-group__arrow">
                                                            <svg class="icon-icon-keyboard-down">
                                                                <use xlink:href="#icon-keyboard-down"></use>
                                                            </svg></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-3 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Account Currency: *</label>
                                                        <div class="input-group input-group--append">
                                                            <select class="input js-input-select input--fluid" name="currency" data-placeholder="Select Currency" required>
                                                            <option value="<?= isset($currency) ? $currency : ""; ?>" selected="selected"><?= isset($currency) ? $currency : ""; ?>
                                                                </option>
                                                                <option value="&dollar;">Dollar
                                                                </option>
                                                                <option value="&#163;">Pound
                                                                </option>
                                                                <option value="&#x20AC;">Euro
                                                                </option>
                                                            </select><span class="input-group__arrow">
                                                            <svg class="icon-icon-keyboard-down">
                                                                <use xlink:href="#icon-keyboard-down"></use>
                                                            </svg></span>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    <div class="">
                                            <a href="user_account.php" class="btn btn-primary mr-3" ><span class="button__text">Cancel</span>
    </a>
                                            <button class=" my-btn"  type="submit" name="updateuser"><span class="button__text">Update User</span>
                                            </button>
                                    </div>
                                    </form>
        
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
</body>

</html>