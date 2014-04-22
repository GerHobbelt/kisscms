<?php 
if (count($template['list']) > 0) {
?>
<select  id="template" name="template">
<?php
	foreach ($template['list'] as $item) {
		echo '<option value="' . $item['value'] . '"';
		if ($item['value'] == $template['selected']) {
			echo ' selected="selected"';
		}
		echo '>' . $item['title'] . '</option>';
	}
?>
</select>
<?php
}
?>
