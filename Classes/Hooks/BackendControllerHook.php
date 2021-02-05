<?php
namespace Phi\Hooks;


use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

class BackendControllerHook{

    /**
     * Adds beuser permission specific JavaScript
     *
     * @param array $configuration
     * @param BackendController $backendController
     */
    public function addJavaScript(array $configuration, \TYPO3\CMS\Backend\Controller\BackendController  $backendController) {
    	 
        $backendController->addJavascriptFile(
            $GLOBALS['BACK_PATH'] . '../'
            . ExtensionManagementUtility::siteRelPath('phi_hooks')
            . 'Resources/Public/JS/test.js'
        );
    }
}