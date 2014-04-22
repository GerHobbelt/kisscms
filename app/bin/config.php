<?php


//===============================================
// KISSCMS Settings
//===============================================

if (class_exists('Config') && method_exists(new Config(),'register')) {
	// Register variables
	Config::register("main", "site_name", "KISSCMS");
	Config::register("main", "site_description", "Lightweight CMS based on the KISSMVC Framework");
	Config::register("main", "site_author", "Your Name or Company");

	Config::register("main", "default_route", "main");
	Config::register("main", "default_action", "index");

	Config::register("main", "default_template", "default.php");
	Config::register("main", "admin_template", "admin.php");
	Config::register("main", "listings_template", "listings.php");

	Config::register("main", "db_pages", "pages.sqlite");
	Config::register("main", "db_config", "config.local.sqlite");

	Config::register("admin", "admin_username", "admin");
	Config::register("admin", "admin_password", '$1$VGthOaJJ$o7GR6b657c7mtrOCTLZgO.');

	Config::register("admin", "uglify_service", "http://uglify.makesit.es/");
}

//===============================================
// PHP.INI configuration
//===============================================
ini_set('session.gc_maxlifetime',300);
ini_set('display_errors','On');
error_reporting(E_ALL | E_STRICT);
