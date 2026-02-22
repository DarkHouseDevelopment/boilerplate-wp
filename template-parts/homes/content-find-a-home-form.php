<?php $rentals = get_posts( array( 'numberposts' => 1, 'post_type' => 'rentals', 'status' => 'publish' ) ); ?>

<form name="homesearch" action="/<?php echo isset($_SESSION['search-select']) ? $_SESSION['search-select'] : "homes"; ?>/" method="get">
	<input type="hidden" name="s" value="" />
	<?php if( !empty( $rentals ) ): ?>
	<div class="form-row">
		<div class="form-field search-select"> 
			Search for:
			<label for="search_select_sale" class="custom-radio-container">
				<input type="radio" name="search-select" id="search_select_sale" <?php echo isset($_SESSION['search-select']) && $_SESSION['search-select'] == 'homes' || !isset($_SESSION['search-select']) ? 'checked="checked"' : ''; ?> value="homes" /> 
				<span class="custom-radio"></span> 
				Homes for Sale
			</label> 
			<label for="search_select_rent" class="custom-radio-container">
				<input type="radio" name="search-select" id="search_select_rent" <?php echo isset($_SESSION['search-select']) && $_SESSION['search-select'] == 'rentals' ? 'checked="checked"' : ''; ?> value="rentals" /> 
				<span class="custom-radio"></span> 
				Homes for Lease
			</label> 
		</div>
	</div>
	<?php endif; ?>
	<div class="form-row">
		<div class="form-field styled-select search-toggle homes">
			<label>Min Price</label>
			<select name="price-min">
				<option disabled="disabled" selected="selected"></option>
				<option value="0">Any</option>
				<?php /*
				<option <?php echo $_SESSION['price-min'] == '170000' ? 'selected="selected"' : ''; ?> value="170000">High $100,000s</option>
				<option <?php echo $_SESSION['price-min'] == '200000' ? 'selected="selected"' : ''; ?> value="200000">Low $200,000s</option>
				<option <?php echo $_SESSION['price-min'] == '235000' ? 'selected="selected"' : ''; ?> value="235000">Mid $200,000s</option>
				<option <?php echo $_SESSION['price-min'] == '270000' ? 'selected="selected"' : ''; ?> value="270000">High $200,000s</option>
				<option <?php echo isset($_SESSION['price-min']) && $_SESSION['price-min'] == '300000' ? 'selected="selected"' : ''; ?> value="300000">Low $300,000s</option>
				<option <?php echo isset($_SESSION['price-min']) && $_SESSION['price-min'] == '335000' ? 'selected="selected"' : ''; ?> value="335000">Mid $300,000s</option>
				<option <?php echo isset($_SESSION['price-min']) && $_SESSION['price-min'] == '370000' ? 'selected="selected"' : ''; ?> value="370000">High $300,000s</option>
				<option <?php echo isset($_SESSION['price-min']) && $_SESSION['price-min'] == '400000' ? 'selected="selected"' : ''; ?> value="400000">Low $400,000s</option>
				<option <?php echo isset($_SESSION['price-min']) && $_SESSION['price-min'] == '435000' ? 'selected="selected"' : ''; ?> value="435000">Mid $400,000s</option>
				<option <?php echo isset($_SESSION['price-min']) && $_SESSION['price-min'] == '470000' ? 'selected="selected"' : ''; ?> value="470000">High $400,000s</option>
				*/ ?>
				<option <?php echo isset($_SESSION['price-min']) && $_SESSION['price-min'] == '500000' ? 'selected="selected"' : ''; ?> value="500000">Low $500,000s</option>
				<option <?php echo isset($_SESSION['price-min']) && $_SESSION['price-min'] == '535000' ? 'selected="selected"' : ''; ?> value="535000">Mid $500,000s</option>
				<option <?php echo isset($_SESSION['price-min']) && $_SESSION['price-min'] == '570000' ? 'selected="selected"' : ''; ?> value="570000">High $500,000s</option>
				<option <?php echo isset($_SESSION['price-min']) && $_SESSION['price-min'] == '600000' ? 'selected="selected"' : ''; ?> value="600000">Low $600,000s</option>
				<option <?php echo isset($_SESSION['price-min']) && $_SESSION['price-min'] == '635000' ? 'selected="selected"' : ''; ?> value="635000">Mid $600,000s</option>
				<option <?php echo isset($_SESSION['price-min']) && $_SESSION['price-min'] == '670000' ? 'selected="selected"' : ''; ?> value="670000">High $600,000s</option>
				<option <?php echo isset($_SESSION['price-min']) && $_SESSION['price-min'] == '700000' ? 'selected="selected"' : ''; ?> value="700000">Low $700,000s</option>
				<option <?php echo isset($_SESSION['price-min']) && $_SESSION['price-min'] == '735000' ? 'selected="selected"' : ''; ?> value="735000">Mid $700,000s</option>
				<option <?php echo isset($_SESSION['price-min']) && $_SESSION['price-min'] == '770000' ? 'selected="selected"' : ''; ?> value="770000">High $700,000s</option>
				<option <?php echo isset($_SESSION['price-min']) && $_SESSION['price-min'] == '800000' ? 'selected="selected"' : ''; ?> value="800000">Low $800,000s</option>
				<option <?php echo isset($_SESSION['price-min']) && $_SESSION['price-min'] == '835000' ? 'selected="selected"' : ''; ?> value="835000">Mid $800,000s</option>
				<option <?php echo isset($_SESSION['price-min']) && $_SESSION['price-min'] == '870000' ? 'selected="selected"' : ''; ?> value="870000">High $800,000s</option>
				<option <?php echo isset($_SESSION['price-min']) && $_SESSION['price-min'] == '900000' ? 'selected="selected"' : ''; ?> value="900000">Low $900,000s</option>
				<option <?php echo isset($_SESSION['price-min']) && $_SESSION['price-min'] == '935000' ? 'selected="selected"' : ''; ?> value="935000">Mid $900,000s</option>
				<option <?php echo isset($_SESSION['price-min']) && $_SESSION['price-min'] == '970000' ? 'selected="selected"' : ''; ?> value="970000">High $900,000s</option>
				<option <?php echo isset($_SESSION['price-min']) && $_SESSION['price-min'] == '1000000' ? 'selected="selected"' : ''; ?> value="1000000">$1M+</option>
			</select>
		</div>
		
		<div class="form-field styled-select search-toggle homes">
			<label>Max Price</label>
			<select name="price-max">
				<option disabled="disabled" selected="selected"></option>
				<option value="1000000000">Any</option>
				<?php /*
				<option <?php echo $_SESSION['price-max'] == '199999' ? 'selected="selected"' : ''; ?> value="199999">High $100,000s</option>
				<option <?php echo $_SESSION['price-max'] == '235000' ? 'selected="selected"' : ''; ?> value="235000">Low $200,000s</option>
				<option <?php echo $_SESSION['price-max'] == '270000' ? 'selected="selected"' : ''; ?> value="270000">Mid $200,000s</option>
				<option <?php echo $_SESSION['price-max'] == '299999' ? 'selected="selected"' : ''; ?> value="299999">High $200,000s</option>
				<option <?php echo isset($_SESSION['price-max']) && $_SESSION['price-max'] == '335000' ? 'selected="selected"' : ''; ?> value="335000">Low $300,000s</option>
				<option <?php echo isset($_SESSION['price-max']) && $_SESSION['price-max'] == '370000' ? 'selected="selected"' : ''; ?> value="370000">Mid $300,000s</option>
				<option <?php echo isset($_SESSION['price-max']) && $_SESSION['price-max'] == '399999' ? 'selected="selected"' : ''; ?> value="399999">High $300,000s</option>
				<option <?php echo isset($_SESSION['price-max']) && $_SESSION['price-max'] == '435000' ? 'selected="selected"' : ''; ?> value="435000">Low $400,000s</option>
				<option <?php echo isset($_SESSION['price-max']) && $_SESSION['price-max'] == '470000' ? 'selected="selected"' : ''; ?> value="470000">Mid $400,000s</option>
				<option <?php echo isset($_SESSION['price-max']) && $_SESSION['price-max'] == '499999' ? 'selected="selected"' : ''; ?> value="499999">High $400,000s</option>
				*/ ?>
				<option <?php echo isset($_SESSION['price-max']) && $_SESSION['price-max'] == '535000' ? 'selected="selected"' : ''; ?> value="535000">Low $500,000s</option>
				<option <?php echo isset($_SESSION['price-max']) && $_SESSION['price-max'] == '570000' ? 'selected="selected"' : ''; ?> value="570000">Mid $500,000s</option>
				<option <?php echo isset($_SESSION['price-max']) && $_SESSION['price-max'] == '599999' ? 'selected="selected"' : ''; ?> value="599999">High $500,000s</option>
				<option <?php echo isset($_SESSION['price-max']) && $_SESSION['price-max'] == '635000' ? 'selected="selected"' : ''; ?> value="600000">Low $600,000s</option>
				<option <?php echo isset($_SESSION['price-max']) && $_SESSION['price-max'] == '670000' ? 'selected="selected"' : ''; ?> value="635000">Mid $600,000s</option>
				<option <?php echo isset($_SESSION['price-max']) && $_SESSION['price-max'] == '699999' ? 'selected="selected"' : ''; ?> value="670000">High $600,000s</option>
				<option <?php echo isset($_SESSION['price-max']) && $_SESSION['price-max'] == '735000' ? 'selected="selected"' : ''; ?> value="700000">Low $700,000s</option>
				<option <?php echo isset($_SESSION['price-max']) && $_SESSION['price-max'] == '770000' ? 'selected="selected"' : ''; ?> value="735000">Mid $700,000s</option>
				<option <?php echo isset($_SESSION['price-max']) && $_SESSION['price-max'] == '799999' ? 'selected="selected"' : ''; ?> value="770000">High $700,000s</option>
				<option <?php echo isset($_SESSION['price-max']) && $_SESSION['price-max'] == '835000' ? 'selected="selected"' : ''; ?> value="800000">Low $800,000s</option>
				<option <?php echo isset($_SESSION['price-max']) && $_SESSION['price-max'] == '870000' ? 'selected="selected"' : ''; ?> value="835000">Mid $800,000s</option>
				<option <?php echo isset($_SESSION['price-max']) && $_SESSION['price-max'] == '899999' ? 'selected="selected"' : ''; ?> value="870000">High $800,000s</option>
				<option <?php echo isset($_SESSION['price-max']) && $_SESSION['price-max'] == '935000' ? 'selected="selected"' : ''; ?> value="900000">Low $900,000s</option>
				<option <?php echo isset($_SESSION['price-max']) && $_SESSION['price-max'] == '970000' ? 'selected="selected"' : ''; ?> value="935000">Mid $900,000s</option>
				<option <?php echo isset($_SESSION['price-max']) && $_SESSION['price-max'] == '999999' ? 'selected="selected"' : ''; ?> value="970000">High $900,000s</option>
				<option <?php echo isset($_SESSION['price-max']) && $_SESSION['price-max'] == '9999999' ? 'selected="selected"' : ''; ?> value="9999999">$1M+</option>
			</select>
		</div>
		
		<?php if( !empty( $rentals ) ): ?>
		<div class="form-field styled-select search-toggle rentals" style="display: none;">
			<label>Min Monthly Price</label>
			<select name="price-min">
				<option disabled="disabled" selected="selected"></option>
				<option value="0">Any</option>
				<option <?php echo isset($_SESSION['price-min']) && $_SESSION['price-min'] == '2000' ? 'selected="selected"' : ''; ?> value="2000">$2,000/mo</option>
				<option <?php echo isset($_SESSION['price-min']) && $_SESSION['price-min'] == '2250' ? 'selected="selected"' : ''; ?> value="2250">$2,250/mo</option>
				<option <?php echo isset($_SESSION['price-min']) && $_SESSION['price-min'] == '2500' ? 'selected="selected"' : ''; ?> value="2500">$2,500/mo</option>
				<option <?php echo isset($_SESSION['price-min']) && $_SESSION['price-min'] == '2750' ? 'selected="selected"' : ''; ?> value="2750">$2,750/mo</option>
				<option <?php echo isset($_SESSION['price-min']) && $_SESSION['price-min'] == '3000' ? 'selected="selected"' : ''; ?> value="3000">$3,000/mo</option>
				<option <?php echo isset($_SESSION['price-min']) && $_SESSION['price-min'] == '3250' ? 'selected="selected"' : ''; ?> value="3250">$3,250/mo</option>
				<option <?php echo isset($_SESSION['price-min']) && $_SESSION['price-min'] == '3500' ? 'selected="selected"' : ''; ?> value="3500">$3,500/mo</option>
				<option <?php echo isset($_SESSION['price-min']) && $_SESSION['price-min'] == '3750' ? 'selected="selected"' : ''; ?> value="3750">$3,750/mo</option>
			</select>
		</div>
		
		<div class="form-field styled-select search-toggle rentals" style="display: none;">
			<label>Max Monthly Price</label>
			<select name="price-max">
				<option disabled="disabled" selected="selected"></option>
				<option value="600000">Any</option>
				<option <?php echo isset($_SESSION['price-max']) && $_SESSION['price-max'] == '2250' ? 'selected="selected"' : ''; ?> value="2250">$2,250/mo</option>
				<option <?php echo isset($_SESSION['price-max']) && $_SESSION['price-max'] == '2500' ? 'selected="selected"' : ''; ?> value="2500">$2,500/mo</option>
				<option <?php echo isset($_SESSION['price-max']) && $_SESSION['price-max'] == '2750' ? 'selected="selected"' : ''; ?> value="2750">$2,750/mo</option>
				<option <?php echo isset($_SESSION['price-max']) && $_SESSION['price-max'] == '3000' ? 'selected="selected"' : ''; ?> value="3000">$3,000/mo</option>
				<option <?php echo isset($_SESSION['price-max']) && $_SESSION['price-max'] == '3250' ? 'selected="selected"' : ''; ?> value="3250">$3,250/mo</option>
				<option <?php echo isset($_SESSION['price-max']) && $_SESSION['price-max'] == '3500' ? 'selected="selected"' : ''; ?> value="3500">$3,500/mo</option>
				<option <?php echo isset($_SESSION['price-max']) && $_SESSION['price-max'] == '3750' ? 'selected="selected"' : ''; ?> value="3750">$3,750/mo</option>
				<option <?php echo isset($_SESSION['price-max']) && $_SESSION['price-max'] == '4000' ? 'selected="selected"' : ''; ?> value="9999">$4,000/mo+</option>
			</select>
		</div>
		<?php endif; ?>
		
		<div class="form-field styled-select short">
			<label>Beds</label>
			<select name="beds-min">
				<option disabled="disabled" selected="selected"></option>
				<option value="0">Any</option>
				<option <?php echo isset($_SESSION['beds-min']) && $_SESSION['beds-min'] == '2' ? 'selected="selected"' : ''; ?> value="2">2+</option>
				<option <?php echo isset($_SESSION['beds-min']) && $_SESSION['beds-min'] == '3' ? 'selected="selected"' : ''; ?> value="3">3+</option>
				<option <?php echo isset($_SESSION['beds-min']) && $_SESSION['beds-min'] == '4' ? 'selected="selected"' : ''; ?> value="4">4+</option>
				<option <?php echo isset($_SESSION['beds-min']) && $_SESSION['beds-min'] == '5' ? 'selected="selected"' : ''; ?> value="5">5+</option>
				<option <?php echo isset($_SESSION['beds-min']) && $_SESSION['beds-min'] == '6' ? 'selected="selected"' : ''; ?> value="6">6+</option>
			</select>
		</div>

		<div class="form-field styled-select short">
			<label>Baths</label>
			<select name="baths-min">
				<option disabled="disabled" selected="selected"></option>
				<option value="0">Any</option>
				<option <?php echo isset($_SESSION['baths-min']) && $_SESSION['baths-min'] == '2' ? 'selected="selected"' : ''; ?> value="2">2+</option>
				<option <?php echo isset($_SESSION['baths-min']) && $_SESSION['baths-min'] == '2.5' ? 'selected="selected"' : ''; ?> value="2.5">2.5+</option>
				<option <?php echo isset($_SESSION['baths-min']) && $_SESSION['baths-min'] == '3' ? 'selected="selected"' : ''; ?> value="3">3+</option>
				<option <?php echo isset($_SESSION['baths-min']) && $_SESSION['baths-min'] == '3.5' ? 'selected="selected"' : ''; ?> value="3.5">3.5+</option>
				<option <?php echo isset($_SESSION['baths-min']) && $_SESSION['baths-min'] == '4' ? 'selected="selected"' : ''; ?> value="4">4+</option>
				<option <?php echo isset($_SESSION['baths-min']) && $_SESSION['baths-min'] == '4.5' ? 'selected="selected"' : ''; ?> value="4.5">4.5+</option>
				<option <?php echo isset($_SESSION['baths-min']) && $_SESSION['baths-min'] == '5' ? 'selected="selected"' : ''; ?> value="5">5+</option>
				<option <?php echo isset($_SESSION['baths-min']) && $_SESSION['baths-min'] == '5.5' ? 'selected="selected"' : ''; ?> value="5.5">5.5+</option>
			</select>
		</div>

		<div class="form-field styled-select">
			<label>Square Feet</label>
			<select name="sqft-min">
				<option disabled="disabled" selected="selected"></option>
				<option value="0">Any</option>
				<?php /*
				<option <?php echo $_SESSION['sqft-min'] == '1000' ? 'selected="selected"' : ''; ?> value="1000">1000+ Sqft</option>
				*/ ?>
				<option <?php echo isset($_SESSION['sqft-min']) && $_SESSION['sqft-min'] == '1500' ? 'selected="selected"' : ''; ?> value="1500">1500+ Sqft</option>
				<option <?php echo isset($_SESSION['sqft-min']) && $_SESSION['sqft-min'] == '2000' ? 'selected="selected"' : ''; ?> value="2000">2000+ Sqft</option>
				<option <?php echo isset($_SESSION['sqft-min']) && $_SESSION['sqft-min'] == '2500' ? 'selected="selected"' : ''; ?> value="2500">2500+ Sqft</option>
				<option <?php echo isset($_SESSION['sqft-min']) && $_SESSION['sqft-min'] == '3000' ? 'selected="selected"' : ''; ?> value="3000">3000+ Sqft</option>
				<option <?php echo isset($_SESSION['sqft-min']) && $_SESSION['sqft-min'] == '3500' ? 'selected="selected"' : ''; ?> value="3500">3500+ Sqft</option>
				<option <?php echo isset($_SESSION['sqft-min']) && $_SESSION['sqft-min'] == '4000' ? 'selected="selected"' : ''; ?> value="4000">4000+ Sqft</option>
			</select>
		</div>

		<div class="form-field submit">
			<input type="submit" id="homesearch-submit" class="btn" value="Search" />
		</div>
	</div>
</form>
