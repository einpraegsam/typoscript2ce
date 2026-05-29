<?php
declare(strict_types=1);

namespace In2code\Typoscript2ce\Updates;

use TYPO3\CMS\Install\Attribute\UpgradeWizard;
use TYPO3\CMS\Install\Updates\AbstractListTypeToCTypeUpdate;

#[UpgradeWizard('typoscript2ce_migrateListTypeToCType')]
final class MigrateListTypeToCTypeUpdate extends AbstractListTypeToCTypeUpdate
{
    public function getTitle(): string
    {
        return 'EXT:typoscript2ce: Migrate list_type plugin to CType';
    }

    public function getDescription(): string
    {
        return 'With TYPO3 v14 the generic "Plugin" (list) content element was removed. '
            . 'Existing tt_content rows with CType="list" and list_type="typoscript2ce_pi1" '
            . 'are migrated to CType="typoscript2ce_pi1" so existing plugin instances keep rendering.';
    }

    protected function getListTypeToCTypeMapping(): array
    {
        return [
            'typoscript2ce_pi1' => 'typoscript2ce_pi1',
        ];
    }
}
