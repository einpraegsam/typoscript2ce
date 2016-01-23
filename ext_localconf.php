<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

/**
 * Get configuration from extension manager
 */
$confArr = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['typoscript2ce']);

$uncachedActions = 'index';
if ($confArr['enableCaching'] === '1') {
    $uncachedActions = '';
}
/**
 * Include Frontend Plugins for Powermail
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'In2code.' . $_EXTKEY,
    'Pi1',
    [
        'TypoScript' => 'index'
    ],
    [
        'Form' => $uncachedActions
    ]
);
