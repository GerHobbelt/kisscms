<hr />
<h2><a href="<?php echo url($path); ?>"><?php echo $title; ?></a></h2>

<div>
<?php echo truncate(strip_tags($content), 100, " ", "..."); ?>
</div>
