<hr />
<h2><a href="<?php echo url($path); ?>"><?php echo $title; ?></a></h2>

<?php $_summary = ""; $_summary = truncate(strip_tags($content), 100, " ", "..."); ?>
<?php if( !empty($_summary) ){ ?>
<div>
<?php echo $_summary; ?>
</div>
<?php } ?>
