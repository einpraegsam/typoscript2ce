<?php
if (!defined('TYPO3')) {
    die('Access denied.');
}

call_user_func(function () {
    /**
     * Get configuration from extension manager
     */
    $configuration = (array)\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
        \TYPO3\CMS\Core\Configuration\ExtensionConfiguration::class
    )->get('typoscript2ce');
    $uncachedActions = 'index';
    if ($configuration['enableCaching'] === '1') {
        $uncachedActions = '';
    }

    /**
     * Include Frontend Plugins
     */
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'typoscript2ce',
        'Pi1',
        [
            \In2code\Typoscript2ce\Controller\TypoScriptController::class => 'index'
        ],
        [
            \In2code\Typoscript2ce\Controller\TypoScriptController::class => $uncachedActions
        ]
    );
});
