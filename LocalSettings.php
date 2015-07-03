<?php
# This file was automatically generated by the MediaWiki 1.21.2
# installer. If you make manual changes, please keep track in case you
# need to recreate them later.
#
# See includes/DefaultSettings.php for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.
#
# Further documentation for configuration settings may be found at:
# http://www.mediawiki.org/wiki/Manual:Configuration_settings

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
    exit;
}

$wgDebug = false;
$wgUseCurlHttpEngine = false;

## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

$wgSitename = "MediaWiki On GAE";
$wgMetaNamespace = "wiki";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs
## (like /w/index.php/Page_title to /wiki/Page_title) please see:
## http://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath = "/wiki";
$wgScriptExtension = ".php";

## The protocol and server name to use in fully-qualified URLs
#$wgServer = "http://localhost:8080";

# determine whether we are running on Google App Engine
$wgRunOnGae = false;
if(isset($_SERVER['SERVER_SOFTWARE']) && strpos($_SERVER['SERVER_SOFTWARE'],'Google App Engine') !== false) {
  $wgRunOnGae = true;
  $wgServer = "//mediawiki-on-gae.appspot.com";
  $wgArticlePath = "$wgScriptPath/$1";
}else{
  $wgServer = "http://localhost:8080";
}

## The relative URL path to the skins directory
$wgStylePath = "$wgScriptPath/skins";

## The relative URL path to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
#$wgLogo = "$wgStylePath/common/images/wiki.png";
## UPO means: this is also a user preference option

$wgEnableEmail = true;
$wgEnableUserEmail = true; # UPO

$wgEmergencyContact = "support@tyo.com.au";
$wgPasswordSender = "support@tyo.com.au";

$wgEnotifUserTalk = false; # UPO
$wgEnotifWatchlist = true; # UPO
$wgEmailAuthentication = true;

## Database settings
$wgDBtype = "mysql";
#$wgDBserver = "localhost";

# Database server settings for local / GAE
if($wgRunOnGae) {
  #$wgDBserver = ':/cloudsql/mediawiki-on-gae:wiki';
  $wgDBserver = "localhost";
  $wgDBuser = 'root';
  $wgDBpassword = '';
} 
else {
  $wgDBserver = 'localhost'; // "173.194.227.63"; // 
  $wgDBuser = "root";
  $wgDBpassword = "";
}

$wgDBname = "wiki_db";

# MySQL specific settings
$wgDBprefix = "";

# MySQL table options to use during installation or update
$wgDBTableOptions = "ENGINE=InnoDB, DEFAULT CHARSET=UTF8";

# Experimental charset support for MySQL 5.0.
$wgDBmysql5 = false;

## Shared memory settings
$wgMainCacheType = CACHE_NONE;
$wgMemCachedServers = array();

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads = true;
#$wgUseImageMagick = true; 7  	2`1 vcbqswdcdew2ws`134444htun #$wgImageMagickConvertCommand = "/usr/bin/convert";

# File Upload Settings
# Don't generate thumbnail at the backend
# 
$wgUseInstantCommons = true;  // use the files from wiki commons
$wgUseImageResize = false;
$wgUploadPath = "$wgScriptPath/images";
$wgAllowCopyUploads = true;   // allow URL upload
$wgCopyUploadsFromSpecialUpload = true;
$wgGroupPermissions['user']['upload_by_url'] = true;
$wgFileExtensions[] = 'gz';
$wgFileExtensions[] = 'php';
$wgStrictFileExtensions = false;

# allow custom page title using magic word {{DISPLAYTITLE:XXXXX}}
$wgAllowDisplayTitle = true;

# InstantCommons allows wiki to use images from http://commons.wikimedia.org
$wgUseInstantCommons = false;

## If you use ImageMagick (or any other shell command) on a
## Linux server, this will need to be set to the name of an
## available UTF-8 locale
$wgShellLocale = "en_US.utf8";

## If you want to use image uploads under safe mode,
## create the directories images/archive, images/thumb and
## images/temp, and make them all writable. Then uncomment
## this, if it's not already uncommented:
#$wgHashedUploadDirectory = false;

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publically accessible from the web.
#$wgCacheDirectory = "$IP/cache";

# Site language code, should be one of the list in ./languages/Names.php
$wgLanguageCode = "en-gb";

$wgSecretKey = "xxx";

# Site upgrade key. Must be set to a string (default provided) to turn on the
# web installer while LocalSettings.php is in place
$wgUpgradeKey = "xxx";

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "";
$wgRightsText = "";
$wgRightsIcon = "";

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'vector', 'monobook':
$wgDefaultSkin = "vector";

# Enabled skins.
# The following skins were automatically enabled:
#wfLoadSkin( 'CologneBlue' );
#wfLoadSkin( 'Modern' );
#wfLoadSkin( 'MonoBook' );
wfLoadSkin( 'Vector' );

# Query string length limit for ResourceLoader. You should only set this if
# your web server has a query string length limit (then set it to that limit),
# or if you have suhosin.get.max_value_length set in php.ini (then set it to
# that value)
$wgResourceLoaderMaxQueryLength = -1;

# The following permissions were set based on your choice in the installer
$wgGroupPermissions['*']['createaccount'] = true;
$wgGroupPermissions['*']['edit'] = true;
$wgGroupPermissions['*']['read'] = true;

# End of automatically generated settings.
# Add more configuration options below.


# DEBUG
if ($wgDebug) {
	#error_reporting( -1 );
	#ini_set( 'display_errors', 1 );
	$wgShowExceptionDetails = true;
	$wgDebugToolbar = true;
	$wgShowDebug = true;
	$wgDevelopmentWarnings = true;
	#$wgShowSQLErrors = true;
	#$wgDebugDumpSql  = true;
	#$wgShowDBErrorBacktrace = true;
	
	if( ! $wgRunOnGae ) {
		$wgDebugLogFile = "/var/log/mediawiki/debug-{$wgDBname}.log";
	}
}

if ($wgRunOnGae) {
	require_once 'GoogleAppEngineSettings.php';
}

# 
$wgUseGoogleStorage = true;
# enable it to avoid zip-file check
$wgAllowJavaUploads = true;
#
# when using fopen don't use 'a+' mode
#
// $wgLockManagers[] = array(
// 		'name' => 'nullLockManager',
// 		'class' => 'NullLockManager',
// );
require_once( "$IP/extensions/CloudStorage/CloudStorage.php" );
require_once( "$IP/extensions/Special404/Special404.php" );
require_once( "$IP/extensions/Cite/Cite.php" );
require_once "$IP/extensions/SyntaxHighlight_GeSHi/SyntaxHighlight_GeSHi.php";
require_once( "$IP/extensions/WikiEditor/WikiEditor.php" );
