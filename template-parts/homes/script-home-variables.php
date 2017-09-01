<?php 
	
$images = get_field('property_images');
$builder = get_field('builder');
$builder_website = get_field('model_url');
$floorplan_file = get_field('floorplan_file');
$sales_office = get_field('sales_office');
$broker = get_field('broker');

// Assign Custom Fields values to variables
$minBeds = min(get_field('bedrooms'));
$maxBeds = max(get_field('bedrooms'));
if($minBeds == $maxBeds):
	$totalBeds = $maxBeds;
else:
	$totalBeds = $minBeds . '-' . $maxBeds;
endif;
$minBaths = min(get_field('bathrooms'));
$maxBaths = max(get_field('bathrooms'));
if($minBaths == $maxBaths):
	$totalBaths = $maxBaths;
else:
	$totalBaths = $minBaths . '-' . $maxBaths;
endif;

$minStories = min(get_field('stories'));
$maxStories = max(get_field('stories'));
if($minStories == $maxStories):
	$totalStories = $maxStories;
else:
	$totalStories = $minStories . '-' . $maxStories;
endif;

$minCarGarage = min(get_field('car_garage'));
$maxCarGarage = max(get_field('car_garage'));
if($minCarGarage == $maxCarGarage):
	$totalCarGarage = $maxCarGarage;
else:
	$totalCarGarage = $minCarGarage . '-' . $maxCarGarage;
endif;

$squareFootage = number_format(intval(get_field('square_footage')));
$startingPrice = get_field('starting_price');
$priceRange = explode("-", get_field('price_range'));
$rentalProperty = get_field('rental_property');
$availableIn = get_field('available_in');
$quick_movein = get_field('quick_move');
