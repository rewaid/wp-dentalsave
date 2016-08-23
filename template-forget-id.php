<?php
	/*
		Template Name: Member Forgot ID Page
	*/
?>

<?php get_template_part( 'partial/spinning' ); ?>

<div class="main-container">
	<div class="section w600 center">
		<h1 class="fs45">Recover your Member ID</h1>
		<p>Enter your Information in the form below to retrieve your login details.</p>
		<p class="error error-missing">There are missing fields</p>
		<p class="error error-email">Email is invalid</p>
		<form id="member-recover-id" class="w400" method="post">
			<input type="text" class="blue-box center fn" placeholder="First Name" />
			<input type="text" class="blue-box center bt0 ln" placeholder="Last Name" />
			<input type="email" class="blue-box center bt0 email" placeholder="Email address" />
			<label>Date of Birth</label>
			<div class="date_of_birth">
				<div class="four columns dfd_col-mobile-4">
					<div class="select-box">
						<select name="dob_month" class="dob_month blue-box center">
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
						<select name="dob_day" class="dob_day blue-box center">
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
						<select name="dob_year" class="dob_year blue-box center">
							<option value="">YYYY</option>
					<?php for ($i = 1920 ; $i <= 2016; $i++) { ?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
					<?php } ?>
						</select>
					<i class="fa fa-caret-down"></i>
					</div>
				</div>
			</div>
			<p></p>
			<input type="submit" class="submit btn btn-medium" name="submit" value="Submit" />
		</form>
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
	$('#member-recover-id').on('submit', function(event) {
		event.preventDefault();
		$('.main-container .error').removeClass('error-visible');
		console.log("recovering your member id...");
		var $error = false;
		var fn = $('.main-container .fn').val();
		var ln = $('.main-container .ln').val();
		var email = $('.main-container .email').val();
		var dob_month = $('.main-container .dob_month').val();
		var dob_day = $('.main-container .dob_day').val();
		var dob_year = $('.main-container .dob_year').val();
		if (fn == '' || ln == '' || email == '' || dob_month == '' || dob_day == '' || dob_year == '' ) {
			$error = true;
			$('.main-container .error-missing').removeClass('error-visible').addClass('error-visible');
			return;
		}
		if (!isEmail(email)) {
			$('.main-container .error-email').removeClass('error-visible').addClass('error-visible');
			return;
		}
		var params = "firstname=" + fn + "&lastname=" + ln + "&DOB" + dob_month + "/" + dob_day + "/" + dob_year + "&email=" + email;
		showLoadingIcon();
		$.ajax({
			type: "post",
			url: "https://api.dentalsave.com/api/membership/recover/0?"+params,
			timeout: 10000
		})
		.done(function(res) {
			console.log(res);
			hideLoadingIcon();
			window.location.href = "/member-id-request-confirmation/?email="+email;

		})
		.fail(function(error) {
			console.log(error);
			hideLoadingIcon();
		});
	});
	function isEmail(email) {
      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      return regex.test(email);
    }
})(jQuery);
</script>