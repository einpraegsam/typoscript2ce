<?php
defined('TYPO3') || die();

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

$pluginSignature = 'typoscript2ce_pi1';

ExtensionUtility::registerPlugin('typoscript2ce', 'Pi1', 'Typoscript2ce');

ExtensionManagementUtility::addPiFlexFormValue(
    '*',
    'FILE:EXT:typoscript2ce/Configuration/FlexForms/FlexFormPi1.xml',
    $pluginSignature,
);

ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    'pi_flexform',
    $pluginSignature,
    'after:subheader',
);
