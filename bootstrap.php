<?php
/***********************************************************
| eXtreme-Fusion 5.0 Beta 5
| Content Management System
|
| Copyright (c) 2005-2012 eXtreme-Fusion Crew
| http://extreme-fusion.org/
|
| This product is licensed under the BSD License.
| http://extreme-fusion.org/ef5/license/
***********************************************************/

// TODO:: Odnośnie kodu z pliku admin/pages/mudules.php 
// TODO:: Niwelacja komunikatu o rozpoczętej sesji "Notice: A session had already been started - ignoring session_start()"
if ( ! isset($_SESSION)) 
{
	session_start();
}

if (ini_get('register_globals'))
{
	$data = array('_GET', '_POST', '_COOKIE', '_FILES', '_SERVER', '_SESSION', '_ENV');

	foreach ($data as $var)
	{
		foreach ($GLOBALS[$var] as $key => $value)
		{
			if (in_array($key, $data))
			{
				exit('Hacking action!');
			}

			unset($GLOBALS[$key]);
		}
	}
}

// Array-imploded data separator for Database fields
defined('DBS') || define('DBS', '^');

defined('FILE_SELF') || define('FILE_SELF', basename($_SERVER['PHP_SELF']));
defined('FILE_PATH') || define('FILE_PATH', $_SERVER['PHP_SELF']);
defined('SITE_HOST') || define('SITE_HOST', $_SERVER['HTTP_HOST']);

// System identifier
defined('EF5_SYSTEM') || define('EF5_SYSTEM', TRUE);

// Paths by __DIR__ to system section
defined('DIR_AJAX') || define('DIR_AJAX', DIR_SITE.'ajax'.DS);
defined('DIR_CACHE') || define('DIR_CACHE', DIR_SITE.'cache'.DS);
defined('DIR_LOCALE') || define('DIR_LOCALE', DIR_SITE.'locale'.DS);
defined('DIR_MODULES') || define('DIR_MODULES', DIR_SITE.'modules'.DS);
defined('DIR_PAGES') || define('DIR_PAGES', DIR_SITE.'pages'.DS);
defined('DIR_THEMES') || define('DIR_THEMES', DIR_SITE.'themes'.DS);

defined('DIR_SYSTEM') || define('DIR_SYSTEM', DIR_SITE.'system'.DS);
defined('DIR_CLASS') || define('DIR_CLASS', DIR_SYSTEM.'class'.DS);
defined('DIR_FUNCTION') || define('DIR_FUNCTION', DIR_SYSTEM.'function'.DS);
defined('DIR_INCLUDES') || define('DIR_INCLUDES', DIR_SYSTEM.'includes'.DS);

defined('DIR_TEMPLATES') || define('DIR_TEMPLATES', DIR_SITE.'templates'.DS);
defined('DIR_IMAGES') || define('DIR_IMAGES', DIR_TEMPLATES.'images'.DS);

defined('DIR_UPLOAD') || define('DIR_UPLOAD', DIR_SITE.'upload'.DS);

// Paths by __DIR__ to admin section
defined('DIR_ADMIN') || define('DIR_ADMIN', DIR_SITE.'admin'.DS);

defined('DIR_ADMIN_CACHE') || define('DIR_ADMIN_CACHE', DIR_ADMIN.'cache'.DS);
defined('DIR_ADMIN_PAGES') || define('DIR_ADMIN_PAGES', DIR_ADMIN.'pages'.DS);
defined('DIR_ADMIN_TEMPLATES') || define('DIR_ADMIN_TEMPLATES', DIR_ADMIN.'templates'.DS);
defined('DIR_ADMIN_IMAGES') || define('DIR_ADMIN_IMAGES', DIR_ADMIN_TEMPLATES.'images'.DS);

// URL to system section
defined('ADDR_THEMES') || define('ADDR_THEMES', ADDR_SITE.'themes/');
defined('ADDR_AJAX') || define('ADDR_AJAX', ADDR_SITE.'pages/ajax/');
defined('ADDR_TEMPLATES') || define('ADDR_TEMPLATES', ADDR_SITE.'templates/');
defined('ADDR_CSS') || define('ADDR_CSS', ADDR_TEMPLATES.'stylesheet/');
defined('ADDR_IMAGES') || define('ADDR_IMAGES', ADDR_TEMPLATES.'images/');
defined('ADDR_JS') || define('ADDR_JS', ADDR_TEMPLATES.'javascripts/');
defined('ADDR_BBCODE') || define('ADDR_BBCODE', ADDR_SITE.'system/bbcodes/');
defined('ADDR_MODULES') || define('ADDR_MODULES', ADDR_SITE.'modules/');

// URL to admin section
defined('ADDR_ADMIN') || define('ADDR_ADMIN', ADDR_SITE.'admin/');

defined('ADDR_ADMIN_TEMPLATES') || define('ADDR_ADMIN_TEMPLATES', ADDR_ADMIN.'templates/');
defined('ADDR_ADMIN_IMAGES') || define('ADDR_ADMIN_IMAGES', ADDR_ADMIN_TEMPLATES.'images/');

// OPT constant
defined('OPT_DIR') || define('OPT_DIR', DIR_SYSTEM.'opt'.DS);