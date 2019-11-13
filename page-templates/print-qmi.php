<?php
/*
Template Name: Print Quick Move-In
*/

$_SESSION['quick-move'] = 1;

get_header();

get_template_part( 'template-parts/homes/content', 'qmi-results-table' );
?>

<script type="text/javascript">
	window.print();
</script>

<?php get_footer(); ?>