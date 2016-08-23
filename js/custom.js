jQuery(document).ready(function($) {
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
	};

	$('input.phoneno').inputmask({"mask": "(999) 999-9999"});
	$('input.phone').inputmask({"mask": "(999) 999-9999"});
	/********************************************
	* Logout
	********************************************/
	if ($('.dashboard-log-out').length) {
		$('.dashboard-log-out').on('click', function(e) {
			e.preventDefault();
			if (getCookie('user')) {
				document.cookie = 'user=;expires=Thu, 01 Jan 1970 00:00:01 GMT;path=/';
				window.location = "/log-out";
			}
		});
	}
});