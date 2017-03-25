<?php

/**
 *
 * 163 YunGenTie for MediaWiki
 * YunGenTie Service: https://gentie.163.com/
 * API Documentation: https://gentie.163.com/help.html
 *
 * @author Arumi
 */

if ( !defined( 'MEDIAWIKI' ) ) die();

define( 'TIE_VERSION', '1.0.0' );

$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'YunGenTie',
	'version' => TIE_VERSION,
	'author' => array( 'Arumi' ),
	'url' => 'https://gentie.163.com/',
	'descriptionmsg' => 'yungentie-desc',
);

$wgMessagesDirs['YunGenTie'] = __DIR__ . '/i18n';

$wgAutoloadClasses['ApiTie'] = __DIR__ . '/Tie.api.php';
$wgAutoloadClasses['YunGenTie'] = __DIR__ . '/YunGenTie_body.php';

$wgAPIModules['tie'] = 'ApiTie';
$wgHooks['OutputPageBeforeHTML'][] = 'YunGenTie::autoAppend';

$wgYunGenTieEnabled = true;
$wgYunGenTieNamespaces = array();
$wgYunGenTieClassName = 'cloud-tie-wrapper';
$wgYunGenTieProductKey = '';
$wgYunGenTieLoaderKey = '';
