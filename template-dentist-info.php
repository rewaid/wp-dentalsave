<?php
/*
Template Name: Dentist Info
*/
?>

<?php
$params = explode("-", $wp_query->query_vars['dentist_info']);
$id = $params[0];
if ($id) {
	$ctx=stream_context_create(
		array(
		    "ssl"=>array(
		        "verify_peer"=>false,
		        "verify_peer_name"=>false,
		    ),
		    'http' => array(
		    	'timeout' => 10
		    )
		));
	$url = "https://api.dentalsave.com/api/dentoff/".$id;
	$response=json_decode(file_get_contents($url, false, $ctx), true);
	$dentist = $response['data'];
	$img = "https://api.dentalsave.com/api/images/providers/" . $dentist['DENTID']. ".jpg";

	$addr = $dentist['Address'] .'<br>';
	if ($dentist['Address2'] != '') $addr .= $dentist['Address2'] .'<br>';
	$addr .= $dentist['City'] .', '. $dentist['State'] .' '. $dentist['ZipCode'];  
	$g_addr = str_replace ("<br>", " ", $addr);

	$languages = 'English, '.$dentist['LANGS'];

	$fee_schedule = 'http://dentalsave.com/' . $dentist['FeeUrl'];
	
	?>
	<div class="row doctor_box">
		<div class="columns four">
			<div class="portfolio" style="background-image: url('<?php echo $img ?>')">
			</div>
		</div>
		<div class="columns four">
			<div class="details">
				<img src="http://dentalsave.com/wp-content/uploads/2016/06/man-icon.jpg" />
				<p class="doctor-name"><?php echo $dentist['DentistName']; ?></p>
				<p class="office-name"><?php echo $dentist['OfficeName']; ?></p>
				<p class="role"><?php echo $dentist['Special1']; ?></p>		
				<p class="network"><?php echo $dentist['Network']; ?></p>
			</div>
		</div>
		<div class="columns four">
			<div class="address">
				<img src="http://dentalsave.com/wp-content/uploads/2016/06/address-icon.jpg" />
				<p><?php echo $addr; ?></p>
				<span class="miles"><?php echo sprintf ("Miles %.2f", $dentist['dis']); ?></span>
			</div>
			<div class="phone">
				<img src="http://dentalsave.com/wp-content/uploads/2016/06/contact-icon.jpg" />
				<p><?php echo $dentist['Phone'] ?></p>
			</div>
			
		</div>
	</div>
	<div class="map" >
		<iframe width="100%" height="250" frameborder="0" style="border:0"
			src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDqJIMt5SpCL2T4nDpzjj_9-htja_4VOZY&zoom=14&q=<?php echo $g_addr; ?>"></iframe>				
	</div>
	<div class="professional_details">
		<div class="row">
			<div class="row">
				<div class="columns twelve">
				<h2>Professional Details</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="row">
				<div class="columns four dfd_col-mobile-4"><p>Education</p></div>
				<div class="columns four dfd_col-mobile-8"><p><?php echo $dentist['School'];?></p></div>
			</div>
		</div>
		<div class="row">
			<div class="row">
				<div class="columns four dfd_col-mobile-4"><p>Experience</p></div>
				<div class="columns four dfd_col-mobile-8"><p><?php echo $dentist['Experience'];?> Years</p></div>
			</div>
		</div>
		<div class="row">
			<div class="row">
				<div class="columns four dfd_col-mobile-4"><p>Languages</p></div>
				<div class="columns four dfd_col-mobile-8"><p><?php echo $languages;?></p></div>
			</div>
		</div>
		<div class="row officehours">
			<div class="row">
				<div class="columns twelve">
					<p>Office Hours:</p>
				</div>
			</div>
			<?php
				$hours = explode(",", $dentist['HOURS']);
				foreach ($hours as $hour) {
					list($day, $last) = explode(" ", $hour, 2);
					?>
					<div class="row">
						<div class="columns four dfd_col-mobile-4"><p><?php echo $day; ?></p></div>
						<div class="columns four dfd_col-mobile-8"><p><?php echo $last;?></p></div>
					</div>
					<?php
				}
			?>
		</div>
	</div>
<div class="row sample_schedule" >	
	<div class="row">
		<div class="columns twelve">
			<p>Sample Fee Schedule</p>
		</div>
	</div>
	<div class="row fee_schedule">
		<div class="columns three  dfd_col-mobile-6">
			<div class="title">CDT code</div>
			<div class="content">
				<p>D1231</p>
				<p>D1244</p>
				<p>D1256</p>
			</div>
		</div>
		<div class="columns three  dfd_col-mobile-6">
			<div class="title">Procedure</div>
			<div class="content">
				<p>Cleaning</p>
				<p>Fillings</p>
				<p>Teeth whitening</p>
			</div>
		</div>
		<div class="columns three dfd_col-mobile-6">
			<div class="title">Regular fee</div>
			<div class="content">
				<p>$120</p>
				<p>$260</p>
				<p>$300</p>
			</div>
		</div>
		<div class="columns three dfd_col-mobile-6">
			<div class="title">Member fee</div>
			<div class="content">
				<p>$60</p>
				<p>$70</p>
				<p>$100</p>
			</div>
		</div>
	</div>
	<div>
		<?php 
		$fee_schedule = 'http://dentalsave.com/' . $dentist['FeeUrl'];
		$encode_feed_schedule = urlencode($fee_schedule);
		echo do_shortcode('[ult_buttons btn_title="Click here to view complete fee schedule" btn_link="url:'.$encode_feed_schedule.'||" btn_align="ubtn-center" btn_title_color="#ffffff" btn_bg_color="#69c8f1" btn_hover="ubtn-fade-bg" btn_bg_color_hover="#ffffff" btn_title_color_hover="#69c8f1" btn_icon_pos="ubtn-sep-icon-at-left" btn_font_size="13" notification=""]');
		?>
	</div>
</div>

	<?php
} else {
	echo "No Result Found";
}