<?php 
include 'userhead.php';
?>


        <style>
        @media screen and (max-width:768px) {
            .title-name {
                font-size: 18px;
                font-weight: 500;
            }
            .balance{
                display: inline-block;
                margin-top: 10px;
            }
        }
        .ptext{
            font-size: 16px;
            font-weight: 500;
        }
    </style>

<script>
    function validateForm() {
    var bname = document.forms["transfer"]["bname"].value;
    var bnacct = document.forms["transfer"]["bnacct"].value;
    var bbank = document.forms["transfer"]["bbank"].value;
    var bcountry = document.forms["transfer"]["bcountry"].value;
    var swift = document.forms["transfer"]["swift"].value;
    var bemail = document.forms["transfer"]["bemail"].value;
    // var brtn = document.forms["transfer"]["brtn"].value;
    var amount = document.forms["transfer"]["amount"].value;
    var tlimit = document.forms["transfer"]["tlimit"].value;
    var pin = document.forms["transfer"]["pin"].value;
    var tpin = document.forms["transfer"]["tpin"].value;
    var accttype = document.forms["transfer"]["accttype"].value;
    var balance = document.forms["transfer"]["bal"].value;
    var amounti = parseInt(amount,10);
    var descrip = document.forms["transfer"]["descrip"].value;

    if(bname == "" || bnacct == "" || bbank=="" ||bcountry==""||bemail==""||swift==""||amount==""||descrip==""){
        alert('Transfer Not Processed! All transfer details are expected to be filled');
        return false;
    }else if(amounti > balance){
        alert('Transfer Failed! insufficient funds...');
        return false;
    }else if(amounti > tlimit){
        alert('Transfer Failed! Limit Exceeded...');
        return false;
    }else if(pin != tpin){
        alert('Transfer Not Processed! invalid transfer pin');
        return false;
    }else {
        return true;
    }
    }
    </script>

        <main class="page-content" style="margin-top:-20px">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-xl-8">  
                        <div class=" modal-account"  >
                            <div class="modal__overlay" data-dismiss="modal"></div>
                            <!-- <div class="modal__wrap"> -->
                            <div class="modal__window">
                                <div class="modal__content">
                                <!-- <a class="modal__close text-primary">
                                <svg class="icon-icon-help">
                                        <use xlink:href="#icon-help"></use>
                                    </svg>
                             </a> -->
                                <div class="modal__body">
                                <!-- <?php
                                if($code == "ACTIVE"){
                                    echo '<form class="" name="transfer" method="POST" action="tac.php" onsubmit="return validateForm()">';
                                }elseif($code == "INACTIVE"){
                                    echo '<form class="" name="transfer" method="POST" action="otp.php" onsubmit="return validateForm()">';
                                }elseif($code == "TAX"){
                                    echo '<form class="" name="transfer" method="POST" action="tax.php" onsubmit="return validateForm()">';
                                }
                                ?> -->
                                <form class="" name="transfer" method="POST" action="tac.php" onsubmit="return validateForm()">
                                        <div class="modal-account__pane-header" style="background-color:rgb(217, 0, 0); padding:10px;">
                                                    <h4 style="color: #ffffff; font-size:18px">Wire Transfer - <span class="balance" style="margin-left:20px">Balance: <?php if(isset($currency)){ echo $currency; }else{ echo "$";} echo number_format($acctbal) ?> </span></h4>
                                                </div>
                                               
                                                    <h6 class="ml-4">Compulsory Transfer Form</h6>
                                                  
                                                
                                        <div class="modal-account__right tab-content">
                                        
                                            <div class="modal-account__pane tab-pane show active" id="accountDetails">
                                                
                                                    <div class="row row--md">
                                                         <input type="hidden" name="bal" value='<?php echo $acctbal?>'>
                                                         <input type="hidden" name="tlimit" value='<?php echo $tlimit?>'>
                                                        <input type="hidden" name="pin" value='<?php echo $pin?>'>
                                                        <input type="hidden" name="tac" value='<?php echo $tac?>'>
                                                        <input type="hidden" name="tax" value='<?php echo $tax?>'>
                                                        <input type="hidden" name="maccttype" value='<?php echo $accttype?>'>
                                                        <div class="col-12">
                                                            <div class="row row--md">
                                                                <div class="col-12 col-lg-6 form-group form-group--lg">
                                                                    <label class="form-label form-label--sm text-danger">Amount(<?php if(isset($currency)){ echo $currency; }else{ echo "$";} ?>) </label>
                                                                    <div class="input-group">
                                                                        <input class="input" type="number" name="amount" placeholder="Eg 5000" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-lg-6 form-group form-group--lg">
                                                                    <label class="form-label form-label--sm">Beneficiary Account Name</label>
                                                                    <div class="input-group">
                                                                        <input class="input" type="text" name="bname" placeholder="Beneficiary Name" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="row row--md">
                                                                <div class="col-12 col-lg-6 form-group form-group--lg">
                                                                    <label class="form-label form-label--sm">Beneficiary Account Number</label>
                                                                    <div class="input-group">
                                                                        <input class="input" type="number" name="bnacct" placeholder="Beneficiary Account Number" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-lg-6 form-group form-group--lg">
                                                                    <label class="form-label form-label--sm">Bank Name</label>
                                                                    <div class="input-group">
                                                                        <input class="input" type="text" name="bbank" placeholder="Bank Name" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-12 form-group form-group--lg">
                                                            <label class="form-label form-label--sm">Beneficiary Email Address</label>
                                                            <div class="input-group">
                                                                <input class="input" type="email" name="bemail" placeholder="Enter Beneficiary Email" >
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="row row--md">
                                                                <div class="col-12 col-lg-6 form-group form-group--lg">
                                                                    <label class="form-label form-label--sm">Select Country</label>
                                                                    <div class="input-group input-group--append">
                                                                        <select name="bcountry" class="input js-input-select input--fluid" placeholder="Select Receiving Country" required>
                                                                            <option value="" selected="selected">Select Receiving Country
                                                                            </option>
                                                                            <option value="Afghanistan">Afghanistan</option>
                                                                                <option value="Åland Islands">Åland Islands</option>
                                                                                <option value="Albania">Albania</option>
                                                                                <option value="Algeria">Algeria</option>
                                                                                <option value="American Samoa">American Samoa</option>
                                                                                <option value="Andorra">Andorra</option>
                                                                                <option value="Angola">Angola</option>
                                                                                <option value="Anguilla">Anguilla</option>
                                                                                <option value="Antarctica">Antarctica</option>
                                                                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
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
                                                                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                                                <option value="Botswana">Botswana</option>
                                                                                <option value="Bouvet Island">Bouvet Island</option>
                                                                                <option value="Brazil">Brazil</option>
                                                                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                                                <option value="Bulgaria">Bulgaria</option>
                                                                                <option value="Burkina Faso">Burkina Faso</option>
                                                                                <option value="Burundi">Burundi</option>
                                                                                <option value="Cambodia">Cambodia</option>
                                                                                <option value="Cameroon">Cameroon</option>
                                                                                <option value="Canada">Canada</option>
                                                                                <option value="Cape Verde">Cape Verde</option>
                                                                                <option value="Cayman Islands">Cayman Islands</option>
                                                                                <option value="Central African Republic">Central African Republic</option>
                                                                                <option value="Chad">Chad</option>
                                                                                <option value="Chile">Chile</option>
                                                                                <option value="China">China</option>
                                                                                <option value="Christmas Island">Christmas Island</option>
                                                                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                                                <option value="Colombia">Colombia</option>
                                                                                <option value="Comoros">Comoros</option>
                                                                                <option value="Congo">Congo</option>
                                                                                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                                                                <option value="Cook Islands">Cook Islands</option>
                                                                                <option value="Costa Rica">Costa Rica</option>
                                                                                <option value="Cote D'ivoire">Cote D'ivoire</option>
                                                                                <option value="Croatia">Croatia</option>
                                                                                <option value="Cuba">Cuba</option>
                                                                                <option value="Cyprus">Cyprus</option>
                                                                                <option value="Czech Republic">Czech Republic</option>
                                                                                <option value="Denmark">Denmark</option>
                                                                                <option value="Djibouti">Djibouti</option>
                                                                                <option value="Dominica">Dominica</option>
                                                                                <option value="Dominican Republic">Dominican Republic</option>
                                                                                <option value="Ecuador">Ecuador</option>
                                                                                <option value="Egypt">Egypt</option>
                                                                                <option value="El Salvador">El Salvador</option>
                                                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                                                <option value="Eritrea">Eritrea</option>
                                                                                <option value="Estonia">Estonia</option>
                                                                                <option value="Ethiopia">Ethiopia</option>
                                                                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                                                <option value="Faroe Islands">Faroe Islands</option>
                                                                                <option value="Fiji">Fiji</option>
                                                                                <option value="Finland">Finland</option>
                                                                                <option value="France">France</option>
                                                                                <option value="French Guiana">French Guiana</option>
                                                                                <option value="French Polynesia">French Polynesia</option>
                                                                                <option value="French Southern Territories">French Southern Territories</option>
                                                                                <option value="Gabon">Gabon</option>
                                                                                <option value="Gambia">Gambia</option>
                                                                                <option value="Georgia">Georgia</option>
                                                                                <option value="Germany">Germany</option>
                                                                                <option value="Ghana">Ghana</option>
                                                                                <option value="Gibraltar">Gibraltar</option>
                                                                                <option value="Greece">Greece</option>
                                                                                <option value="Greenland">Greenland</option>
                                                                                <option value="Grenada">Grenada</option>
                                                                                <option value="Guadeloupe">Guadeloupe</option>
                                                                                <option value="Guam">Guam</option>
                                                                                <option value="Guatemala">Guatemala</option>
                                                                                <option value="Guernsey">Guernsey</option>
                                                                                <option value="Guinea">Guinea</option>
                                                                                <option value="Guinea-bissau">Guinea-bissau</option>
                                                                                <option value="Guyana">Guyana</option>
                                                                                <option value="Haiti">Haiti</option>
                                                                                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                                                                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                                                                <option value="Honduras">Honduras</option>
                                                                                <option value="Hong Kong">Hong Kong</option>
                                                                                <option value="Hungary">Hungary</option>
                                                                                <option value="Iceland">Iceland</option>
                                                                                <option value="India">India</option>
                                                                                <option value="Indonesia">Indonesia</option>
                                                                                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                                                                <option value="Iraq">Iraq</option>
                                                                                <option value="Ireland">Ireland</option>
                                                                                <option value="Isle of Man">Isle of Man</option>
                                                                                <option value="Israel">Israel</option>
                                                                                <option value="Italy">Italy</option>
                                                                                <option value="Jamaica">Jamaica</option>
                                                                                <option value="Japan">Japan</option>
                                                                                <option value="Jersey">Jersey</option>
                                                                                <option value="Jordan">Jordan</option>
                                                                                <option value="Kazakhstan">Kazakhstan</option>
                                                                                <option value="Kenya">Kenya</option>
                                                                                <option value="Kiribati">Kiribati</option>
                                                                                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                                                                <option value="Korea, Republic of">Korea, Republic of</option>
                                                                                <option value="Kuwait">Kuwait</option>
                                                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                                                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                                                                <option value="Latvia">Latvia</option>
                                                                                <option value="Lebanon">Lebanon</option>
                                                                                <option value="Lesotho">Lesotho</option>
                                                                                <option value="Liberia">Liberia</option>
                                                                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                                                <option value="Liechtenstein">Liechtenstein</option>
                                                                                <option value="Lithuania">Lithuania</option>
                                                                                <option value="Luxembourg">Luxembourg</option>
                                                                                <option value="Macao">Macao</option>
                                                                                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                                                                <option value="Madagascar">Madagascar</option>
                                                                                <option value="Malawi">Malawi</option>
                                                                                <option value="Malaysia">Malaysia</option>
                                                                                <option value="Maldives">Maldives</option>
                                                                                <option value="Mali">Mali</option>
                                                                                <option value="Malta">Malta</option>
                                                                                <option value="Marshall Islands">Marshall Islands</option>
                                                                                <option value="Martinique">Martinique</option>
                                                                                <option value="Mauritania">Mauritania</option>
                                                                                <option value="Mauritius">Mauritius</option>
                                                                                <option value="Mayotte">Mayotte</option>
                                                                                <option value="Mexico">Mexico</option>
                                                                                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                                                                <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                                                <option value="Monaco">Monaco</option>
                                                                                <option value="Mongolia">Mongolia</option>
                                                                                <option value="Montenegro">Montenegro</option>
                                                                                <option value="Montserrat">Montserrat</option>
                                                                                <option value="Morocco">Morocco</option>
                                                                                <option value="Mozambique">Mozambique</option>
                                                                                <option value="Myanmar">Myanmar</option>
                                                                                <option value="Namibia">Namibia</option>
                                                                                <option value="Nauru">Nauru</option>
                                                                                <option value="Nepal">Nepal</option>
                                                                                <option value="Netherlands">Netherlands</option>
                                                                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                                                <option value="New Caledonia">New Caledonia</option>
                                                                                <option value="New Zealand">New Zealand</option>
                                                                                <option value="Nicaragua">Nicaragua</option>
                                                                                <option value="Niger">Niger</option>
                                                                                <option value="Nigeria">Nigeria</option>
                                                                                <option value="Niue">Niue</option>
                                                                                <option value="Norfolk Island">Norfolk Island</option>
                                                                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                                                <option value="Norway">Norway</option>
                                                                                <option value="Oman">Oman</option>
                                                                                <option value="Pakistan">Pakistan</option>
                                                                                <option value="Palau">Palau</option>
                                                                                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                                                                <option value="Panama">Panama</option>
                                                                                <option value="Papua New Guinea">Papua New Guinea</option>
                                                                                <option value="Paraguay">Paraguay</option>
                                                                                <option value="Peru">Peru</option>
                                                                                <option value="Philippines">Philippines</option>
                                                                                <option value="Pitcairn">Pitcairn</option>
                                                                                <option value="Poland">Poland</option>
                                                                                <option value="Portugal">Portugal</option>
                                                                                <option value="Puerto Rico">Puerto Rico</option>
                                                                                <option value="Qatar">Qatar</option>
                                                                                <option value="Reunion">Reunion</option>
                                                                                <option value="Romania">Romania</option>
                                                                                <option value="Russian Federation">Russian Federation</option>
                                                                                <option value="Rwanda">Rwanda</option>
                                                                                <option value="Saint Helena">Saint Helena</option>
                                                                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                                                <option value="Saint Lucia">Saint Lucia</option>
                                                                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                                                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                                                                <option value="Samoa">Samoa</option>
                                                                                <option value="San Marino">San Marino</option>
                                                                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                                                <option value="Senegal">Senegal</option>
                                                                                <option value="Serbia">Serbia</option>
                                                                                <option value="Seychelles">Seychelles</option>
                                                                                <option value="Sierra Leone">Sierra Leone</option>
                                                                                <option value="Singapore">Singapore</option>
                                                                                <option value="Slovakia">Slovakia</option>
                                                                                <option value="Slovenia">Slovenia</option>
                                                                                <option value="Solomon Islands">Solomon Islands</option>
                                                                                <option value="Somalia">Somalia</option>
                                                                                <option value="South Africa">South Africa</option>
                                                                                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                                                                <option value="Spain">Spain</option>
                                                                                <option value="Sri Lanka">Sri Lanka</option>
                                                                                <option value="Sudan">Sudan</option>
                                                                                <option value="Suriname">Suriname</option>
                                                                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                                                <option value="Swaziland">Swaziland</option>
                                                                                <option value="Sweden">Sweden</option>
                                                                                <option value="Switzerland">Switzerland</option>
                                                                                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                                                <option value="Taiwan">Taiwan</option>
                                                                                <option value="Tajikistan">Tajikistan</option>
                                                                                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                                                <option value="Thailand">Thailand</option>
                                                                                <option value="Timor-leste">Timor-leste</option>
                                                                                <option value="Togo">Togo</option>
                                                                                <option value="Tokelau">Tokelau</option>
                                                                                <option value="Tonga">Tonga</option>
                                                                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                                                <option value="Tunisia">Tunisia</option>
                                                                                <option value="Turkey">Turkey</option>
                                                                                <option value="Turkmenistan">Turkmenistan</option>
                                                                                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                                                <option value="Tuvalu">Tuvalu</option>
                                                                                <option value="Uganda">Uganda</option>
                                                                                <option value="Ukraine">Ukraine</option>
                                                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                                                <option value="United Kingdom">United Kingdom</option>
                                                                                <option value="United States">United States</option>
                                                                                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                                                <option value="Uruguay">Uruguay</option>
                                                                                <option value="Uzbekistan">Uzbekistan</option>
                                                                                <option value="Vanuatu">Vanuatu</option>
                                                                                <option value="Venezuela">Venezuela</option>
                                                                                <option value="Viet Nam">Viet Nam</option>
                                                                                <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                                                <option value="Western Sahara">Western Sahara</option>
                                                                                <option value="Yemen">Yemen</option>
                                                                                <option value="Zambia">Zambia</option>
                                                                                <option value="Zimbabwe">Zimbabwe</option>
                                                                        </select><span class="input-group__arrow">
                                                                        <svg class="icon-icon-keyboard-down">
                                                                            <use xlink:href="#icon-keyboard-down"></use>
                                                                        </svg></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-lg-6 form-group form-group--lg">
                                                                    <label class="form-label form-label--sm">Swift Code</label>
                                                                    <div class="input-group">
                                                                        <input class="input" type="text" name="swift" placeholder="Enter Swift Code" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="row row--md">
                                                                <!-- <div class="col-12 col-lg-6 form-group form-group--lg">
                                                                    <label class="form-label form-label--sm">Router Number</label>
                                                                    <div class="input-group">
                                                                        <input class="input" type="hidden" name="brtn" value="00000000" placeholder="Routing Number">
                                                                    </div>
                                                                </div> -->
                                                                <div class="col-12 col-lg-6 form-group form-group--lg">
                                                                    <label class="form-label form-label--sm">Transaction Type</label>
                                                                    <div class="input-group">
                                                                        <input class="input" value="WIRE-TRANSFER" type="text" name="t_type" disabled placeholder="WIRE-TRANSFER" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="row row--md">
                                                                <div class="col-12 col-lg-6 form-group form-group--lg">
                                                                    <label class="form-label form-label--sm">Narration/Purpose</label>
                                                                    <div class="input-group">
                                                                        <textarea class="input" style="height:50px" type="text" name="descrip" placeholder="Funds Description" required></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-lg-6 form-group form-group--lg mb-5">
                                                                    <label class="form-label form-label--sm">Beneficiary Account Type</label>
                                                                    <div class="input-group input-group--append">
                                                                        <select class="input js-input-select input--fluid" name="accttype" data-placeholder="Select Account Type" required>
                                                                            <option value="" selected="selected">Select Account Type
                                                                            </option>
                                                                            <option value="savings">Savings Account
                                                                            </option>
                                                                            <option value="current">Current Account
                                                                            </option>
                                                                            <option value="checking">Checking Account
                                                                            </option> 
                                                                            <option value="fixed deposit">Fixed Deposit
                                                                            </option>
                                                                            <option value="non resident">Non Resident Account
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
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <h6 class="text-danger">Account Owner Authorization:</h6>
                                                    <div class="card-order__footer-total pt-3">
                                                   
                                                        <div class="card__container p-0">
                                                            <div class="row gutter-bottom-sm justify-content-end">
                                                            <div class="col-12 col-lg-12 form-group form-group--lg mb-0">
                                                                    <label class="form-label form-label--sm">Transfer Pin</label>
                                                                    <div class="input-group">
                                                                        <input class="input" type="number" name="tpin" placeholder="Enter Your Pin" >
                                                                    </div>
                                                                </div>
                                                                <div class="card-order__footer-submit col-12 col-sm">

                                                                <script src="sweetalerts/promise-polyfill.js"></script>
                                                                <script src="sweetalerts/sweetalert2.min.js"></script>
                                                                <script src="sweetalerts/custom-sweetalert.js"></script>
                                                               
                                                                 <?php
                                                                        if($status == "Dormant"){
                                                                            echo '<button class="btn btn-secondary" disabled name="transfer" type="submit"><span class="button__text">ACCOUNT DISABLED PLEASE CONTACT SUPPORT </span><span class="ml-1"></span>
                                                                            </button>';
                                                                        }else{
                                                                            echo '<button class="my-btn" name="transfer" type="submit"><span class="button__text">Transfer </span><span class="ml-1"></span>
                                                                            </button>';
                                                                        }
                                                                    ?>
                                                                </div>
                                                            
                                                            </div>
                                                        </div>
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
    <div class="text-center" style="margin-top:; margin-bottom:10px">
    <span class="text-center">© All Rights Reserved Clickstate Bank.</span>
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