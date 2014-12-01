<!DOCTYPE html>
<html>
<head>
<title>Dashboard - Shopunion</title>
<link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap-responsive.min.css"/>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css"/>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/dashboard.css"/>
<link rel="stylesheet" href="<?php echo base_url();?>assets/jquery-ui-1.8.18.custom.css"/>
	
<script type="text/javascript" src="http://cdn.walkme.com/users/6702/walkme_6702.js" async="async"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/jquery-ui-1.10.4.min.js"></script><!--change-->
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-modal.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/handlebars.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/general.js"></script>
<script type="text/javascript">
    $(function(){
        if(!$.browser) { $.browser = {}; } 
        else { return; }
        $.browser.msie = false;
    });
</script>
 <!--[if IE]>
        <script type="text/javascript">
            $(function(){
                $.browser.msie = true;
            });
        </script>
    <![endif]-->  
<script type="text/javascript">
    var charsleft = 200;
	var twitterFileLinkLength = 24;
    var checkTwitterValue;
    var twitterConnected = false;
    var facebookConnected = false;
    var businessIsActive = true;

    $(function () {
        $('#dashboard-new-post-left-chars').html(200 + ' chars left');
        
        //remember user checkstatus
            
        $("#PostToTwitter").bind("change click", function () {
            checkTwitterValue = $("#PostToTwitter").attr("checked");
        });
        
        if(!twitterConnected) {
            $("#PostToTwitter").attr("disabled", "disabled");
        }
        if(!facebookConnected) {
            $("#PostToFacebook").attr("disabled", "disabled");
        }

        //calculate lefted chars and show it
        $('#dashboard-new-post-message').bind("keyup keydown keypress change", textChanged);
        $('#dashboard-new-post-title').bind("keyup keydown keypress change", textChanged);
		$('#dashboard-choose-image-input').bind("change", textChanged);

        var isError = 'False' == 'True';
        if (isError) {
            $('#dashboardErrorBox').modal('show');
        }
    	
        $('#notifications').on('click', '.openStats', function (e) {
            var $this = $(this),
                $secondRow = $this.closest('.dashboard-post').find('.post-second-row');
			$secondRow.slideToggle();
			if ($this.text() == 'View stats') {
				$this.text('Hide stats');
			}
			else {
				$this.text('View stats');
			}
            
            e.preventDefault();
		});

        $('#notifications').on('click', '.button-stats-open', function (e) {
            var $this = $(this),
                $post = $this.closest('.dashboard-post'),
                rightColVisible = !!$post.data('right-col-visible'),
                $rightCol = $post.find('.post-right-col');
            
            if (rightColVisible) {
                $rightCol.hide();
                $post.width('510px');
            } else {
                $rightCol.show();
                $post.width('661px');
            }

            rightColVisible = !rightColVisible;
            $post.data('right-col-visible', rightColVisible);

            e.preventDefault();
        });
    });

    function textChanged(event) {
        if (event && event.keyCode == 13) { return false; }
        var messageLength = $("#dashboard-new-post-message").val().length;
        var titleLength = $("#dashboard-new-post-title").val().length;
	    
	    var titleMaxLength = 200 - messageLength < 30 ? 200 - messageLength : 30;
        var messageMaxLength = 200 - titleLength;
        textCounter(document.getElementById("dashboard-new-post-title"), titleMaxLength);
        textCounter(document.getElementById("dashboard-new-post-message"), messageMaxLength);
        $('#dashboard-new-post-title').attr("MaxLength", titleMaxLength);
        $('#dashboard-new-post-message').attr("maxlength", messageMaxLength);
        charsleft = 200 - messageLength - titleLength;
        $("#dashboard-new-post-left-chars").html(charsleft + ' chars left');
        
        if (businessIsActive) {
            if (messageLength > 0 || titleLength > 0) {
                $('#dashboard-push-btn').removeAttr('disabled');
            } else {
                $('#dashboard-push-btn').attr('disabled', true);
            }
        }
    }

    //limitation for texarea in Opera & IE
    function textCounter(field, maxlimit) {
        if (field.value.length > maxlimit)
            field.value = field.value.substring(0, maxlimit);
    } 
    
	//the SAME CODE for edit
    var checkTwitterValueInEdit;
    
	function editedNotificationLoaded() {
		jQuery('#dashboard-save-btn').click(function () {
			jQuery('#dashboard-edit-post').submit();
		});

		var messageLength = $("#dashboard-edit-post-message").val().length;
        var titleLength = $("#dashboard-edit-post-title").val().length;
        charsleft = 200 - messageLength - titleLength;
        $("#dashboard-edit-post-left-chars").html(charsleft + ' chars left');
        
        //remember user checkstatus
            
        $("#PostTwitter").bind("change click", function () {
            checkTwitterValue = $("#PostTwitter").attr("checked");
        });
        
        if(!twitterConnected) {
            $("#PostTwitter").attr("disabled", "disabled");
        }
        if(!facebookConnected) {
            $("#PostFacebook").attr("disabled", "disabled");
        }

        //calculate lefted chars and show it
        $('#dashboard-edit-post-message').bind("keyup keydown keypress change", textChangedInEdit);
        $('#dashboard-edit-post-title').bind("keyup keydown keypress change", textChangedInEdit);
    };

	function textChangedInEdit(event) {
        if (event && event.keyCode == 13) { return false; }
        var messageLength = $("#dashboard-edit-post-message").val().length;
        var titleLength = $("#dashboard-edit-post-title").val().length;
        var titleMaxLength = 200 - messageLength < 30 ? 200 - messageLength : 30;
        var messageMaxLength = 200 - titleLength;
        textCounter(document.getElementById("dashboard-edit-post-title"), titleMaxLength);
        textCounter(document.getElementById("dashboard-edit-post-message"), messageMaxLength);
        $('#dashboard-edit-post-title').attr("MaxLength", titleMaxLength);
        $('#dashboard-edit-post-message').attr("maxlength", messageMaxLength);
        charsleft = 200 - messageLength - titleLength;
        $("#dashboard-edit-post-left-chars").html(charsleft + ' chars left');
        changeCheckInEdit();
    }

    //change twitter check status after 140 chars
    function changeCheckInEdit() {
        if (charsleft <= 44) {
            $("#PostTwitter").removeAttr("checked");
            $("#PostTwitter").attr("disabled", "disabled");
        }
        if (charsleft >= 45) {
            if(twitterConnected) {
                if (checkTwitterValueInEdit == "checked") {
                    $("#PostTwitter").attr("checked", "checked");
                }
                $("#PostTwitter").removeAttr("disabled");
            }
        }
    }
	
</script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/CharactersCounter.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/dashboard.js"></script>
<!--[if lte IE 8]>
	<link rel="stylesheet" href="assets/css/ie.css"/>
<![endif]-->

</head>

<body cz-shortcut-listen="true">
    <?php include('dashboard_header.php'); ?>
            <!-- content -->
            <div id="dashboard-left-col">
    
                <h3 class="pull-left">New post</h3>
               	
                <a href="#null" id="dashboard-filter-btn" class="btn pull-left">Schedule <span class="caret"></span></a>
                
                <p class="clear"></p>
                
<form action="dashboard/push" class="form-inline" enctype="multipart/form-data" id="dashboard-new-post" method="post">                    <div id="dashboard-filter" style="margin-top: 10px">
                        <p>Date and Time <input class="text-box single-line" id="StartDateStr" name="StartDateStr" type="text" value="10/28/2014 04:14 AM" />&nbsp;</p>
                    
                        <div style="line-height: 26px;">
                            <span>Push </span>&nbsp;&nbsp;
                            <div class="btn-group change-time-group">
                                <a id="seletedTimeSpan" class="btn dropdown-toggle" data-toggle="dropdown" href="#"> 0 hr. <span class="caret"></span></a>
                                <input data-val="true" data-val-number="The field PushBeforeHours must be a number." data-val-required="The PushBeforeHours field is required." id="PushBeforeHours" name="PushBeforeHours" type="hidden" value="-1" />
                                <ul id="timeSpansDDL" class="dropdown-menu center">
                                    <a href="#"> 0 hr. <input type="hidden" value="0"></a>
                                    <a href="#"> 1 hr. <input type="hidden" value="1"></a>
                                    <a href="#"> 2 hr. <input type="hidden" value="2"></a>
                                    <a href="#"> 3 hr. <input type="hidden" value="3"></a>
                                </ul>
                            </div>&nbsp;before on specified date&nbsp;
                            
                            <script type="text/javascript">
                                (function() {
                                    $('#StartDateStr').datetimepicker({
                                        dateFormat: 'mm/dd/yy',
                                        ampm: 'true',
                                        firstDay: '0',
                                        showOtherMonths: 'true',
                                        onSelect: checkDateForFacebookToken
                                    });
                                })();

                            </script>
                        </div>
                    
                        <p>
                            <label for="dashboard-new-post-title">Title</label>
                            <input id="dashboard-new-post-title" name="NewPostTitle" type="text" value="" />
                        </p>
                    </div>
                    <p>
                        <label for="dashboard-new-post-message" class="pull-left">Message</label>
                        <div id="dashboard-new-post-left-chars" class="pull-right">200 chars left</div>
                        <p class="clear"></p>
                        
                        <textarea cols="20" id="dashboard-new-post-message" name="NewPostBody" rows="2">
</textarea>
                    </p>
                    <p class="clear"></p>
                    <div id="dashboard-new-post-left-elements">
                        <div id="notificaiton-button-container">
                            <div class="btn-group" id="button-type-dropdown">
                                <a class="btn dropdown-toggle disabled" data-toggle="dropdown" href="#">
                                    <label id="selectedButtonType">No Button</label>
                                    <div class="arrows"></div>
                                </a>
                                <input id="PreviousButtonImageID" name="PreviousButtonImageID" type="hidden" value="" />
                                <input data-val="true" data-val-required="The Button field is required." id="ButtonType" name="ButtonType" type="hidden" value="None" />
                                <ul id="buttonDDL" class="dropdown-menu">
                                    <li>
                                        No Button
                                        <input type="hidden" value="None" />
                                    </li>
                                    <li>
                                        Donate
                                        <input type="hidden" value="Donate" />
                                    </li>
                                    
                                </ul>
                                <script type="text/javascript">
                                    
                                </script>
                            </div>
                        </div>

                        <div id="hide-from-calendar-container">
                            <input class="checkbox" data-val="true" data-val-required="The Hide from calendar field is required." id="HideFromCalendar" name="HideFromCalendar" type="checkbox" value="true" /><input name="HideFromCalendar" type="hidden" value="false" />
                            <label for="HideFromCalendar">Hide from calendar</label>
                        </div>
                        
                        <div>
                            <input class="checkbox postToTwitterControls" data-val="true" data-val-required="The Post to twitter field is required." id="PostToTwitter" name="PostToTwitter" type="checkbox" value="true" /><input name="PostToTwitter" type="hidden" value="false" />
                            <label class="postToTwitterControls" for="PostToTwitter">Post to Twitter</label>
                        </div>
                        <div>
                            <input class="checkbox" data-val="true" data-val-required="The Post to facebook field is required." id="PostToFacebook" name="PostToFacebook" type="checkbox" value="true" /><input name="PostToFacebook" type="hidden" value="false" />
                            <label for="PostToFacebook">Post to Facebook</label>
                        </div>
                        <div id="facebookTokenAlert" style="display: none">
                            Please note that you should log into the website during the period starting from 
                            <label id="fbTokenDateFrom" class="facebookTokenAlertText"></label> 
                            till <label id="fbTokenDateTill" class="facebookTokenAlertText"></label> 
                            to have the feed posted on your Facebook wall.
                        </div>
                    </div>
                    <div id="dashboard-new-post-right-elements">
                        
                        <span id="dashboard-image-container" class="hide">
                            <a id="dashboard-remove-image" href="#" title="Delete image">
                                <span>×</span>
                            </a>
                            <img id="dashboard-new-post-image" alt="Notification Image">
                        </span>
                        
                        
                        <div class="push-div">
                            <div class="dashboard-file-uploader">
                                <input type="file" name="image" accept="image/*" id="dashboard-choose-image-input" title="Attach an image">
                                <span id="dashboard-choose-image-btn">
                                    <i class="dashboard-icon-camera"></i>
                                </span>
                            </div>
                            
                            <button id="dashboard-push-btn" class="btn link-btn" disabled>
                                Push                            	
                            </button>
                        </div>
                    </div>
                    <div id="edit-donation-button-info" class="modal hide">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal">
                                &times;</button>
                        </div>

                        <div class="modal-body">
                            <div class="popup-field">
                                <label for="ButtonDescription">
                                    What is the donation for?
                                </label>
                                <textarea cols="70" data-val="true" data-val-length="The field What is the donation for must be a string with a maximum length of 42." data-val-length-max="42" id="ButtonDescription" name="ButtonDescription" rows="2">
</textarea>
                                <span id="description-chars-left"></span>
                                <div id="description-error" class="validation-error"></div>
                            </div>
                            
                            <div class="popup-field">
                                <label for="ButtonAmount">
                                    Minimum amount?
                                </label>
                                <input class="text-box single-line" data-val="true" data-val-number="The field ButtonAmount must be a number." id="ButtonAmount" name="ButtonAmount" type="text" value="" />
                                <div id="amount-error" class="validation-error"></div>
                            </div>
                            
                            <div class="popup-field">
                                <label>
                                    Change a picture?
                                </label>
                                <div id="donation-image-container">
                                    <img id="donate-button-image" alt="Donate Button Image" src="../Content/images/defaultDonationImage.png" />
                                    <input type="file" name="donateImage" accept="image/*" id="choose-donate-image-input" title="Change an image" />
                                    <a id="remove-donate-image" title="Remove Image" href="#">
                                        <span>×</span>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="popup-field">
                                <label for="ButtonInstructions">
                                    Special instructions?
                                </label>
                                <textarea cols="70" data-val="true" data-val-length="The field Special instructions must be a string with a maximum length of 135." data-val-length-max="135" id="ButtonInstructions" name="ButtonInstructions" rows="3">
</textarea>
                                <span id="instructions-chars-left"></span>
                            </div>
                            
                            <div class="bottom-explanation">
                                We'll get the user's name, email and telephone number for you as well as send them 
                                a receipt confirming their donation.
                            </div>
            
                            <div class="bottom-buttons">
                                <button id="save-donation-info" class="btn">Save</button>
                            </div>
                        </div>
                    </div>
</form>
                <div class="clear"></div>
                
                   
                <h3 class="feed-heading">Feed</h3>
                
                    <div id="notifications" class="feed-content">
                            <div class="dashboard-post" data-notificationid="f8eae458-6452-4e7f-ac22-e9deef236a6f">
                                <div class="post-first-row">
                                    <div class="post-main-content">
                                        <div class="feed-date">
                                            <span class="sent-notification-date">
                                                10/27/2014 04:09 a.m.
                                            </span>
                                
                                            <span class="cross-posting">
                                                                                            </span>
                                        </div>
                                 
                                        <div class="sent-notification-body">
                                

                                            <div class="post-body">
                                                    <img src="http://pushlocal.com/notification_images/36293f92-755b-4bd5-ba1c-1ea86a4a772d.png" alt="Notification Image" class="sent-notification-image"/>
                                                <div class="post-text">
                                                    hello world: Working on shop union.
                                                </div>
                                            </div>
                                                
                                            <div class="post-controls">
                                                <a class="openStats" href="#null">View stats</a>
                                                <a class="deleteExistingPost" href="/Dashboard/DeleteNotification?notificationID=f8eae458-6452-4e7f-ac22-e9deef236a6f" onclick="return confirm(&#39;Are you sure you want to delete this post?&#39;);">Delete post</a>
                                            </div>
                                                
                                            
                                        </div>
                                            
                                        <div class="sent-notification-right-elements">
                                            <div class="cross-posting">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="stats-main post-right-col" style="display: none;">
                                        <div class="button-stats-header">
                                            Donations
                                        </div>
                                        <div class="button-stats-amount">
                                            $0
                                        </div>
                                        <div class="button-stats-links">
                                            <a href="#" class="view-payments-link">View</a>
                                            <a href="/Dashboard/ExportChargesForNotification?notificationID=f8eae458-6452-4e7f-ac22-e9deef236a6f" class="export-payments-link">Export</a>
                                        </div>
                                    </div>

                                </div>
                                
                                <div class="post-second-row" style="display: none;">
                                    <div class="links">
                                        <span class="view-link notification-link"><span class="metric-value">3</span> views</span>
                                        <span class="like-link notification-link"><span class="metric-value">0</span> likes</span>
                                        <span class="share-link notification-link"><span class="metric-value">0</span> shares</span>
                                        <span class="click-link notification-link"><span class="metric-value">0</span> clicks</span>
                                        <span class="link-click-link notification-link"><span class="metric-value">0</span> link clicks</span>
                                    </div>
                                    
                                    <div class="stats-bottom post-right-col" style="display: none;">
                                        <span class="notification-link">
                                            <span class="metric-value">0</span> donations
                                        </span>
                                    </div>
                                </div>
                            </div>
                    </div>
                
            </div>
            
            <div id="dashboard-right-col">
                <h3>Scheduled posts</h3>
                
                
            </div>
            <div class="clear"></div>
        </div>
     </div>
     
     <div id="footer">
		<div id="footer-inner">
			<div id="copyright">&copy; 2014, Shopunion.org</div>
			<ul id="bottom-menu">
				<li class="first"><a href="http://www.facebook.com/shopunion">About us</a></li>
                <li><a href="mailto:info@shopunion.org">Contact us</a></li>
                <li><a href="http://www.twitter.com/#!/push_lc">Twitter</a></li>
				<li><a href="/Home/Terms">Terms &amp; conditions</a></li>
                <li><a href="/Home/PrivacyPolicy">Privacy policy</a></li>
                <li><a href="http://pushlocal.uservoice.com/">Support</a></li>
			</ul>
		</div>
	</div>
        
        <div id="tmpNotifications" style="display: none"></div>
        <script type="text/javascript">
            (function () {
                var pageSize = 10;
                var curPageIndex = 1;
                var notifications = $('#notifications');
                var tmpNotifications = $('#tmpNotifications');
                var lnkLoad = $('#loadNotificationsPage');
                lnkLoad.on('click', function (e) {
                    e.preventDefault();
                    tmpNotifications.load('DashBoard/GetNotificationsPage?pageSize=' + pageSize + '&pageIndex=' + curPageIndex++, function () {
                        var newNotifications = tmpNotifications.children();
                        newNotifications.hide();
                        notifications.append(tmpNotifications.html());
                        notifications.children().fadeIn(300);
                        if (newNotifications.length < pageSize) {
                            lnkLoad.hide();
                        }
                    });
                });
            })();
        </script>
        
        
        <div id="tmpFutureNotifications" style="display: none"></div>
        <script type="text/javascript">
            (function () {
                var pageSize = 10;
                var curPageIndex = 1;
                var notifications = $('.sheduled-post:last');
                var tmpNotifications = $('#tmpFutureNotifications');
                var lnkLoad = $('#loadFutureNotificationsPage');
                lnkLoad.on('click', function (e) {
                    e.preventDefault();
                    tmpNotifications.load('DashBoard/GetNotificationsPage?future=true&pageSize=' + pageSize + '&pageIndex=' + curPageIndex++, function () {
                        var newNotifications = tmpNotifications.children();
                        newNotifications.hide();
                        notifications.after(tmpNotifications.html());
                        $('#dashboard-scheduled-post').children().fadeIn(300);
                        if (newNotifications.length < pageSize) {
                            lnkLoad.hide();
                        }
                    });
                });
            })();
        </script>
        
        <div id="edit-notification" class="modal hide">
            <div class="ie-top-modal-bg"></div>
            <div class="modal-body">
                <button class="close" data-dismiss="modal">×</button>
                <h4>Edit post</h4>
                <div id="edit-notification-body">
                    
                </div>
            </div>
        </div>
        
    <div id="dashboardErrorBox" class="modal hide">
        <div class="modal-body">
            <button class="close" data-dismiss="modal">
                ×</button>
            <h4>
                Error</h4>
            <p>
                <label id="errorLabel"></label>
                <div class="validation-summary-valid" data-valmsg-summary="true"><ul><li style="display:none"></li>
</ul></div>
            </p>
            <div class="center">
                <div class="btn link-btn close-this-modal" style="width: 50px">Ok</div>
            </div>
        </div>
    </div>
    
    <div id="charges-statistics-modal" class="modal hide">
        <div class="modal-header">
            <button class="close" data-dismiss="modal">
                &times;</button>
        </div>

        <div class="modal-body">
            <table class="table table-striped" id="charges-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Amount</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody id="charges-table-body">
                    
                </tbody>
            </table>
        </div>
    </div>
    
    <script id="charges-statistics-row-template" type="text/x-handlebars-template">
        <tr>
            <td>{{Date}}</td>
            <td>{{FirstName}}</td>
            <td>{{LastName}}</td>
            <td>${{Amount}}</td>
            <td>{{Email}}</td>
        </tr>        
    </script>
</body></html>




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
<script src="<?php echo base_url();?>assets/scripts/placeholder.js"></script>
