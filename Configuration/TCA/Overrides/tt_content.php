<?php

/**
 * Include Plugins
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin('typoscript2ce', 'Pi1', 'Typoscript2ce');

/**
 * Include Flexform
 */
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['typoscript2ce_pi1'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    'typoscript2ce_pi1',
    'FILE:EXT:typoscript2ce/Configuration/FlexForms/FlexFormPi1.xml'
);

/**
 * Disable not needed fields in tt_content
 */
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['typoscript2ce_pi1']
    = 'select_key,pages,recursive';
