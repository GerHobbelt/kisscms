<?php
/********************************************************************************
KISSCMS -  http://kisscms.com
A Make Sites production (www.makesites.org) led by Makis Tracend
Dual-licensed under the MIT/X11 license and the GNU General Public License (GPL)
********************************************************************************/

// BASE_PATH is where the filesystem path to the rot of the site...
if (!defined('BASE_PATH'))
{
  $base = str_replace('\\','/',dirname(__FILE__));
  define('BASE_PATH', $base);
}



//===============================================
// ENVIRONMENT SETUP
//===============================================

// Return message string describing any detected major problem; return FALSE otherwise.
// 
// Purpose: keep work variables in local scope while the configuration file is processed.
function KISSCMS() {
	$errmsg = [];
	$error_flagged = false;
	$server_settings_found = false;
	$env_file_path = (file_exists("../env.local.json") ? "../env.local.json" : (file_exists("env.local.json") ? "env.local.json" : (file_exists("../env.json") ? "../env.json" : "env.json")));
	$ENV = json_decode(file_get_contents($env_file_path));

	// #112 create a global for the SERVER_NAME
	$GLOBALS['SERVER_NAME'] = (strpos($_SERVER['SERVER_NAME'], "localhost") !== false || strpos($_SERVER['SERVER_NAME'], $_SERVER['SERVER_ADDR']) !== false) ? "localhost" : $_SERVER['SERVER_NAME'];

	// Process environment variables (from env.json)
	foreach ($ENV as $domain => $properties) { 
		// check the domain against each set
		if (strpos($GLOBALS['SERVER_NAME'], $domain) !== false) { 
			// available options: base, plugins, cdn, debug (sdk)
			foreach ($properties as $key=>$value) { 
				if (!empty($value)) eval("define('".strtoupper($key)."', '$value');");
			}
			$server_settings_found = true;
			// exit if we found a match
			break;
		}
	}

	if (!$server_settings_found) {
		$errmsg[] = sprintf("Missing environment section for server name '%s'.", $_SERVER['SERVER_NAME']);
		$error_flagged = true;
	}

	// augment error report to help user identify the issue at hand...
	if (file_exists($env_file_path)) {
		$errmsg[] = "We have found your configuration in `" . $env_file_path . "` (path = `" . realpath($env_file_path) . "`)";
	}
	if (defined("APP")) { 
		$errmsg[] = "APP is defined as `" . APP . "` and we expected to find the init code here: `" . APP.'bin/init.php' . "`";
	} elseif (defined("BASE")) {
		$errmsg[] = "APP is not defined hence we require BASE to be defined at least";
		$errmsg[] = "BASE is defined as `" . BASE . "` and we expected to find the init code here: `" . BASE.'bin/init.php' . "`";
	} else {
		$errmsg[] = "Neither APP nor BASE are defined and we need at least one of these to locate the init code (`init.php`)";
	}

	require_once('../../__extra__/common.inc.php');
	dump_request_to_logfile();

	if ($error_flagged) {
		die("Environment variables not setup properly. Open " . $env_file_path . " and edit as needed...\n<br/>\n<br/>" . implode("\n<br/>", $errmsg));
	} elseif (defined("APP") && is_file(APP.'bin/init.php')) { 
		// find the clone file first
		require_once(APP.'bin/init.php');
	} elseif (defined("BASE") && is_file(BASE.'bin/init.php')) {
		// find the core file second
		require_once(BASE.'bin/init.php');
	} else {
		die("KISSCMS is not installed. Visit kisscms.com for instructions.\n<br/>\n<br/>" . implode("\n<br/>", $errmsg));
	}
}

//===============================================
// INITIALIZATION
//===============================================


KISSCMS();
