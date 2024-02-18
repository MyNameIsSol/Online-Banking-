<?php 
include 'header.php';
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



        <main class="page-content">
            <div class="container">
            <div class="modal-account__pane-header col-12 " style="background-color:rgb(217, 0, 0); padding:10px;">
                    <h4 style="color: #ffffff; font-size:16px">Register New User:<span style="font-size:15px; font-weight:400; margin-left:25px"> </span></h4>
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
                                        <span style=" background-color:#FF3D57 ; color:#fff; font-size:14px; padding:5px; border-radius:4px;">Tickets</span>
                                    <label class="form-label ml-3"><?= isset($total_tickets) ? $total_tickets : "0" ?></label>
                                    <p style="margin-top: 20px; font-size:15px; color:gray; margin-bottom:0">As at <?= $date ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group form-group--inline col-12 col-sm-auto col-lg-3 col-xl-3">
                                <div class="input-group input-group--white input-group--append">
                                    <div class="col-12 " style="background-color: #fff; padding:15px; box-shadow:0 8px 16px rgba(169, 194, 209, 0.1); border-radius:4px;">
                                        <span style=" background-color:#FF8A48; color:#fff; font-size:14px; padding:5px; border-radius:4px;">Total Transfer</span>
                                    <label class="form-label ml-3"><?= isset($total_trans) ? $total_trans : "0" ?></label>
                                    <p style="margin-top: 20px; font-size:15px; color:gray; margin-bottom:0">As at <?= $date ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group form-group--inline col-12 col-sm-auto col-lg-3 col-xl-3">
                                <div class="input-group input-group--white input-group--append">
                                    <div class="col-12 " style="background-color: #fff; padding:15px; box-shadow:0 8px 16px rgba(169, 194, 209, 0.1); border-radius:4px;">
                                        <span style=" background-color:#0081FF ; color:#fff; font-size:14px; padding:5px; border-radius:4px;">Deposit Request</span>
                                    <label class="form-label ml-3"><?= isset($total_deposit) ? $total_deposit : "0" ?></label>
                                    <p style="margin-top: 20px; font-size:15px; color:gray; margin-bottom:0">As at <?= $date ?></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
             
                </div>
            </div> -->

            <?php
    $url="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

     if(strpos($url, 'invalidemail') == true){
        echo '<script>alert("Error! Invalid Email Address");</script>';
      }

      if(strpos($url, 'uidtaken') == true){
        echo '<script> alert("Error! Email already exist");</script>';
      }

      if(strpos($url, 'regsuc') == true){
        echo '<script>alert("Success! User added successfully...");</script>';
      }

      if(strpos($url, 'regerror') == true){
          $error = $_GET['regerror'];
          echo '<script>alert("Error! "+"'.$error.'");</script>';
      }

      if(strpos($url, 'loginempty') == true){
        echo '<script> alert("Error! Please, fill out all inputs");</script>';
      }

      if(strpos($url, 'invaliduid') == true){
       echo '<script> alert("Error! User does not exist"); </script>';
      }
      if(strpos($url, 'incorrectpwd') == true){       
        echo '<script> alert("Error! Invalid Password");</script>';
      }
      if(strpos($url, 'incorrectpin') == true){
        echo '<script> alert("Error! Incorrect Pin");</script>';
      }
      if(strpos($url, 'loginsuc') == true){
        echo '<script> alert("success, Login successfull...Please wait..");</script>';
      }
      if(strpos($url, 'loginerror') == true){
        echo '<script> alert("Error! please try again");</script>';
      }
      if(strpos($url, 'pwdresetsentsuc') == true){
        echo '<script> alert("success,  Your password reset link has been sent to your email");</script>';
      }
      if(strpos($url, 'pwdresetsuc') == true){
        echo '<script> alert("success, Your password has been changed successfully");</script>';
      }
?>

            <script>
                function validateForm(){
                var pword = document.forms["register"]["pword"].value;
                var cpword = document.forms["register"]["cpword"].value;

               if(pword != cpword){
                    alert('Error! password does not match...');
                    return false;
                }else {
                    return true;
                }
                }
                </script>
                <div class="row">
                    <div class="col-12 col-lg-12 col-xl-12">  
                        <div class=" modal-account"  >
                            <div class="modal__overlay" data-dismiss="modal"></div>
                            <!-- <div class="modal__wrap"> -->
                            <div class="modal__window">
                                <div class="modal__content">
                            <form method="POST" action="../../scripts/adminreguser.php" name="register" onsubmit="return validateForm()" enctype="multipart/form-data">
                                <div class="modal__body">
                                   
                                    
                                        <!-- <h6 class="ml-4">Transfer history associated with your account:</h6> -->
                                    <div class="modal-account__right tab-content">
                                        <div class="modal-account__pane tab-pane show active" id="accountDetails"> 
                                                       
                                        <div class="modal-account__pane-header pl-0 mb-4" >
                                                <span style="color: rgb(217, 0, 0); font-weight: 600;">Add User</span>
                                            </div>
                               
                                            <h6 style="color:red">Note: Note All optional input can be updated by client in user dashboard</h6>

                                            <div class="row row--md">
                                            <div class="col-12">
                                                <div class="row row--md">
                                                    <div class="col-12 col-lg-3 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">First Name: *</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="fname" placeholder="First Name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-3 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Middle Name: (Optional)</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="mname" placeholder="Middle Name" >
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-3 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Last Name: *</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="lname" placeholder="Last Name" required>
                                                        </div>
                                                    </div> 
                                                    <div class="col-12 col-lg-3 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Client Image: (Optional)</label>
                                                        <div class="input-group">
                                                            <input class="input" type="file" name="file_upload" placeholder="Profile Picture">
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row row--md">
                                                    <div class="col-12 col-lg-3 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">User Name: (Optional)</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="uname" placeholder="User Name" >
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-3 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Password: *</label>
                                                        <div class="input-group">
                                                            <input class="input" type="password" name="pword" placeholder="Password" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-3 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Confirm Password: *</label>
                                                        <div class="input-group">
                                                            <input class="input" type="password" name="cpword" placeholder="Confirm Password" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-3 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Phone: (Optional)</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="phone" placeholder="Phone Number">
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="col-12 form-group form-group--lg">
                                                <label class="form-label form-label--sm">E-Mail: *</label>
                                                <div class="input-group">
                                                    <input class="input" name="email" type="email" placeholder="" value="example@mail.com" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row row--md">
                                                    <div class="col-12 col-lg-3 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Occupation: (Optional)</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="occupation" placeholder="Occupation">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-3 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Date of Birth: (Optional)</label>
                                                        <div class="input-group">
                                                            <input class="input" type="date" name="dob" placeholder="Date of Birth" >
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-3 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Marital Status: (Optional)</label>
                                                        <div class="input-group input-group--append">
                                                            <select name="m_status" class="input js-input-select input--fluid" data-placeholder="Marital Status" >
                                                                <option value="single" selected="selected">Single
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
                                                                <option value="male" selected="selected">Male
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
                                                        <label class="form-label form-label--sm">Country: *</label>
                                                        <div class="input-group">
                                                            <input class="input" type="text" name="country" placeholder="country" required></input>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-3 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">House Address: (Optional)</label>
                                                        <div class="input-group">
                                                            <textarea class="input" type="text" name="addr" placeholder="Enter Address" ></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-3 form-group form-group--lg">
                                                        <label class="form-label form-label--sm">Account Type: *</label>
                                                        <div class="input-group input-group--append">
                                                            <select class="input js-input-select input--fluid" name="accttype" data-placeholder="Select Account" required>
                                                                <option value="savings" selected="selected">Savings
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
                                                                <option value="$" selected="selected">Dollar
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
                                            <button  class="btn btn-primary mr-3" type="reset"><span class="button__text">Reset</span>
                                                                </button>
                                            <button class="button button--load my-btn" type="submit" name="userreg"><span class="button__text">Register</span>
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