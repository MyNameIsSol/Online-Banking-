﻿
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Registration - Clickstate</title>
    <link rel="icon" type="image/x-icon" href="../../images/clickstate_icon.png">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="../../../css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css">
    <link href="formcss.css" rel="stylesheet" type="text/css">

    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="../assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/forms/switches.css">


    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="../assets/css/scrollspyNav.css" rel="stylesheet" type="text/css">
    <link href="../plugins/animate/animate.css" rel="stylesheet" type="text/css">
    <link href="../plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../assets/css/elements/alert.css">
    <script src="../plugins/sweetalerts/promise-polyfill.js"></script>
    <link href="../plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css">
    <link href="../plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css">
    <script src="../assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="../../../course1/common/js/image/SimpleImage.js">
    </script>
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
    <style>
        #Div2{
            display: none;
        }
        #nextShow{
            display: none;
        }

        #Div4{
            display: none;
        }

        #Button11{
            display: none;
        }

        .container-div{
            height: 100%;
        }

        canvas {
            height: 100px;
            border-style: solid;
            border-width: 1px;
            border-color: black;
        }


    </style>
</head>

<body>
    <?php
    $url="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

     if(strpos($url, 'invalidemail') == true){
        echo '<script>alert("Error! Invalid Email Address");</script>';
      }

      if(strpos($url, 'uidtaken') == true){
        echo '<script> alert("Error! Email already exist");</script>';
      }

      if(strpos($url, 'regsuc') == true){
        echo '<script>alert("Success! You login datail has been sent to your email...");</script>';
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
        var ssn = document.forms["register"]["ssn"].value;
        var cssn = document.forms["register"]["cssn"].value;

       if(pword != cpword){
            alert('Error! password does not match...');
            return false;
        }else if(ssn != cssn){
            alert('Error! Social Security Number / TIN does not match...');
            return false;
        }else {
            return true;
        }
        }
        </script>
<section class="wizard-section">
    <div class="row no-gutters">
        <div class="col-lg-6 col-md-6 container-div">
            <div class="wizard-content-left d-flex justify-content-center align-items-center">
                <h1>Create Your Bank Account</h1>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 container-div">
            <div class="form-wizard">
                <form method="POST" action="../../scripts/regscript.php" name="register" onsubmit="return validateForm()" enctype="multipart/form-data">
                    <div class="form-wizard-header">
                        <p>Fill all form field to go next step</p>
                        <ul class="list-unstyled form-wizard-steps clearfix">
                            <li class="active"><span>1</span></li>
                            <li><span>2</span></li>
                            <li><span>3</span></li>
                            <li><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></span></li>
                        </ul>
                    </div>
                    <fieldset class="wizard-fieldset show">

                        <h5>Personal Info</h5>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control wizard-required" id="fname" name="fname" required>
                                    <label for="fname" class="wizard-form-text-label">First Name*</label>
                                    <div class="wizard-form-error"></div>
                                </div>
                            </div>
                           <div class="col-md-6">
                               <div class="form-group">
                                   <input type="text" class="form-control wizard-required" id="lname" name="lname" required>
                                   <label for="lname" class="wizard-form-text-label">Last Name*</label>
                                   <div class="wizard-form-error"></div>
                               </div>
                           </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control wizard-required" id="occupation" name="occupation" required>
                                    <label for="occupation" class="wizard-form-text-label">Occupation*</label>
                                    <div class="wizard-form-error"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <select class="form-control" name="country" placeholder="country" required="">
                                        <option selected="selected">Select Country</option>
                                        <option value="Afganistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bonaire">Bonaire</option>
                                        <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                        <option value="Brunei">Brunei</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Canary Islands">Canary Islands</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Channel Islands">Channel Islands</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos Island">Cocos Island</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cote DIvoire">Cote DIvoire</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Curaco">Curacao</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="East Timor">East Timor</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands">Falkland Islands</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Ter">French Southern Ter</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Great Britain">Great Britain</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Hawaii">Hawaii</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="India">India</option>
                                        <option value="Iran">Iran</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Isle of Man">Isle of Man</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Korea North">Korea North</option>
                                        <option value="Korea Sout">Korea South</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Laos">Laos</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libya">Libya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macau">Macau</option>
                                        <option value="Macedonia">Macedonia</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Midway Islands">Midway Islands</option>
                                        <option value="Moldova">Moldova</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Nambia">Nambia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherland Antilles">Netherland Antilles</option>
                                        <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                        <option value="Nevis">Nevis</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau Island">Palau Island</option>
                                        <option value="Palestine">Palestine</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Phillipines">Philippines</option>
                                        <option value="Pitcairn Island">Pitcairn Island</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Republic of Montenegro">Republic of Montenegro</option>
                                        <option value="Republic of Serbia">Republic of Serbia</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russia">Russia</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="St Barthelemy">St Barthelemy</option>
                                        <option value="St Eustatius">St Eustatius</option>
                                        <option value="St Helena">St Helena</option>
                                        <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                        <option value="St Lucia">St Lucia</option>
                                        <option value="St Maarten">St Maarten</option>
                                        <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                        <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                        <option value="Saipan">Saipan</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="Samoa American">Samoa American</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syria">Syria</option>
                                        <option value="Tahiti">Tahiti</option>
                                        <option value="Taiwan">Taiwan</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania">Tanzania</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Erimates">United Arab Emirates</option>
                                        <option value="United States of America">United States of America</option>
                                        <option value="Uraguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Vatican City State">Vatican City State</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Vietnam">Vietnam</option>
                                        <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                        <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                        <option value="Wake Island">Wake Island</option>
                                        <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zaire">Zaire</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            Gender
                            <div class="wizard-form-radio">
                                <input name="gender" id="radio1" type="radio" value="male">
                                <label for="male">Male</label>
                            </div>
                            <div class="wizard-form-radio">
                                <input name="gender" id="radio2" type="radio" value="female">
                                <label for="female">Female</label>
                            </div>
                        </div>

                        <h5>Residential Address</h5>
                        <div class="form-group">
                            <input type="text" class="form-control wizard-required" id="address" name="address" required>
                            <label for="address" class="wizard-form-text-label">Street Address*</label>
                            <div class="wizard-form-error"></div>
                        </div>
                        <h5>Account Information</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="date" class="form-control wizard-required" id="dob" name="dob" required>
                                    <label for="dob" class="wizard-form-text-label">Date of Birth*</label>
                                    <div class="wizard-form-error"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <select type="text" class="form-control wizard-required" id="m_status" name="m_status" required>
                                        <option value="single" selected="selected">Single
                                        </option>
                                        <option value="married">Married
                                        </option>
                                        <option value="divorced">Divorced
                                        </option>
                                        <option value="widowed">Widowed
                                        </option>
                                    </select>
                                    <label for="m_status" class="wizard-form-text-label">Marital Status*</label>
                                    <div class="wizard-form-error"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select type="text" class="form-control wizard-required" id="accttype" name="accttype" required>
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
                                    </select>
                                    <label for="accttype" class="wizard-form-text-label">Account Type*</label>
                                    <div class="wizard-form-error"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <select type="text" class="form-control wizard-required" id="currency" name="currency" required>
                                        <option value="&dollar;" selected="selected">Dollar
                                        </option>
                                        <option value="&#163;">Pound
                                        </option>
                                        <option value="&#x20AC;">Euro
                                        </option>
                                    </select>
                                    <label for="currency" class="wizard-form-text-label">Account Currency*</label>
                                    <div class="wizard-form-error"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group clearfix">
                            <a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
                        </div>
                    </fieldset>
                    <fieldset class="wizard-fieldset">
                        <h5>Create your login</h5>
                        <div class="form-group">
                            <input type="text" class="form-control wizard-required" id="email" name="email" required>
                            <label for="email" class="wizard-form-text-label">Email Address*</label>
                            <div class="wizard-form-error"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" class="form-control wizard-required" id="phoneNumber" name="phone" required>
                                    <label for="phoneNumber" class="wizard-form-text-label">Phone Number*</label>
                                    <div class="wizard-form-error"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control wizard-required" id="username" name="uname" required>
                                    <label for="username" class="wizard-form-text-label">Username*</label>
                                    <div class="wizard-form-error"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="password" class="form-control wizard-required" id="pwd" name="pword" required>
                                    <label for="pwd" class="wizard-form-text-label">Password*</label>
                                    <div class="wizard-form-error"></div>
                                    <span class="wizard-password-eye"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg></span>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="password" class="form-control wizard-required" id="confirmPassword" name="cpword" required>
                                    <label for="confirmPassword" class="wizard-form-text-label">Confirm Password*</label>
                                    <div class="wizard-form-error"></div>
                                    <span class="wizard-password-eye"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group clearfix">
                            <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>

                            <a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
                        </div>
                    </fieldset>
                    <fieldset class="wizard-fieldset">
                        <h5>Verify your identity</h5>
                        <p>We'er required by law to collect your Social Security Number / TIN.</p>
                        <div id="Div1">
                            <div class="container">

                                <div class="row mb-3">
                                    <div class="col-md-2 mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock text-primary"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    </div>
                                    <div class="col-md-10">
                                        <h6>Security in mind</h6>
                                        We use your SSN or TIN to help keep your account safe and secure.
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2 mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card text-primary"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                                    </div>
                                    <div class="col-md-10">
                                        <h6>Only for what you need</h6>
                                        Occasionally we'll need to provide you with tax documents, which require your SSN.
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2 mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit text-primary"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                    </div>
                                    <div class="col-md-10">
                                        <h6>No credit score impact</h6>
                                        Applying for Ibank Account will never impact your credit score
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div id="Div2">
                            <div class="form-group">
                                <input type="password" class="form-control wizard-required" id="ssn" name="ssn">
                                <label for="ssn" class="wizard-form-text-label">Social Security Number / TIN*</label>
                                <div class="wizard-form-error"></div>
                                <span class="wizard-password-eye"><i class="far fa-eye"></i></span>
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control wizard-required" id="cssn" name="cssn">
                                <label for="confirm-ssn" class="wizard-form-text-label">Confirm SSN / TIN*</label>
                                <div class="wizard-form-error"></div>
                                <span class="wizard-password-eye"><i class="far fa-eye"></i></span>
                            </div>

                            <!-- <div class="form-group">
                                <input type="date" class="form-control wizard-required" id="dob" name="dob">
                                <label for="dob" class="wizard-form-text-label">Date of Birth*</label>
                                <div class="wizard-form-error"></div>
                                <span class="wizard-password-eye"><i class="far fa-eye"></i></span>
                            </div> -->


                        </div>

                        <div class="form-group clearfix">
                            <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
                            <a class="form-wizard-next-btn float-right" id="Button1" value="Click" onclick="switchVisible();">Next post</a>
                            <a href="javascript:;" class="form-wizard-next-btn float-right" id="nextShow">Next time</a>
                        </div>
                    </fieldset>
                    <fieldset class="wizard-fieldset text-white">
                        <div class="mt-3">
                            <div class="form-group">
                                <label for="frontDoc">Upload Profile Image</label>
                                <input class="form-control" type="file" name="file_upload" id="frontDoc" required/="">
                            </div>
                        </div>


                        <!-- <div class="mt-3">
                            <div class="form-group">
                                <label for="frontDoc">ID CARD FRONT</label>
                                <input class="form-control" type="file" name="frontID" id="frontDoc" required/="">
                            </div>

                            <div class="form-group">
                                <label for="">ID CARD BACK</label>
                                <input class="form-control" type="file" name="backID" id="" required/="">
                            </div>
                        </div> -->


                        <div class="form-group clearfix">
                            <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
<!--                            <a href="javascript:;" class="form-wizard-submit float-right">Submit</a>-->
                            <button class="form-wizard-submit float-right btn btn-primary" type="submit" name="userreg">Submit</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</section>






<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="../bootstrap/js/popper.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../assets/js/app.js"></script>

<!-- END GLOBAL MANDATORY SCRIPTS -->
<script src="../assets/js/authentication/form-2.js"></script>
<script src="../plugins/highlight/highlight.pack.js"></script>
<script src="../assets/js/custom.js"></script>
<!-- END GLOBAL MANDATORY STYLES -->
<script src="../plugins/notification/snackbar/snackbar.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!--  BEGIN CUSTOM SCRIPTS FILE  -->
<script src="../assets/js/components/notification/custom-snackbar.js"></script>
<!--  END CUSTOM SCRIPTS FILE  -->

<!-- BEGIN THEME GLOBAL STYLE -->
<script src="../assets/js/scrollspyNav.js"></script>
<script src="../plugins/sweetalerts/sweetalert2.min.js"></script>
<script src="../plugins/sweetalerts/custom-sweetalert.js"></script>
<script src="formjs.js"></script>
<!-- END THEME GLOBAL STYLE -->
<script>
    $(document).ready(function(){
        $(".numpad").hide();
        $('.input').click(function(){
            $('.numpad').fadeToggle('fast');
        });

        $('.del').click(function(){
            $('.input').val($('.input').val().substring(0,$('.input').val().length - 1));
        });
        $('.faq').click(function(){
            alert("Enter Your OTP Sent to you ");
        })
        $('.shuffle').click(function(){
            $('.input').val($('.input').val() + $(this).text());
            $('.shuffle').shuffle();
        });
        (function($){

            $.fn.shuffle = function() {

                var allElems = this.get(),
                    getRandom = function(max) {
                        return Math.floor(Math.random() * max);
                    },
                    shuffled = $.map(allElems, function(){
                        var random = getRandom(allElems.length),
                            randEl = $(allElems[random]).clone(true)[0];
                        allElems.splice(random, 1);
                        return randEl;
                    });

                this.each(function(i){
                    $(this).replaceWith($(shuffled[i]));
                });

                return $(shuffled);

            };

        })(jQuery);

    });
</script>
<script>
    $(function() {
        $('#datepicker').keypress(function(event) {
            event.preventDefault();
            return false;
        });
    });


    function switchVisible() {
        if (document.getElementById('Div1')) {

            if (document.getElementById('Div1').style.display === 'none') {
                document.getElementById('Div1').style.display = 'block';
                document.getElementById('Div2').style.display = 'none';
                document.getElementById('nextShow').style.display = 'none';
            }
            else {
                document.getElementById('Div1').style.display = 'none';
                document.getElementById('Div2').style.display = 'block';
                document.getElementById('nextShow').style.display = 'block';
                document.getElementById('Button1').style.display='none';
            }
        }
    }


</script>
</body>
</html>