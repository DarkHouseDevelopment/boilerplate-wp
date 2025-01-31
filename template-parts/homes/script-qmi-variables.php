<?php 
	
$floorplan = get_field( 'floorplan' );
$builder = get_field('builder', $floorplan->ID);
$builder_email = get_post_meta( $builder->ID, 'builder_contact_0_email', true );
$images = get_field( 'qmi_images' ) ? get_field( 'qmi_images' ) : get_field('model_images', $floorplan->ID);
$floorplan_images = get_field('floorplan_images', $floorplan->ID);
$floorplan_file = get_field('floorplan_file', $floorplan->ID);
$virtual_tour = get_field( 'qmi_virtual_tour_url' ) ? get_field( 'qmi_virtual_tour_url' ) : get_field('virtual_tour_url', $floorplan->ID);
$site_plan = get_field( 'builder_site_plans', $builder->ID );
$address = get_field( 'street_address' );

// Assign Custom Fields values to variables
$totalBeds = get_field( 'bedrooms' );
$totalBaths = get_field('bathrooms');
$totalStories = get_field('stories');
$totalCarGarage = get_field('garage');
$squareFootage = number_format(intval(get_field('square_feet')));
$price = '$'.number_format(get_field('price'));
$priceRange = explode("-", get_field('price_range'));
$available = get_field( 'available' );

if(get_field('hide_qmi_price') == 1):
  $price = get_field('price_replacement');
endif;
$price = !empty(get_field('price_link')) ? "<a href='".get_field('price_link')."' target='_blank' rel='nofollow noopener'>".$price."</a>" : $price;