<?php
define('LOCAL',true);
define('ROOT',dirname(__FILE__));
define('DIR',(LOCAL)?dirname(ROOT):ROOT);
define('DISPLAY_ERRORS',false);

if (DISPLAY_ERRORS) {
	ini_set('display_errors',1);
	error_reporting(E_ALL);
} else {
	error_reporting(0);
}
?>