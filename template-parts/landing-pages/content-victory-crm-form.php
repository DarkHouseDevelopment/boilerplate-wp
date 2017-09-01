<form id="powf_5679AD8BB301E61180F03863BB35ECE0" class="left lp_form" enctype="multipart/form-data" action="https://cloud.crm.powerobjects.net/powerWebFormV3/PowerWebFormData.aspx?t=7FaLSl6K%2bkWyja%2f5CyhL6mMAcgBtAE4AQQBvAHIAZwA0AGEAOABiADUA&formId=powf_5679AD8BB301E61180F03863BB35ECE0&tver=2013&c=1"
method="post">
    <h1><?php the_field('form_title'); ?></h1>

    <div class="row">
        <div class="input-field">
          <p class="input"><label for="fullname">Full Name*</label><input id="fullname" type="text" class="req" name="fullname" /></p>
          
          <input id="hidden_fname" type="hidden" class="req" name="powf_9efc0698b301e61180f03863bb35ece0" />
          <input id="hidden_lname" type="hidden" class="req" name="powf_9cfc0698b301e61180f03863bb35ece0" />
        </div>

        <div class="input-field">
			<p class="input last"><label for="email">Email*</label><input type="email" id="email" class="req" name="powf_c6fc0698b301e61180f03863bb35ece0" /></p>
        </div>

        <div class="input-field short">
			<p class="input"><label for="zip">Zip*</label><input id="zip" type="text" class="req" name="powf_c3fc0698b301e61180f03863bb35ece0" /></p>
        </div>

        <div class="select input-field">
            <p class="styled-select">
            <label>Moving time frame</label>
            <select name="powf_b9fc0698b301e61180f03863bb35ece0">
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
		<input type="hidden" id="powf_2271069eb301e61180f03863bb35ece0" name="powf_2271069eb301e61180f03863bb35ece0" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" />
		<!-- Lead Source -->
		<input type="hidden" id="powf_c5fc0698b301e61180f03863bb35ece0" name="powf_c5fc0698b301e61180f03863bb35ece0" value="<?php the_field('lead_source'); ?>" />
		<!-- Initial Contact Method -->
		<input type="hidden" id="powf_a0fc0698b301e61180f03863bb35ece0" name="powf_a0fc0698b301e61180f03863bb35ece0" value="Internet" />
		<!-- new_communityid -->
		<input type="hidden" id="powf_9dfc0698b301e61180f03863bb35ece0" name="powf_9dfc0698b301e61180f03863bb35ece0" value="{ED24C862-AE7D-E011-8CE8-78E7D1622FE5}" />
		<!-- websiteurl -->
		<input type="hidden" id="powf_9ffc0698b301e61180f03863bb35ece0" name="powf_9ffc0698b301e61180f03863bb35ece0" value="http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" />
		<!-- Interested in Victory -->
		<input type="hidden" id="victory-interest" name="powf_c2fc0698b301e61180f03863bb35ece0" value="Interested in Victory" />
		<!-- Interested in News -->
		<input type="hidden" id="news-interest" name="powf_9bfc0698b301e61180f03863bb35ece0" value="Interested in News" />
		<!-- Referring URL -->
		<input type="hidden" id="powf_be1b82e03a79e61180efc4346bdc4261" name="powf_be1b82e03a79e61180efc4346bdc4261" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" />
		<input type="hidden" name="ignore_submitmessage" value="" />
		<input type="hidden" name="ignore_linkbuttontext" value="" />
		<input type="hidden" name="ignore_redirecturl" value="<?php the_field('form_redirect'); ?>" />
		<input type="hidden" name="ignore_redirectmode" value="Auto" />
		
        <div class="button input-field">
            <p><input type="submit" id="homesearch-submit" value="<?php the_field('submit_button_text'); ?>" <?php the_field('submit_button_event_tracking'); ?>></p>
        </div>
    </div>
</form>