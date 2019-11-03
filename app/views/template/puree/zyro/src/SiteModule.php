<?php

class SiteModule {
	
	/** @var SiteInfo */
	public static $siteInfo;
	/** @var string|null */
	public static $lang;
	
	public static function init($none, SiteInfo $siteInfo) {
		self::$siteInfo = $siteInfo;
	}
	
	public static function setLang($lang) {
		self::$lang = $lang;
	}
	
}
