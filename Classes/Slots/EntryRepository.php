<?php


namespace Bzga\BzgaBeratungsstellensucheFamilienplanung\Slots;

use Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Repository\PndConsultingRepository;
use Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Repository\ReligionRepository;
use TYPO3\CMS\Core\Database\DatabaseConnection;

class EntryRepository
{

    /**
     * @var string
     */
    const LANGUAGE_MM_TABLE = 'tx_bzgaberatungsstellensuche_entry_pnd_language_mm';

    /**
     * @param DatabaseConnection $databaseConnection
     */
    public function truncate(DatabaseConnection $databaseConnection)
    {
        $databaseConnection->exec_TRUNCATEquery(ReligionRepository::TABLE);
        $databaseConnection->exec_TRUNCATEquery(PndConsultingRepository::TABLE);
        $databaseConnection->exec_TRUNCATEquery(PndConsultingRepository::MM_TABLE);
        $databaseConnection->exec_TRUNCATEquery(self::LANGUAGE_MM_TABLE);
    }
}
