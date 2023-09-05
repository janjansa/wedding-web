<!DOCTYPE html>

<?php
	$theme = "theme--light";
	if (get_field( 'theme' )) {
		$theme = get_field( 'theme' );
	}
    $rootClasses = $args['rootClasses'];
    $bodyClasses = $args['bodyClasses'];
?>


<html <?php language_attributes(); ?> class="<?php if($rootClasses) {echo $rootClasses;} ?>">

<head>
	<meta charset="UTF-8">
	<META http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#FFFFFF">
	<meta name="format-detection" content="telephone=no" />

	<?php the_field( 'scripts_in_header', 'option' ); ?>

	<?php wp_head();?>

	<script src="https://unpkg.com/@dotlottie/player-component@1.0.0/dist/dotlottie-player.js"></script>

	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/cookieconsent.css" media="print" onload="this.media='all'">
</head>

<body class="--cursor-default <?php echo $theme ?> <?php if($bodyClasses) {echo $bodyClasses;} ?>">

<script src="https://player.vimeo.com/api/player.js"></script>

<?php the_field( 'scripts_in_body', 'option' ); ?>
