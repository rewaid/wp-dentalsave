<?php
  /*
    Template Name: Member Login Page
  */
?>

<?php get_template_part( 'partial/spinning' ); ?>

<div class="main-container">
  <div class="section">
    <h1>Welcome</h1>
    <p class="error error-missing">There are missing fields.</p>
    <p class="error error-invalid">Member ID/Password is wrong.</p>
    <form id="member-login-form">
      <input type="text" name="memberid" class="memberid" placeholder="Member ID" />
      <input type="password" name="password" class="password" placeholder="Password" />
      <input type="submit" class="btn submit" value="Log in to DentalSave" />
    </form>
    <p>Forgot <a href="/member-id-request/">Member ID</a> or <a href="/dental-plans-password-reset/">Password</a></p>
    <a href="/dental-plans-account-registration/" class="btn btn-white">Register my DentalSave account</a>
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
  function setCookie(cname, cvalue, exdays) {
      var d = new Date();
      d.setTime(d.getTime() + (exdays*24*60*60*1000));
      var expires = "expires="+ d.toUTCString();
      console.log(cname + "=" + cvalue + "; " + expires + ";path=/");
      document.cookie = cname + "=" + cvalue + "; " + expires + ";path=/";
  }
  $('.main-container .submit').on('click', function(event) {
    event.preventDefault();
    showLoadingIcon();
    $('.main-container .error').removeClass('error-visible');
    console.log("logging in...");
    var $error = false;
    var memberid = $('.main-container .memberid').val();
    var password = $('.main-container .password').val();
    if (memberid == '' || password == '') {
      $error = true;
      $('.main-container .error-missing').removeClass('error-visible').addClass('error-visible');
      return;
    }

    var params = memberid + "?password=" + password;
    $.ajax({
      type: "GET",
      url: "https://api.dentalsave.com/api/membership/"+params,
      timeout: 10000
    })
    .done(function(respond) {
      console.log(respond);
      if (respond.data == 'login failed') {
        hideLoadingIcon();
        $('.main-container .error-invalid').removeClass('error-visible').addClass('error-visible');
      } else {
        var user = JSON.stringify(respond);
        setCookie('user', user, 3);
        hideLoadingIcon();
        window.location = "/user-dashboard/";
      }
    })
    .fail(function(error) {
      hideLoadingIcon();
      $('.main-container .error-invalid').removeClass('error-visible').addClass('error-visible');
    });
  });
})(jQuery);
</script>
