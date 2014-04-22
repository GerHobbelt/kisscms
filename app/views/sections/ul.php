<section <?php echo attr("id", $vars['id']); ?> <?php echo attr("class", $vars['class']); ?>>
<?php if (!empty($vars['h3'])) { ?>
<h3 <?php echo attr("id", $vars['h3-id']); ?> <?php echo attr("class", $vars['h3-class']); ?>><?php echo $vars['h3']; ?></h3>
<?php } ?>
<ul <?php echo attr("id", $vars['ul-id']); ?> <?php echo attr("class", $vars['ul-class']); ?>>
<?php if (!empty($items)) { ?>
<?php foreach ($items as $item) { ?>
	<?php $selected = (array_key_exists('selected', $item)) ? $item['selected'] : NULL; ?>
	<li <?php echo attr("class", $selected); ?>><a href="<?php echo $item['url']; ?>"><?php echo $item['title']; ?></a></li>
<?php }
} ?>
</ul>
</section>
