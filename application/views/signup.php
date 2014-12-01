
    <body class="signUpPage">
        <header id="signUpHeader">
            <a href="index.html"><img src="<?php echo base_url();?>assets/images/FrontPages/logo.png" alt="shopunion logo"/></a>
        </header>
        
        

<div class="stepsBox">
    <div class="wrapper">
        <ul class="steps">
            <li class="first active">Step 1 is Done<em></em></li>
            <li class="secound">Step 2 is undone<em></em></li>
            <li class="third">Step 3 is undone<em></em></li>
        </ul>
        <div class="progressBar">
            <div class="progress level1">
            </div>
        </div>
    </div>
</div>
<div class="formOuter">
    <div class="wrapper">
<form action="signup/submit" id="businessForm" method="post"><input id="SignUpType" name="SignUpType" type="hidden" value="general" /><input id="CountryName" name="CountryName" type="hidden" value="US" />            <section class="form stepOne" style="display: block;">
                <h1>
                    Enter Your Personal Information</h1>
                <div class="formWrap">
                    <div class="formBox leftBox">
                        <ul>
                            <li>
                                <label>
                                    First name:
                                </label>
                                <input class="text-box single-line" data-val="true" data-val-required="The First name: field is required." id="FirstName" name="FirstName" type="text" value="" />
                                <span class="field-validation-valid" data-valmsg-for="FirstName" data-valmsg-replace="true"></span>
                            </li>
                            <li>
                                <label>
                                    Last name:
                                </label>
                                <input class="text-box single-line" data-val="true" data-val-required="The Last name: field is required." id="LastName" name="LastName" type="text" value="" />
                                <span class="field-validation-valid" data-valmsg-for="LastName" data-valmsg-replace="true"></span>
                            </li>
                            <li>
                                <label>
                                    Email:
                                </label>
                                <input class="text-box single-line" data-val="true" data-val-required="The Email: field is required." id="Email" name="Email" type="text" value="" />
                                <span class="field-validation-valid" data-valmsg-for="Email" data-valmsg-replace="true"></span>
                            </li>
                            <li>
                                <label>
                                    Password:
                                </label>
<input data-val="true" data-val-length="The Password: must be at least 5 characters long." data-val-length-max="100" data-val-length-min="5" data-val-required="The Password: field is required." id="Password" name="Password" type="password" />                                <span class="field-validation-valid" data-valmsg-for="Password" data-valmsg-replace="true"></span>
                            </li>
                            <li>
                                <label>
                                    Confirm:
                                </label>
<input data-val="true" data-val-equalto="The password and confirmation password do not match." data-val-equalto-other="*.Password" data-val-required="The Confirm: field is required." id="ConfirmPassword" name="ConfirmPassword" type="password" />
<span class="field-validation-valid" data-valmsg-for="ConfirmPassword" data-valmsg-replace="true"></span>
                            </li>
                        </ul>
                    </div>
                    <div class="formBox">
                        <div class="signUpFreeBox">
                            <h2>
                                Sign Up</h2>
                            <h4>
                                Sign up is free and easy!</h4>
                            <p>
                                We offer free accounts for all civic organizations, non-profits, schools, churches,
                                clubs, and other non-business entities.</p>
                        </div>
                        <div class="formBtnWrap">
                            <a href="#" class="redBtn right nextStepBtn">Next Step: Enter Your Business Information</a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="form stepTwo" style="display: none;">
                <h1>
                    Enter Your Business Information</h1>
                <div class="formWrap">
                    <div class="formBox leftBox">
                        <ul>
                                <li>
                                    <label>
                                        State:
                                    </label>
									<?php
										$stateAttr = 'data-placeholder="Select state" data-val="true" data-val-required="The State field is required." id="SelectedState"';
										echo form_dropdown('SelectedState', $allStates, '',$stateAttr);
									?>
                                    <span class="field-validation-valid" data-valmsg-for="SelectedState" data-valmsg-replace="true"></span>
                                </li>
                                <li>
                                    <label>
                                        City:
                                    </label>
                                    <input data-val="true" data-val-required="The City field is required." id="SelectedFeed" name="SelectedFeed" type="hidden" value="" />
                                    <span class="field-validation-valid" data-valmsg-for="SelectedFeed" data-valmsg-replace="true"></span>
                                </li>
                            
                            <li>
                                <label>
                                    Business Name:
                                </label>
                                <input class="text-box single-line" data-val="true" data-val-required="The Business Name field is required." id="BusinessName" name="BusinessName" type="text" value="" />
                                <span class="field-validation-valid" data-valmsg-for="BusinessName" data-valmsg-replace="true"></span>
                            </li>
                            <li>
                                <label>
                                    Category:
                                </label>
							<?php
							$catAttr = 'data-placeholder="Select category" data-val="true" data-val-required="The Category field is required."
								id="SelectedCategory"';
							echo form_dropdown('SelectedCategory', $allCats, '',$catAttr);
							?>
                                <span class="field-validation-valid" data-valmsg-for="SelectedCategory" data-valmsg-replace="true"></span>
                            </li>
                            <li>
                                <label>
                                    Frequency:
                                </label>
								<?php
								$freqAttr = 'data-placeholder="Select frequency" data-val="true" data-val-required="The Frequency field is required." id="SelectedFrequency"';
								echo form_dropdown('SelectedFrequency', $allFreqs, '', $freqAttr);
								?>
                                <span class="field-validation-valid" data-valmsg-for="SelectedFrequency" data-valmsg-replace="true"></span>
                            </li>
                            <li>
                                <label>
                                    Type:
                                </label>
                                <input class="text-box single-line" data-val="true" data-val-required="The Type field is required." id="Type" name="Type" type="text" value="" />
                                <span class="field-validation-valid" data-valmsg-for="Type" data-valmsg-replace="true"></span>
                            </li>
                        </ul>
                    </div>
                    <div class="formBox">
                        <ul>
                            <li>
                                <label>
                                    Website (Optional):
                                </label>
                                <input class="text-box single-line" id="Site" name="Site" type="text" value="" />
                                <span class="field-validation-valid" data-valmsg-for="Site" data-valmsg-replace="true"></span>
                            </li>
                            <li>
                                <label>
                                    Phone (Optional):
                                </label>
                                <input class="text-box single-line" id="Phone" name="Phone" type="text" value="" />
                                <span class="field-validation-valid" data-valmsg-for="Phone" data-valmsg-replace="true"></span>
                            </li>
                            <li>
                                <label>
                                    Description:
                                </label>
                                <textarea cols="5" data-val="true" data-val-required="The Description field is required." id="Description" name="Description" rows="5">
</textarea>
                                <span class="field-validation-valid" data-valmsg-for="Description" data-valmsg-replace="true"></span>
                            </li>
                            <li>
                                <div class="formBtnWrap">
                                    <a href="#" class="grayBtnTwo prevStepBtn">« Back</a> 
                                    <a href="#" class="redBtn nextStepBtn">
                                        Next Step: Choose Your Package
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
            <section class="form stepThree" style="display: none;">
                <h1>
                    Choose Your Package
                </h1>
                <input data-val="true" data-val-required="The Package: field is required." id="AccountType" name="AccountType" type="hidden" value="Basic" />
                <div class="formWrap">
                    <div class="packageWrapTwo">
                        <div class="packageBox">
                            <div class="titleBar">
                                <h4>
                                    Basic Package</h4>
                                <small>45-day free trial</small>
                            </div>
                            <div class="wrapBox">
                                <div class="valueBoxTwo">
                                    <sup>$</sup><strong>50</strong><sub>/month</sub>
                                </div>
                                <ul class="packageListTwo">
                                    <li><span>Push unlimited updates to your followers</span></li>
                                    <li class="cross"><span>Every user that adds your city will automatically follow you.</span></li>
                                </ul>
                                <div class="btnbox">
                                    <a href="#" class="btn2 selectPlanBtn">
                                        Start Free Trial
                                        <input type="hidden" value="Basic" id="basicAccountType"/>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="packageBox premium">
                            <em class="ribbon">best value</em>
                            <div class="titleBar">
                                <h4>
                                    Premium Package</h4>
                                <small>get the most out of shopunion</small>
                            </div>
                            <div class="wrapBox">
                                <div class="valueBoxTwo">
                                    <sup>$</sup><strong>75</strong><sub>/month</sub>
                                </div>
                                <ul class="packageListTwo">
                                    <li><span>Push unlimited updates to your followers</span></li>
                                    <li><span>Every user that adds your city will automatically follow you.</span></li>
                                </ul>
                                <div class="btnbox">
                                    <a href="#" class="btn2 red selectPlanBtn">
                                        Select Plan
                                        <input type="hidden" value="Premium" id="premiumAccountType"/>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="packageBox free">
                            <div class="titleBar">
                                <h4>
                                    Community Package</h4>
                                <small>for non-profits &amp; organizations only</small>
                            </div>
                            <div class="wrapBox">
                                <div class="valueBoxTwo">
                                    <strong>FREE</strong>
                                </div>
                                <ul class="packageListTwo">
                                    <li><span>Push unlimited updates to your followers</span></li>
                                    <li class="cross"><span>Every user that adds your city will automatically follow you.</span></li>
                                </ul>
                                <div class="btnbox">
                                    <a href="#" class="btn2 selectPlanBtn">
                                        Select Plan
                                        <input type="hidden" value="Free" id="freeAccountType"/>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="form stepThreeBasic" style="display: none;">
                <h1>Confirm Your Package</h1>
                <div class="formWrap selectedBox">
                    <div class="packageWrapTwo">
                        <div class="selectedPlan">
                            <h3 class="selectHeading">Your Selected Plan:</h3>
                            <div class="packageBox">
                                <div class="titleBar">
                                    <h4>Basic Package</h4>
                                    <small>45-day free trial</small>
                                </div>
                                <div class="wrapBox">
                                    <div class="valueBoxTwo">
                                        <sup>$</sup><strong>50</strong>
                                    </div>
                                    <ul class="packageListTwo">
                                        <li><span>Push unlimited updates to your followers</span></li>
                                        <li class="cross"><span>Every user that adds your city will automatically follow you.</span></li>
                                    </ul>
                                    <div class="btnbox">
                                        <a href="#" class="btn2 selectPlanBtn">
                                            Start Free Trial
                                            <input type="hidden" value="Basic"/>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <p class="toChange">Wrong package? <a href="#" class="changePackageBtn">Click here to change</a></p>
                        </div>
                    </div>
                </div>
                
            </section>
            <section class="form stepThreePremium" style="display: none;">
                <h1>Confirm Your Package</h1>
                <div class="formWrap selectedBox">
                    <div class="packageWrapTwo">
                        <div class="selectedPlan">
                            <h3 class="selectHeading">Your Selected Plan:</h3>
                            <div class="packageBox premium">
                                <em class="ribbon">best value</em>
                                <div class="titleBar">
                                    <h4>Premium Package</h4>
                                    <small>get the most out of shopunion</small>
                                </div>
                                <div class="wrapBox">
                                    <div class="valueBoxTwo">
                                        <sup>$</sup><strong>75</strong>
                                    </div>
                                    <ul class="packageListTwo">
                                        <li><span>Push unlimited updates to your followers</span></li>
                                        <li><span>Every user that adds your city will automatically follow you.</span></li>
                                    </ul>
                                    <div class="btnbox">
                                        <a href="#" class="btn2 red selectPlanBtn">
                                            Select Plan
                                            <input type="hidden" value="Premium"/>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <p class="toChange">Wrong package? <a href="#" class="changePackageBtn">Click here to change</a></p>
                        </div>
                    </div>
                    
                </div>
            </section>
            <section class="form stepThreeFree" style="display: none;">
                <h1>Confirm Your Package</h1>
                <div class="formWrap selectedBox">
                    <div class="packageWrapTwo">
                        <div class="selectedPlan">
                            <h3 class="selectHeading">Your Selected Plan:</h3>
                            <div class="packageBox free">
                                <div class="titleBar">
                                    <h4>Community Package</h4>
                                    <small>for non-profits &amp; organizations only</small>
                                </div>
                                <div class="wrapBox">
                                    <div class="valueBoxTwo">
                                        <strong>FREE</strong>
                                    </div>
                                    <ul class="packageListTwo">
                                        <li><span>Push unlimited updates to your followers</span></li>
                                        <li class="cross"><span>Every user that adds your city will automatically follow you.</span></li>
                                    </ul>
                                    <div class="btnbox">
                                        <a href="#" class="btn2 selectPlanBtn">
                                            Select Plan
                                            <input type="hidden" value="Free"/>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <p class="toChange">Wrong package? <a href="#" class="changePackageBtn">Click here to change</a></p>
                        </div>
                    </div>
                </div>
            </section>
            <input type="hidden" name="couponCode" id="couponCodeMain"/>
            <input type="hidden" name="stripeToken" id="stripeToken" />
</form>        
        <form action="#" id="stripeTokenForm">
            <section class="form stepFour" style="display: none;">
                <h1>
                    Enter Your Credit Card Information
                </h1>
                <div class="formWrap">
                    <div class="formBox leftBox">
                        <ul>
                            <li>
                                <label>
                                    Name on card:
                                </label>
                                <input type="text" id="cardName" class="required" />
                            </li>
                            <li>
                                <label>
                                    Address:
                                </label>
                                <input type="text" name="address" id="cardAddress" class="required" />
                            </li>
                            <li>
                                <label>
                                    City:
                                </label>
                                <input type="text" name="city" id="cardCity" class="required" />
                            </li>
                            <li>
                                <label>
                                    State:
                                </label>
                                <select id="cardState" class="required errorAppendToParent">
                                    <option value="" selected="">Select State</option>
                                        <option value="Alabama">Alabama</option>
                                        <option value="Alaska">Alaska</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Arizona">Arizona</option>
                                        <option value="Arkansas">Arkansas</option>
                                        <option value="California">California</option>
                                        <option value="Colorado">Colorado</option>
                                        <option value="Connecticut">Connecticut</option>
                                        <option value="Delaware">Delaware</option>
                                        <option value="District of Columbia">District of Columbia</option>
                                        <option value="Florida">Florida</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Hawaii">Hawaii</option>
                                        <option value="Idaho">Idaho</option>
                                        <option value="Illinois">Illinois</option>
                                        <option value="Indiana">Indiana</option>
                                        <option value="Iowa">Iowa</option>
                                        <option value="Kansas">Kansas</option>
                                        <option value="Kentucky">Kentucky</option>
                                        <option value="Louisiana">Louisiana</option>
                                        <option value="Maine">Maine</option>
                                        <option value="Maryland">Maryland</option>
                                        <option value="Massachusetts">Massachusetts</option>
                                        <option value="Michigan">Michigan</option>
                                        <option value="Minnesota">Minnesota</option>
                                        <option value="Mississippi">Mississippi</option>
                                        <option value="Missouri">Missouri</option>
                                        <option value="Montana">Montana</option>
                                        <option value="Nebraska">Nebraska</option>
                                        <option value="Nevada">Nevada</option>
                                        <option value="New Hampshire">New Hampshire</option>
                                        <option value="New Jersey">New Jersey</option>
                                        <option value="New Mexico">New Mexico</option>
                                        <option value="New York">New York</option>
                                        <option value="North Carolina">North Carolina</option>
                                        <option value="North Dakota">North Dakota</option>
                                        <option value="Northern Marianas Islands">Northern Marianas Islands</option>
                                        <option value="Ohio">Ohio</option>
                                        <option value="Oklahoma">Oklahoma</option>
                                        <option value="Oregon">Oregon</option>
                                        <option value="Pennsylvania">Pennsylvania</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Rhode Island">Rhode Island</option>
                                        <option value="South Carolina">South Carolina</option>
                                        <option value="South Dakota">South Dakota</option>
                                        <option value="Tennessee">Tennessee</option>
                                        <option value="Texas">Texas</option>
                                        <option value="Utah">Utah</option>
                                        <option value="Vermont">Vermont</option>
                                        <option value="Virgin Islands ">Virgin Islands </option>
                                        <option value="Virginia ">Virginia </option>
                                        <option value="Washington">Washington</option>
                                        <option value="West Virginia">West Virginia</option>
                                        <option value="Wisconsin">Wisconsin</option>
                                        <option value="Wyoming">Wyoming</option>
                                </select>
                            </li>
                            <li>
                                <label>
                                    Postal Code:
                                </label>
                                <input type="text" name="postal" id="cardPostalCode" class="required" />
                            </li>
                        </ul>
                    </div>
                    <div class="formBox rightBox">
                        <ul>
                            <li>
                                <label>
                                    Card Number:
                                </label>
                                <input type="text" id="cardNumber" class="required" />
                            </li>
                            <li>
                                <label>
                                    Card Expiration:
                                </label>
                                <select id="cardMonth" class="required">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                </select>
                                <em>/</em>
                                <select id="cardYear" class="required">

                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                </select>
                            </li>
                            <li>
                                <label>
                                    CVC Code:
                                </label>
                                <input type="text" class="half required errorAppendToParent" id="cardCvc" />
                                <figure class="cvcImage">
                                    <img src="<?php echo base_url();?>assets/images/FrontPages/cvc.png" alt="" />
                                </figure>
                            </li>
                            <li>
                                <label>
                                    Coupon Code:
                                </label>
                                <input type="text" id="couponCode" />
                            </li>
                            <li>
                                <div class="formBtnWrap">
                                    <a href="#" class="redBtn right" id="subscribePremiumBtn">Next Step: Verify your email</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </form>
    </div>
</div>

<input id="errorMessage" type="hidden"/>


    
        <footer class="signUpFooter">
            <nav class="footerNav">
                <ul>
                    <li><a href="Home/PrivacyPolicy.html">Privacy Policy</a></li>
                    <li><a href="mailto:info@shopunion.org">Contact</a></li>
                    <li><a href="#">&copy; shopunion</a></li>
                </ul>
            </nav>
        </footer>
        
        
    <script>
        var l10n = l10n || {};
        l10n.phoneMask = '?999-999-9999';
    </script>
    <script src="<?php echo base_url();?>assets/scripts/FrontPages/signUp5417.js?v=fe0aS-wx2GcXVnSJR6h-dlDyuXKtNProCPlsxgR1QpM1"></script>


    </body>

</html>
