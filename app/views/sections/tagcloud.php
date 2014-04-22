<canvas <?php echo attr("id", $vars['id']); ?> <?php echo attr("class", $vars['class']); ?>>
<div id="tag-holder" class="hide">
<?php if(!empty($items)){
	foreach($items as $item){
	// excluding empty tags and tags related with organizing content (better logic here...)
	if( $item['title'] != "" && strpos( $item['title'], "menu-" ) == false && $item['title'] != "category" ){ ?>
	<a href="<?php echo $item['url']; ?>" class="tag"<?php if($vars['weight']) { echo ' style="font-size: ' . (100 + $item['weight'] * 10) . '%"'; ?>><?php echo $item['title']; ?></a>
<?php  } ?>
<?php }
} ?>
</div>
</canvas>
<script type="text/javascript" src="<?php echo url('/js/plugins/jquery.tagcanvas.min.js'); ?>" data-type="require" data-path="tagcanvas" data-deps="jquery"></script>
<script type="text/javascript" data-type="require" data-deps="tagcanvas">
	$(function(){
		$("#<?php echo $vars['id']; ?>").tagcanvas({
			depth: 0.75
		}, "tag-holder");
	});
</script>
