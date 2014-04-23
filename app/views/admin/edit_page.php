<?php
// create a fallback for the variables we are using
$title = (!isset($title)) ? '' : $title;
$content = (!isset($content)) ? '' : $content;
$action = ($status == "create") ? url("admin/update", true) : url("admin/update/id/$id", true);
?>

<h2><?php echo $GLOBALS['language'][$status.'_title']; ?></h2>

<p><?php echo $GLOBALS['language'][$status.'_description']; ?></p>

<form class="cms-form clearfix" method="post" action="<?php echo $action; ?>">
	<label for="title">Title</label>
	<input type="text" id="title" name="title" value="<?php echo $title; ?>" />

	<label for="content">Content</label>
	<textarea id="content" name="content"><?php echo $content; ?></textarea>

	<label for="tags">Tags</label>
	<p>(Separate tags with commas)</p>
	<input type="text" name="tags" id="tags" value="<?php echo $tags; ?>" />

	<label for="template">Template</label>
	<?php echo Template::doList($template); ?>

	<label for="path">Page URL</label>
	<input type="text" name="path" value="<?php echo $path; ?>" />
	<p>Actual URL: <span id="actual_page_path_url"><?php echo url($path); ?></span></p>

	<input type="submit" value="<?php echo $GLOBALS['language'][$status.'_button']; ?>" id="edit-button" class="button" />
</form>

<script type="text/javascript" src="<?php echo url('/js/libs/jquery-ui-1.8.core-and-interactions.min.js'); ?>" data-type="require" data-path="jquery-ui-core" data-deps="jquery"></script>
<script type="text/javascript" src="<?php echo url('/js/libs/jquery-ui-1.8.autocomplete.min.js'); ?>" data-type="require" data-path="jquery-ui-autocomplete" data-deps="jquery-ui-core"></script>
<script type="text/javascript" src="<?php echo url('/js/plugins/tag-it.js'); ?>" data-type="require" data-path="tag-it" data-deps="jquery-ui-autocomplete"></script>
<script type="text/javascript" data-type="require" data-deps="tag-it">

	$(function() {
		$(".cms-form #tags").tagit({
			availableTags: []
		});
	});

</script>
