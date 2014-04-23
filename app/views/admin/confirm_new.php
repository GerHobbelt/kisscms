<h2>Page not found</h2>

<p>The page you requested does not exist.</p>

<p>Would you like to create it now?</p>

<form action="<?php echo url("admin/create"); ?>" method="POST">

    <label for="path">Page URL</label>
    <input type="text" name="path" value="<?php echo $path; ?>" />
    <p>Actual URL: <span id="actual_page_path_url"><?php echo url($path); ?></span></p>

    <input type="submit" value="Create" />
</form>
