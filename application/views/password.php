<!DOCTYPE html>
<html>
<head>
<title>Dashboard - Shopunion</title>

<?php include('dashboard_commonHead.php'); ?>

</head>
<body cz-shortcut-listen="true">
    <?php include('dashboard_header.php')?>
            <!-- content -->
            
            <div id="account-left-col">
<form action="validate_password" id="changePassForm" method="post">                        <p>
                            <label for="OldPassword">Old password</label>
						    <input class="text" id="OldPassword" name="OldPassword" type="password" />
                            <label id="oldPasswordError" class="formError">This field is required</label>
                        </p>
                        <p>
                            <label for="NewPassword">New password</label>
						    <input class="text" data-val="true" data-val-length="The New password must be at least 6 characters long." data-val-length-max="100" data-val-length-min="6" id="NewPassword" name="NewPassword" type="password" />
                            <label id="newPasswordError" class="formError">Password must be at least 5 symbols</label>
                        </p>
                        <p>
                            <label for="ConfirmPassword">Confirm New Password</label>
						    <input class="text" data-val="true" data-val-equalto="The new password and confirmation password do not match." data-val-equalto-other="*.NewPassword" id="ConfirmPassword" name="ConfirmPassword" type="password" />
                            <label id="confirmPasswordError" class="formError">Password and confirm password are different</label>
                        </p>
                        <div id="changePassSubmit" class="btn link-btn">Submit</div>
</form>
                
                <div class="change-password-success-message">
                    <?php echo $success_message; ?>
                </div>
                <div class="change-password-error-message">
                    
                    <div class="validation-summary-valid" data-valmsg-summary="true"><ul><li style="display:none"></li>
</ul></div>
                </div>
            </div>
        
            <div id="account-right-col">
			</div>
            <div class="clear"></div>
        </div>
    </div>
     
    <div id="footer">
		<div id="footer-inner">
			<div id="copyright">&copy; 2014, Shopunion.org</div>
			<ul id="bottom-menu">
				<li class="first"><a href="http://www.facebook.com/Shopunion">About us</a></li>
                <li><a href="mailto:info@shopunion.org">Contact us</a></li>
                <li><a href="http://www.twitter.com/#!/push_lc">Twitter</a></li>
				<li><a href="/Home/Terms">Terms &amp; conditions</a></li>
                <li><a href="/Home/PrivacyPolicy">Privacy policy</a></li>
                <li><a href="http://shopunion.uservoice.com/">Support</a></li>
			</ul>
		</div>
	</div>
    
</body>
</html>


<script type="text/javascript">
    var shopUnion = shopUnion || {};
    shopUnion.NotificationImagesMinWidth = '640';
    shopUnion.currency = 'usd';
    shopUnion.stripePublishableKey = 'pk_fH8BgVIltG36uwm2GxTZJGgFWnrr5';
    shopUnion.isMobile = 'False' === 'True';

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', '']);
    _gaq.push(['_trackPageview']);
    (function () {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date(); a = s.createElement(o),
        m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-45086704-1', 'shopunion.com');
    ga('send', 'pageview');
</script>
<script src="<?php echo base_url(); ?>assets/scripts/placeholder.js"></script>
