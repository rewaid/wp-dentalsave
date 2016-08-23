<?php
	/*
		Template Name: Search Page
	*/
	
$num = get_post_meta ($post->ID, 'num', true);
if ($num == '') $num = 5;
if ($num > 30) $num = 30;
$page = 0;

function doctor_box ($id, $name, $img, $role, $miles, $addr, $phone, $education, $hours, $languages, $experience, $amenities, $fee_schedule, $network, $did, $since, $licenses, $yelp, $yelp_url, $yelp_urlm, $officeName) {
	$g_addr = str_replace ("<br>", " ", $addr);
	$rate = $yelp * 100 / 5;

	$img = "https://api.dentalsave.com/api/images/providers/" . $did. ".jpg";
	echo '	<div id="doctor_'. $id .'" class="doctor_box" onclick="details('. $id .');">
				<div class="img">				
					<img alt="'. $name .'" src="'. $img .'" />
					<p>'. $network .' Provider<br/>since '. $since .'</p>
				</div>
				<div class="details">
					<h2 class="doctor-name">'. $name .'</h2>
					<h2 class="office-name">'. $officeName .'</h2>
					<h3>'. $role .'</h3>
					<a class="schedule2 view_pdf" href="'. $fee_schedule. '" target="_blank">View Provider Fee Schedule</a>
					<a class="mapPin"><span>'. $miles .'</span>
						'. $addr .'</a>
				</div>
				<div class="phone">
					<h3>Phone Number</h3>
					<p>'. $phone .'</p>
				</div>
				<div class="education">
					<h3>Education</h3>
					<p>'. $education .'</p>
					<a class="schedule view_pdf" href="'. $fee_schedule. '" target="_blank">View Provider Fee Schedule</a>
				</div>
				<div class="clear"></div>
			</div>
			<div id="doctor_'. $id .'d" class="doctor_box details" onclick="details(-'. $id .');">			
			<a>Go Back to Search Results</a>
				<div class="img">
					<img alt="'. $name .'" src="'. $img .'" />
					<p>'. $network .' Provider<br/>since '. $since .'</p>
				</div>
				<div class="details">
					<h2 class="doctor-name">'. $name .'</h2>
					<h2 class="office-name">'. $officeName .'</h2>
					<h3>'. $role .'</h3>
					<a class="schedule2 view_pdf" href="'. $fee_schedule. '" target="_blank">View Provider Fee Schedule</a>
					<a class="mapPin"><span>'. $miles .'</span>
						'. $addr .'</a>
				</div>
				<div class="map" >
					<iframe width="500" height="300" frameborder="0" style="border:0"
						src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDqJIMt5SpCL2T4nDpzjj_9-htja_4VOZY&zoom=14&q='. $g_addr .'"></iframe>				
				</div>
				<div class="phone">
					<h3>Education</h3>
					<p>'. $education .'</p>

					<h3>Experience</h3>
					<p>'. $experience .' years</p>

					<h3>Languages</h3>
					<p>'. $languages. '</p>

					<h3>Amenities</h3>
					<p>'. $amenities .'</p>

					<h3>License Information</h3>
					<p>'. $licenses .'</p>					
				</div>
				<div class="education">
					<a class="view_pdf" href="'. $fee_schedule .'" target="_blank">View Provider Fee Schedule</a>
					<h3>Phone Number</h3>
					<p>'. $phone .'</p>
					
					<h3>Office Hours</h3>
					'. $hours .'

					<h3>Yelp Rating</h3>
					<a class="stars desktop" href="'. $yelp_url .'" target="_blank">
						<div class="stars_off"></div>
						<div class="stars_on" style="width:'. $rate .'px"></div>
					</a>
					<a class="stars mobile" href="'. $yelp_urlm .'" target="_blank">
						<div class="stars_off"></div>
						<div class="stars_on" style="width:'. $rate .'px"></div>
					</a>
				</div>
				<div class="clear"></div>
			
			</div>';
}

$zip = 0;

$miles = 25;
$f_name = $l_name = '';

$redirect = false;

$uri = explode("/", $_SERVER['REQUEST_URI']);

session_start();

if ((isset($_POST['submit']) && $_POST['submit'] == 'Search') || isset($_POST['page'])) {
	$zip = $_POST['zip'];
	$miles = $_POST['miles'];
	$f_name = $_POST['f_name'] || 0;
	$l_name = $_POST['l_name'] || 0;
	$specialty = $_POST['specialty' || 0];
	$redirect = true;
} else if (isset($_GET['zip'])) {
	$zip = $_GET['zip'];
	$miles = $_GET['miles'];
	$f_name = $_GET['f_name'] || 0;
	$l_name = $_GET['l_name'] || 0;
	$specialty = $_GET['specialty'] || 0;
	$redirect = true;	
} else if (count($uri) > 3) { 
	if (isset($_SESSION['miles'])) $miles = $_SESSION['miles'];
	if (isset($_SESSION['f_name'])) $f_name = $_SESSION['f_name'];
	if (isset($_SESSION['l_name'])) $l_name = $_SESSION['l_name'];
	if (isset($_SESSION['specialty'])) $specialty = $_SESSION['specialty'];
}

if (count($uri) > 3) {
	$zip = $uri[2];
	if (count($uri) > 4) $_SESSION['page'] = $uri[3];
} else if ($redirect) {
	$_SESSION['page'] = null;
	if (isset($_POST['page'])) $_SESSION['page'] = $_POST['page'];
	$_SESSION['miles'] = $miles;
	$_SESSION['f_name'] = $f_name;
	$_SESSION['l_name'] = $l_name;
	$_SESSION['specialty'] = $specialty;
	session_write_close();
//	echo 'Location: '. $_SERVER['REQUEST_URI'] . sprintf("%05s", $zip) . '/';		
	header('Location: '. $_SERVER['REQUEST_URI'] . sprintf("%05s", $zip) . '/');	
}

get_header();
the_post ();

	?>

<div id="landing_banner">
	<?php the_post_thumbnail('full'); ?>
	<h1><?php the_field('landing_title'); ?></h1>
	<?php	$h2 = get_field('landing_sub_title');
			if ($h2 != '') echo '<h2>'. $h2 .'</h2>';
			$img = get_field('logo_in_banner');	
			if ($img["url"] != '') 
				echo '<div class="b-logo"><img alt="'. $img["alt"] .'" src="'. $img["url"] .'" /></div>';
			?>
</div>
<?php/*
	<div id="map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d12947831.742778083!2d-95.66499999999995!3d37.59999999999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1siw!2s!4v1424926916815" height="900" frameborder="0" style="border:0"></iframe>
	</div>	*/	?>
	<div class="container">
		<form id="top_form" action="/search-dentists/" method="post" >
			
			
			<div class="select-box">
				<select class="specialty" name="specialty">
					<option value="0" <?php if ($specialty == 0) echo 'selected'; ?>>Select specialty</option>
					<option value="0" >All</option>
					<option value="187" <?php if ($specialty == 187) echo 'selected'; ?>>Endodontist</option>
					<option value="118" <?php if ($specialty == 118) echo 'selected'; ?>>General Dentist</option>
					<option value="210" <?php if ($specialty == 210) echo 'selected'; ?>>Holistic</option>
					<option value="1178" <?php if ($specialty == 1178) echo 'selected'; ?>>Implantology</option>
					<option value="119" <?php if ($specialty == 119) echo 'selected'; ?>>Oral Surgeon</option>
					<option value="186" <?php if ($specialty == 186) echo 'selected'; ?>>Orthodontist</option>
					<option value="190" <?php if ($specialty == 190) echo 'selected'; ?>>Pedodontist</option>
					<option value="188" <?php if ($specialty == 188) echo 'selected'; ?>>Periodontist</option>
					<option value="189" <?php if ($specialty == 189) echo 'selected'; ?>>Prosthodontist</option>
					<option value="191" <?php if ($specialty == 191) echo 'selected'; ?>>T.M.J Specialist</option>
				</select>
			</div>
			<input class="zip" type="text" <?php inp_value(($zip != 0) ? $zip : "Zip Code"); ?> name="zip" >
			<div class="select-box">			
				<select class="miles" name="miles">
					<option value="">Select Radius</option>
					<option value="1" <?php if ($miles == 1) echo 'selected'; ?>>1 Mile</option>
					<option value="2" <?php if ($miles == 2) echo 'selected'; ?>>2 Miles</option>
					<option value="5" <?php if ($miles == 5) echo 'selected'; ?>>5 Miles</option>
					<option value="10" <?php if ($miles == 10) echo 'selected'; ?>>10 Miles</option>
					<option value="25" <?php if ($miles == 25) echo 'selected'; ?>>25 Miles</option>
				</select>
			</div>
			<input type="submit" value="Search" name="submit" >			
		</form>
		<div id="error" class="err"></div>
		<div id="results" class="col-lg-12 col-md-12 col-sm-12 no-padding">
		
<?php

$counts = 0;
$cur_page = 0;		
if ($zip != 0) {
	$ctx=stream_context_create(array('http'=> array('timeout' => 10 )));	
	
	if (isset($_SESSION['page'])) {
		$cur_page = $_SESSION['page'] - 1;
		if ($cur_page < 0) $cur_page = 0;
		$start = $cur_page * $num;
	} else {
		$cur_page = 0;
		$start = 0;
	}
	if ($zip != '') {
		if ($miles == '' || $miles == 0) $miles = 1;
		if ($specialty == '') $specialty = 0;
		$first = ($f_name == '' || $f_name == ' ' || $f_name == 'First Name') ? 0 : $f_name;
		$last = ($l_name == '' || $l_name == ' ' || $l_name == 'Last Name') ? 0 : $l_name;

		$url = "https://api.dentalsave.com/api/dentoff?zip=". sprintf("%05s", $zip) ."&miles=". $miles ."&first=". $first ."&last=". $last ."&practice=0&specialty=". $specialty ."&startpos=". $start ."&map=0";
		print_r($url);
		exit;
//echo $url;		
		$response=json_decode(file_get_contents($url, false, $ctx), true);
		$api = $response['data'];
//echo count($api). ' 1<br>';
//echo $api[count($api)-1]['reccount']. ' 2<br>';
		$counts = $api[count($api)-1]['reccount'];
		if ($counts > 0) {
			$i = 0;
			foreach ($api as $dentist) {
//if ($i == 0) print_r ($dentist);			
				if (++$i >= count($api)) break;
				if ($i > $counts) break;
				if ($i > $num) break;			
				$addr = $dentist['Address'] .'<br>';
				if ($dentist['Address2'] != '') $addr .= $dentist['Address2'] .'<br>';
				$addr .= $dentist['City'] .', '. $dentist['State'] .' '. $dentist['ZipCode'];  
				$hours = '';
				
				if (array_key_exists('officeHours', $dentist)) {
					foreach ($dentist['officeHours'] as $a) {
						$t = explode (" ", $a['HOURS']);
						$hours .= '<p class="hours"><span>'. $t[0] .'</span> '. $t[1] .' '. $t[2] .' - '. $t[4] .' '. $t[5] .'</p>';
					}
				}

				$languages = '';

				if (array_key_exists('Languages', $dentist)) {
					foreach ($dentist['Languages'] as $a) {
						if ($languages != '') $languages .= '<br>';
						$languages .= $a['LANG'];
					}
				}

				$amenities = '';

				if (array_key_exists('officeFeatures', $dentist)) {
					foreach ($dentist['officeFeatures'] as $a) {
						if ($amenities != '') $amenities .= '<br>';
						$amenities .= $a['FEATURE'];
					}
				}
				$licenses = 'On File';
/*				foreach ($dentist['Licenses'] as $a) {
					if ($licenses != '') $licenses .= '<br>';
					$licenses .= $a['LICENSE'];
				}*/
				
				$fee_schedule = 'http://dentalsave.com/' . $dentist['FeeUrl'];

				$since = date("F ‘y", strtotime($dentist['Mem Date']));
				
/*OfficeName

	*/
				

				doctor_box ($i, $dentist['DentistName'], "/wp-content/uploads/2015/02/doc.jpg", $dentist['Special1'], 
					sprintf ("Miles %.2f", $dentist['dis']), $addr, $dentist['Phone'], $dentist['School'], $hours, $languages, $dentist['Experience'], $amenities, $fee_schedule, $dentist['Network'], $dentist['PICTID'], $since, $licenses, $dentist['yelpRating'], $dentist['yelpUrl'], $dentist['yelpmobile_url'], $dentist['OfficeName']);			
			}		
		}
	}
}	?>


			<div class="clear"></div>
<?php	if ($counts > $num) {
			$max_page = ceil($counts / $num);	?>			
			<form id="pagination" action="<?php echo site_url(); ?>/search-dentists/" method="post">
				<input type="hidden" name="zip" value="<?php echo $zip; ?>" />
				<input type="hidden" name="miles" value="<?php echo $miles; ?>" />
				<input type="hidden" name="d_name" value="<?php echo $_POST['d_name']; ?>" />
				<input type="hidden" name="specialty" value="<?php echo $specialty; ?>" />
				<input id="cur_page" type="hidden" name="page" value="" />
				<span onclick="pagination(1);"><<</span>
				<span onclick="pagination(-3);"><</span>
<?php			$min = $cur_page - 3;
				if ($min < 1) $min = 1;
				$max = $min + 8;
				if ($max > $max_page) {
					$max = $max_page;
					$min = $max - 8;
					if ($min < 1) $min = 1;
				}
				for ($i = $min; $i <= $max; $i++) {
					$cl = (($i - 1) == $cur_page) ? ' class="current"' : '';
					echo '<span '. $cl .' onclick="pagination('. $i .');">'. $i .'</span>';
				}	?>
				<span onclick="pagination(-1);">></span>
				<span onclick="pagination(<?php echo $max_page; ?>);">>></span>
			</form>
<?php	}	?>			
		</div>
<?php	if ($counts == 0) {	?>		
		<div id="no-results" class="col-lg-12 col-md-12 col-sm-12 no-padding">
			<?php	echo apply_filters( 'the_content', $post->post_content );	?>		
		</div>
<?php	}	?>		
		<div id="data"></div>
	</div>

<script>
	function validate () {
		jQuery("#error").html(" ");	
		if (jQuery.isNumeric(jQuery("input.zip"))) {
			return true;
		} else {
			jQuery("#error").html("Zip is not Numeric");
			return false;
		}
	}

	function pagination (page) {
		var cur = <?php echo $cur_page; ?>;
		
		if (page > 0)
			cur = page;
		else
			cur = cur + page + 3;
					
		jQuery("#cur_page").val(cur);
		jQuery( "#pagination" ).submit();
	}

	function fee_click(event) {
		event.stopPropagation();
	}

	jQuery('.doctor_box').add('.doctor_box .view_pdf').click(fee_click);
	jQuery('.doctor_box').add('.doctor_box .stars').click(fee_click);

	function details (id) {
		if (id > 0) {
			jQuery("#doctor_" + id).hide();
			jQuery("#doctor_" + id + "d").show();
		} else {
			id = -id;
			jQuery("#doctor_" + id + "d").hide();
			jQuery("#doctor_" + id).show();
		}
	}
	

</script>	

<?php	get_footer();	?>
