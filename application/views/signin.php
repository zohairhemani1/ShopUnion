<!DOCTYPE HTML>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
	<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/FrontPages/fonts/fonts.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/FrontPages/errors.css" />
	
	<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/jquery.validate.unobtrusive.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/FrontPages/custom-form-elements.js"></script>
	<?php include('commonHeadPart.php'); ?>
</head>		
    <body class="loginPage bg">
        <header id="signUpHeader">
            <a href="home"><img src="<?php echo base_url();?>assets/images/FrontPages/logo.png" alt="shopunion logo"/></a>
        </header>
        
        


<div class="loginOuter">
    <div class="loginWrap">
        <div class="loginBox">
            <div class="validation-summary-valid" data-valmsg-summary="true">
				<ul><li style="display:none"></li></ul>
			</div>
			<form action="signin/login_validation" method="post"><input id="returnUrl" name="returnUrl" type="hidden" value="" />
				<ul>
                    <li>
                        <label>Email</label>
                        <input class="text-box single-line" data-val="true" data-val-required="The Email field is required." id="UserName" name="UserName" type="text" value="" />
                        <span class="field-validation-valid" data-valmsg-for="UserName" data-valmsg-replace="true"></span>
                    </li>
                    <li class="password">
                        <label>Password</label>
                        <input data-val="true" data-val-required="The Password field is required." id="Password" name="Password" type="password" />
                        <span class="field-validation-valid" data-valmsg-for="Password" data-valmsg-replace="true"></span>
                    </li>
                    <li class="remeber">
                        <input class="styled" data-val="true" data-val-required="The Remember me? field is required." id="RememberMe" name="RememberMe" type="checkbox" value="true" /><input name="RememberMe" type="hidden" value="false" />
                        <label>Remember Me</label>
                        <a href="ForgotPassword.html" class="forgot-pass-link">Forgot password?</a>
                    </li>
                    <li>
                        <input type="submit" name="button" value="Sign in to your account"/>
                    </li>
                </ul>
			</form>
		</div>
        <span class="signUpBtn">Don't have an account? <a href="../signup.html">Sign Up</a></span>
    </div>
</div>

        <footer class="signUpFooter">
            <nav class="footerNav">
                <ul>
                    <li><a href="../Home/PrivacyPolicy.html">Privacy Policy</a></li>
                    <li><a href="mailto:info@shopunion.org">Contact</a></li>
                    <li><a href="#">&copy; shopunion</a></li>
                </ul>
            </nav>
        </footer>
    </body>

</html>