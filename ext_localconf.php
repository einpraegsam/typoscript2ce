<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

/**
 * Get configuration from extension manager
 */
$confArr = $GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['typoscript2ce'];

$uncachedActions = 'index';
if ($confArr['enableCaching'] === '1') {
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
