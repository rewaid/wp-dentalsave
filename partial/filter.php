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