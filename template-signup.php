<?php
	/*
		Template Name: Signup Page
	*/
?>
<?php while (have_posts()) : the_post(); ?>
	<?php the_content(); ?>
	<?php dfd_link_pages(); ?>
<?php endwhile; ?>

<?php

$state_list = array('AK', 'AZ', 'CO', 'CT', 'DE', 'FL', 'GA', 'HI', 'ID', 'IL', 'IN', 'IA', 'KS', 'KY', 'LA', 'ME', 'MD', 'MA', 'MI', 'MN','MS','MO','MT','NE','NV', 'NH','NJ','NM','NY','NC','ND', 'OH', 'OK', 'OR', 'PA', 'RI','SC','SD', 'TN', 'TX', 'UT', 'VT', 'VA', 'WA', 'WV', 'WI' , 'WY', 'DC');
?>
<div class="sk-fading-wrapper">
	<div class="sk-fading-circle">
	  <div class="sk-circle1 sk-circle"></div>
	  <div class="sk-circle2 sk-circle"></div>
	  <div class="sk-circle3 sk-circle"></div>
	  <div class="sk-circle4 sk-circle"></div>
	  <div class="sk-circle5 sk-circle"></div>
	  <div class="sk-circle6 sk-circle"></div>
	  <div class="sk-circle7 sk-circle"></div>
	  <div class="sk-circle8 sk-circle"></div>
	  <div class="sk-circle9 sk-circle"></div>
	  <div class="sk-circle10 sk-circle"></div>
	  <div class="sk-circle11 sk-circle"></div>
	  <div class="sk-circle12 sk-circle"></div>
	</div>
</div>

<div class="top_section">
	<div class="row">
		<div class="twelve columns">
			<div class="item">
				<div class="img">
					<img src="/wp-content/uploads/2016/07/signup-icon.png" />
				</div>
				<p>Sign Up</p>
			</div>
			<div class="item arrow">
				<div class="img">
					<i class="fa fa-angle-right"></i>
					<i class="fa fa-angle-down"></i>
				</div>
			</div>
			<div class="item">
				<div class="img">
					<img src="/wp-content/uploads/2016/07/signup-card-icon.png" />
				</div>
				<p>Show Your Card</p>
			</div>
			<div class="item arrow">
				<div class="img">
					<i class="fa fa-angle-right"></i>
					<i class="fa fa-angle-down"></i>
				</div>
			</div>
			<div class="item">
				<div class="img">
					<img src="/wp-content/uploads/2016/07/dollar_hand.png" />
				</div>
				<p>Save Money</p>
			</div>
		</div>
	</div>
</div>
<div class="main_section">
	<div class="row">
		<div class="eight columns">
			<div class="header_desc">
				<h1>Discount Medical Plan Application</h1>
				<p>for Dental, Prescription, Vision, Lasik & Hearing</p>
			</div>
			<div class="main_form">
				<div class="section step_signup_desc">
					<div class="row">
						<div class="eleven columns">
						</div>
						<div class="one columns">
							 <!-- <a href="#" class="step_signup_edit">EDIT</a> -->
						</div>
					</div>
				</div>
				<div class="section step_signup">
					<h2>Sign Up or Login</h2>
					<p class="error error-signup">Something went wrong</p>
					<p class="error error-duplicated">The user exists already.</p>
					<div class="row">
						<div class="twelve columns">
							<label><input type="radio" name="membership" value="yes" />I have an existing dentalsave membership</label>
						</div>
					</div>
					<div class="row">
						<div class="twelve columns">
							<label><input type="radio" name="membership" value="no" checked="checked" />I am a new member</label>
						</div>
					</div>
					<div class="row sign-in">
						<div class="twelve columns">
							<a href="/dental-plans-member-login/" class="btn">Sign in</a>
						</div>
					</div>
					<div class="sign-up">
						<div class="row">
							<div class="six columns dfd_col-mobile-6">
								<label>First Name</label>
								<input type="text" name="first_name" class="first_name" />
								<p class="error">This field is required</p>
							</div>
							<div class="six columns dfd_col-mobile-6">
								<label>Last Name</label>
								<input type="text" name="last_name" class="last_name" />
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
							<div class="twelve columns">
								<label>Email</label>
								<input type="email" name="email" class="email" />
								<p class="error">This field is required</p>
								<p class="error error-invalid">This field is invalid</p>
							</div>
						</div>
						<div class="row">
							<div class="six columns">
								<label>Date of Birth</label>
								<div class="date_of_birth row">
									<div class="four columns dfd_col-mobile-4">
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
									<div class="four columns dfd_col-mobile-4">
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
									<div class="four columns dfd_col-mobile-4">
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
								</div>
								<p class="error">This field is required</p> 
								<p class="error error-invalid">This field is invalid</p>
							</div>
							<div class="six columns">
								<label>How'd you hear about us?</label>
								<div class="select-box">
									<select name="hear_us" class="hear_us">
										<option value="">Select</option>
										<option value="100">Radio</option>
										<?php 
										$arrContextOptions=array(
										    "ssl"=>array(
										        "verify_peer"=>false,
										        "verify_peer_name"=>false,
										    ),
										);  
										$response=json_decode(file_get_contents("https://api.dentalsave.com/api/plansource", false, stream_context_create($arrContextOptions)), true);
										$plansource = $response['data'];
										foreach ($plansource as $a) {
											var_dump($a);
											?>
											<option value="<?php echo $a['id']; ?>"><?php echo $a['description']; ?></option>
											<?php
										}
										?>
									</select>
									<i class="fa fa-caret-down"></i>
								</div>
								<p class="error">This field is required</p> 
							</div>
						</div>
						<div class="row">
							<div class="six columns">
								<label>Password</label>
								<input type="password" name="password" class="password" />
								<p class="error">This field is required</p>
							</div>
							<div class="six columns">
								<label>Confirm Password</label>
								<input type="password" name="c_password" class="c_password" />
								<p class="error">This field is required</p>
								<p class="error error-invalid">Password doesn't match.</p>
							</div>
						</div>
						<div class="row">
							<div class="twelve columns">
								<input type="button" class="signup_btn btn" value="CONTINUE" />
							</div>
						</div>
					</div>
				</div>
				<div class="section step1_desc">
					<h4>1. PERSONAL INFORMATION</h4>
					<div class="row">
						<div class="eleven columns">
							<div class="item1">
								<!-- <p><i class="fa fa-map-marker"></i> 10910 NW 92nd Terrance, Medley, FL 33178</p> -->
							</div>
							<div class="item2">
								<!-- <p><i class="fa fa-user"></i> JACK MATHEWS <i class="fa fa-circle"></i> 15/06/1966 <i class="fa fa-circle"></i> MALE</p> -->
							</div>
						</div>
						<div class="one columns">
							<a href="#" class="step1_edit">EDIT</a>
						</div>
					</div>
				</div>
				<div class="section step1">
					<h2>1. Personal Information</h2>
					<p class="error error-step1">Something went wrong</p>
					<div class="row">
						<div class="twelve columns">
							<label>Address 1</label>
							<input type="text" name="address_1" class="address_1" />
							<p class="error">This field is required</p>
						</div>
					</div>
					<div class="row">
						<div class="twelve columns">
							<label>Address 2</label>
							<input type="text" name="address_2" class="address_2" />
							<p class="error">This field is required</p>
						</div>
					</div>
					<div class="row">
						<div class="four columns dfd_col-mobile-4">
							<label>City</label>
							<input type="text" name="personal_city" class="personal_city" />
							<p class="error">This field is required</p>
						</div>
						<div class="four columns dfd_col-mobile-4">
							<label>State</label>
							<!-- <input type="text" name="personal_state" class="personal_state" /> -->
							<div class="select-box">
								<select name="personal_state" class="personal_state">
									<option value="">Select</option>
									<?php 
									foreach ($state_list as $a) {
										?>
										<option value="<?php echo $a ?>"><?php echo $a; ?></option>
										<?php
									}
									?>
								</select>
								<i class="fa fa-caret-down"></i>
							</div>
							<p class="error">This field is required</p>
						</div>
						<div class="four columns dfd_col-mobile-4">
							<label>ZIP code</label>
							<input type="number" name="personal_zipcode" class="personal_zipcode" />
							<p class="error">This field is required</p>
							<p class="error error-invalid">This field is invalid</p>
						</div>
					</div>	
					<div class="row">
						<div class="twelve columns">
							<label>Phone</label>
							<input type="text" name="phoneno" class="phoneno" />
							<p class="error">This field is required</p>
						</div>
					</div>				
					<div class="row">
						<div class="twelve columns">
							<h5>Additional Members</h5>
							<p class="error error-additional-members">We need at least a member.</p>
						</div>
						<div class="twelve columns additional_members">
						</div>
					</div>
					<div class="edit_additional_member">
						<div class="row">
							<div class="six columns dfd_col-mobile-6">
								<label>First Name</label>
								<input type="text" name="first_name" class="first_name" />
								<p class="error">This field is required</p>
							</div>
							<div class="six columns dfd_col-mobile-6">
								<label>Last Name</label>
								<input type="text" name="last_name" class="last_name" />
								<p class="error">This field is required</p>
							</div>
						</div>
						<div class="row">
							<div class="twelve columns">
								<Label>Male <input type="radio" name="gender" value="MALE" checked="checked" /></Label>
								<Label>Female <input type="radio" name="gender" value="FEMALE" /></Label>
							</div>
						</div>					
						<div class="row">
							<div class="six columns">
								<label>Date of Birth</label>
								<div class="date_of_birth row">
									<div class="four columns dfd_col-mobile-4">
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
									<div class="four columns dfd_col-mobile-4">
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
									<div class="four columns dfd_col-mobile-4">
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
								</div> 
								<p class="error">This field is required</p>
								<p class="error error-invalid">This field is invalid</p>
							</div>
						</div>
						<div class="row">
							<div class="six columns">
								<!-- <a href="#" class="step1_addmore">Add More</a> -->
								<input type="button" name="step1_addmore" class="step1_addmore btn" value="Save" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="six columns">
							<a href="#" class="step1_addmore_edit">Add a member</a>
						</div>
					</div>
					<div class="row">
						<div class="six columns">
							<input type="button" name="step1_btn" class="step1_btn btn" value="CONTINUE" />
						</div>
					</div>
				</div>
				<div class="section step2_desc">
					<h4>2. ADDITIONAL DETAILS AND PAYMENT PLAN</h4>
					<div class="row">
						<div class="eleven columns">
							<p><i class="fa fa-credit-card"></i> PLAN ANNUAL <span class="plan_anuual_v"></span> <i class="fa fa-circle"></i> RENEWAL <span class="renewal_v"></span></p>
							<p><i class="fa fa-credit-card fa-white"></i> GROUP #<span class="group_v"></span> <i class="fa fa-circle"></i> BROKER #<span class="broker_v"></span></p>
						</div>
						<div class="one columns">
							<a href="#" class="step2_edit">EDIT</a>
						</div>
					</div>
				</div>
				<div class="section step2">
					<h2>2. Additional Details and Payment Plan</h2>
					<p class="error error-step2">Something went wrong</p>
					<div class="row">
						<div class="three columns dfd_col-mobile-4">
							<label>Payment Plan</label>
						</div>
						<div class="six columns dfd_col-mobile-7">
							<label>Annual <input type="radio" name="additional_payment_plan" value="YES" checked="checked" /></label>
							<label>Monthly <input type="radio" name="additional_payment_plan" value="NO" /></label>
						</div>
					</div>
					<div class="row auto-renewal-wrapper">
						<div class="three columns dfd_col-mobile-4">
							<label>Auto Renewal</label>
						</div>
						<div class="six columns dfd_col-mobile-7">
							<label>Yes <input type="radio" name="additional_renewal" checked="checked" value="YES" /></label>
							<label>No <input type="radio" name="additional_renewal" value="NO" /></label>
						</div>						
					</div>
					<div class="row">
						<div class="six columns">
							<label>Group ID</label>
							<input type="number" name="additional_groupId" class="additional_groupId" />
							<p class="error">This field is required</p>
							<p class="error error-invalid">This field is invalid</p>
						</div>
						<div class="six columns">
							<label>Broker ID</label>
							<input type="number" name="additional_brokerId" class="additional_brokerId" />
							<p class="error">This field is required</p>
							<p class="error error-invalid">This field is invalid</p>
						</div>
					</div>
					<div class="row">
						<div class="twelve columns">
							<input type="button" name="step1_btn" class="step2_btn btn" value="CONTINUE" />
						</div>
					</div>
				</div>
				<div class="section">
					<div class="section step3_desc">
						<h4>3. PAYMENT</h4>
					</div>
				</div>
				<div class="section step3">
					<h2>3. Payment</h2>
					<p class="error error-step3">Something went wrong</p>
					<p class="error error-transaction-2">This transaction has been declined.</p>
					<p class="error error-transaction-3">There has been an error processing this transaction.</p>
					<p class="error error-transaction-4">This transaction is being held for review</p>
					<div class="row">
						<div class="twelve columns">
							<label>Promocode</label>
							<div class="row">
								<div class="ten columns dfd_col-mobile-8">
									<input type="text" name="step3_promocode" class="step3_promocode" />
									<p class="error">This field is required</p>
									<p class="error error-invalid">The promocode is invalid</p>
								</div>
								<div class="two columns dfd_col-mobile-4">
									<input type="button" class="step3_promocode_apply btn" value="APPLY" />
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="row">
						<div class="twelve columns">
							<label>Name on Card</label>
							<input type="text" name="step3_name_on_card" class="step3_name_on_card" />
							<p class="error">This field is required</p>
							<p class="error error-invalid">This field is invalid</p>
						</div>
					</div> -->
					<div class="row">
						<div class="twelve columns">
							<label>Credit Card Number</label>
							<input type="text" name="step3_ccard" class="step3_ccard" />
							<p class="error">This field is required</p>
							<p class="error error-invalid">This field is invalid</p>
						</div>
					</div>
					<div class="row">
						<div class="four columns dfd_col-mobile-4">
							<label>Exp Date</label>
							<!-- <input type="number" name="step3_expdate_month" class="step3_expdate_month" placeholder="MM" /> -->
							<div class="select-box">
								<select name="step3_expdate_month" class="step3_expdate_month">
									<option value="">MM</option>
									<?php for ($i = 1 ; $i <= 12; $i++) { ?>
										<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
									<?php } ?>
								</select>
								<i class="fa fa-caret-down"></i>
								<p class="error">This field is required</p>
							</div>
							
						</div>
						<div class="four columns dfd_col-mobile-4">
							<label></label>
							<!-- <input type="number" name="step3_expdate_year" class="step3_expdate_year" placeholder="YYYY" /> -->
							<div class="select-box">
								<select name="step3_expdate_year" class="step3_expdate_year">
									<option value="">YYYY</option>
									<?php for ($i = 2016 ; $i <= 2050; $i++) { ?>
										<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
									<?php } ?>
								</select>
								<i class="fa fa-caret-down"></i>
								<p class="error">This field is required</p>
							</div>
						</div>
						<div class="four columns dfd_col-mobile-4">
							<label>CCV</label>
							<input type="number" name="step3_ccv" class="step3_ccv" />
							<p class="error">This field is required</p>
						</div>
					</div>
					<div class="row">
						<div class="twelve columns">
							<input type="button" name="submit" class="submit btn" value="Submit" />
						</div>
					</div>
				</div>				
			</div>
		</div>
		<div class="four columns">
			<div class="memberdetails">
				<h5>Membership Details</h5>
				<div class="section">
					<div class="row">
						<div class="seven columns dfd_col-mobile-7">
							<p>Type:</p>
						</div>
						<div class="five columns dfd_col-mobile-5">
							<p class="dtype">-</p>
						</div>
					</div>
					<div class="row">
						<div class="seven columns dfd_col-mobile-7">
							<p>Group:</p>
						</div>
						<div class="five columns dfd_col-mobile-5">
							<p class="dgroup">-</p>
						</div>
					</div>
					<div class="row">
						<div class="seven columns dfd_col-mobile-7">
							<p>Broker:</p>
						</div>
						<div class="five columns dfd_col-mobile-5">
							<p class="dbroker">-</p>
						</div>
					</div>
					<div class="row">
						<div class="seven columns dfd_col-mobile-7">
							<p>Payment Plan</p>
						</div>
						<div class="five columns dfd_col-mobile-5">
							<p class="dpaymentplan">-</p>
						</div>
					</div>
				</div>
				<div class="section">
					<div class="row">
						<div class="seven columns dfd_col-mobile-7">
							<p>Membership fee:</p>
						</div>
						<div class="five columns dfd_col-mobile-5">
							<p class="dmembershipfee">$0.00</p>
						</div>
					</div>
					<div class="row">
						<div class="seven columns dfd_col-mobile-7">
							<p>Activation fee:</p>
						</div>
						<div class="five columns dfd_col-mobile-5">
							<p class="dactivationfee">$0.00</p>
						</div>
					</div>
					<div class="row">
						<div class="seven columns dfd_col-mobile-7">
							<p>Today's Total</p>
						</div>
						<div class="five columns dfd_col-mobile-5">
							<p class="dtotal">$0.00</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
(function ($){
	var formData = {
		memberid: '',
		payoption: '',
		autopayment: '',
		step_signup: {},
		step1: {
			additional: []
		},
		step2: {},
		step3: {},
		promo: {
			promocode: 0,
      		discount_pcnt: 0
		}
	}
	var brokers = [];
	var groups = [];
	var promos = [];
	function showLoadingIcon() {
		$('.sk-fading-wrapper').css('display', 'block');
	}
	function hideLoadingIcon() {
		$('.sk-fading-wrapper').css('display', 'none');
	}
	$.ajax({
		type: 'GET',
		url: 'https://api.dentalsave.com/api/promocodes'
	}).done(function(res) {
		promos = res.data;
	});
	$.ajax({
		type: 'GET',
		url: 'https://api.dentalsave.com/api/group'
	}).done(function(res) {
		groups = res.data;
	});
	$.ajax({
		type: 'GET',
		url: 'https://api.dentalsave.com/api/broker'
	}).done(function(res) {
		brokers = res.data;
	});
	function existBroker(id) {
		brokers.forEach(function(element, index) {
			if (element.id == id) return id;
		});
		return 0;
	}
	function isEmail(email) {
      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      return regex.test(email);
    }
	$.fn.signupMember = function() {
		return this.each(function() {
			var $t = $(this);

			$t.find('.step1_addmore_edit').on('click', function(event) {
				event.preventDefault();
				$t.find('.step1 .edit_additional_member').css('display', 'block');
			});

			$t.find('.signup_btn').on('click', function (event) {
				event.preventDefault();
				$t.find('.step_signup .error').removeClass('error-visible');
				var $error = false;
				var first_name = $t.find('.step_signup .first_name').val();
				var last_name = $t.find('.step_signup .last_name').val();
				var gender = $t.find('.step_signup input:radio[name=signup_gender]:checked').val();
				var email = $t.find('.step_signup .email').val();
				var dob_year = $t.find('.step_signup .dob_year').val();
				var dob_month = $t.find('.step_signup .dob_month').val();
				var dob_day = $t.find('.step_signup .dob_day').val();
				var password = $t.find('.step_signup .password').val();
				var c_password = $t.find('.step_signup .c_password').val();
				var plansource = $t.find('.step_signup .hear_us').val();
				if (first_name == '') {
					$error = true;
					$t.find('.step_signup .first_name + .error').removeClass('error-visible').addClass('error-visible');
				}
				if (last_name == '') {
					$error = true;
					$t.find('.step_signup .last_name + .error').removeClass('error-visible').addClass('error-visible');
				}
				if (email == '') {
					$error = true;
					$t.find('.step_signup .email + .error').removeClass('error-visible').addClass('error-visible');
				} else if(!isEmail(email)) {
					$error = true;
					$t.find('.step_signup .email ~ .error-invalid').removeClass('error-visible').addClass('error-visible');
				}
				if (dob_year == '' || dob_month == '' || dob_day == '') {
					$error = true;
					$t.find('.step_signup .date_of_birth + .error').removeClass('error-visible').addClass('error-visible');
				} else if ( parseInt(dob_year) > 2016 || parseInt(dob_year) < 1915 || parseInt(dob_month) < 1 || parseInt(dob_month) > 12 || parseInt(dob_day) < 1 || parseInt(dob_day) > 31) {
					$error = true;
					$t.find('.step_signup .date_of_birth ~ .error-invalid').removeClass('error-visible').addClass('error-visible');
				}
				if (password == '') {
					$error = true;
					$t.find('.step_signup .password + .error').removeClass('error-visible').addClass('error-visible');
				}
				if (c_password == '') {
					$error = true;
					$t.find('.step_signup .c_password + .error').removeClass('error-visible').addClass('error-visible');
				} else if(password !== c_password) {
					$error = true;
					$t.find('.step_signup .c_password ~ .error-invalid').removeClass('error-visible').addClass('error-visible');
				}
				if (plansource == '') {
					$error = true;
					$t.find('.step_signup .select-box ~ .error').removeClass('error-visible').addClass('error-visible');
				}
				if (!$error) {
					showLoadingIcon();

					formData.step_signup = {
						fn: first_name,
						ln: last_name,
						email: email,
						gender: gender,
						dob_year: dob_year,
						dob_month: dob_month,
						dob_day: dob_day,
						password: password,
						plansource: plansource
					}
					var html = "<p><i class=\"fa fa-user\"></i> "+ first_name.toUpperCase() + " "+ last_name.toUpperCase() +" <i class=\"fa fa-circle\"></i> "+dob_month+"/"+dob_day+"/"+dob_year+" <i class=\"fa fa-circle\"></i> "+gender+"</p>";
					$('.step_signup_desc .eleven').html(html);
					

					var params = 'fn='+formData.step_signup.fn + '&ln=' + formData.step_signup.ln + '&email=' + formData.step_signup.email + '&gender=' + formData.step_signup.gender.charAt(0) + '&dob=' + formData.step_signup.dob_month + '/' + formData.step_signup.dob_day + '/' + formData.step_signup.dob_year + '&plansource=' + formData.step_signup.plansource + '&password=' + formData.step_signup.password;

					$.ajax({
						type: "post",
						url: "https://api.dentalsave.com/api/membership/0?"+params
					})
					.done(function(res) {
						if (res.memberid != null) {
							formData.memberid = res.memberid;
						}
						if (res.datadup != null) {
							/* formData.memberid = res.datadup[0].id; */
							$('.become-member-signup .error-duplicated').removeClass('error-visible').addClass('error-visible');
							hideLoadingIcon();
							return;
						}

						$('.become-member-signup .step_signup_desc').css('display', 'block');
						$('.become-member-signup .step_signup').css('display', 'none');
						$('.become-member-signup .step1_desc h4').css('display', 'none');
						$('.become-member-signup .step1_desc').css('display', 'none');
						$('.become-member-signup .step1').css('display', 'block');

						hideLoadingIcon();

					})
					.fail(function(error) {
						console.log("Something went wrong on signup");
						console.log(error);
						$t.find('.error-signup').removeClass('error-visible').addClass('error-visible');
						goToSignup();
						hideLoadingIcon();
					});

				}
			});

			$t.find('.step1_btn').on('click', function(event) {
				event.preventDefault();

				$t.find('.step3 ')
				$t.find('.step1 .error').removeClass('error-visible');
				var $error = false;
				var address_1 = $t.find('.step1 .address_1').val();
				var address_2 = $t.find('.step1 .address_2').val() || 0;
				var phoneno = $t.find('.step1 .phoneno').val();
				var personal_city = $t.find('.step1 .personal_city').val();
				var personal_zipcode = $t.find('.step1 .personal_zipcode').val();
				var personal_state = $t.find('.step1 .personal_state').val();	
				if (address_1 == '') {
					$error = true;
					$t.find('.step1 .address_1 + .error').removeClass('error-visible').addClass('error-visible');
				}			
				if (phoneno == '') {
					$error = true;
					$t.find('.step1 .phoneno + .error').removeClass('error-visible').addClass('error-visible');
				}
				// if (address_2 == '') {
				// 	$error = true;
				// 	$t.find('.step1 .address_2 + .error').removeClass('error-visible').addClass('error-visible');
				// }
				if (personal_city == '') {
					$error = true;
					$t.find('.step1 .personal_city + .error').removeClass('error-visible').addClass('error-visible');
				}
				if (personal_state == '') {
					$error = true;
					$t.find('.step1 .personal_state + .error').removeClass('error-visible').addClass('error-visible');
				}
				if (personal_zipcode == '') {
					$error = true;
					$t.find('.step1 .personal_zipcode + .error').removeClass('error-visible').addClass('error-visible');
				}
				// if (formData.step1.additional.length == 0) {
				// 	$error = true;
				// 	$t.find('.step1 .error-additional-members').removeClass('error-visible').addClass('error-visible');					
				// }
				if (!$error) {
					formData.step1.address_1 = address_1;
					formData.step1.address_2 = address_2;
					formData.step1.city = personal_city;
					formData.step1.zipcode = personal_zipcode;
					formData.step1.state = personal_state;
					formData.step1.phoneno = phoneno;
					var html = '<p><i class="fa fa-map-marker"></i> '+address_1.toUpperCase();
					if (address_2) html += ', ' + address_2.toUpperCase();
					html += ', ' + personal_city.toUpperCase() + ", " + personal_state.toUpperCase() + " " +personal_zipcode +'</p>';
					$t.find('.step1_desc .item1').html(html);
					$('.become-member-signup .step1').css('display', 'none');
					$('.become-member-signup .step1_desc').css('display', 'block');
					$('.become-member-signup .step2_desc').css('display', 'none');
					$('.become-member-signup .step2_desc h4').css('display', 'none');
					$('.become-member-signup .step1_desc > .row').css('display', 'block');
					$('.become-member-signup .step2').css('display', 'block');
					
				}
			});

			$t.find('.step1_addmore').on('click', function(event) {
				event.preventDefault();
				$t.find('.step1 .error').removeClass('error-visible');
				var $error = false;
				var first_name = $t.find('.step1 .first_name').val();
				var last_name = $t.find('.step1 .last_name').val();
				var dob_month = $t.find('.step1 .dob_month').val();
				var dob_day = $t.find('.step1 .dob_day').val();
				var dob_year = $t.find('.step1 .dob_year').val();	
				var gender = $t.find('.step1 input:radio[name=gender]:checked').val();
				$t.find('.step1 .first_name').val('');
				$t.find('.step1 .last_name').val('');
				$t.find('.step1 .dob_month').val('');
				$t.find('.step1 .dob_day').val('');
				$t.find('.step1 .dob_year').val('');
				if (first_name == '') {
					$error = true;
					$t.find('.step1 .first_name + .error').removeClass('error-visible').addClass('error-visible');
				}			
				if (last_name == '') {
					$error = true;
					$t.find('.step1 .last_name + .error').removeClass('error-visible').addClass('error-visible');
				}
				if (dob_month == '' || dob_day == '' || dob_year == '') {
					$error = true;
					$t.find('.step1 .date_of_birth + .error').removeClass('error-visible').addClass('error-visible');
				} else if ( parseInt(dob_year) > 2016 || parseInt(dob_year) < 1915 || parseInt(dob_month) < 1 || parseInt(dob_month) > 12 || parseInt(dob_day) < 1 || parseInt(dob_day) > 31) {
					$error = true;
					$t.find('.step1 .date_of_birth ~ .error-invalid').removeClass('error-visible').addClass('error-visible');
				}
				if (!$error) {
					var dob = dob_month + '/' + dob_day + '/' + dob_year;
					var html = '<div class="row"><div class="five columns dfd_col-mobile-5"><p>' + first_name + ' ' + last_name+'</p></div><div class="thee columns dfd_col-mobile-4"><p>'+dob+'</p></div><div class="two columns dfd_col-mobile-2"><p>'+gender+'</p></div><div class="one columns dfd_col-mobile-1"><a href="'+formData.step1.additional.length+'" class="remove_user">X</a></div></div>';
					var html1 = '<p><i class="fa fa-user"></i> ' + first_name + ' ' + last_name+' <i class="fa fa-circle"></i> '+dob+' <i class="fa fa-circle"></i> '+gender+'</p>';
					$t.find('.step1 .additional_members').append(html);
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
				}
			});

			$t.find('.step1').on('click', '.remove_user', function(event) {
				event.preventDefault();
				var _index = $(this).attr('href');
				formData.step1.additional.splice(_index, 1);
				$t.find('.step1_desc .item2 p:nth-child(' + (_index + 1) + ')').remove();
				$(this).parent().parent().remove();
			});

			$t.find('.step2 input:radio[name=additional_payment_plan]').on('change', function() {
				var payment_plan = $t.find('.step2 input:radio[name=additional_payment_plan]:checked').val();
				if (payment_plan == 'NO') {
					$t.find('.step2 .auto-renewal-wrapper input[value="YES"]').prop("checked", true);
					$t.find('.step2 .auto-renewal-wrapper').css('display', 'none');
				} else {
					$t.find('.step2 .auto-renewal-wrapper').css('display', 'block');
				}
			});

			$t.find('.step2_btn').on('click', function(event) {
				event.preventDefault();
				$t.find('.step2 .error').removeClass('error-visible');
				var $error = false;
				var groupId = $t.find('.step2 .additional_groupId').val();
				var brokerId = $t.find('.step2 .additional_brokerId').val();
				var payment_plan = $t.find('.step2 input:radio[name=additional_payment_plan]:checked').val();
				var renewal = $t.find('.step2 input:radio[name=additional_renewal]:checked').val();
				if (groupId == '') {
					// $error = true;
					// $t.find('.step2 .additional_groupId + .error').removeClass('error-visible').addClass('error-visible');
					groupId = 0;
				} else if (!isNum(groupId)) {
					$error = true;
					$t.find('.step2 .additional_groupId ~ .error-invalid').removeClass('error-visible').addClass('error-visible');
				}		
				if (brokerId == '') {
					brokerId = 0;
					// $error = true;
					// $t.find('.step1 .additional_brokerId + .error').removeClass('error-visible').addClass('error-visible');
				}
				
				if (!$error) {
					var obj = {
						payment_plan: payment_plan,
						renewal: renewal,
						groupId: groupId,
						brokerId: brokerId
					}
					formData.step2 = obj;
					$t.find('.step2_desc .plan_anuual_v').html(payment_plan);
					$t.find('.step2_desc .renewal_v').html(renewal);
					$t.find('.step2_desc .group_v').html(groupId);
					$t.find('.step2_desc .broker_v').html(brokerId);

					

					showLoadingIcon();

					var memberid = formData.memberid;

					var params = "&add1=" + formData.step1.address_1 + "&add2=" + formData.step1.address_2 + "&city=" + formData.step1.city + "&state=" + formData.step1.state + "&zip=" + formData.step1.zipcode + "&phoneno=" + formData.step1.phoneno;
					var famCounts = Math.max(formData.step1.additional.length, 6);
					for (var i = 0; i < famCounts; i++) {
						var element = {};
						if (formData.step1.additional[i] == null ) {
							element = {
								fn: 0,
								ln: 0,
								dob: 0,
								gender: '0',
							}
						} else {
							element = formData.step1.additional[i];
						}
						params += "&fam" + (i + 1) + "fn="+ element.fn + "&fam" + (i + 1) + "ln="+ element.ln + "&fam" + (i + 1) + "dob="+ element.dob + "&fam" + (i + 1) + "gender="+ element.gender.charAt(0);
					}

					params += "&brokerid=" + existBroker(formData.step2.brokerId) + "&CO_GR=" + formData.step2.groupId;
					formData.autopayment = 1;
					if (formData.step2.payment_plan == "YES") {
						params += "&payoption=" + "annual";
						formData.payoption = 'Annual';
					} else {
						params += "&payoption=" + "monthly";
						formData.payoption = 'Monthly';
					}
					if (formData.step2.renewal == "YES") {
						params += "&autopayment=1";
					} else {
						params += "&autopayment=0";
						formData.autopayment = 0;
					}
					params += "&providername=0&practicename=0&practiceadd1=PA1&practiceadd2=pa2&practicecity=NY&practicestate=NY&practicezip=10022";
					$.ajax({
						type: "PUT",
						url: "https://api.dentalsave.com/api/membership?memid="+memberid + params,
						timeout:20000
					})
					.done(function(res) {
						formData.step2_res = res.data;

						$('.become-member-signup .step2').css('display', 'none');
						$('.become-member-signup .step2_desc').css('display', 'block');
						$('.become-member-signup .step3_desc h4').css('display', 'none');
						$('.become-member-signup .step2_desc > .row').css('display', 'block');
						$('.become-member-signup .step3').css('display', 'block');

						var type = '';
						if (formData.step2_res.planType == 'C') {
							type = "Dual";
						} else if (formData.step2_res.planType == 'S') {
							type = "Individual";
						} else if (formData.step2_res.planType == 'F') {
							type = "Family";
						}
						$('.become-member-signup .memberdetails .dtype').html(type);
						$('.become-member-signup .memberdetails .dgroup').html(formData.step2.groupId);
						$('.become-member-signup .memberdetails .dbroker').html(formData.step2.brokerId);
						$('.become-member-signup .memberdetails .dactivationfee').html('$' + formData.step2_res.ProcessingFee);
						$('.become-member-signup .memberdetails .dmembershipfee').html('$' + formData.step2_res.SubTotal);
						$('.become-member-signup .memberdetails .dtotal').html('$' + formData.step2_res.Total);	
						$('.become-member-signup .memberdetails .dpaymentplan').html(formData.payoption);

						hideLoadingIcon();
					})
					.fail(function(error) {
						console.log("Something went wrong on step1 api");
						console.log(error);
						hideLoadingIcon();
					});
				}
			});

			$t.find('.submit').on('click', function(event) {
				event.preventDefault();

				showLoadingIcon();

				var $error = false;

				// var name_on_card = $t.find('.step3 .step3_name_on_card').val();
				var ccnumber = $t.find('.step3 .step3_ccard').val();
				var emonth = $t.find('.step3 .step3_expdate_month').val();
				var eyear = $t.find('.step3 .step3_expdate_year').val();
				var ccv = $t.find('.step3 .step3_ccv').val();
				var promocode = $t.find('.step3 .step3_promocode').val();

				// if (name_on_card == '') {
				// 	$error = true;
				// 	$t.find('.step3 .step3_name_on_card + .error').removeClass('error-visible').addClass('error-visible');
				// }
				if (ccnumber == '') {
					$error = true;
					$t.find('.step3 .step3_ccard + .error').removeClass('error-visible').addClass('error-visible');
				}
				if (emonth == '') {
					$error = true;
					$t.find('.step3 .step3_expdate_month + .error').removeClass('error-visible').addClass('error-visible');
				}
				if (eyear == '') {
					$error = true;
					$t.find('.step3 .step3_expdate_year + .error').removeClass('error-visible').addClass('error-visible');
				}
				if (ccv == '') {
					$error = true;
					$t.find('.step3 .step3_ccv + .error').removeClass('error-visible').addClass('error-visible');
				}


				if ($error) return;

				showLoadingIcon();


				// var subtotal = Math.round(parseFloat(formData.step2_res.SubTotal) * (100 - parseFloat(formData.promo.discount_pcnt)));

				var step3_param = '?memid=' + formData.step2_res.memid + '&membertype=' + formData.step2_res.membertype + '&plantype=' +  formData.step2_res.planType + '&payoption=' + formData.payoption + '&promocode=' +  formData.promo.promocode + "&subtotal=" + (formData.step2_res.SubTotal * 100) + "&processingfee=" + formData.step2_res.ProcessingFee + "&total=" + Math.round( formData.step2_res.Total * 100 ) + "&cbcardtype=visa" + "&eccnum=" + ccnumber + "&ecvc=" + ccv + "&cbexpdatem=" + emonth + "&cbexpdatey=" + eyear + "&autopayment=" + formData.autopayment;





				$.ajax({
					type: "PUT",
					url: "https://api.dentalsave.com/api/membership/paymentauth/"+step3_param,
					timeout:20000
				})
				.done(function(res) {
					if (res.errorcode != null && res.errorcode == "2") {
						$t.find('.step3 .error-transaction-2').removeClass('error-visible').addClass('error-visible');
						return;
					} else if (res.errorcode != null && res.errorcode == "3") {
						$t.find('.step3 .error-transaction-3').removeClass('error-visible').addClass('error-visible');
						return;
					} else if (res.errorcode != null && res.errorcode == "4") {
						$t.find('.step3 .error-transaction-4').removeClass('error-visible').addClass('error-visible');
						return;
					}

					window.location.href = "/signup-confirmation";
					// var type = '';
					// if (formData.step2_res.planType == 'C') {
					// 	type = "Dual";
					// } else if (formData.step2_res.planType == 'S') {
					// 	type = "Individual";
					// } else if (formData.step2_res.planType == 'F') {
					// 	type = "Family";
					// }
					// $('.become-member-signup .memberdetails .dtype').html(type);
					// $('.become-member-signup .memberdetails .dgroup').html(formData.step2.groupId);
					// $('.become-member-signup .memberdetails .dbroker').html(formData.step2.brokerId);
					// $('.become-member-signup .memberdetails .dactivationfee').html('$' + formData.step2_res.ProcessingFee);
					// $('.become-member-signup .memberdetails .dmembershipfee').html('$' + subtotal);
					// $('.become-member-signup .memberdetails .dtotal').html('$' + formData.step2_res.Total);	
					// $('.become-member-signup .memberdetails .dpaymentplan').html(formData.payoption);
									
					hideLoadingIcon();
				})
				.fail(function(error) {
					console.log(error);
					$t.find('.error-step3').removeClass('error-visible').addClass('error-visible');
					hideLoadingIcon();
				});

			
			});

			function goToSignup() {
				$('.become-member-signup .step_signup').css('display', 'block');
				$('.become-member-signup .step1').css('display', 'none');
				$('.become-member-signup .step2').css('display', 'none');
				$('.become-member-signup .step3').css('display', 'none');
				$('.become-member-signup .step1_desc').css('display', 'block');
				$('.become-member-signup .step2_desc').css('display', 'block');
				$('.become-member-signup .step3_desc').css('display', 'block');
				$('.become-member-signup .step3_desc h4').css('display', 'block');
				if (Object.keys(formData.step1).length > 1)
					$('.become-member-signup .step1_desc > .row').css('display', 'block');
				else
					$('.become-member-signup .step1_desc h4').css('display', 'block');
				if (Object.keys(formData.step2).length > 1)
					$('.become-member-signup .step2_desc > .row').css('display', 'block');
				else
					$('.become-member-signup .step2_desc h4').css('display', 'block');
			}

			$t.find('.step_signup_edit').on('click', function(event) {
				event.preventDefault();
				goToSignup();			
			});

			function goToStep1() {
				$('.become-member-signup .step_signup').css('display', 'none');
				$('.become-member-signup .step1').css('display', 'block');
				$('.become-member-signup .step2').css('display', 'none');
				$('.become-member-signup .step3').css('display', 'none');
				$('.become-member-signup .step1_desc').css('display', 'block');
				$('.become-member-signup .step2_desc').css('display', 'block');
				$('.become-member-signup .step3_desc').css('display', 'block');
				$('.become-member-signup .step3_desc h4').css('display', 'block');
				if (Object.keys(formData.step1).length > 1)
					$('.become-member-signup .step1_desc > .row').css('display', 'block');
				else
					$('.become-member-signup .step1_desc h4').css('display', 'block');
				if (Object.keys(formData.step2).length > 1)
					$('.become-member-signup .step2_desc > .row').css('display', 'block');
				else
					$('.become-member-signup .step2_desc h4').css('display', 'block');
			}

			$t.find('.step1_edit').on('click', function(event) {
				event.preventDefault();
				goToStep1();
			});

			function isNum(val) {
				return /^\d+$/.test(val);
			}

			function goToStep2() {
				$('.become-member-signup .step_signup').css('display', 'none');
				$('.become-member-signup .step1').css('display', 'none');
				$('.become-member-signup .step2').css('display', 'block');
				$('.become-member-signup .step3').css('display', 'none');
				$('.become-member-signup .step1_desc').css('display', 'block');
				$('.become-member-signup .step2_desc').css('display', 'block');
				$('.become-member-signup .step3_desc').css('display', 'block');
				$('.become-member-signup .step3_desc h4').css('display', 'block');
				if (Object.keys(formData.step1).length > 1)
					$('.become-member-signup .step1_desc > .row').css('display', 'block');
				else
					$('.become-member-signup .step1_desc h4').css('display', 'block');
				if (Object.keys(formData.step2).length > 1)
					$('.become-member-signup .step2_desc > .row').css('display', 'block');
				else
					$('.become-member-signup .step2_desc h4').css('display', 'block');	
			}

			$t.find('.step2_edit').on('click', function(event) {
				event.preventDefault();
				goToStep2();		
			});


			$t.find('.step3_promocode_apply').on('click', function(event) {
				event.preventDefault();
				var code = $t.find('.step3_promocode').val();
				var discount = 0;

				for (var i = 0; i < promos.length; i++) {
					if (promos[i].promocode == code) {
						formData.promo.promocode = code;
						formData.promo.discount_pcnt = promos[i].discount_pcnt;
						discount = formData.promo.discount_pcnt;
					}
				}
				if (discount == 0)  {
					$t.find('.step3 .step3_promocode .error-invalid').removeClass('error-visible').addClass('error-visible');
				} else {
					var _subtotal = parseFloat(formData.step2_res.SubTotal) * (100 - parseFloat(discount)) / 100;
					formData.step2_res.SubTotal = _subtotal;
					formData.step2_res.Total = formData.step2_res.SubTotal + formData.step2_res.ProcessingFee;
					$('.become-member-signup .memberdetails .dmembershipfee').html('$' + _subtotal);
					$('.become-member-signup .memberdetails .dtotal').html('$' + formData.step2_res.Total);
				}
			});
			
		});
	}
	$('.main_form').signupMember();

	$('.become-member-signup input:radio[name=membership]').on('change', function () {
		var membership = $('.become-member-signup input:radio[name=membership]:checked').val();
		if (membership == 'yes') {
			switchSignForm('none', 'block');
		} else {
			switchSignForm('block', 'none');
		}
	});

	function switchSignForm(option1, option2) {
		$('.become-member-signup .sign-up').css('display', option1);
		$('.become-member-signup .step1_desc').css('display', option1);
		$('.become-member-signup .step2_desc').css('display', option1);
		$('.become-member-signup .step3_desc').css('display', option1);

		$('.become-member-signup .sign-in').css('display', option2);
	}
	
})(jQuery);
</script>