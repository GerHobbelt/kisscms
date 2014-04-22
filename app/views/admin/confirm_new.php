<h2>Page not found</h2>

<p>The page you requested does not exist.</p>

<p>Would you like to create it now?</p>

<form action="<?php echo url("admin/create"); ?>" method="POST">
<input type="hidden" name="path" value="<?php echo $path; ?>">
<input type="submit" value="Create" />
</form>
