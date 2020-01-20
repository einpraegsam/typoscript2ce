<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

/**
 * Include Plugins
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin('typoscript2ce', 'Pi1', 'Typoscript2ce');

/**
 * Include Flexform
 */
$pluginSignature = str_replace('_', '', 'typoscript2ce') . '_pi1';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignature,
    'FILE:EXT:' . 'typoscript2ce' . '/Configuration/FlexForms/FlexFormPi1.xml'
);
