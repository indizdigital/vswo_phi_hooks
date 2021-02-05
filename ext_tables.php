<?php

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Phi.' . $_EXTKEY,
	'PhiHooks',
	'Instagram Auth'
);


$GLOBALS['TCA']['pages']['columns']['keywords']['config']['max'] = 160;
$GLOBALS['TCA']['pages']['columns']['title']['config']['max'] = 60;
$GLOBALS['TCA']['pages']['columns']['description']['config']['max'] = 160;
