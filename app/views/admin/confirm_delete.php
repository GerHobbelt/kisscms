<h2>Deletion Confirmation</h2>

<p>You are about to delete the page: <?php echo $path; ?></p>

<p>Do you want to proceed?</p>

<form action="<?php echo url("admin/delete"); ?>">
<input type="hidden" name="path" value="<?php echo $path; ?>">
<input type="submit" value="Delete" />
</form>
