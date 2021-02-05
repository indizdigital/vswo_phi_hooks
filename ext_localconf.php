<?php

$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['phi'] = 'EXT:phi_hooks/Configuration/Rte/Phi.yaml';

$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects']['Causal\\FileList\\Controller\\FileController'] = array(
   'className' => 'Phi\\Hooks\\Controller\\XtFileController'
);


\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Phi.' . $_EXTKEY,
	'PhiHooks',
	array(
		'Instagram' => 'auth',

	),
	// non-cacheable actions
	array(
		'Instagram' => 'auth',

	)
);
?>
