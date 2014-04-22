<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html>
<head>
<title>400 Bad Request</title>
</head>
<body>
	<h1>400 Bad Request: <?php echo $type; ?></h1>
	<hr />
	<p>Fatal error on line <?php echo $errline; ?> in file <?php echo $file; ?>, PHP <?php echo PHP_VERSION; ?> (<?php echo PHP_OS; ?>)</p>
	<p style="font-weight:bold;color:#F00"><?php echo $message; ?></p>
	<p>Aborting...</p>
	<p>Click <a href="javascript: history.back(1);">here</a> to go back to where you were.</p>
</body>
</html>
