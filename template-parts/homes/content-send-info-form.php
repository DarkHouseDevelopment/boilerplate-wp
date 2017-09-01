<form class="contact sendinfoform" id="powf_F774080C3DEAE61181035065F38A0A51" action="https://pocloudcentral.crm.powerobjects.net/PowerWebForm/PowerWebFormData.aspx?t=7FaLSl6K%2bkWyja%2f5CyhL6mMAcgBtAE4AQQBvAHIAZwA0AGEAOABiADUA&formId=powf_F774080C3DEAE61181035065F38A0A51&tver=2013&c=1" method="post">
	
	<div class="intro">
		<h2>Send me info</h2>
		<p>Please send me info about the <?php the_title(); ?> model at Verrado.</p>
	</div>
	
	<div class="close"><a href="javascript:void(0);"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-close-no-bg.png" /></a></div>
	
	<!-- Hidden field for Send Email Updates -->
	<input type="hidden" id="hidden-send-email" name="powf_0e723b133deae61181035065f38a0a51" value="Allow" />
	<!-- Web Lead IP -->
	<input type="hidden" id="powf_04723b133deae61181035065f38a0a51" name="powf_04723b133deae61181035065f38a0a51" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
	<!-- Lead Source -->
	<input type="hidden" id="powf_07723b133deae61181035065f38a0a51" name="powf_07723b133deae61181035065f38a0a51" value="Web: Verrado.com">
	<!-- Initial Contact Method -->
	<input type="hidden" id="powf_08723b133deae61181035065f38a0a51" name="powf_08723b133deae61181035065f38a0a51" value="Internet">
	<!-- new_communityid -->
	<input type="hidden" id="powf_0a723b133deae61181035065f38a0a51" name="powf_0a723b133deae61181035065f38a0a51" value="{ED24C862-AE7D-E011-8CE8-78E7D1622FE5}">
	<!-- websiteurl -->
	<input type="hidden" id="websiteurl" name="powf_09723b133deae61181035065f38a0a51" value="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>">
	<!-- Model Interest -->
	<input type="hidden" id="model_name" name="powf_0b723b133deae61181035065f38a0a51" value="<?php the_title(); ?>">
	<!-- Builder -->
	<input type="hidden" id="builder_name" class="builder_name" name="powf_046e8fdb5beae61181035065f38a0a51" value="<?php echo $builder->post_title; ?>" />
	<!-- Builder Contact -->
	<input type="hidden" id="builder_contacts" class="builder_contacts" name="builder_contacts" value="<?php the_field( 'send_info_contact', 29 ); ?>" />
	
	<input type="hidden" name="ignore_submitmessage" value="">
	<input type="hidden" name="ignore_linkbuttontext" value="">
	<input type="hidden" name="ignore_redirecturl" value="<?php echo 'http://'.$_SERVER['HTTP_HOST'].strtok($_SERVER['REQUEST_URI'],'?').'?model='.urlencode(get_the_title()).'&builder='.urlencode($builder->post_title).'&sent=1'; ?>">
	<input type="hidden" name="ignore_redirectmode" value="Auto">
	
	<div class="row">
        <div class="input-field">
			<p class="input"><label for="sendinfo-fname">First Name*</label><input type="text" id="sendinfo-fname" class="req" name="powf_03723b133deae61181035065f38a0a51" /></p>
        </div>
        <div class="input-field">
			<p class="input"><label for="sendinfo-lname">Last Name*</label><input type="text" id="sendinfo-lname" class="req" name="powf_4403b39c5ceae61181035065f38a0a51" /></p>
		</div>
        <div class="input-field">
			<p class="input"><label for="sendinfo-email">Email*</label><input type="email" id="sendinfo-email" class="req" name="powf_05723b133deae61181035065f38a0a51" /></p>
		</div>
        <div class="input-field">
			<p class="input"><label for="sendinfo-state">State*</label><input type="text" id="sendinfo-state" class="req" name="powf_0c723b133deae61181035065f38a0a51" /></p>
		</div>
        <div class="input-field">
			<p class="input"><label for="sendinfo-phone">Phone</label><input type="tel" id="sendinfo-phone" name="powf_0d723b133deae61181035065f38a0a51" /></p>
		</div>
        <div class="input-field">
			<p class="input"><input type="submit" onclick="_gaq.push(['_trackEvent', 'Email', 'Signup']);" value="Submit" /></p>
		</div>
	</div>
	<div class="checkboxes">
		<p class="checkbox"><label><input type="checkbox" id="sendinfo-updates" checked="" /> Send Email Updates</label></p>
	</div>

	
</form>