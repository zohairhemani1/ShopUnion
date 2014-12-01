<div id="header">
    	<div class="header-inner">
            <a href="#" id="logo">
            	<img src="<?php echo base_url();?>assets/images/logo.png" width="223" alt="" />
            </a>
        </div>    
    </div>
    
    <div class="clearblock"></div>
    
    <div class="top-tools">
        <div class="top-tools-inner">
            <div class="btn-group user-btn">
                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                    <span>Hello <?php echo $advertiser->Fname; ?>!</span> 
                    <span class="label label-info"><?php echo $advertiser->followers.' Follower'.($advertiser->followers == 1 ? '':'s');?></span>
                    <span class="caret"></span>
                </a>
                  <ul class="dropdown-menu pull-right">
                      <a href="dashboard/logout">Logoff</a>
                  </ul>
            </div>
        
            <div class="notifications">
            	<span class="badge badge-important">Notification</span> 
                <span id="latest-message-text">
                    
                </span>
            </div>	
        </div>
    </div>
    
    <div class="clearblock"></div>
    
    
    <div id="wraper">
        <div id="content">
            <!--<div id="latest-message">
                <label id="latest-message-label" class="bold">Message:</label>
                <span id="latest-message-text">
                    Hello!
                </span>
            </div>-->
            
		    <div class="clearblock"></div>
	   
            <!-- navigation -->
            <div class="left-nav">
   	            <ul class="nav-ul">
	                <li class="active"><a href="#">Dashboard</a></li>
    	            <li><a href="<?php echo base_url(); ?>dashboard/business">My account</a></li>
    	            <li><a href="/Business/ConnectedAccounts">Connected accounts</a></li>
    	            <li><a href="/Channels">Channels</a></li>
    	            <li><a href="<?php echo base_url(); ?>dashboard/changepassword">Password</a></li>                                        
        	    </ul>
                
        <div class="completness">
            <h3>Profile Completeness</h3>
                    
            <div class="completness-digits">
                <img src="<?php echo base_url();?>assets/images/Progress3.png"  />
            </div>
                    
            <div class="completness-desc">
                Follow the steps below to complete your profile and get the most out of your account
            </div>
                    
            <div class="completness-steps">
                <ul>
                    <li class="completed">
                        1. Sign Up
                    </li>
	                <li >
		                2. Update your profile picture
	                </li>
					<li class="completed">
                        3. Add your location
                    </li>
                    <li >
                        4. Connect a social account
                    </li>
                    <li >
                        5. Send a Push
                    </li>
                    <li class="completed">
                        6. Schedule a Push
                    </li>                                                                                                                
                </ul>
            </div>
        </div>


            </div>