<!doctype html>
<html>
<head>
	<title><?php Meta::title(); ?></title>
	<?php Template::head(); ?>

	<!-- <link href='<?php echo url("/assets/css/font-family-orbitron.css"); ?>' rel='stylesheet' type='text/css'> -->
	<link href="<?php echo url("/assets/css/main.css"); ?>" rel="stylesheet" type="text/css" media="screen" />

</head>

<body class="<?php if (!empty($_page)) { echo $_page['view']; } else { echo '*** buggy template use ***'; } ?>">

<div class="page">
	<header>
		<div  id="nav" class="pink-gd r5"><?php Menu::ul(); ?></div>

		<h1><a href="<?php echo url(); ?>"><?php echo $config['main']['site_name']; ?></a></h1>

	</header>

	<div  id="main" role="main">

		<?php Template::body(); ?>

	</div>
	<aside class="sidebar">
		<?php Search::view(); ?>

		<?php LatestUpdates::ul("class: 'r10 gray-tr'"); ?>

		<?php Archive::ul("class: 'r10 gray-tr'"); ?>

		<?php Tags::cloud('id: tagcloud, weight: 1'); ?>

	</aside>
	<footer>
		<?php Copyright::view(); ?>
	</footer>
</div>

<?php Template::foot(); ?>

</body>
</html>
