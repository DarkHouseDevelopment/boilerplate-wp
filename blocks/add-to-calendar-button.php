<?php

/**
 * CTA Bar Block Template
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// show preview image if block being loaded as preview
if(!empty($block['data']['is_preview'])):
	echo "<img src='".get_stylesheet_directory_uri()."/assets/block-previews/add-to-calendar.jpg' />";
	return;
endif;

// Load values and assign defaults.
$event_title = get_field( 'event_title' ) ?: 'Event Title';
$event_description = get_field( 'event_description' ) ?: 'Event Description';
$event_length = get_field( 'event_length' ) ?: 'single-day';
if($event_length == 'single-day'):
	$event_start_date = get_field( 'event_date' ) ?: 'today';
	$event_start_time = get_field( 'event_start_time' ) ?: '09:00';
	$event_end_time = get_field( 'event_end_time' ) ?: '17:00';
else:
	$event_dates = get_field( 'event_dates' ) ?: [];
	$event_dates_array = [];
	foreach($event_dates as $key => $date):
		$event_dates_array[$key]['name'] = $event_title ?: 'Event Title';
		$event_dates_array[$key]['description'] = $event_description ?: 'Event Description';
		$event_dates_array[$key]['startDate'] = $date['event_date'] ?: '09:00';
		$event_dates_array[$key]['startTime'] = $date['event_start_time'] ?: '09:00';
		$event_dates_array[$key]['endTime'] = $date['event_end_time'] ?: '17:00';
	endforeach;
	$event_dates_array = json_encode($event_dates_array);
endif;
$event_location = get_field( 'event_location' ) ?: 'Northpointe at Vistancia';
$calendar_options = get_field( 'calendar_options' ) ?: "'Apple','Google','iCal','Microsoft365','Outlook.com','Yahoo'";

?>
<add-to-calendar-button
	name="<?php echo $event_title; ?>"
	description="<?php echo $event_description; ?>"
	<?php if($event_length == 'single-day'): ?>
	startDate="<?php echo $event_start_date; ?>"
	startTime="<?php echo $event_start_time; ?>"
	endDate="<?php echo $event_start_date; ?>"
	endTime="<?php echo $event_end_time; ?>"
	<?php else: ?>
	dates='<?php echo $event_dates_array; ?>'
	<?php endif; ?>
	timeZone="America/Phoenix"
	location="<?php echo $event_location; ?>"
	options="<?php echo is_array($calendar_options) ? "'".implode("', '", $calendar_options)."'" : $calendar_options; ?>"
	organizer="Northpointe at Vistancia|info@liveatnorthpointe.com"
	lightMode="bodyScheme"
></add-to-calendar-button>
