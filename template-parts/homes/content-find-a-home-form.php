<?php
$form_title = get_field( 'form_title' );
$submit_btn_text = get_field( 'submit_button_text' );
?>
<section class="find-a-home">
	<div class="homesearch">
		<div class="wrap">
			<form name="homesearch" action="/homes-in-verrado/" method="get">
				<?php
					echo $form_title ? '<header><h1 class="script">'.$form_title.'</h1></header>' : '';
				?>
				<?php echo get_sub_field( 'form_intro_copy' ) ? '<article>'.get_sub_field( 'form_intro_copy' ).'</article>' : ""; ?>
				<input type="hidden" name="s" value="" />
				<div class="row">
					<div class="select t_4 d_2">
						<p class="styled-select">
							<label>Min Price</label>
							<select name="price-min">
								<option disabled="disabled" selected="selected"></option>
								<option value="0">Any</option>
								<option <?php echo $_SESSION['price-min'] == '170000' ? 'selected="selected"' : ''; ?> value="170000">High $100,000s</option>
								<option <?php echo $_SESSION['price-min'] == '200000' ? 'selected="selected"' : ''; ?> value="200000">Low $200,000s</option>
								<option <?php echo $_SESSION['price-min'] == '235000' ? 'selected="selected"' : ''; ?> value="235000">Mid $200,000s</option>
								<option <?php echo $_SESSION['price-min'] == '270000' ? 'selected="selected"' : ''; ?> value="270000">High $200,000s</option>
								<option <?php echo $_SESSION['price-min'] == '300000' ? 'selected="selected"' : ''; ?> value="300000">Low $300,000s</option>
								<option <?php echo $_SESSION['price-min'] == '335000' ? 'selected="selected"' : ''; ?> value="335000">Mid $300,000s</option>
								<option <?php echo $_SESSION['price-min'] == '370000' ? 'selected="selected"' : ''; ?> value="370000">High $300,000s</option>
								<option <?php echo $_SESSION['price-min'] == '400000' ? 'selected="selected"' : ''; ?> value="400000">Low $400,000s</option>
								<option <?php echo $_SESSION['price-min'] == '435000' ? 'selected="selected"' : ''; ?> value="435000">Mid $400,000s</option>
								<option <?php echo $_SESSION['price-min'] == '470000' ? 'selected="selected"' : ''; ?> value="470000">High $400,000s</option>
								<option <?php echo $_SESSION['price-min'] == '500000' ? 'selected="selected"' : ''; ?> value="500000">Low $500,000s</option>
							</select>
						</p>
					</div>
					
					<div class="select t_4 d_2">
						<p class="styled-select">
							<label>Max Price</label>
							<select name="price-max">
								<option disabled="disabled" selected="selected"></option>
								<option value="600000">Any</option>
								<option <?php echo $_SESSION['price-max'] == '199999' ? 'selected="selected"' : ''; ?> value="199999">High $100,000s</option>
								<option <?php echo $_SESSION['price-max'] == '235000' ? 'selected="selected"' : ''; ?> value="235000">Low $200,000s</option>
								<option <?php echo $_SESSION['price-max'] == '270000' ? 'selected="selected"' : ''; ?> value="270000">Mid $200,000s</option>
								<option <?php echo $_SESSION['price-max'] == '299999' ? 'selected="selected"' : ''; ?> value="299999">High $200,000s</option>
								<option <?php echo $_SESSION['price-max'] == '335000' ? 'selected="selected"' : ''; ?> value="335000">Low $300,000s</option>
								<option <?php echo $_SESSION['price-max'] == '370000' ? 'selected="selected"' : ''; ?> value="370000">Mid $300,000s</option>
								<option <?php echo $_SESSION['price-max'] == '399999' ? 'selected="selected"' : ''; ?> value="399999">High $300,000s</option>
								<option <?php echo $_SESSION['price-max'] == '435000' ? 'selected="selected"' : ''; ?> value="435000">Low $400,000s</option>
								<option <?php echo $_SESSION['price-max'] == '470000' ? 'selected="selected"' : ''; ?> value="470000">Mid $400,000s</option>
								<option <?php echo $_SESSION['price-max'] == '499999' ? 'selected="selected"' : ''; ?> value="499999">High $400,000s</option>
								<option <?php echo $_SESSION['price-max'] == '535000' ? 'selected="selected"' : ''; ?> value="535000">Low $500,000s</option>
								<option <?php echo $_SESSION['price-max'] == '570000' ? 'selected="selected"' : ''; ?> value="570000">Mid $500,000s</option>
							</select>
						</p>
					</div>
					
					<div class="select t_2 d_1">
						<p class="styled-select">
							<label>Beds</label>
							<select name="beds-min">
								<option disabled="disabled" selected="selected"></option>
								<option value="0">Any</option>
								<option <?php echo $_SESSION['beds-min'] == '2' ? 'selected="selected"' : ''; ?> value="2">2+</option>
								<option <?php echo $_SESSION['beds-min'] == '3' ? 'selected="selected"' : ''; ?> value="3">3+</option>
								<option <?php echo $_SESSION['beds-min'] == '4' ? 'selected="selected"' : ''; ?> value="4">4+</option>
								<option <?php echo $_SESSION['beds-min'] == '5' ? 'selected="selected"' : ''; ?> value="5">5+</option>
								<option <?php echo $_SESSION['beds-min'] == '6' ? 'selected="selected"' : ''; ?> value="6">6+</option>
							</select>
						</p>
					</div>
			
					<div class="select t_2 d_1">
						<p class="styled-select">
							<label>Baths</label>
							<select name="baths-min">
								<option disabled="disabled" selected="selected"></option>
								<option value="0">Any</option>
								<option <?php echo $_SESSION['baths-min'] == '2' ? 'selected="selected"' : ''; ?> value="2">2+</option>
								<option <?php echo $_SESSION['baths-min'] == '2.5' ? 'selected="selected"' : ''; ?> value="2.5">2.5+</option>
								<option <?php echo $_SESSION['baths-min'] == '3' ? 'selected="selected"' : ''; ?> value="3">3+</option>
								<option <?php echo $_SESSION['baths-min'] == '3.5' ? 'selected="selected"' : ''; ?> value="3.5">3.5+</option>
								<option <?php echo $_SESSION['baths-min'] == '4' ? 'selected="selected"' : ''; ?> value="4">4+</option>
								<option <?php echo $_SESSION['baths-min'] == '4.5' ? 'selected="selected"' : ''; ?> value="4.5">4.5+</option>
								<option <?php echo $_SESSION['baths-min'] == '5' ? 'selected="selected"' : ''; ?> value="5">5+</option>
								<option <?php echo $_SESSION['baths-min'] == '5.5' ? 'selected="selected"' : ''; ?> value="5.5">5.5+</option>
							</select>
						</p>
					</div>
			
					<div class="select t_4 d_2">
						<p class="styled-select">
							<label>Square Feet</label>
							<select name="sqft-min">
								<option disabled="disabled" selected="selected"></option>
								<option value="0">Any</option>
								<option <?php echo $_SESSION['sqft-min'] == '1000' ? 'selected="selected"' : ''; ?> value="1000">1000+ Sqft</option>
								<option <?php echo $_SESSION['sqft-min'] == '1500' ? 'selected="selected"' : ''; ?> value="1500">1500+ Sqft</option>
								<option <?php echo $_SESSION['sqft-min'] == '2000' ? 'selected="selected"' : ''; ?> value="2000">2000+ Sqft</option>
								<option <?php echo $_SESSION['sqft-min'] == '2500' ? 'selected="selected"' : ''; ?> value="2500">2500+ Sqft</option>
								<option <?php echo $_SESSION['sqft-min'] == '3000' ? 'selected="selected"' : ''; ?> value="3000">3000+ Sqft</option>
								<option <?php echo $_SESSION['sqft-min'] == '3500' ? 'selected="selected"' : ''; ?> value="3500">3500+ Sqft</option>
								<option <?php echo $_SESSION['sqft-min'] == '4000' ? 'selected="selected"' : ''; ?> value="4000">4000+ Sqft</option>
							</select>
						</p>
					</div>
			
					<div class="select t_4 d_2">
						<p class="styled-select">
							<label>Show homes in...</label>
							<select name="homes-in">
								<option disabled="disabled" selected="selected"></option>
								<option value="">Any</option>
								<option <?php echo $_SESSION['homes-in'] == 'verrado' ? 'selected="selected"' : ''; ?> value="verrado">Verrado (all ages)</option>
								<option <?php echo $_SESSION['homes-in'] == 'victory' ? 'selected="selected"' : ''; ?> value="victory">Victory (55+)</option>
								<option <?php echo $_SESSION['homes-in'] == 'custom-homes' ? 'selected="selected"' : ''; ?> value="custom-homes">Custom Homes</option>
								<option <?php echo $_SESSION['homes-in'] == 'quick-move' ? 'selected="selected"' : ''; ?> value="quick-move">Quick Move-In</option>
							</select>
						</p>
					</div>
			
					<div class="button t_4 d_2">
						<p><input type="submit" id="homesearch-submit" class="btn" value="<?php echo $submit_btn_text ? $submit_btn_text : 'Find My Home'; ?>" /></p>
					</div>
				</div>
				
				<a class="close-search" href="javascript:void(0);">Cancel</a>
			</form>
			
			<div class="builder-list">
				<div class="toggle-builders"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-close-no-bg.png" /></div>
				<ul class="row">
					<?php $args = array(
						'depth'        => 1,
						'title_li'     => '',
						'echo'         => 1,
						'sort_column'  => 'title',
						'post_type'    => 'builders',
					    'post_status'  => 'publish'
					); ?>
					<?php wp_list_pages( $args ); ?>
					<li class="spacer"></li>
				</ul>
			</div>
			
			<?php 
			if(get_sub_field( 'cta_style' ) === "image_ctas"): 
			
				if(have_rows( 'cta_image_buttons' )):
					echo "<div id='fah_image_ctas' class='fah-ctas'>";
					while(have_rows( 'cta_image_buttons' )): the_row();
						$cta_bg = get_sub_field( 'button_background' );
						$cta_target = get_sub_field( 'button_target' );
						$cta_link = $cta_target === "builders" ? "javascript:void(0);" : get_sub_field( 'button_link' );
						$cta_class = $cta_target === "builders" ? "image-cta toggle-builders" : "image-cta";
						echo "<a class='$cta_class' href='$cta_link' target='$cta_target'><img src='{$cta_bg['url']}' /><span>".get_sub_field( 'button_title' )."</span><div class='hover'><span>".get_sub_field( 'button_title' )."</span>".get_sub_field( 'button_hover_text' )."<i class='fa fa-arrow-circle-right'></i></div></a>";
					endwhile;
					echo "</div>";
				endif;
			
			elseif(get_sub_field( 'cta_style' ) === "button_ctas"): 
			
				if(have_rows( 'cta_buttons' )):
					echo "<div id='fah_btn_ctas' class='fah-ctas'>";
					while(have_rows( 'cta_buttons' )): the_row();
						$cta_target = get_sub_field( 'button_target' );
						$cta_link = $cta_target === "builders" ? "javascript:void(0);" : get_sub_field( 'button_link' );
						$cta_class = $cta_target === "builders" ? "btn-cta toggle-builders" : "btn-cta";
						echo "<a class='$cta_class' href='$cta_link' target='$cta_target'>".get_sub_field( 'button_title' )."</a>";
					endwhile;
					echo "</div>";
				endif;
			
			endif; 
			?>
		</div>
	</div>
</section>