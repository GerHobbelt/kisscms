<div class="post">
	<div class="posttop">
		<a href="<?php url($path); ?>" rel="bookmark" title="Permanent Link: <?php echo $title; ?>">
			<label>
				<strong class="date"><?php echo date("d", strtotime($date)); ?></strong> <strong class="month"><?php echo date("M", strtotime($date)); ?></strong>
				<!--strong class="comments">0</strong-->
			</label>
		</a>
	</div>

	<!-- end of .posttop -->
	<div class="postbody">
		<h2><?php echo $title; ?></h2>
		<p class="postinfo">
			Posted at <?php echo date("G:i", strtotime($date)); ?>
		</p>
		<div><?php echo $content; ?></div>
	</div>
	<!-- end of .postfoot -->
	<div class="postmeta">
		<?php Tags::inline("class: right, delimiter: ',', h3: 'Tags:'", $tags); ?>
	</div>
	<!-- end of .postmeta -->
</div>
<!-- end of .post -->

