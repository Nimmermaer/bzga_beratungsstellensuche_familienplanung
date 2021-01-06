<?php
declare(strict_types=1);


namespace Bzga\BzgaBeratungsstellensucheFamilienplanung\Updates;


use SJBR\StaticInfoTables\Utility\DatabaseUpdateUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Install\Updates\DatabaseUpdatedPrerequisite;
use TYPO3\CMS\Install\Updates\UpgradeWizardInterface;

final class ImportLanguagesUpdate implements UpgradeWizardInterface
{

    public function getIdentifier(): string
    {
        return self::class;
    }

    public function getTitle(): string
    {
        return '[Beratungsstellensuche] Import languages';
    }

    public function getDescription(): string
    {
        return '';
    }

    public function executeUpdate(): bool
    {
        $databaseUpdateUtility = GeneralUtility::makeInstance(DatabaseUpdateUtility::class);
        $databaseUpdateUtility->doUpdate('bzga_beratungsstellensuche_familienplanung');

        return true;
    }

    public function updateNecessary(): bool
    {
        return true;
    }

    public function getPrerequisites(): array
    {
        return [
            DatabaseUpdatedPrerequisite::class
        ];
    }
}
