<?php

# Site logo - Not used by Horsens Leksikon skin, but still.
$wgLogo = "{$wgScriptPath}/skins/horsensleksikon/graphics/horsens-leksikon-logo.png";


$wgValidSkinNames['horsensleksikon'] = 'HorsensLeksikon';
$wgAutoloadClasses['SkinHorsensLeksikon'] = $IP.'/skins/HorsensLeksikon.php';

$wgResourceModules['skins.horsensleksikon'] = array(
	'styles' => array(
		'horsensleksikon/main.css' => array( 'media' => 'screen'),
		'horsensleksikon/print.css' => array( 'media' => 'print'),
	),
	'scripts' => array(
		'horsensleksikon/javascript/jquery.corner.js',
		'horsensleksikon/javascript/jquery.custom.js',
	),
	'remoteBasePath' => &$GLOBALS['wgStylePath'],
	'localBasePath' => &$GLOBALS['wgStyleDirectory']
);
