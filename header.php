<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans&family=Krona+One&display=swap" rel="stylesheet">
	<?php $v = file_get_contents(get_template_directory_uri() . '/_partials/cache-smash.php', true); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/main.css?v=<?php echo $v; ?>" media="screen" />

	<!-- Bugherd -->
	<script type="text/javascript" src="https://www.bugherd.com/sidebarv2.js?apikey=d1a0zpqmap5woh6favij0g" async="true"></script>

	<?php wp_head(); ?>

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-54LSG5CN');</script>
	<!-- End Google Tag Manager -->

</head>

<?php $slug = get_post_field( 'post_name', get_post() ); ?>
<body <?php body_class(); ?> data-page="<?php echo $slug; ?>">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-54LSG5CN" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


<?php include(locate_template('_components/nav.php')); ?>
<?php include(locate_template('_components/full-menu.php')); ?>