<?php
	/*
		Template Name: DentalSave Account Registration Page
	*/
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
<div class="main-container">
	<div class="section w600 center">
		<h1 class="fs45">Register Your Existing <strong>DentalSave</strong> Account</h1>
		<p>Enter the following information to register your account.</p>
		<p class="error error-missing">There are missing fields.</p>
		<p class="error error-password">Passwords doesn't match.</p>
		<p class="error error-invalid">The request has been failed.</p>
		<p class="error error-email">Email is invalid.</p>
		<form id="member-recover-id" class="w400">
			<input type="text" class="blue-box center memberid" placeholder="Member ID" />
			<input type="text" class="blue-box center bt0 fn" placeholder="First Name" />
			<input type="text" class="blue-box center bt0 ln" placeholder="Last Name" />
			<input type="text" class="blue-box center bt0 email" placeholder="email" />
			<br/>
			<input type="password" class="blue-box center password" placeholder="Enter New Password" />
			<input type="password" class="blue-box center bt0 cpassword" placeholder="Reenter New Password" />
			<input type="button" class="submit btn btn-medium" name="submit" value="Submit" />
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
	$('.main-container .submit').on('click', function(event) {
		event.preventDefault();
		$('.main-container .error').removeClass('error-visible');
		
		console.log("requesting password reset...");
		var $error = false;
		var memberid = $('.main-container .memberid').val();
		var fn = $('.main-container .fn').val();
		var ln = $('.main-container .ln').val();
		var email = $('.main-container .email').val();
		var cpassword = $('.main-container .cpassword').val();
		var password = $('.main-container .password').val();
		if (memberid == '' || fn == '' || ln == '' || password == '' || cpassword == '' || email == '') {
			$error = true;
			$('.main-container .error-missing').removeClass('error-visible').addClass('error-visible');
			return;
		}
		if (!isEmail(email)) {
			$('.main-container .error-email').removeClass('error-visible').addClass('error-visible');
			return;
		}
		if (password != cpassword) {
			$('.main-container .error-password').removeClass('error-visible').addClass('error-visible');
			return;
		}
		showLoadingIcon();
		var params = memberid + "?firstname=" + fn + "&lastname=" + ln + "&email=" + email + "&password=" + password;
		$.ajax({
			type: "GET",
			url: "https://api.dentalsave.com/api/membersetpassword/"+params,
			timeout: 20000
		})
		.done(function(res) {
			console.log(res);
			if (res == "success") {
				window.location.href = "/dental-plans-account-registration-confirmation";
			} else {
				$('.main-container .error-invalid').removeClass('error-visible').addClass('error-visible');
			}
			hideLoadingIcon();

		})
		.fail(function(error) {
			console.log(error);
			$('.main-container .error-invalid').removeClass('error-visible').addClass('error-visible');
			hideLoadingIcon();
		});
	});
	function isEmail(email) {
      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      return regex.test(email);
    }
})(jQuery);
</script>