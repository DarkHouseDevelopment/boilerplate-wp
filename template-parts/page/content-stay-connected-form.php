<?php
	$form_bg = get_sub_field('form_background_color');
?>

<section class="lead-form-content">
	<div class="wrap">
		<div class="sm-12">
			<article class="lead-form">
				<form class="stay-connected" id="update-form" <?php echo $form_bg ? "style='background-color: $form_bg'" : ""; ?> onsubmit="return validateForm();" action="https://cloud.crm.powerobjects.net/powerWebFormV3/PowerWebFormData.aspx?t=C2E90N6s5bIQ5TKS%2fHI8qOgdgyadvEJs1z0IXW9P9sJOQO8UlBpK5JfLAhhKOrP77Bhs04KVPfhdMA71Ft7J9Y4rxIlFgMfH6kPsUCbWeN%2bKzhz4HA6FkSrosPmtla1whJ7fuQWWbX5D90jZOpKuVAw0ogGPZincT%2fZ%2fXZZJBgY%3d&amp;formId=powf_C0D8EDECBE0EE3118B4F78E3B5107E67" method="post" novalidate="novalidate">
					<?php if(isset($_GET['ty']) && !empty($_GET['ty'])): ?>
					<h2><?php the_sub_field( 'thank_you_title' ); ?></h2>
					<div class="row">
						<h3><?php the_sub_field( 'thank_you_text' ); ?></h3>
					</div>
					<?php else: ?>
	                <h2><?php the_sub_field('form_title'); ?></h2>
                							
					<!-- Web Lead IP -->
					<input type="hidden" id="powf_ed2fa3f4be0ee3118b4f78e3b5107e67" name="powf_ed2fa3f4be0ee3118b4f78e3b5107e67" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
					<!-- Lead Source -->
					<input type="hidden" id="powf_ec2fa3f4be0ee3118b4f78e3b5107e67" name="powf_ec2fa3f4be0ee3118b4f78e3b5107e67" value="<?php the_sub_field('lead_source'); ?>">
					<!-- Initial Contact Method -->
					<input type="hidden" id="powf_ef2fa3f4be0ee3118b4f78e3b5107e67" name="powf_ef2fa3f4be0ee3118b4f78e3b5107e67" value="Internet">
					<!-- new_communityid -->
					<input type="hidden" id="powf_28e199fdbe0ee3118b4f78e3b5107e67" name="powf_28e199fdbe0ee3118b4f78e3b5107e67" value="{ED24C862-AE7D-E011-8CE8-78E7D1622FE5}">
					<!-- websiteurl -->
					<input type="hidden" id="websiteurl" name="powf_27e199fdbe0ee3118b4f78e3b5107e67" value="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>">
					<input type="hidden" name="ignore_submitmessage" value="">
					<input type="hidden" name="ignore_linkbuttontext" value="">
					<input type="hidden" name="ignore_redirecturl" value="<?php the_sub_field('form_redirect'); ?>">
					<input type="hidden" name="ignore_redirectmode" value="Auto">
	
	                <div class="row">
		                <div class="input-field">
							<p class="input"><label for="si-fname">First Name</label><input type="text" id="si-fname" class="req" name="powf_e92fa3f4be0ee3118b4f78e3b5107e67" class="clear-field" maxlength="50"></p>
		                </div>
		                <div class="input-field">
							<p class="input"><label for="si-lname">Last Name</label><input type="text" id="si-lname" class="req" name="powf_ea2fa3f4be0ee3118b4f78e3b5107e67" class="clear-field" maxlength="50"></p>
		                </div>
		                <div class="input-field">
							<p class="input"><label for="si-email">E-mail</label><input type="text" id="si-email" class="req" name="powf_eb2fa3f4be0ee3118b4f78e3b5107e67" class="clear-field" maxlength="50"></p>
		                </div>
		                <div class="input-field">
							<p class="input"><label for="si-zip">Zip/Postal Code</label><input type="text" id="si-zip" class="req" name="powf_277d47b88276e51180d73863bb2ec358" class="clear-field" maxlength="10"></p>
		                </div>
	
		                <div class="button input-field">
							<p class="input"><input type="submit" <?php the_sub_field('submit_button_event_tracking'); ?> value="<?php the_sub_field('submit_button_text'); ?>" id="subscribe"></p>
		                </div>
	
						<div class="checkboxes row">
							<p class="checkbox first"><label><input class="checkbox chkone" type="checkbox" id="interested-in-news" name="powf_47d65c7fd4e1e311b5aa6c3be5a82320" value="Yes"> Stay up to date with news and events happening in Verrado!</label></p>
							<p class="checkbox last"><label><input class="checkbox" type="checkbox" <?php echo $_SERVER['HTTP_REFERER'] == 'http://'.$_SERVER['HTTP_HOST'].'/victory/' ? 'checked' : ''; ?> id="interested_in_victory" name="powf_b7458c517c79e3118a7f78e3b50834a9" value="Yes"/> Stay up to date with news and events in Victory 55+</label></p>
						</div>
	                </div>
					<?php endif; ?>
				</form>
			</article>
		</div>
	</div>
</section>