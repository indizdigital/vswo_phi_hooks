<?php

$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['phi'] = 'EXT:phi_hooks/Configuration/Rte/Phi.yaml';

$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects']['Causal\\FileList\\Controller\\FileController'] = array(
   'className' => 'Phi\\PhiHooks\\Controller\\XtFileController'
);


\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Phi',
	'PhiHooks',
	array(
		Phi\PhiHooks\Controller\InstagramController::class => 'auth',

	),
	// non-cacheable actions
	array(
		Phi\PhiHooks\Controller\InstagramController::class => 'auth',

	)
);
?>
