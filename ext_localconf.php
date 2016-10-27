<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$_EXTKEY]['CDN'] = [
	'None' => [
		'js' => '',
		'css' => '',
	],
	'MaxCDN' => [
		'js' => '//code.jquery.com/ui/1.12.1/jquery-ui.min.js',
		'css' => '//code.jquery.com/ui/1.12.1/themes/###THEME###/jquery-ui.min.css',
	],
	'Google' => [
		'js' => '//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js',
		'css' => '//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/###THEME###/jquery-ui.min.css',
	],
	'Microsoft' => [
		'js' => '//ajax.aspnetcdn.com/ajax/jquery.ui/1.12.1/jquery-ui.min.js',
		'css' => '//ajax.aspnetcdn.com/ajax/jquery.ui/1.12.1/themes/###THEME###/jquery-ui.min.css',
	],
	'CDNJS' => [
		'js' => '//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js',
		'css' => '//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/###THEME###/jquery-ui.min.css',
	],
	'jsDelivr' => [
		'js' => '//cdn.jsdelivr.net/jquery.ui/1.12.1/jquery-ui.min.js',
		'css' => '//cdn.jsdelivr.net/jquery.ui/1.12.1/themes/###THEME###/jquery-ui.min.css',
	],
];