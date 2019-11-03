<?php

if (!function_exists('file_put_contents')) {
	if (!defined('FILE_USE_INCLUDE_PATH'))
		define('FILE_USE_INCLUDE_PATH', 1);
	if (!defined('FILE_APPEND'))
		define('FILE_APPEND', 8);
	if (!defined('LOCK_EX'))
		define('LOCK_EX', 2);
	function file_put_contents($filename, $data, $flags = 0, $context = false) {
		if (is_array($data)) $data = implode('', $data);
		$res = false;
		if (($fh = fopen($filename, (($flags & FILE_APPEND) ? 'a' : 'w'), (($flags & FILE_USE_INCLUDE_PATH) ? true : false)))) {
			$res = fwrite($fh, $data);
			fclose($fh);
		}
		return $res;
	}
}

if (!function_exists('json_decode')) {
	require_once dirname(__FILE__).'/class.json.php';
	global $_json_service;
	$_json_service = new Services_JSON();
	function json_decode($json, $assoc = false) {
		global $_json_service;
		$_json_service->use = $assoc ? SERVICES_JSON_LOOSE_TYPE : 0;
		return $_json_service->decode($json);
	}
	function json_encode($data, $assoc = false) {
		global $_json_service;
		$_json_service->use = $assoc ? SERVICES_JSON_LOOSE_TYPE : 0;
		return $_json_service->encodeUnsafe($data);
	}
}
