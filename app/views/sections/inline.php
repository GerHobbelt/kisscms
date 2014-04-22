<section <?php echo attr("id", $vars['id']); ?> <?php echo attr("class", $vars['class']); ?>>
<?php if (!empty($vars['h3'])) { ?>
<strong <?php echo attr("id", $vars['h3-id']); ?> <?php echo attr("class", $vars['h3-class']); ?>><?php echo $vars['h3']; ?></strong>
<?php } ?>
<?php 
foreach ($items as $item) { ?>
	<a href="<?php echo $item['url']; ?>" rel="tag"><?php echo $item['title']; ?></a>
<?php if ($vars['delimiter'] && $item != end($items)) { echo $vars['delimiter'].' '; } ?>
<?php } ?>
</section>
