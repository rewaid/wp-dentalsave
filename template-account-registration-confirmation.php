<?php
	/*
		Template Name: DentalSave Account Registration Confirmation Page
	*/
?>

<div class="main-container">
	<div class="section center w600">
		<h1 class="fs45">Your <strong>DentalSave</strong> account registration is complete</h1>
		<p class="m0">A confirmation email was sent to <strong><?php echo $_GET['email']; ?></strong></p>
		<p>You may now renew or update your account using the member portal.</p>
		<a href="/dental-plans-member-login" class="btn btn-medium w400">Login</a>
	</div>
</div>