<?php 
/*
Template Name: Print Floorplan
*/
?>
<!doctype html>

<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" lang="en"><!--<![endif]-->

<head>
<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<!--<meta name="viewport" content="width=device-width, initial-scale=1.0"/>-->
<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
<meta http-equiv="cleartype" content="on">

</head>


<body class="print-floorplan" onload="window.print();">

	<?php $file = $_REQUEST['f']; ?>

	<img src="<?php echo $file; ?>" />

</body>
</html>