<div  id="admin-topbar">
	<h3><a href="http://kisscms.com/" title="Made with love...">KISSCMS</a></h3>
	<ul>
<?php if ((isset($id) && !isset($status)) || (isset($id) && isset($status) && $status !== "edit")) { ?>
        <li><a href="<?php echo url("admin/create/"); ?>">Create another page</a></li>
		<li><a href="<?php echo url("admin/edit/$id"); ?>">Edit page</a></li>
<?php } elseif(isset($path) && isset($status) && $status == "new") { ?>
		<li><a href="<?php echo url("admin/create/".$path); ?>">Create page</a></li>
<?php } elseif(isset($path) && isset($status) && $status == "edit") { ?>
		<li><a href="<?php echo url($path); ?>">View page</a></li>
<?php } ?>
<?php 	if (isset($id) && $id != "1") { ?>
		<li><a href="<?php echo url("admin/delete/$id"); ?>" onclick="return confirm('<?php echo $GLOBALS['language']['delete_confirm']; ?>')">Delete page</a></li>
<?php } ?>
<?php 	if (!isset($status) || (isset($status) && $status != "config")) { ?>
		<li><a href="<?php echo url("admin/config"); ?>">Configuration</a></li>
<?php } ?>
		<li><a href="<?php echo url("admin/logout"); ?>">Logout</a></li>
	</ul>
</div>
