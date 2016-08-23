<?php
	/*
		Template Name: User Dashboard
	*/
	$state_list = array('AK', 'AZ', 'CO', 'CT', 'DE', 'FL', 'GA', 'HI', 'ID', 'IL', 'IN', 'IA', 'KS', 'KY', 'LA', 'ME', 'MD', 'MA', 'MI', 'MN','MS','MO','MT','NE','NV', 'NH','NJ','NM','NY','NC','ND', 'OH', 'OK', 'OR', 'PA', 'RI','SC','SD', 'TN', 'TX', 'UT', 'VT', 'VA', 'WA', 'WV', 'WI' , 'WY', 'DC');

	$user = json_decode(urldecode(stripslashes($_COOKIE['user'])));
	
	$status = 'Active';
	$user->data->{'status'} = preg_replace('/\s+/', '', $user->data->{'status'});
	$user->data->{'plan type'} = preg_replace('/\s+/', '', $user->data->{'plan type'});
	if ($user->data->{'status'} == "I") {
		$status = 'Inactive';
	} else if ($user->data->{'status'} == "P") {
		$status = 'Pending';
	}
	$renew_date = new DateTime($user->data->{'renew date'});

	$mem_type = 'Single';

	if ($user->data->{'plan type'} == 'C') {
		$mem_type = "Couple";
	} elseif ($user->data->{'plan type'} == 'F') {
		$mem_type = "Family";
	}

	$visible_section = $_GET['state'];
	if (!(isset($_GET['state']) && ( $_GET['state'] == 'details-confirmation' || $_GET['state'] == 'password-confirmation' || $_GET['state'] == 'profile-confirmation' || $_GET['state'] == 'payment-confirmation'))) {
		$visible_section = 'default';
	}
?>

<?php get_template_part( 'partial/spinning' ); ?>

<div class="main-container">
	<div class="user-details row">
		<div class="twelve columns">
			<div class="pull-left">
				<div class="item">
					<img src="<?php echo get_stylesheet_directory_uri().'/assets/images/dashboard/user-large.jpg'; ?>" />
				</div>
				<div class="item">
					<h2><?php echo $user->data->{'full name'}; ?></h2>
					<p>Status: <span><?php echo $status; ?></span></p>
				</div>
			</div>
			<div class="pull-right">
				<p>Membership ID: <span><?php echo $user->data->{'client code'}; ?></span></p>
				<p>Expiration Date: <span><?php echo $renew_date->format('m/d/Y'); ?></span></p>
			</div>
		</div>
	</div>
	<div class="dashboard">
		<div class="row">
			<div class="four columns">
				<div class="tab-box">
					<div class="item tab-profile active">PROFILE</div>
					<div class="item tab-payment">PAYMENT</div>
					<div class="item tab-password">PASSWORD</div>
					<div class="item tab-refer">REFER A FRIEND</div>
				</div>
			</div>
			<div class="eight columns">				
				<div class="profile-box">
					<div class="section-1 <?php if ($visible_section == 'default') echo 'visible'; ?>" >
						<div class="twelve columns">
							<div class="row">
								<div class="one columns dfd_col-mobile-2">
									<img src="<?php echo get_stylesheet_directory_uri().'/assets/images/dashboard/phone.jpg'; ?>" />
								</div>
								<div class="eleven columns dfd_col-mobile-10">
									<p class="phoneno"><?php echo $user->data->{'home phone'}; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="one columns dfd_col-mobile-2">
									<img src="<?php echo get_stylesheet_directory_uri().'/assets/images/dashboard/email.jpg'; ?>" />
								</div>
								<div class="eleven columns dfd_col-mobile-10">
									<p class="email"><?php echo $user->data->{'email'}; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="one columns dfd_col-mobile-2">
									<img src="<?php echo get_stylesheet_directory_uri().'/assets/images/dashboard/location.jpg'; ?>" />
								</div>
								<div class="eleven columns dfd_col-mobile-10">
									<p><?php echo $user->data->{'address'}; ?>, <?php echo $user->data->{'address2'}; ?> <br />
									<?php echo $user->data->{'city'}.' '.$user->data->{'state'}.' '.$user->data->{'zip code'}?></p>
								</div>
							</div>
							<a href="#" class="edit-link edit-section-1">Edit</a>
						</div>
						<div class="twelve columns">
							<h5>Family members</h5>
							<div class="row ">
							<?php
								for ($i = 0; $i < count($user->family); $i++) {
									$date = new DateTime($user->family[$i]->{'dob'});
							?>
								<div class="twelve columns">
									<div class="one columns dfd_col-mobile-2">
										<img src="<?php echo get_stylesheet_directory_uri().'/assets/images/dashboard/user-small.jpg'; ?>" />
									</div>
									<div class="four columns dfd_col-mobile-3" ><p><?php echo $user->family[$i]->{'first name'}." ".$user->family[$i]->{'last name'}; ?></p></div>
									<div class="three columns dfd_col-mobile-2"><p><?php echo $date->format('m/d/Y'); ?></p></div>
									<div class="three columns dfd_col-mobile-3">
										<p>Status: <?php echo  $user->family[$i]->{'family type'}; ?></p>
									</div>
									<div class="one columns dfd_col-mobile-2"><a href="#" class="edit-family-member" data-index="0">Edit</a>	</div>
									
								</div>
							<?php } ?>
							</div>
							<a href="#" class="edit-link edit-family-member">Add a member</a>
						</div>
						<div class="twelve columns">
							<p>Group Name: <span><?php echo $user->data->{'group name'}; ?></span></p>
							<p>Broker ID: <span><?php echo $user->data->{'broker id'}; ?></span></p>
						</div>
					</div>
					<div class="edit-profile-details"><!--edit-box-->
						<div class="row">
							<div class="twelve columns">
								<label>Phone</label>
								<input type="text" name="phone" class="phone required" value="" />
								<p class="error">This field is required</p>
								<p class="error error-invalid">This field is invalid</p>
							</div>
						</div>
						<div class="row">
							<div class="twelve columns">
								<label>Email</label>
								<input type="email" name="email" class="email required" />
								<p class="error">This field is required</p>
								<p class="error error-invalid">This field is invalid</p>
							</div>
						</div>
						<div class="row">
							<div class="twelve columns">
								<label>Address 1</label>
								<input type="text" name="address" class="address required" />
								<p class="error">This field is required</p>
							</div>
						</div>		
						<div class="row">
							<div class="twelve columns">
								<label>Address 2</label>
								<input type="text" name="address2" class="address2" />
								<p class="error">This field is required</p>
							</div>
						</div>							
						<div class="row">
							<div class="four columns dfd_col-mobile-4">
								<label>City</label>
								<input type="text" name="city" class="city required" />
								<p class="error">This field is required</p>
							</div>
							<div class="four columns dfd_col-mobile-4">
								<label>State</label>
								<input type="text" name="state" class="state required" />							
								<p class="error">This field is required</p>
							</div>
							<div class="four columns dfd_col-mobile-4">
								<label>ZIP code</label>
								<input type="number" name="zipcode" class="zipcode required" />
								<p class="error">This field is required</p>
								<p class="error error-invalid">This field is invalid</p>
							</div>
						</div>	
						<div class="row">
							<div class="twelve columns">
								<a href="#" class="edit-profile-details-submit btn pull-left">Submit</a>
							</div>
						</div>
					</div>
					<div class="edit-additinonal-members"><!--edit-box-->
						<h4>Additional Name</h4>
						<div class="row">
							<div class="twelve columns additional_members"></div>
						</div>
						<div class="row">
							<div class="six columns dfd_col-mobile-6">
								<label>First Name</label>
								<input type="text" name="first_name" class="first_name required" />
								<p class="error">This field is required</p>
							</div>
							<div class="six columns dfd_col-mobile-6">
								<label>Last Name</label>
								<input type="text" name="last_name" class="last_name required" />
								<p class="error">This field is required</p>
							</div>
						</div>
						<div class="row">
							<div class="twelve columns">
								<Label>Male<input type="radio" name="signup_gender" value="MALE" checked="checked" /></Label>
								<Label>Female<input type="radio" name="signup_gender" value="FEMALE" /></Label>
							</div>
						</div>
						<div class="row">
							<div class="eight columns">
								<label>Date of Birth</label>
								<div class="date_of_birth row">
									<div class="three columns dfd_col-mobile-3">
										<div class="select-box">
											<select name="dob_month" class="dob_month">
												<option value="">MM</option>
										<?php for ($i = 1 ; $i <= 12; $i++) { ?>
											<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
										<?php } ?>
											</select>
										<i class="fa fa-caret-down"></i>
										</div>
									</div>
									<div class="three columns dfd_col-mobile-3">
										<div class="select-box">
											<select name="dob_day" class="dob_day">
												<option value="">DD</option>
												<?php for ($i = 1 ; $i <= 31; $i++) { ?>
													<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
												<?php } ?>
											</select>
										<i class="fa fa-caret-down"></i>
										</div>
									</div>
									<div class="six columns dfd_col-mobile-6">
										<div class="select-box">
											<select name="dob_year" class="dob_year">
												<option value="">YYYY</option>
										<?php for ($i = 1920 ; $i <= 2016; $i++) { ?>
											<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
										<?php } ?>
											</select>
											
										<i class="fa fa-caret-down"></i>
										</div>
									</div>
									<p class="error">This field is required</p>
								</div> 
								
							</div>
						</div>		
						<br/>				
						<div class="row">
							<div class="six columns">
								<a href="#" class="edit-additinonal-members-submit btn pull-left" data-type="POST">Submit</a>
							</div>
						</div>
					</div>
					<div class="section-4 center <?php if ($visible_section == 'details-confirmation') echo 'visible'; ?>">
						<h4>You're all set.</h4>
						<p>Thanks for updating your information with DentalSave.</p>
					</div>
				</div>
				
				<div class="profile-payment twelve columns">
					<div class="section-1">
						<div class="row">
							<div class="six columns dfd_col-mobile-6">
								<p>Membership Type: </p>
							</div>
							<div class="three columns dfd_col-mobile-6">
								<p><?php echo $mem_type; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="six columns dfd_col-mobile-6">
								<p>Payment Plan</p>
							</div>
							<div class="three columns dfd_col-mobile-6 select-box">
								<div class="select-box">
									<select class="payoption">
										<option value="monthly">Monthly</option>
										<option value="annual" selected="selected">Annual</option>
									</select>
									<i class="fa fa-caret-down"></i>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="six columns dfd_col-mobile-6">
								<p>Auto Renewal</p>
							</div>
							<div class="three columns dfd_col-mobile-6">
								<div class="select-box">
									<select class="autorenewal">
										<option value="1" selected="selected">Yes</option>
										<option value="0">No</option>
									</select>
									<i class="fa fa-caret-down"></i>
								</div>
							</div>
						</div>
						<br/>
						<?php
						if ( ($status == 'Active' && $user->data->{'autopayment'} == 1) ) :
						?>
						<div class="row">
							<div class="twelve columns dfd_col-mobile-12">
								<p>This membership will automatically renew on <?php echo $renew_date->format('m/d/Y'); ?>.<br/>
								If you need to update your billing information, please click the link below.</p>
							</div>
						</div>
						<?php  
						endif;
						?>
						<div class="row">
							<div class="twelve columns">
								<?php
								if ( !($status == 'Active' && $user->data->{'autopayment'} == 1) ) :
								?>
								<a href="#" class="membership_reactive btn pull-left"><?php if ($status == 'Active') { echo 'RENEW'; } elseif ($status == 'Pending') { echo 'ACTIVATE'; } else { echo 'RE-Activate';} ?></a>
								<?php  
								else:
								?>
								<a href="#" class="membership_update_billing_info btn pull-left">UPDATE BILLING INFO</a>
								<?php  
								endif;
								?>
							</div>
						</div>
					</div>
					<div class="section-2">
						<div class="membership_type">
							<div class="row">
								<div class="six columns">
									<p>Membership Type:</p>
								</div>
								<div class="six columns">
									<p><?php echo $mem_type; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="six columns">
									<p>Payment Plan:</p>
								</div>
								<div class="six columns">
									<p class="payoption">Yearly</p>
								</div>
							</div>
							<div class="row">
								<div class="six columns">
									<p>Auto Renewal:</p>
								</div>
								<div class="six columns">
									<p class="autorenewl">No</p>
								</div>
							</div>
						</div>
						<?php
						if ( !($status == 'Active' && $user->data->{'autopayment'} == 1) ) :
						?>
						<div class="membership_fee">
							<div class="row">
								<div class="six columns">
									<p>Membership Fee:</p>
								</div>
								<div class="six columns">
									<p class="mem_fee">$35</p>
								</div>
							</div>
							<div class="row">
								<div class="six columns">
									<p>Processing Fee:</p>
								</div>
								<div class="six columns">
									<p class="processing_fee">$20</p>
								</div>
							</div>
							<div class="row">
								<div class="six columns">
									<p>Today's Total:</p>
								</div>
								<div class="six columns">
									<p class="total">$55</p>
								</div>
							</div>
						</div>
						<?php  
						endif;
						?>
						<p class="error error-step3">Something went wrong</p>
						<p class="error error-transaction-2">This transaction has been declined.</p>
						<p class="error error-transaction-3">There has been an error processing this transaction.</p>
						<p class="error error-transaction-4">This transaction is being held for review</p>
						<?php
						if ( !($status == 'Active' && $user->data->{'autopayment'} == 1) ) :
						?>
						<div class="row">
							<div class="twelve columns">
								<label>Promocode</label>
								<div class="row">
									<div class="ten columns dfd_col-mobile-8">
										<input type="text" name="payment_promocode" class="payment_promocode" />
										<p class="error">This field is required</p>
										<p class="error error-invalid">This field is invalid</p>
									</div>
									<div class="two columns dfd_col-mobile-4">
										<input type="button" class="payment_promocode_apply btn" value="APPLY" />
									</div>
								</div>
							</div>
						</div>
						<?php  
						endif;
						?>
						<!-- <div class="row">
							<div class="twelve columns">
								<label>Name on Card</label>
								<input type="text" name="payment_name_on_card" class="payment_name_on_card" />
								<p class="error">This field is required</p>
								<p class="error error-invalid">This field is invalid</p>
							</div>
						</div> -->
						<div class="row">
							<div class="twelve columns">
								<label>Credit Card Number</label>
								<input type="text" name="payment_ccard" class="payment_ccard required" />
								<p class="error">This field is required</p>
								<p class="error error-invalid">This field is invalid</p>
							</div>
						</div>
						<div class="row">
							<div class="four columns dfd_col-mobile-4">
								<label>Exp Date</label>
								<!-- <input type="number" name="payment_expdate_month" class="payment_expdate_month required" placeholder="MM" /> -->
								<div class="select-box ">
									<select name="payment_expdate_month" class="payment_expdate_month required">
										<option value="">MM</option>
								<?php for ($i = 1 ; $i <= 12; $i++) { ?>
									<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php } ?>
									</select>
									<p class="error">This field is required</p>
									<i class="fa fa-caret-down"></i>
								</div>
								
							</div>
							<div class="four columns dfd_col-mobile-4">
								<label></label>
								<!-- <input type="number" name="payment_expdate_year" class="payment_expdate_year required" placeholder="YYYY" /> -->
								<div class="select-box ">
									<select name="payment_expdate_year" class="payment_expdate_year required">
										<option value="">YYYY</option>
								<?php for ($i = 2016 ; $i <= 2050; $i++) { ?>
									<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php } ?>
									</select>
									<p class="error">This field is required</p>
									<i class="fa fa-caret-down"></i>
								</div>
								
							</div>
							<div class="four columns dfd_col-mobile-4">
								<label>CCV</label>
								<input type="number" name="payment_ccv" class="payment_ccv required" />
								<p class="error">This field is required</p>
							</div>
						</div>
						<div class="row">
							<div class="twelve columns">
								<input type="button" name="submit" class="submit btn" value="Submit" />
							</div>
						</div>
					</div>
					<div class="section profile-renewed-cong center <?php if ($visible_section == 'payment-confirmation') echo 'visible'; ?>">
						<h4>Congratulations!</h4>
						<p>Congratulations! You have renewed your membership.</p>
					</div>
				</div>

				<div class="profile-password twelve columns">
					<div class="edit-password">
						<label class="error error-request">Something went wrong!</label>
						<div class="row">
							<div class="six columns">
								<label>Old Password</label>
								<input type="text" name="old_password" class="old_password required" />
								<p class="error">This field is required</p>
							</div>
						</div>
						<div class="row">
							<div class="six columns">
								<label>New Password</label>
								<input type="password" name="new_password" class="new_password required" />
								<p class="error">This field is required</p>
							</div>
						</div>
						<div class="row">
							<div class="six columns">
								<label>Retype New Password</label>
								<input type="password" name="conf_new_password" class="conf_new_password required" />
								<p class="error">This field is required</p>
								<p class="error error-invalid">Password doesn't match.</p>
							</div>
						</div>
						<div class="row">
							<div class="twelve columns">
								<input type="button" class="change_password_btn btn" value="CONTINUE" />
							</div>
						</div>
					</div>
					<div class="section profile-password-cong center <?php if ($visible_section == 'password-confirmation') echo 'visible'; ?>" >
						<h4>You are all set!</h4>
						<p>Thanks for updating your password with Dentalsave.</p>
					</div>
				</div>


				

				<div class="section profile-refer-box twelve columns">
					<div class="refer-box">
						<p>Refer a friend or family member to DentalSave and they'll get 20% off their membership.</p>
						<p>What's in it for you? For each referral, you'll earn points redeemable for cash or gift cards. What's the best part about our rewards program? Your points never expire!</p>
						<p>Simply give us a call when you are ready to claim your points and we'll send you your chosen reward option.</p>
						<p>Enter your referral's name to get started.</p>

						<div class="row">
							<div class="six columns">
								<label>First Name</label>
								<input type="text" name="refer_firstname" class="refer_firstname required" />
								<p class="error">This field is required</p>
							</div>
						</div>
						<div class="row">
							<div class="six columns">
								<label>Last Name</label>
								<input type="text" name="refer_lastname" class="refer_lastname required" />
								<p class="error">This field is required</p>
							</div>
						</div>
						<div class="row">
							<div class="six columns">
								<label>Email</label>
								<input type="email" name="refer_email" class="refer_email required" />
								<p class="error">This field is required</p>
								<p class="error error-invalid">Password doesn't match.</p>
							</div>
						</div>
						<div class="row">
							<div class="six columns">
								<label>Address 1</label>
								<input type="text" name="refer_address1" class="refer_address1 required" />
								<p class="error">This field is required</p>
							</div>
						</div>
						<div class="row">
							<div class="six columns">
								<label>Address 2</label>
								<input type="text" name="refer_address2" class="refer_address2" />
								<p class="error">This field is required</p>
							</div>
						</div>
						<div class="row">
							<div class="three columns">
								<label>City</label>
								<input type="text" name="refer_city" class="refer_city required" />
								<p class="error">This field is required</p>
							</div>
							<div class="three columns">
								<label>State</label>
								<input type="text" name="refer_state" class="refer_state required" />
								<p class="error">This field is required</p>
							</div>
						</div>
						<div class="row">
							<div class="three columns">
								<label>Zip code</label>
								<input type="text" name="refer_zipcode" class="refer_zipcode required" />
								<p class="error">This field is required</p>
							</div>
						</div>
						<div class="row">
							<div class="twelve columns">
								<input type="button" class="submit btn" value="SUBMIT" />
							</div>
						</div>
					</div>

					<div class="section profile-refer-cong center <?php if ($visible_section == 'profile-confirmation') echo 'visible'; ?>">
						<h4>You are all set!</h4>
						<p>Thanks for referring your friend to Dentalsave.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
(function ($){
	function showLoadingIcon() {
		$('.sk-fading-wrapper').css('display', 'block');
	}
	function hideLoadingIcon() {
		$('.sk-fading-wrapper').css('display', 'none');
	}
	// showLoadingIcon();
	function setCookie(cname, cvalue, exdays) {
	    var d = new Date();
	    d.setTime(d.getTime() + (exdays*24*60*60*1000));
	    var expires = "expires="+ d.toUTCString();
	    console.log(cname + "=" + cvalue + "; " + expires + ";path=/");
	    document.cookie = cname + "=" + cvalue + "; " + expires + ";path=/";
	}
	function getCookie(cname) {
	    var name = cname + "=";
	    var ca = document.cookie.split(';');
	    for(var i = 0; i <ca.length; i++) {
	        var c = ca[i];
	        while (c.charAt(0)==' ') {
	            c = c.substring(1);
	        }
	        if (c.indexOf(name) == 0) {
	            return c.substring(name.length,c.length);
	        }
	    }
	    return "";
	}
	var userObj = JSON.parse(getCookie('user'));
	console.log(userObj);
	var additinonalMembers = {};
	var renewalObj = {};
	var promoObj = {
		promocode: 0,
  		discount_pcnt: 0
	};
	var promos = [];

	$.ajax({
		type: 'GET',
		url: 'https://api.dentalsave.com/api/promocodes',
		timeout: 10000
	}).done(function(res) {
		promos = res.data;
	});

	//switch tab item selection
	$('.user-dashboard .tab-profile').on('click', function(event) {
		event.preventDefault();
		$('.user-dashboard .tab-box .item').removeClass('active');
		$(this).addClass('active');
		hideAllContents();
		$('.user-dashboard .main-container .profile-box .section-1').addClass('visible');
	});
	$('.user-dashboard .tab-payment').on('click', function() {
		$('.user-dashboard .tab-box .item').removeClass('active');
		$(this).addClass('active');
		hideAllContents();
		$('.user-dashboard .main-container .profile-payment .section-1').addClass('visible');
	});
	$('.user-dashboard .tab-password').on('click', function() {
		$('.user-dashboard .tab-box .item').removeClass('active');
		$(this).addClass('active');
		hideAllContents();
		$('.user-dashboard .main-container .profile-password .edit-password').addClass('visible');
	});
	$('.user-dashboard .tab-refer').on('click', function() {
		$('.user-dashboard .tab-box .item').removeClass('active');
		$(this).addClass('active');
		hideAllContents();
		$('.user-dashboard .main-container .profile-refer-box .refer-box').addClass('visible');
	});

	// Profile -> section-1 Edit event
	$('.user-dashboard .edit-section-1').on('click', function(event) {
		event.preventDefault();
		hideAllContents();
		$('.user-dashboard .main-container .edit-profile-details').addClass('visible');
		var userObj = JSON.parse(getCookie('user'));
		//set values to the input fields
		$('.user-dashboard .edit-profile-details .email').val(userObj.data['email']);
		$('.user-dashboard .edit-profile-details .phone').val(userObj.data['home phone']);
		$('.user-dashboard .edit-profile-details .city').val(userObj.data['city']);
		$('.user-dashboard .edit-profile-details .state').val(userObj.data['state']);
		$('.user-dashboard .edit-profile-details .zipcode').val(userObj.data['zip code']);
		$('.user-dashboard .edit-profile-details .address').val(userObj.data['address']);
		$('.user-dashboard .edit-profile-details .address2').val(userObj.data['address2']);
	});

	$('.user-dashboard .edit-family-member').on('click', function(event) {
		event.preventDefault();
		hideAllContents();
		if ($(this).data('index') != undefined) {
			var userObj = JSON.parse(getCookie('user'));
			var date = new Date(userObj.family[$(this).data('index')]['dob']);
			$('.user-dashboard .edit-additinonal-members .first_name').val(userObj.family[$(this).data('index')]['first name']);
			$('.user-dashboard .edit-additinonal-members .last_name').val(userObj.family[$(this).data('index')]['last name']);
			$('.user-dashboard .edit-additinonal-members .dob_month').val(date.getMonth());
			$('.user-dashboard .edit-additinonal-members .dob_day').val(date.getDate());
			$('.user-dashboard .edit-additinonal-members .dob_year').val(date.getFullYear());
			$('.user-dashboard .edit-additinonal-members-submit').data('type', 'PUT');
		} else {
			$('.user-dashboard .edit-additinonal-members-submit').data('type', 'POST');
		}

		$('.user-dashboard .main-container .profile-box .edit-additinonal-members').addClass('visible');
	});

	$('.user-dashboard .edit-profile-details-submit').on('click', function(event) {
		event.preventDefault();
		var userObj = JSON.parse(getCookie('user'));

		$('.user-dashboard .edit-profile-details .error').removeClass('error-visible');
		$error = false;
		$('.user-dashboard .edit-profile-details .required').each(function(item) {			
			if ($(this).val() == '') {
				$(this).next('.error').removeClass('error-visible').addClass('error-visible');
				$error = true;
			}
		});
		if ($error) return;
		var email = $('.user-dashboard .edit-profile-details .email').val();
		if (!isEmail(email)) {
			$error = true;
			$('.user-dashboard .edit-profile-details .email ~ .error-invalid').removeClass('error-visible').addClass('error-visible');
		}
		if (!$error) {
			var phone = $('.user-dashboard .edit-profile-details .phone').val();
			var email = $('.user-dashboard .edit-profile-details .email').val();
			var city = $('.user-dashboard .edit-profile-details .city').val();
			var state = $('.user-dashboard .edit-profile-details .state').val();
			var zipcode = $('.user-dashboard .edit-profile-details .zipcode').val();
			var date = new Date(userObj.data['birth date']);
			var dob = date.getMonth() + "/" + date.getDate() + "/" + date.getFullYear();

			var fn = userObj.data['first name'] || 0;
			var ln = userObj.data['last name'] || 0;
			var receiveoffers = userObj.data['receive offers'] || 0;
			var gender = userObj.data['gender'] || 0;
			var add1 = $('.user-dashboard .edit-profile-details .address').val();
			var add2 = $('.user-dashboard .edit-profile-details .address2').val() || 0;




			var params = userObj.data['id']+"?fn="+fn+"&ln="+ln+"&email="+email+"&receiveoffers="+receiveoffers+"&dob="+dob+"&gender="+gender+"&add1="+add1+"&add2="+add2+"&city="+city+"&state="+state+"&zip="+zipcode+"&phoneno="+phone;

			console.log(params);

			showLoadingIcon();

			$.ajax({
				type: "PUT",
				url: "https://api.dentalsave.com/api/memberinfoupdate1/" + params,
				timeout: 10000
			})
			.done(function(respond) {
				console.log(respond);
				getUser(userObj.data.id, userObj.data.password, 'details-confirmation');
				// hideLoadingIcon();
			})
			.fail(function(error) {
				hideLoadingIcon();
			});
		}
	});

	$('.user-dashboard .edit-additinonal-members-submit').on('click', function(e) {
		e.preventDefault();
		var userObj = JSON.parse(getCookie('user'));
		$error = false;
		$('.user-dashboard .edit-additinonal-members .required').each(function(item) {			
			if ($(this).val() == '') {
				$(this).next('.error').removeClass('error-visible').addClass('error-visible');
				$error = true;
			}
		});
		if ($error) return;
		var requestType = $('.user-dashboard .edit-additinonal-members-submit').data('type');
		var fn = $('.user-dashboard .edit-additinonal-members .first_name').val();
		var ln = $('.user-dashboard .edit-additinonal-members .last_name').val();
		var dob_month = $('.user-dashboard .edit-additinonal-members .dob_month').val();
		var dob_day = $('.user-dashboard .edit-additinonal-members .dob_day').val();
		var dob_year = $('.user-dashboard .edit-additinonal-members .dob_year').val();
		var gender = $('.user-dashboard .edit-additinonal-members input:radio[name=signup_gender]:checked').val();
		if (dob_month == '' || dob_day == '' || dob_year == '') {
			$('.user-dashboard .edit-additinonal-members .date_of_birth .error').removeClass('error-visible').addClass('error-visible');
			$error = true;
			return;
		}
		var url = "";
		if (requestType == "POST") {
			url = "https://api.dentalsave.com/api/membership/addmember/" + userObj.data['id'] + "/?&famfn="+fn+"&famln="+ln+"&famdob="+dob_month + "/" + dob_day + "/" + dob_year +"&famgender="+gender+"&famtype=On Plan";
		} else {
			url = userObj.data['id'] + "/?&";
			var famCounts = Math.max(userObj.family.length, 6);
			for (var i = 0; i < famCounts; i++) {
				var element = {};
				var dob = '';
				if (userObj.family[i] == null ) {
					element = {
						'first name': 0,
						'last name': 0,
						'dob': 0,
						gender: '0',
					}
				} else {
					element = userObj.family[i];
					var date = new Date(element.dob);
					dob = date.getMonth() + "/" + date.getDate() + "/" + date.getFullYear();
				}
				params += "&fam" + (i + 1) + "fn="+ element['first name'] + "&fam" + (i + 1) + "ln="+ element['last name'] + "&fam" + (i + 1) + "dob="+ dob + "&fam" + (i + 1) + "gender="+ element.gender.charAt(0);
			}
		}
		showLoadingIcon();
		$.ajax({
			type: requestType,
			url: url,
			timeout: 10000
		})
		.done(function(respond) {
			console.log(respond);
			hideLoadingIcon();
			getUser(userObj.data.id, userObj.data.password, 'details-confirmation');
		})
		.fail(function(error) {
			hideLoadingIcon();
		});

//		https://api.dentalsave.com/api/membership/addmember/C0167508/?&famfn=Nancy7&famln=Tomaselli&famdob=10/4/1953&famgender=F&famtype=On Plan


	});

	// change password
	$('.user-dashboard .change_password_btn').on('click', function(e) {
		e.preventDefault();
		$error = false;
		$('.user-dashboard .edit-password .error').removeClass('error-visible');
		$('.user-dashboard .edit-password .required').each(function(item) {			
			if ($(this).val() == '') {
				$(this).next('.error').removeClass('error-visible').addClass('error-visible');
				$error = true;
			}
		});

		if ($error) return;

		var old_password = $('.user-dashboard .edit-password .old_password').val();
		var new_password = $('.user-dashboard .edit-password .new_password').val();
		var conf_password = $('.user-dashboard .edit-password .conf_new_password').val();

		if (new_password != conf_password) {
			$('.user-dashboard .edit-password .conf_new_password ~ .error-invalid').removeClass('error-visible').addClass('error-visible');
			$error = true;
			return;
		}

		if (!$error) {
			var userObj = JSON.parse(getCookie('user'));
			// var params = https://api.dentalsave.com/api/membership/changepass?clientno=C777777&password=123&newpassword=1234567
			var params = "?clientno=C0" + userObj.data.id + "&password=" + old_password + "&newpassword=" + new_password;

			showLoadingIcon();

			$.ajax({
				type: "PUT",
				url: "https://api.dentalsave.com/api/membership/changepass" + params,
				timeout: 10000
			})
			.done(function(respond) {
				console.log(respond);
				if (!respond.data.success) {
					$('.user-dashboard .edit-password .error-request').removeClass('error-visible').addClass('error-visible');
				} else {
					// hideAllContents();
					// $('.user-dashboard .profile-password-cong').addClass('visible');
					getUser(userObj.data.id, userObj.data.password, 'password-confirmation');
				}
				hideLoadingIcon();
			})
			.fail(function(error) {
				hideLoadingIcon();
				
			});
		}
	});
	$('.user-dashboard .profile-payment .section-1 .payoption').on('change', function() {
		if ($(this).val() == 'monthly') {
			$('.user-dashboard .profile-payment .section-1 .autorenewal option[value="1"]').prop('selected', true);
			$('.user-dashboard .profile-payment .section-1 .autorenewal').prop('disabled', true);
		} else {
			$('.user-dashboard .profile-payment .section-1 .autorenewal').prop('disabled', false);
			// $('.user-dashboard .profile-payment .section-1 .autorenewal option:eq(1)').prop('selected', true)
		}
	});
	// re-activate payment
	$('.user-dashboard .membership_reactive').on('click', function(e) {
		e.preventDefault();
		
		var userObj = JSON.parse(getCookie('user'));
		var password = userObj.data.password;
		var autorenewal = $('.user-dashboard .profile-payment .section-1 .autorenewal').val();
		var payoption = $('.user-dashboard .profile-payment .section-1 .payoption').val();
		
		console.log(payoption);
		var params = userObj.data.id + "?password=" +  password + "&autorenewal=" + autorenewal + "&payoption=" + payoption;
		showLoadingIcon();

		var text_autorenewal = (autorenewal == 1) ? "Yes" : "No";

		$.ajax({
			type: "GET",
			url: "https://api.dentalsave.com/api/membership/getpaymentcalc/" + params,
			timeout: 10000
		})
		.done(function(respond) {
			console.log(respond);
			renewalObj = respond.renewal;
			renewalObj.autorenewal = autorenewal;
			renewalObj.payoption = payoption;
			hideLoadingIcon();
			hideAllContents();
			$('.user-dashboard .membership_type .payoption').html(payoption);
			$('.user-dashboard .membership_type .autorenewl').html(text_autorenewal);

			$('.user-dashboard .membership_fee .mem_fee').html('$' + respond.renewal.SubTotal);
			$('.user-dashboard .membership_fee .processing_fee').html('$' + respond.renewal.ProcessingFee);
			$('.user-dashboard .membership_fee .total').html('$' + respond.renewal.Total);
			$('.user-dashboard .profile-payment .section-2').addClass('visible');
			// getUser(userObj.data.id, userObj.data.password, 'details-confirmation');
		}).fail(function (error) {
			console.log(error);
			hideLoadingIcon();
		});
		
		//https://api.dentalsave.com/api/membership/getpaymentcalc/172210?password=saniv85&autorenewal=1&payoption=monthly
	});

	//refer a friend
	$('.user-dashboard .profile-refer-box .submit').on('click', function(e) {
		e.preventDefault();
		$error = false;
		var userObj = JSON.parse(getCookie('user'));
		
		$('.user-dashboard .profile-refer-box .error').removeClass('error-visible');
		$('.user-dashboard .profile-refer-box .required').each(function(item) {			
			if ($(this).val() == '') {
				$(this).next('.error').removeClass('error-visible').addClass('error-visible');
				$error = true;
			}
		});
		if ($error) return;

		var email = $('.user-dashboard .profile-refer-box .refer_email').val();
		if (!isEmail(email)) {
			$error = true;
			$('.user-dashboard .profile-refer-box .refer_email ~ .error-invalid').removeClass('error-visible').addClass('error-visible');
			return;
		}

		if (!$error) {
			showLoadingIcon();
			var param = userObj.data.id + "&fn=" + userObj.data['first name'] + "&ln=" + userObj.data['last name'] + "&email=" + userObj.data.email + "&add1=" + userObj.data.address + "&add2=" + (userObj.data.address2 || 0) + "&city=" +userObj.data.city+ "&state=" + userObj.data.state + "&zip=" + userObj.data.zip + "&phoneno=" + userObj.data['home phone'];

			$.ajax({
				type: "POST",
				url: "http://api.dentalsave.com/api/memberinforefer/"+param,
				timeout: 10000
			})
			.done(function(res) {
				console.log(res);
				
				hideAllContents();
				// $('.user-dashboard .profile-refer-box .profile-refer-cong').addClass('visible');
				getUser(userObj.data.id, userObj.data.password, 'profile-confirmation');
				// hideLoadingIcon();
			})
			.fail(function(error) {
				console.log(error);
				hideLoadingIcon();
			});
		}

		// var autorenewal = $('.user-dashboard .profile-payment .section-1 .autorenewal').val();
	});

	//apply promocode

	$('.payment_promocode_apply').on('click', function(event) {
		event.preventDefault();
		var code = $('.payment_promocode').val();
		var discount = 0;

		console.log(promos);
		console.log(code);

		for (var i = 0; i < promos.length; i++) {
			if (promos[i].promocode == code) {
				promoObj.promocode = code;
				promoObj.discount_pcnt = promos[i].discount_pcnt;
				discount = promoObj.discount_pcnt;
			}
		}
		var _subtotal = parseFloat(renewalObj.SubTotal) * (100 - parseFloat(discount)) / 100;
		renewalObj.Total = _subtotal + renewalObj.ProcessingFee;
		$('.user-dashboard .membership_fee .mem_fee').html('$' + _subtotal);
		$('.user-dashboard .membership_fee .total').html('$' + renewalObj.Total );
	});

	//update payment
	$('.user-dashboard .profile-payment .section-2 .submit').on('click', function(e) {
		e.preventDefault();
		var userObj = JSON.parse(getCookie('user'));
		$error = false;

		$('.user-dashboard .profile-payment .section-2 .error').removeClass('error-visible');
		$('.user-dashboard .profile-payment .section-2 .required').each(function(item) {			
			if ($(this).val() == '') {
				$(this).next('.error').removeClass('error-visible').addClass('error-visible');
				$error = true;
			}
		});
		if ($error) return;

		var ccnumber = $('.user-dashboard .profile-payment .section-2 .payment_ccard').val();
		var emonth = $('.user-dashboard .profile-payment .section-2 .payment_expdate_month').val();
		var eyear = $('.user-dashboard .profile-payment .section-2 .payment_expdate_year').val();
		var ccv = $('.user-dashboard .profile-payment .section-2 .payment_ccv').val();
		var promocode = $('.user-dashboard .profile-payment .section-2 .payment_promocode').val() || 0;

		var subtotal = Math.round(parseFloat(renewalObj.SubTotal) * (100 - parseFloat(promoObj.discount_pcnt)));
		showLoadingIcon();
		if (renewalObj.autopayment == undefined) {
			renewalObj.autopayment = 0;
		}
		//'&membertype=' + renewalObj.membertype + 
		var param = '?memid=' + renewalObj.memid + '&plantype=' +  renewalObj.planType + '&payoption=' + renewalObj.payoption + '&promocode=' +  promocode + "&subtotal=" + subtotal + "&processingfee=" + renewalObj.ProcessingFee + "&total=" + Math.round( renewalObj.Total * 100 ) + "&cbcardtype=visa" + "&eccnum=" + ccnumber + "&ecvc=" + ccv + "&cbexpdatem=" + emonth + "&cbexpdatey=" + eyear + "&autopayment=" + renewalObj.autopayment;

			$.ajax({
				type: "PUT",
				url: "https://api.dentalsave.com/api/membership/paymentauth/"+param,
				timeout:10000
			})
			.done(function(res) {
				console.log(res);
				if (res.errorcode != null && res.errorcode == "2") {
					$('.user-dashboard .profile-payment .section-2 .error-transaction-2').removeClass('error-visible').addClass('error-visible');
					return;
				} else if (res.errorcode != null && res.errorcode == "3") {
					$('.user-dashboard .profile-payment .section-2 .error-transaction-3').removeClass('error-visible').addClass('error-visible');
					return;
				} else if (res.errorcode != null && res.errorcode == "4") {
					$('.user-dashboard .profile-payment .section-2 .error-transaction-4').removeClass('error-visible').addClass('error-visible');
					return;
				}
				hideLoadingIcon();
				hideAllContents();
				// $('.user-dashboard .profile-payment .profile-renewed-cong').addClass('visible');
				getUser(userObj.data.id, userObj.data.password, 'payment-confirmation');
				// hideLoadingIcon();
			})
			.fail(function(error) {
				console.log(error);
				$('.user-dashboard .profile-payment .section-2 .error-step3').removeClass('error-visible').addClass('error-visible');
				hideLoadingIcon();
			});

	});

	//add additional members to global object
	$('.edit-additinonal-members-addmore').on('click', function(event) {
		event.preventDefault();
		$error = false;
		$('.user-dashboard .edit-profile-details .error').removeClass('error-visible');
		
		$('.user-dashboard .edit-additinonal-members .required').each(function(item) {			
			if ($(this).val() == '') {
				$(this).next('.error').removeClass('error-visible').addClass('error-visible');
				$error = true;
			}
		});

		var first_name = $('.user-dashboard .edit-additinonal-members .first_name').val();
		var last_name = $('.user-dashboard .edit-additinonal-members .last_name').val();
		var dob_month = $('.user-dashboard .edit-additinonal-members .dob_month').val();
		var dob_day = $('.user-dashboard .edit-additinonal-members .dob_day').val();
		var dob_year = $('.user-dashboard .edit-additinonal-members .dob_year').val();			
		var gender = $('.user-dashboard .edit-additinonal-members input:radio[name=signup_gender]:checked').val();

		
		/*
		if (!$error) {
			$('.user-dashboard .edit-additinonal-members .required').each(function(item) {	
				$(this).val('');			
			});
			var dob = dob_month + '/' + dob_day + '/' + dob_year;
			var html = '<div class="row"><div class="five columns dfd_col-mobile-5"><p>' + first_name + ' ' + last_name+'</p></div><div class="thee columns dfd_col-mobile-4"><p>'+dob+'</p></div><div class="two columns dfd_col-mobile-2"><p>'+gender+'</p></div><div class="one columns dfd_col-mobile-1"><a href="'+formData.step1.additional.length+'" class="remove_user">X</a></div></div>';
			var html1 = '<p><i class="fa fa-user"></i> ' + first_name + ' ' + last_name+' <i class="fa fa-circle"></i> '+dob+' <i class="fa fa-circle"></i> '+gender+'</p>';
			$('.step1 .additional_members').append(html);
			$t.find('.step1_desc .item2').append(html1);
			var obj = {
				fn: first_name,
				ln: last_name,
				gender: gender[0],
				dob: dob
			}
			formData.step1.additional.push(obj);

			if (formData.step1.additional.length == 6)
				$t.find('.step1_addmore_edit').css('display', 'none');

			$t.find('.step1 .edit_additional_member').css('display', 'none');
		}*/
	});

	function getUser(memberid, password, state) {
		var params = memberid + "?password=" + password;
		$.ajax({
			type: "GET",
			url: "https://api.dentalsave.com/api/membership/"+params,
			timeout: 10000
		})
		.done(function(respond) {
			console.log(respond);
			var user = JSON.stringify(respond);			
			setCookie('user', user, 3);
			hideLoadingIcon();
			window.location = "/user-dashboard/?state=" + state;
		})
		.fail(function(error) {
			hideLoadingIcon();
			window.location = "/user-dashboard/";
		});
	}

	function hideAllContents() {
		$('.user-dashboard .main-container .visible').removeClass('visible');
	}

	function isEmail(email) {
      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      return regex.test(email);
    }
})(jQuery);
</script>