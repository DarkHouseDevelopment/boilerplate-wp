<?php
$jumpImages = get_field('property_images', $jumpPostID);
$jumpBuilder = get_field('builder', $jumpPostID);

$jumpMinBeds = min(get_field('bedrooms', $jumpPostID));
$jumpMaxBeds = max(get_field('bedrooms', $jumpPostID));
if($jumpMinBeds == $jumpMaxBeds):
	$jumpTotalBeds = $jumpMaxBeds;
else:
	$jumpTotalBeds = $jumpMinBeds . '-' . $jumpMaxBeds;
endif;
$jumpMinBaths = min(get_field('bathrooms', $jumpPostID));
$jumpMaxBaths = max(get_field('bathrooms', $jumpPostID));
if($jumpMinBaths == $jumpMaxBaths):
	$jumpTotalBaths = $jumpMaxBaths;
else:
	$jumpTotalBaths = $jumpMinBaths . '-' . $jumpMaxBaths;
endif;

$jumpSquareFootage = number_format(intval(get_field('square_footage', $jumpPostID)));
$jumpPriceRange = explode("-", get_field('price_range', $jumpPostID));