<?php
/*
Template Name: Find a dentist near you
*/
?>

<?php
$num = get_post_meta ($post->ID, 'num', true);
if ($num == '') $num = 5;
if ($num > 30) $num = 30;
$page = 0;

function doctor_box ($id, $name, $img, $role, $miles, $addr, $phone, $education, $hours, $languages, $experience, $amenities, $fee_schedule, $network, $did, $since, $licenses, $yelp, $yelp_url, $yelp_urlm, $officeName, $_id) {
	$g_addr = str_replace ("<br>", " ", $addr);
	$rate = $yelp * 100 / 5;

	$url_name = str_replace(" ", "-", $name);

	$img = "https://api.dentalsave.com/api/images/providers/" . $did. ".jpg";
	echo '	<div id="doctor_'. $id .'" class="doctor_box" >
				<div class="row">
					<div class="columns three">
						<div class="portfolio" style="background-image: url(\''.$img.'\')">
						</div>
					</div>
					<div class="columns three">
						<div class="details">
							<img src="http://dev.dentalsave.com/wp-content/uploads/2016/06/man-icon.jpg" />
							<p class="doctor-name">'. $name .'</p>
							<p class="office-name">'. $officeName .'</p>
							<p class="role">'. $role .'</p>		
							<p class="network">'.$network.'</p>					
						</div>
					</div>
					<div class="columns three">
						<div class="address">
							<img src="http://dev.dentalsave.com/wp-content/uploads/2016/06/address-icon.jpg" />
							<p>'.$addr.'</p>
							<span class="miles">'.$miles.'</span>
						</div>
						<div class="phone">
							<img src="http://dev.dentalsave.com/wp-content/uploads/2016/06/contact-icon.jpg" />
							<p>'. $phone .'</p>
						</div>
					</div>					
				</div>
			</div>';
}


$zip = 0;
$officetype = 0;
$miles = 25;
$f_name = $l_name = '';

$redirect = false;

$uri = explode("/", $_SERVER['REQUEST_URI']);

session_start();

if ((isset($_POST['submit']) && ($_POST['submit'] == 'Search' || $_POST['submit'] == 'Apply')) || isset($_POST['page'])) {
	$zip = $_POST['zip'];
	$miles = $_POST['miles'];
	$f_name = $_POST['f_name'];
	$l_name = $_POST['l_name'];
	$specialty = $_POST['specialty'];
	$officetype = $_POST['officetype'];
	$redirect = true;
} else if (isset($_GET['zip'])) {
	$zip = $_GET['zip'];
	$miles = $_GET['miles'];
	$f_name = $_GET['f_name'];
	$l_name = $_GET['l_name'];
	$specialty = $_GET['specialty'];
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

		$url = "https://api.dentalsave.com/api/dentoff?zip=". sprintf("%05s", $zip) ."&miles=". $miles ."&first=". $first ."&last=". $last ."&practice=0&specialty=". $specialty ."&startpos=". $start ."&map=0&officetype=0";
//echo $url;		
		$response=json_decode(file_get_contents($url, false, $ctx), true);
		$api = $response['data'];
//echo count($api). ' 1<br>';
//echo $api[count($api)-1]['reccount']. ' 2<br>';
		$counts = $api[count($api)-1]['reccount'];
		if ($counts > 0) {
			$i = 0;
			?>
			<div class="near-search-result">
				<div class="row">
					<h1>DentalSave participating dentists.</h1>
					<p class="hide-mobile">Explore a unique dental experience. From a routine check up  to a complex to dental implant, you'll find a great dental professional for your need. Discover a neighborhood dentist for your and your family needs at DentalSave fees.</p>
					<form id="search-filter" method="post">
						<input type="hidden" name="zip" value="<?php echo $zip?>" />
						<input type="hidden" name="miles" value="<?php echo $miles?>" />
						<input type="hidden" name="l_name" value="<?php echo $l_name?>" />
						<div class="control">
							<span>Filter</span>
						</div>
						<div class="control">
							<select class="specialty" name="specialty">
								<option value="0" <?php if ($specialty == 0) echo 'selected'; ?>>Specialty</option>
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
							<i class="fa fa-caret-down"></i>
						</div>
						<div class="control">
							<select class="officetype" name="officetype">
								<option value="0" <?php if ($officetype == 0) echo 'selected'; ?>>Network</option>
								<option value="0">All</option>
								<option value="1" <?php if ($officetype == 1) echo 'selected'; ?>>DentalSave</option>
								<option value="2" <?php if ($officetype == 2) echo 'selected'; ?>>Careington</option>								
							</select>
							<i class="fa fa-caret-down"></i>
						</div>
						<div class="control">
							<input type="submit" name="submit" value="Apply" />
						</div>
					</form>
				</div>
			</div>
			<?php
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
					sprintf ("Miles %.2f", $dentist['dis']), $addr, $dentist['Phone'], $dentist['School'], $hours, $languages, $dentist['Experience'], $amenities, $fee_schedule, $dentist['Network'], $dentist['PICTID'], $since, $licenses, $dentist['yelpRating'], $dentist['yelpUrl'], $dentist['yelpmobile_url'], $dentist['OfficeName'], $dentist['_id']);			
			}		
		}
	}
}
?>

<?php	if ($counts > $num) {
			$max_page = ceil($counts / $num);	?>			
			<form id="pagination"  method="post">
				<input type="hidden" name="zip" value="<?php echo $zip; ?>" />
				<input type="hidden" name="miles" value="<?php echo $miles; ?>" />
				<input type="hidden" name="d_name" value="<?php echo $_POST['d_name']; ?>" />
				<input type="hidden" name="specialty" value="<?php echo $specialty; ?>" />
				<input id="cur_page" type="hidden" name="page" value="" />
				<!--<span onclick="pagination(1);"><<</span>-->
				<span onclick="pagination(-3);"><</span>
<?php			$min = $cur_page - 3;
				if ($min < 1) $min = 1;
				$max = $min + 4;
				if ($max > $max_page) {
					$max = $max_page;
					$min = $max - 4;
					if ($min < 1) $min = 1;
				}
				for ($i = $min; $i <= $max; $i++) {
					$cl = (($i - 1) == $cur_page) ? ' class="current"' : '';
					echo '<span '. $cl .' onclick="pagination('. $i .');">'. $i .'</span>';
				}	?>
				<span onclick="pagination(-1);">></span>				
			</form>
<?php	}	?>	

<?php if (isset($_POST['submit']) && $counts == 0) { ?>
<p>No Search Results</p>
<?php }
if (!isset($_POST['submit'])) {
?>
<?php while (have_posts()) : the_post(); ?>
	<?php the_content(); ?>
	<?php dfd_link_pages(); ?>
<?php endwhile; ?>

<div class="dentist-near-you row">
	<div class="columns six">
		<h2>I need a local dentist</h2>
		<p>Filter your results by entering the dentist's zip code and specialty.</p>
		<form id="local-dentist" action="/find-participating-dentist-near-you/" method="post" >
			<div class="form-container">
				<input type="text" class="zip"  name="zip" value="<?php if ($zip != 0) echo $zip; ?>" placeholder="Your Zip Code" />
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
			</div>
			<input type="submit" value="Search" name="submit" />
		</form>
	</div>
	<div class="columns six">
		<h2>Is my dentist part of <strong>DentalSave</strong>?</h2>
		<p>Enter your dentist's name and/or zip code to verify that they're a participating dentist.</p>
		<form id="my-dentist" action="/find-participating-dentist-near-you/" method="post" >
			<div class="padding-wrapper">
				<div class="form-container">
					<input type="hidden" name="miles" value="25" />
					<input type="text" name="l_name" class="lastname" placeholder="Dentist Last Name" />
					<input type="text" name="zip" class="zip" placeholder="Dentist Zip Code" />
				</div>
			</div>
			<input type="submit" value="Search" name="submit" />
		</form>
	</div> 
</div>
<?php  
}
?>

<script>
	
	function pagination (page) {
		var cur = <?php echo $cur_page; ?>;
		
		if (page > 0)
			cur = page;
		else
			cur = cur + page + 3;
					
		jQuery("#cur_page").val(cur);
		jQuery( "#pagination" ).submit();
	}
	
</script>