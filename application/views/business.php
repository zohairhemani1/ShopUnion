<html>
<head>
        <title>My account - Shopunion</title>
		
		<?php include('dashboard_commonHead.php'); ?>
        
		<script type="text/javascript" src="https://checkout.stripe.com/v2/checkout.js"></script>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    </head>
	<body cz-shortcut-listen="true">
		<?php include('dashboard_header.php'); ?>
				
				<!-- content -->
            	<div id="account-left-col">
            	
					<h4>Personal info</h4>
                    
					<div class="account-personal">
                	    
						<div id="account-personal-info-block">
							<a href="#edit-personal-info" class="pull-right start-modal"><i class="icon-pencil"></i> Edit</a>
                    
							<div class="account-photo">
								<img src="<?php echo base_url();?>assets/images/upload-photo-blank.gif" />
								<a href="#change-profile-picture" class="start-modal link-btn btn">Change photo</a>
							</div>
                            <table id="user-info-table">
                                <tbody><tr>
                                           <td style="width: 98px">Username:</td>
                                           <td class="value"><?php echo $advertiser->Fname.' '.$advertiser->Lname;?></td>
                                       </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td class="value"><?php echo $advertiser->email; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="clearfix"></div>
						</div>
					</div>
                
					<h4>Packages</h4>
					<div class="account-packages">
<form action="/Business/Charge" enctype="multipart/form-data" id="upgrade-form" method="post">									<p>You are currently on the <strong>Basic package</strong> with <strong>44 days remaining</strong> on the trial period.</p>
								<div class="package">
									<a id="btnBasicUpg" class="no-decor">
										<div class="btn link-btn pay-btn">Subscribe to Basic</div>
									</a>
								</div>
								<div class="package">
									<a id="btnPremiumUpg" class="no-decor">
										<div class="btn pay-btn btn-warning">Subscribe to Premium</div>
									</a>
								</div>
							<input type="hidden" name="couponCode" id="couponCodeToSubmit" />
</form>                    
					</div>
                
                
				</div>
        
				<div id="account-right-col">
            	
					<h4>Business info</h4>
                    
					<div class="account-business">
						<a href="#edit-business-info" class="pull-right start-modal"><i class="icon-pencil"></i> Edit</a>
                    
						<div class="clearblock">&nbsp;</div>
                    
						<div id="account-business-info-block">
							<table id="account-info-table">
								<tbody>
									<tr>
										<td>Business name:</td>
										<td class="value"><?php echo $advertiser->business_name;?></td>
									</tr>
									<tr>
										<td>Feed:</td>
										<td class="value">Boswell Bay, AK</td>
									</tr>
									<tr>
										<td>Category:</td>
										<td class="value"><?php echo $advertiser->category; ?></td>
									</tr>
									<tr>
										<td>Phone:</td>
										<td class="value">(786) 110-786 </td>
									</tr>
									<tr>
										<td>Website:</td>
										<td class="value"><?php echo $advertiser->website;?></td>
									</tr>
									<tr>
										<td>Frequency:</td>
										<td class="value"><?php echo $advertiser->frequency; ?></td>
									</tr>
									<tr>
										<td>Type:</td>
										<td class="value"><?php echo $advertiser->type;?></td>
									</tr>
									<tr>
										<td>Description:</td>
										<td class="value"><?php echo $advertiser->desc;?></td>
									</tr>
								</tbody></table>
						</div>
					</div>
	            
					<h4>Your location</h4>
					<div class="account-business">
						<a href="#edit-location-info" class="pull-right start-modal"><i class="icon-pencil"></i> Edit</a>
                    
						<div class="clearblock">&nbsp;</div>
					
						<table id="location-table">
							<tbody>
								<tr>
									<td>Street address:</td>
									<td class="value"><?php echo $advertiser->address;?></td>
								</tr>
								<tr>
									<td>City:</td>
									<td class="value">Karachi</td>
								</tr>
								<tr>
									<td>State:</td>
									<td class="value">Alaska</td>
								</tr>
							</tbody>
						</table>
					</div>
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
					<li><a href="http://shopunion.uservoice.com/">Support</a></li>
				</ul>
			</div>
		</div>
        
		<div id="edit-personal-info" class="modal hide">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">&times;</button>
				<h4>Edit personal info</h4>
			</div>
			<div class="modal-body">
<form action="/Business/EditPersonal" id="editPersonalForm" method="post">						<p>
							<label for="first-name-box">First name:</label>
							<input class="text" data-val="true" data-val-required="The First name: field is required." id="BusinessEditModel_FirstName" name="BusinessEditModel.FirstName" type="text" value="<?php echo $advertiser->Fname; ?>" />
							<label id="firstNameError" class="formError">This field is required</label>
						</p>
					    <p>
					        <label for="last-name-box">Last name:</label>
					        <input class="text" data-val="true" data-val-required="The Last name: field is required." id="BusinessEditModel_LastName" name="BusinessEditModel.LastName" type="text" value="<?php echo $advertiser->Lname; ?>" />
					        <label id="lastNameError" class="formError">This field is required</label>
					    </p>
                        <p>
							<label for="email-box">Email:</label>
							<input class="text" data-val="true" data-val-required="The Email: field is required." id="BusinessEditModel_Email" name="BusinessEditModel.Email" type="text" value="<?php echo $advertiser->email; ?>" />
							<label id="emailError" class="formError">This field is required</label>
						</p>
</form>
				<div id="btnEditPersonal" class="btn link-btn">Save changes</div>
			</div>
		</div>
		<div id="edit-business-info" class="modal hide">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">&times;</button>
				<h4>Edit business info</h4>
			</div>
			<div class="modal-body">
<form action="/Business/EditBusiness" id="editBusinessForm" method="post">						<table>
							<tr>
								<td class="title">Business name:</td>
								<td>
									<input class="text" data-val="true" data-val-required="The Business Name field is required." id="BusinessEditModel_BusinessName" name="BusinessEditModel.BusinessName" type="text" value="<?php echo $advertiser->business_name; ?>" />
									<label id="businessNameError" class="formError">This field is required</label>
								</td>
							</tr>
							<tr>
								<td class="title">Phone</td>
								<td>
								    <input class="text" id="BusinessEditModel_Phone" name="BusinessEditModel.Phone" placeholder="(000) 000-0000" type="text" value="786110786      " />
								    <label id="phoneError" class="formError">This field is required</label>
								</td>
							</tr>
							<tr>
								<td class="title">Website:</td>
								<td><input class="text" id="BusinessEditModel_Site" name="BusinessEditModel.Site" type="text" value="<?php echo $advertiser->website; ?>" /></td>
							</tr>
							<tr>
								<td class="title">Description:</td>
								<td>
									<textarea class="text" cols="20" data-val="true" data-val-required="The Description field is required." id="BusinessEditModel_Description" name="BusinessEditModel.Description" rows="2"><?php echo $advertiser->desc; ?></textarea>
									<label id="descriptionError" class="formError">This field is required</label>
								</td>
							</tr>
							<tr>
								<td class="title">Category:</td>
								<td>
									<div class="btn-group">
										<a class="btn dropdown-toggle" data-toggle="dropdown" href="#"><div style="float:left"><label id="selectedCategory" style="margin-bottom:0"><?php echo $advertiser->category; ?></label></div><div class="arrows"></div></a>
										<input data-val="true" data-val-required="The Category field is required." id="BusinessEditModel_SelectedCategory" name="BusinessEditModel.SelectedCategory" type="hidden" value="0db27434-b034-4a3d-8ef4-79cdedc3e2fe" />
										<ul id="categoryDDL" class="dropdown-menu">
											<?php
											foreach($categories as $cat){
												echo '<li>'. $cat->category . form_input(array('type' => 'hidden','value' => $cat->cat_id)) . '</li>';
											}
											?>    
										</ul>
										<script type="text/javascript">
											(function () {
												var label = jQuery('#selectedCategory');
												var hf = jQuery('#BusinessEditModel_SelectedCategory');
												jQuery('#categoryDDL').children('li').click(function () {
													label.text(jQuery(this).text());
													hf.val(jQuery(jQuery(this).children()[0]).val());
												});
											})()
										</script>
									</div>
									<label id="categoryError" class="formError" style="margin-top: 0px;">This field is required</label>
								</td>
							</tr>
							<tr>
								<td class="title">Frequency:</td>
								<td>
									<div class="btn-group">
										<a class="btn dropdown-toggle" data-toggle="dropdown" href="#"><div style="float:left"> <label id="selectedFrequency" style="margin-bottom:0"><?php echo $advertiser->frequency; ?></label></div><div class="arrows"></div></a>
										<input data-val="true" data-val-required="The Frequency field is required." id="BusinessEditModel_SelectedFrequency" name="BusinessEditModel.SelectedFrequency" type="hidden" value="1aab2603-333a-4874-9eb1-5fa1d3010ddf" />
										<ul id="frequencyDDL" class="dropdown-menu">
											<?php
											foreach($frequencies as $freq){
												echo '<li>'. $freq->frequency . form_input(array('type' => 'hidden','value' => $freq->freq_id)) . '</li>';
											}
											?> 
										</ul>
										<script type="text/javascript">
											(function () {
												var label = jQuery('#selectedFrequency');
												var hf = jQuery('#BusinessEditModel_SelectedFrequency');
												jQuery('#frequencyDDL').children('li').click(function () {
													label.text(jQuery(this).text());
													hf.val(jQuery(jQuery(this).children()[0]).val());
												});
											})()
										</script>
									</div>
									<label id="frequencyError" class="formError" style="margin-top: 0px;">This field is required</label>
								</td>
							</tr>
							<tr>
								<td class="title">Feed:</td>
								<td>
									<div class="btn-group">
										<a class="btn dropdown-toggle" data-toggle="dropdown" href="#"><div style="float:left"> <label id="selectedFeed" style="margin-bottom:0"> Boswell Bay, AK </label></div><div class="arrows"></div></a>
										<input data-val="true" data-val-required="The City field is required." id="BusinessEditModel_SelectedFeed" name="BusinessEditModel.SelectedFeed" type="hidden" value="" />
										<ul id="feedDDL" class="dropdown-menu">
												<li>Alatna, AK <input type="hidden" value="f3146c6b-0860-42ce-b27e-d1d8ecf0b278" /></li>    
												<li>Amelia Island/Fernandina Beach, FL <input type="hidden" value="8350def4-a556-4a1b-a1ed-1f1ec54616b3" /></li>    
												<li>Anaktuvuk Pass, AK <input type="hidden" value="f74a2be6-cf8e-4cc3-9145-4c0c221024f2" /></li>    
												<li>Annapolis, MD <input type="hidden" value="cc1d66bc-9cd1-4287-9e90-95a749411e0d" /></li>    
												<li>Anvik, AK <input type="hidden" value="e14f192a-a371-4de8-af5e-3017c49e3ee4" /></li>    
												<li>Astoria, NY <input type="hidden" value="b8ff80d6-0813-4a22-9c4f-c2674906cd43" /></li>    
												<li>Aurora, IL <input type="hidden" value="d7f4e821-85e9-43d6-b80c-71b7d4d1fee3" /></li>    
												<li>Austin, TX <input type="hidden" value="45f91aff-929a-4329-8805-f2efaf340216" /></li>    
												<li>Baggs, WY <input type="hidden" value="bc84e342-0199-4a9e-8713-363cff603249" /></li>    
												<li>Baranof, AK <input type="hidden" value="53381021-fa8e-44f7-85b1-51eb8a5718e6" /></li>    
												<li>Baton Rouge, LA <input type="hidden" value="2f61c88c-e6c9-49b6-a97c-3519cfb28eb9" /></li>    
												<li>Bay Saint Louis, MS <input type="hidden" value="74a14fb7-7302-46ec-90a0-7a827647cdce" /></li>    
												<li>Boise Hills Village, ID <input type="hidden" value="7c07b2e8-4bf6-45fb-a5c5-0e3355a4df69" /></li>    
												<li>Boise/Treasure Valley, ID <input type="hidden" value="59d5e185-102d-44be-9990-a52302375beb" /></li>    
												<li>Boswell Bay, AK <input type="hidden" value="a9497abf-90cb-4f89-9d97-86d3aca12e1b" /></li>    
												<li>Brookhaven, MS <input type="hidden" value="257730d0-b779-4817-a922-8d7f1df5b700" /></li>    
												<li>Buffalo, NY <input type="hidden" value="9bd8e544-b18c-479e-9516-6ded4434e32b" /></li>    
												<li>Cedar Park / Leander, TX <input type="hidden" value="4f506b7e-08ba-43d3-a9cf-3528aae8fa6b" /></li>    
												<li>Cedar Rapids, IA <input type="hidden" value="27ff13c6-4048-4d18-bc97-0ad04b254461" /></li>    
												<li>Charleston, SC <input type="hidden" value="58a1b52f-e52d-4958-9c62-948076ba527e" /></li>    
												<li>Charlotte, NC <input type="hidden" value="418c0fa1-3ec7-4a30-948e-bb01831f8e24" /></li>    
												<li>Chesapeake, VA <input type="hidden" value="6fbcb522-23ed-419d-9feb-86c681cea8c5" /></li>    
												<li>Chesterfield, MO <input type="hidden" value="8059029c-1465-4795-b37e-86c48073f532" /></li>    
												<li>Chicago, IL <input type="hidden" value="b9f746b7-8135-4479-802d-c1cec2de4bb2" /></li>    
												<li>Christopher Creek, AZ <input type="hidden" value="b6f2b8ad-8289-421b-91f2-d044514ab188" /></li>    
												<li>Cleveland, MS <input type="hidden" value="c20788a6-915a-492c-856e-e5c91622b0c1" /></li>    
												<li>Clifton, NJ <input type="hidden" value="c819365c-e6e5-4727-beca-f78ac453ed2b" /></li>    
												<li>Columbus, OH <input type="hidden" value="a3b97739-a1e2-4aca-b349-41c111a90604" /></li>    
												<li>Denver, CO <input type="hidden" value="165976c1-4ad6-48d8-ad52-2be2f76fae5a" /></li>    
												<li>Douglasville, GA <input type="hidden" value="7a193710-3606-4abc-9f73-76ec884124c2" /></li>    
												<li>Driftwood, TX <input type="hidden" value="8638c49f-ba20-422f-97d5-5ec98047e8c6" /></li>    
												<li>Dripping Springs, TX <input type="hidden" value="d36abdd5-37c0-406b-9ca8-c0c135c6c122" /></li>    
												<li>Duluth, GA <input type="hidden" value="8f931a66-8b3e-454c-9ba0-b07423c9584a" /></li>    
												<li>Durango, CO <input type="hidden" value="9e586dff-b9d5-449b-bcdc-6b89f08ca561" /></li>    
												<li>Eagle Nest, ID <input type="hidden" value="7f7de0b8-3a4f-4b7c-9dfb-4e8bfb5e4542" /></li>    
												<li>Fayette, MS <input type="hidden" value="b7872a3a-7c73-459d-81fb-0a1a36035cd7" /></li>    
												<li>Ferriday, LA <input type="hidden" value="38643b18-ed99-4a7a-a44e-9578bc0e39fb" /></li>    
												<li>Fremont, CA <input type="hidden" value="abd2e1ae-279e-4b6f-b46b-00ea60b395d4" /></li>    
												<li>Greenville, SC <input type="hidden" value="cc140e40-147a-450e-b5f7-220b0a630730" /></li>    
												<li>Hattiesburg/Pinebelt, MS <input type="hidden" value="506170d2-9845-4ac5-be3f-fee2ea872c8d" /></li>    
												<li>Hickory, NC <input type="hidden" value="a7470a99-21e5-4eff-aefa-abeb38cb120c" /></li>    
												<li>Hollywood, CA <input type="hidden" value="392ec30e-1bfd-403c-bb3a-c26f36b7a661" /></li>    
												<li>Hoskins, CT <input type="hidden" value="4b261db9-e5bd-4e4b-9ca2-3baeca084105" /></li>    
												<li>Houston, TX <input type="hidden" value="1b856f2f-1f66-40e8-9422-f09b7c7fa7ad" /></li>    
												<li>Huntsville, TX <input type="hidden" value="fe54dca0-cbdb-4609-9d1d-01ff0e3bb2a7" /></li>    
												<li>Indianapolis, IN <input type="hidden" value="489ef7ec-fd75-415c-9b36-1826e596067e" /></li>    
												<li>Jackson, MS <input type="hidden" value="90291f0c-ade7-495f-89cd-e5c14dedee7b" /></li>    
												<li>Johnson City, TN <input type="hidden" value="2240f2ff-7251-4620-bf9c-f8c00a7fad78" /></li>    
												<li>Kansas City, MO <input type="hidden" value="5dc43bf9-26ef-464b-a8e4-34f530c9a2d5" /></li>    
												<li>Ketchum, ID <input type="hidden" value="c76144f1-8e24-434f-a423-4e1178cae62c" /></li>    
												<li>Kingsland / St. Mary&#39;s, GA <input type="hidden" value="24c30919-c351-42df-a281-267ea2daf168" /></li>    
												<li>LA Gateway, CA <input type="hidden" value="8df10a49-3758-402d-9d57-bf455fbba419" /></li>    
												<li>LA Hollywood - Downtown, CA <input type="hidden" value="d6e47ce7-1cfd-4212-93aa-5e6087b206b4" /></li>    
												<li>LA San Fernando Valley, CA <input type="hidden" value="046b3fa8-aec2-431d-890e-96fe0d8a1006" /></li>    
												<li>LA San Gabriel Valley, CA <input type="hidden" value="47db5cbb-cfe9-4337-a53c-ad6f16e4a0b7" /></li>    
												<li>LA South Bay, CA <input type="hidden" value="b1ae5822-c7e1-458c-a02c-2633cdf53966" /></li>    
												<li>LA Westside - Santa Monica, CA <input type="hidden" value="f4b39bbb-e486-463d-99d6-d459aae215cc" /></li>    
												<li>LA Westside - Santa Monica, CA <input type="hidden" value="c0504908-d80e-48d6-8d32-d2757a4a8fce" /></li>    
												<li>Lake Charles, LA <input type="hidden" value="5b113f91-30d8-4773-86af-4f82f67b753f" /></li>    
												<li>Lake Los Angeles, CA <input type="hidden" value="4489f9f8-fb4a-4d23-a368-c7b9018e4bba" /></li>    
												<li>Las Vegas, NV <input type="hidden" value="b0ba17e7-b682-4e66-b978-a1ada0747e2a" /></li>    
												<li>Lawrence County, TN <input type="hidden" value="ae8fc371-5daa-4d86-bb8c-3460b890cbdd" /></li>    
												<li>League City, TX <input type="hidden" value="c03e1087-e70c-4cb7-a191-143a7c58c62e" /></li>    
												<li>Locke, CA <input type="hidden" value="6cf43034-cce5-45ee-95f1-401c00f5c5d3" /></li>    
												<li>Lynchburg, VA <input type="hidden" value="f5baf6e0-e8db-440c-ace5-597e3a4facfd" /></li>    
												<li>Madison, WI <input type="hidden" value="c6bb5c5c-5c27-43a9-b109-f2a3e32a3624" /></li>    
												<li>Memphis, TN <input type="hidden" value="7534d9e1-f6b3-4b8d-b130-f1edccf1a504" /></li>    
												<li>Meridian, ID <input type="hidden" value="ccfb6f92-25dd-46c7-a2a9-2877cd9d0acd" /></li>    
												<li>Miami, FL <input type="hidden" value="885a2786-b119-4ff9-968c-380cc19e76eb" /></li>    
												<li>Milwaukee, WI <input type="hidden" value="1edfcdc3-84ba-4792-b7bb-977a5023321b" /></li>    
												<li>Minneapolis, MN <input type="hidden" value="0a8a4ff6-bf7b-4a42-af72-cc9220f93575" /></li>    
												<li>Missouri City, TX <input type="hidden" value="f5c7d11b-cc07-4c42-b9cb-d5836ffdd21f" /></li>    
												<li>Montgomery County/Conroe TX <input type="hidden" value="0a69fdac-2829-45f0-aea2-09de2b1bfd9f" /></li>    
												<li>Monticello, MS <input type="hidden" value="3a36b9ff-b3a6-482e-8373-47062839ac1e" /></li>    
												<li>Mooresville, IN <input type="hidden" value="f12f820d-beaa-4ce6-b5b7-8aa0f0b27b7d" /></li>    
												<li>Nashville, TN <input type="hidden" value="716f2ec0-c4e4-4f4f-9229-6f972bdc8b78" /></li>    
												<li>Natchez, MS/Vidalia, LA <input type="hidden" value="db11d41a-4a71-4a4f-ae0d-c817bd03459c" /></li>    
												<li>New Braunfels, TX <input type="hidden" value="cacee484-2c41-409e-ac21-e8d81b9f4b73" /></li>    
												<li>New Orleans (Uptown), LA <input type="hidden" value="9836629f-726d-4c89-b97a-a42a79af7bc9" /></li>    
												<li>New York, NY <input type="hidden" value="5c792064-21f2-492e-859d-230ad56cdcc5" /></li>    
												<li>Norfolk, VA <input type="hidden" value="ceb02a85-a867-486d-a2ca-177ca7b4df53" /></li>    
												<li>Oxford, MS <input type="hidden" value="646870b6-e687-4a27-a798-1f2b4326a6da" /></li>    
												<li>Parma, OH <input type="hidden" value="7282854f-a7d3-4a3f-add1-45f7bac1f246" /></li>    
												<li>Pearland/Friendswood/Alvin, TX <input type="hidden" value="4f18c53c-80eb-4f08-a50d-e05f24b4fe6a" /></li>    
												<li>Philadelphia, PA <input type="hidden" value="40b904eb-6429-4f09-aff7-5112cde6a868" /></li>    
												<li>Phoenix, AZ <input type="hidden" value="db373e7d-86a5-4ec7-a7c4-f81ed1779435" /></li>    
												<li>Pittsburgh, PA <input type="hidden" value="3e1f807f-071e-4a62-989b-2c8accee6437" /></li>    
												<li>Pocahontas, TN <input type="hidden" value="ada3d9b8-4f93-4c29-a0d5-0abacb10c690" /></li>    
												<li>Quantico, MD <input type="hidden" value="09cc5a0f-a547-42e3-b462-e140be1be907" /></li>    
												<li>Richardson, TX <input type="hidden" value="36f06290-030e-4d6e-85ad-1d7e19329981" /></li>    
												<li>Richmond, VA <input type="hidden" value="d7059e2a-f9e3-47b1-8585-68e131dc77ff" /></li>    
												<li>Rochester, NY <input type="hidden" value="a175998f-57dc-4601-b4f6-1956e9572ac5" /></li>    
												<li>Round Rock/Pflugerville/Hutto, TX <input type="hidden" value="c550347c-d966-41fd-beba-29e55b726a1b" /></li>    
												<li>Salem, OR <input type="hidden" value="35e9556f-dba3-4a89-8258-09c91ebab5f7" /></li>    
												<li>Salisbury, NC <input type="hidden" value="780743be-e8a8-4e08-bf23-7274b1f58c41" /></li>    
												<li>Salt Lake City, UT <input type="hidden" value="f20caca7-5db9-4204-8292-a51a1109b04e" /></li>    
												<li>San Antonio, TX - Alamo Heights <input type="hidden" value="00b2f544-885e-46c2-94b9-1a5871182333" /></li>    
												<li>San Antonio, TX - Boerne <input type="hidden" value="c0d7e64c-f448-49ce-8b20-979b96d0d72f" /></li>    
												<li>San Antonio, TX - North West <input type="hidden" value="ec8b6d61-7acf-42b0-a52e-62eecc686a75" /></li>    
												<li>San Antonio, TX - Riverwalk/Downtown <input type="hidden" value="411dca4a-1aa0-4328-ad86-84459614ee24" /></li>    
												<li>San Antonio, TX - Selma/Shertz <input type="hidden" value="860afe63-65be-4ec4-a2e5-57e2e77618af" /></li>    
												<li>San Antonio, TX - Stone Oak <input type="hidden" value="3da987c0-bb99-493e-88b2-cd55fbd8ebc1" /></li>    
												<li>San Marcos/Kyle, TX <input type="hidden" value="8bb3809d-26d2-4820-afe2-8a3afbed5006" /></li>    
												<li>Seattle, WA <input type="hidden" value="89f9b6eb-f18d-430a-8889-82b75788410a" /></li>    
												<li>Seguin, TX <input type="hidden" value="7361ced1-e5d3-438b-aa42-847d04c154a8" /></li>    
												<li>St. Francisville, LA <input type="hidden" value="4e7d4d2d-34a4-4663-9d6a-e13847e014cf" /></li>    
												<li>Sunny Acres, MD <input type="hidden" value="dc697df3-1a87-4f24-9259-c5e66e8b21e5" /></li>    
												<li>Tampa, FL <input type="hidden" value="7041d507-b6fc-4475-94d9-f0e5a7f8340e" /></li>    
												<li>Temple / Belton, TX <input type="hidden" value="a3b917cf-6d1c-4c71-a4c6-74e86f8984a8" /></li>    
												<li>The Shoals, AL <input type="hidden" value="984546f0-4704-4d87-b028-036f1a203ed7" /></li>    
												<li>The Woodlands, TX <input type="hidden" value="948c430e-d47a-4e83-8f47-0d996a5f4c0a" /></li>    
												<li>Toms River, NJ <input type="hidden" value="a72055fa-8716-452d-9723-6f9de2eea8c9" /></li>    
												<li>Tucson, AZ <input type="hidden" value="3b521157-3832-4b03-8f73-926415437c00" /></li>    
												<li>Victorville, CA <input type="hidden" value="f227f8e7-9b43-474b-bf94-3051dddaf6b7" /></li>    
												<li>Vine Grove, KY <input type="hidden" value="4ba9d1fc-dded-4e6c-b027-c46b6b37da62" /></li>    
												<li>Water Valley, MS <input type="hidden" value="e8d8152e-d3b8-4c29-9380-7354fc124ca4" /></li>    
												<li>Wellington, FL <input type="hidden" value="7362b505-adbc-4297-ac18-8b51607120be" /></li>    
												<li>West Palm Beach, FL <input type="hidden" value="ed4385e4-c4ac-43e6-ad62-fafe98a7b0d7" /></li>    
												<li>Woodbury, MN <input type="hidden" value="35b002a2-edf5-4bb6-b7b8-a0cab3696dd5" /></li>    
												<li>Woodville, TX <input type="hidden" value="e2370b43-2bff-47c3-b842-dd6c9381232a" /></li>    
												<li>York, PA <input type="hidden" value="bbc0bcf6-d7c2-4cbe-9f67-fa8ca1bcffb0" /></li>    
										</ul>
										<script type="text/javascript">
											(function () {
												var label = jQuery('#selectedFeed');
												var hf = jQuery('#BusinessEditModel_SelectedFeed');
												jQuery('#feedDDL').children('li').click(function () {
													label.text(jQuery(this).text());
													hf.val(jQuery(jQuery(this).children()[0]).val());
												});
											})()
										</script>
									</div>
									<label id="feedError" class="formError" style="margin-top: 0px;">This field is required</label>
								</td>
							</tr>
							<tr>
								<td class="title">Type:</td>
								<td>
									<input class="text" data-val="true" data-val-required="The Type field is required." id="BusinessEditModel_Type" name="BusinessEditModel.Type" type="text" value="Businesss" />
									<label id="typeError" class="formError">This field is required</label>
								</td>
							</tr>
						</table>
</form>
				<div id="btnEditBusiness" class="btn link-btn">Save changes</div>
			</div>
		</div>
	
		<div id="edit-location-info" class="modal hide">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">&times;</button>
				<h4>Your location</h4>
			</div>
			<div class="modal-body">
<form action="/Business/EditAddress" id="editAddressForm" method="post"><input data-val="true" data-val-required="The BusinessID field is required." id="BusinessID" name="BusinessID" type="hidden" value="6db6f6cb-d7ea-496c-b139-0eef769b43c8" />						<table id="edit-location-table">
							<tr>
								<td class="title">
									<input id="r1" type="radio" name="BusinessEditModel.IsPhysicalAddress" value="True" >
								</td>
								<td>
									<label for="r1">Physical location</label>
								</td>
							</tr>
							<tr>
								<td class="title">
									<input id="r2" type="radio" name="BusinessEditModel.IsPhysicalAddress" value="False" 		checked="checked"
>
								</td>
								<td>
									<label for="r2">Non-Physical location</label>
								</td>
							</tr>
							<tr>
								<td class="title" colspan="2">Street Address:</td>
								<td>
									<input class="text" data-val="true" data-val-required="The Street field is required." id="BusinessEditModel_Address" name="BusinessEditModel.Address" style="width: 260px;" type="text" value="343/3 D-3 Afshan Apartments, Garden East, Soldier Bazar # 3" />
									<label id="address1Error" class="formError">This field is required</label>
								</td>
							</tr>
							<tr>
								<td class="title" colspan="2">City:</td>
								<td>
									<input class="text" data-val="true" data-val-required="The City, State field is required." id="BusinessEditModel_Address2" name="BusinessEditModel.Address2" style="width: 260px;" type="text" value="Karachi" />
									<label id="address2Error" class="formError">This field is required</label>
								</td>
							</tr>
							<tr style="margin-bottom: 5px;">
								<td class="title" colspan="2" id="stateCol" >State:</td>
							    <td>
							        <label id="SelectedStateName">Alaska</label>
							    </td>
							</tr>
							<tr id="addressTip" style="display: none">
								<td class="title" colspan="2" style="color: #ff0000">Did you mean:</td>
								<td>
									<div class="btn-group">
										<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
											<div style="float: left">
												<label style="margin-bottom: 0">
													Choose address
												</label>
											</div>
											<div class="arrows"></div>
										</a>
										<ul id="addressesDDL" class="dropdown-menu">
										</ul>
									</div>
								</td>
							</tr>
							<tr>
								<td colspan="3">
									<div id="map" style="height: 270px;"></div>
								</td>
							</tr>
						</table>
</form>
				<div id="btnEditAddress" class="btn link-btn">Save changes</div>
			</div>
		</div>
	
		<div id="change-profile-picture" class="modal hide">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">&times;</button>
				<h4>Change profile picture</h4>
			</div>
			<div class="modal-body">
				<form action="/Business/UploadPic" enctype="multipart/form-data" id="uploadPicForm" method="post">
				<img id="profile-picture-blank" src="<?php echo base_url();?>assets/images/upload-photo-blank.gif" />
						<div style="margin-bottom: 10px">
							Select a file from your computer (PNG or JPG 5120 KB max.)</div>
						<div class="clear">
						</div>
						<div class="fake-file-uploader" style="display: block;">
							<input type="text" class="input-text" /><div class="btn link-btn">
								                                        Browse...</div>
							<input type="file" name="file" class="input-file" />
							<label id="uploadPicError" class="formError" style="margin-top: 0"></label>
						</div>
						<div id="btnUploadPic" class="btn link-btn">
							Upload</div>
</form>
			</div>
		</div>
    
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
				</p>
				<div class="center">
					<div class="btn link-btn close-this-modal" style="width: 50px">Ok</div>
				</div>
			</div>
		</div>
    
		<div id="accountSuspended" class="modal hide">
			<div class="modal-body">
				<button class="close" data-dismiss="modal">
					&times;</button>
				<h4>Warning</h4>
				<p>This account is currently Suspended.</p>
				<div class="center">
					<div id="btnAccountSuspendedOk" class="btn link-btn close-this-modal" style="width: 50px">
						Ok</div>
				</div>
			</div>
		</div>
		<div id="cardUpdated" class="modal hide">
			<div class="modal-body">
				<button class="close" data-dismiss="modal">
					&times;</button>
				<h4>Information</h4>
				<p>The Credit Card info is updated successfuly</p>
				<div class="center">
					<div id="btnCardUpdatedOk" class="btn link-btn close-this-modal" style="width: 50px">
						Ok</div>
				</div>
			</div>
		</div>
		<div id="subscriptionCancelled" class="modal hide">
			<div class="modal-body">
				<button class="close" data-dismiss="modal">
					&times;</button>
				<h4>Subscription cancelled</h4>
				<p>Your subscription has been cancelled.  You will have continued access to your account until the current month has ended.</p>
				<div class="center">
					<div id="btnSubscriptionCanceledOk" class="btn link-btn close-this-modal" style="width: 50px">
						Ok</div>
				</div>
			</div>
		</div>
		<div id="chargeFailed" class="modal hide">
			<div class="modal-body">
				<button class="close" data-dismiss="modal">
					&times;</button>
				<h4>An error occurred</h4>
				<p>
						Your card was declined.
				</p>
				<div class="center">
					<div id="btnChargeFailedOk" class="btn link-btn close-this-modal" style="width: 50px">
						Ok</div>
				</div>
			</div>
		</div>
    
<div id="enterCouponCode" class="modal hide">
	<div class="modal-body">
		<button class="close" data-dismiss="modal">
			&times;</button>
		<h4>
			Coupon Code</h4>
		<p>
			Do you have a coupon code? If so, enter it below.</p>
		Code:
		<input type="text" id="couponCode" />
		<div class="right">
			<div id="skipCouponCode" class="btn link-btn close-this-modal" style="width: 50px">
				Skip
			</div>
			<div id="continueWithCouponCode" class="btn link-btn close-this-modal disabled" style="width: 50px">
				Continue
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var amountCalculator = {
		basicAmount: 5000,
		premiumAmount: 7500,

		percentOff: null,
		amountOff: null,

		setPercentOff: function (value) {
			this.percentOff = value;
			this.amountOff = null;
		},
		setAmountOff: function (value) {
			this.amountOff = value;
			this.percentOff = null;
		},

		calcBasic: function () {
			var result = this.basicAmount;
			if (this.amountOff) {
				result -= this.amountOff;
			}
			if (this.percentOff) {
				result -= (this.percentOff / 100) * result;
			}
			if (result < 0) {
				result = 0;
			}
			return result;
		},
		calcPremium: function () {
			var result = this.premiumAmount;
			if (this.amountOff) {
				result -= this.amountOff;
			}
			if (this.percentOff) {
				result -= (this.percentOff / 100) * result;
			}
			if (result < 0) {
				result = 0;
			}
			return result;
		}
	};
	

</script>
 

		<div id="errorBox" class="modal hide">
			<div class="modal-body">
				<button class="close" data-dismiss="modal">
					&times;</button>
				<h4 id="errorTitle"></h4>
				<p id="errorText"></p>
				<div class="center">
					<div id="errorOkBtn" class="btn link-btn close-this-modal" style="width: 50px">
						Ok
					</div>
				</div>
			</div>
		</div>
    
		<script type="text/javascript">
			var upgradeType = null;

			var $couponCodeToSubmit = $('#couponCodeToSubmit');

			var $errorBox = $('#errorBox');
			var showError = function (text, title) {
				$errorBox.find('#errorText').text(text);
				if (title) {
					$errorBox.find('#errorTitle').text(title);
				} else {
					$errorBox.find('#errorTitle').text('Error');
				}
				$errorBox.modal('show');
			};

			var openBasicUpgrade = function () {
				var token = function (res) {
					$("#upgrade-form").append("<input type='hidden' name='stripeToken' value='" + res.id + "'/>");
					$("#upgrade-form").append("<input type='hidden' name='accountType' value='01'/>");
					$("#upgrade-form").submit();
				};
				StripeCheckout.open({
				    key: shopUnion.stripePublishableKey,
					address: true,
					amount: amountCalculator.calcBasic(),
					name: 'Upgrade to Basic',
					description: '45-days trial',
					panelLabel: 'Upgrade',
					image: '<?php echo base_url();?>assets/images/upload-photo-blank.gif',
					token: token,
					currency: shopUnion.currency
				});
				return false;
			}, openPremiumUpgrade = function () {
				var token = function (res) {
					$("#upgrade-form").append("<input type='hidden' name='stripeToken' value='" + res.id + "'/>");
					$("#upgrade-form").append("<input type='hidden' name='accountType' value='02'/>");
					$("#upgrade-form").submit();
				};
				StripeCheckout.open({
				    key: shopUnion.stripePublishableKey,
					address: true,
					amount: amountCalculator.calcPremium(),
					name: 'Upgrade to Premium',
					//            description: '45-days trial',
					panelLabel: 'Upgrade',
					image: '<?php echo base_url();?>assets/images/upload-photo-blank.gif',
					token: token,
					currency: shopUnion.currency
				});
				return false;
			};

			var $enterCouponCode = $('#enterCouponCode');
			var $couponCode = $('#couponCode');
			$('#btnBasicUpg').on('click', function () {
				upgradeType = 'basic';
				$couponCodeToSubmit.val(null);
				$enterCouponCode.modal('show');
			});
			$('#btnPremiumUpg').on('click', function () {
				upgradeType = 'premium';
				$couponCodeToSubmit.val(null);
				$enterCouponCode.modal('show');
			});

			$enterCouponCode.on('shown', function () {
				$couponCode.focus();
			});

			$('#enterCouponCode').on('shown', function () {
				$couponCode.val(null);
			});

			var $continueButton = $('#continueWithCouponCode');
			$couponCode.on('change keyup keydown', function () {
				if ($couponCode.val() && $couponCode.val() != '') {
					$continueButton.removeClass('disabled');
				} else {
					$continueButton.addClass('disabled');
				}
			});

			$('#btnUpdateCardInfo').click(function () {
				var token = function (res) {
					$("#update-card-info-form").append("<input type='hidden' name='stripeToken' value='" + res.id + "'/>");
					$("#update-card-info-form").submit();
				};
				StripeCheckout.open({
				    key: shopUnion.stripePublishableKey,
					address: true,
					name: 'Update Card Info',
					panelLabel: 'Update',
					image: '<?php echo base_url();?>assets/images/upload-photo-blank.gif',
					token: token,
				    currency: shopUnion.currency
				});
				return false;
			});

			$('#downloadQRCode').on('click', function (e) {
				e.preventDefault();
				location.href = '/Business/DownloadQrCode?businessID=6db6f6cb-d7ea-496c-b139-0eef769b43c8';
			});

			$('#skipCouponCode').on('click', function () {
				amountCalculator.setAmountOff(null);
				amountCalculator.setPercentOff(null);

				if (upgradeType == 'basic') {
					openBasicUpgrade();
				} else if (upgradeType == 'premium') {
					openPremiumUpgrade();
				}
			});

			$('#continueWithCouponCode').on('click', function () {
				var code = $couponCode.val();
				$.get('/Business/GetCouponByCode', {
					couponCode: code
				}, function (result) {
					if (result.success) {
						$couponCodeToSubmit.val(code);

						var coupon = result.coupon;
						if (coupon.AmountOff) {
							amountCalculator.setAmountOff(coupon.AmountOff);
						}
						if (coupon.PercentOff) {
							amountCalculator.setPercentOff(coupon.PercentOff);
						}

						if (upgradeType == 'basic') {
							openBasicUpgrade();
						} else if (upgradeType == 'premium') {
							openPremiumUpgrade();
						}

					} else {
						$couponCodeToSubmit.val(null);
						showError('Your coupon code is invalid');
					}
				});
			});
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
