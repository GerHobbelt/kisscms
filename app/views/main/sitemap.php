<?php echo "<?xml version='1.0' encoding='UTF-8'?>"; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
		xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
		xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
		http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<?php foreach ($items as $item) { ?> 
	<url>
		<loc><?php echo $item['url']; ?></loc>
		<lastmod><?php echo $item['date']; ?></lastmod>
		<changefreq><?php echo $item['frequency']; ?></changefreq>
		<priority><?php echo $item['priority']; ?></priority>
	</url>
<?php } ?> 
</urlset>
