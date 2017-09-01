<form class="lp_form" id="powf_CC02A5A94477E3118A7F78E3B50834A9" action="https://cloud.crm.powerobjects.net/powerWebFormV3/PowerWebFormData.aspx?t=D04YyiAnFwXb3oS9OoO98NxY4Lcsg5t2qxaownU4MeM36izGd9p%2buM6Uuxj1IHGZhBbxCkvr2OgVS5UrCq8sCDmOE87MikuYqriSruZZhmTqQ8Bs9sC7J8rGG6cC3bX2IB%2fKvmrE8cUK%2fg8dJbHPbbzBrNf%2beMam%2bJ1QuwpwvSY%3d&formId=powf_CC02A5A94477E3118A7F78E3B50834A9" method="post">
    <h1><?php the_field('form_title'); ?></h1>

    <div class="row">
        <div class="input-field">
            <p class="input"><label for="fullname">Full Name*</label><input id="fullname" type="text" class="req" name="fullname" /></p>
            
            <input id="hidden_fname" type="hidden" class="req" name="powf_ce02a5a94477e3118a7f78e3b50834a9" />
            <input id="hidden_lname" type="hidden" class="req" name="powf_cd02a5a94477e3118a7f78e3b50834a9" />
        </div>

        <div class="input-field">
			<p class="last input"><label for="powf_a972dca94477e311b68478e3b5107e67">Email*</label><input type="email" class="req" name="powf_a972dca94477e311b68478e3b5107e67" /></p>
        </div>

        <div class="input-field short">
			<p class="input"><label for="powf_a772dca94477e311b68478e3b5107e67">Zip*</label><input id="zip" type="text" class="req" name="powf_a772dca94477e311b68478e3b5107e67" /></p>
        </div>

        <div class="select input-field">
            <p class="styled-select">
            <label>Moving time frame</label>
            <select name="powf_d202a5a94477e3118a7f78e3b50834a9">
                <option disabled="disabled" selected="selected"></option>

                <option value="Ready Now">
                    Ready Now
                </option>

                <option value="1-2 months">
                    1-2 months
                </option>

                <option value="3-6 months">
					3-6 months
                </option>

                <option value="6-12 months">
					6-12 months
                </option>

                <option value="More Than a Year">
					More Than a Year
                </option>
            </select></p>
        </div>
		
		<!-- Web Lead IP -->
		<input type="hidden" id="ip-address" name="powf_aa72dca94477e311b68478e3b5107e67" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" />
		<!-- Lead Source -->
		<input type="hidden" id="lead-source" name="powf_a872dca94477e311b68478e3b5107e67" value="<?php the_field('lead_source'); ?>" />
		<!-- Initial Contact Method -->
		<input type="hidden" id="init-contact-type" name="powf_d002a5a94477e3118a7f78e3b50834a9" value="Internet" />
		<!-- new_communityid -->
		<input type="hidden" id="community" name="powf_cf02a5a94477e3118a7f78e3b50834a9" value="{ED24C862-AE7D-E011-8CE8-78E7D1622FE5}" />
		<!-- websiteurl -->
		<input type="hidden" id="referring-url" name="powf_d102a5a94477e3118a7f78e3b50834a9" value="http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" />

		<input type="hidden" name="ignore_submitmessage" value="" />
		<input type="hidden" name="ignore_linkbuttontext" value="" />
		<input type="hidden" name="ignore_redirecturl" value="<?php the_field('form_redirect'); ?>" />
		<input type="hidden" name="ignore_redirectmode" value="Auto" />

        <div class="button input-field">
            <p><input type="submit" id="homesearch-submit" value="<?php the_field('submit_button_text'); ?>" <?php the_field('submit_button_event_tracking'); ?>></p>
        </div>
    </div>
</form>