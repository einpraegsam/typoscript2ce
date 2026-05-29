<?php
defined('TYPO3') || die();

use In2code\Typoscript2ce\Controller\TypoScriptController;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

call_user_func(function (): void {
    $configuration = (array)GeneralUtility::makeInstance(ExtensionConfiguration::class)->get('typoscript2ce');
    $cachingEnabled = ($configuration['enableCaching'] ?? '0') === '1';
    $uncachedActions = $cachingEnabled ? '' : 'index';

    ExtensionUtility::configurePlugin(
        'typoscript2ce',
        'Pi1',
        [TypoScriptController::class => 'index'],
        [TypoScriptController::class => $uncachedActions],
        ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT,
    );
});
