<?php

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}

## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

$wgSitename = "Geohistoricaldata Wiki";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs
## (like /w/index.php/Page_title to /wiki/Page_title) please see:
## https://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath = "";

## The protocol and server name to use in fully-qualified URLs
$wgServer = "http://localhost:8081";

## The URL path to static resources (images, scripts, etc.)
$wgResourceBasePath = $wgScriptPath;

## The URL path to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogo = "";

## UPO means: this is also a user preference option

$wgEnableEmail = true;
$wgEnableUserEmail = true; # UPO

$wgEmergencyContact = "";
$wgPasswordSender = "";

$wgEnotifUserTalk = false; # UPO
$wgEnotifWatchlist = false; # UPO
$wgEmailAuthentication = true;

## Database settings
$wgDBtype = "mysql";
$wgDBserver = "wikidb-container";
$wgDBname = "mediawiki";
$wgDBuser = "mediawiki";
$wgDBpassword = "password";

# MySQL specific settings
$wgDBprefix = "";

# MySQL table options to use during installation or update
$wgDBTableOptions = "ENGINE=InnoDB, DEFAULT CHARSET=binary";

# Experimental charset support for MySQL 5.0.
$wgDBmysql5 = false;

## Shared memory settings
$wgMainCacheType = CACHE_NONE;
$wgMemCachedServers = [];

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads = true;
$wgUseImageMagick = true;
$wgImageMagickConvertCommand = "/usr/bin/convert";
$wgGenerateThumbnailOnParse = true;

# InstantCommons allows wiki to use images from https://commons.wikimedia.org
$wgUseInstantCommons = false;

# Periodically send a pingback to https://www.mediawiki.org/ with basic data
# about this MediaWiki instance. The Wikimedia Foundation shares this data
# with MediaWiki developers to help guide future development efforts.
$wgPingback = false;

## If you use ImageMagick (or any other shell command) on a
## Linux server, this will need to be set to the name of an
## available UTF-8 locale
$wgShellLocale = "C.UTF-8";

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publically accessible from the web.
#$wgCacheDirectory = "$IP/cache";

# Site language code, should be one of the list in ./languages/data/Names.php
$wgLanguageCode = "fr";

$wgSecretKey = "4dee971ffe240210aeedc13ac43481b1428819f4c06c9c1ef4d06880bf9664b4";

# Changing this will log out all existing sessions.
$wgAuthenticationTokenVersion = "1";

# Site upgrade key. Must be set to a string (default provided) to turn on the
# web installer while LocalSettings.php is in place
$wgUpgradeKey = "d41f4123094d7bae";

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
$wgDefaultSkin = "monobook";

# Enabled skins.
# The following skins were automatically enabled:
wfLoadSkin( 'CologneBlue' );
wfLoadSkin( 'Modern' );
wfLoadSkin( 'MonoBook' );
wfLoadSkin( 'Vector' );

# End of automatically generated settings.
# Add more configuration options below.

#Set Default Timezone
$wgLocaltimezone = "Europe/Paris";
date_default_timezone_set( $wgLocaltimezone );

#Uploaded files directories
$wgUploadDirectory="/var/www/html/images";

# Access restrictions
# Users must be registered and in the group 'Auteur' to have the permission
# to create or edit pages.
$wgGroupPermissions['*']['edit'] = false;
$wgGroupPermissions['*']['createpage'] = false;
$wgGroupPermissions['user']['edit'] = false;
$wgGroupPermissions['user']['createpage'] = false;
$wgGroupPermissions['Auteur']['edit'] = true;
$wgGroupPermissions['Auteur']['createpage'] = true;

# Sysop can always edit
$wgGroupPermissions['sysop']['edit'] = true;
$wgGroupPermissions['sysop']['createpage'] = true;


#Short URLS
#Generated from shorturls.redwerks.org
$wgScriptExtension = ".php";
$wgArticlePath = "/$1";

#Semantic Mediawaiki
enableSemantics('localhost:8081');

#Custom configuration
$wgUsePathInfo = true;
$wgShowExceptionDetails = true;
$wgShowDBErrorBacktrace = true;

#DataTransfer
include_once "$IP/extensions/DataTransfer/DataTransfer.php";
$wgGroupPermissions['*']['datatransferimport'] = true;

# To avoid this error : https://www.mediawiki.org/wiki/Topic:T7irqyk4rhfy3ohk
$wgSessionCacheType = CACHE_DB;
$wgMainCacheType = CACHE_DB;

# EXTENSION WikiEditor
wfLoadExtension( 'WikiEditor' );
# Everybody can see the editor...
$wgHiddenPrefs[] = 'usebetatoolbar';
# ...but nobody can disable it.
$wgDefaultUserOptions['usebetatoolbar'] = 1;

# EXTENSION Cite
wfLoadExtension( 'Cite' );
$wgCiteCacheRawReferencesOnParse = true;
$wgCiteStoreReferencesData = true;

# EXTENSION Maps
$GLOBALS['egMapsDefaultService'] = 'google';
# geocoding service
$GLOBALS['egMapsDefaultGeoService'] = 'geonames';
#Access to gmap!
$GLOBALS['egMapsGMaps3ApiKey'] = 'AIzaSyBEfACwhMDfEOSVUn3R63hsVIHVd2FNRGE';


