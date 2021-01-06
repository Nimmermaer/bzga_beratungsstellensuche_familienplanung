<?php

declare(strict_types=1);

/*
 * This file is part of the "bzga_beratungsstellensuche_familienplanung" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Bzga\BzgaBeratungsstellensucheFamilienplanung\Slots;

use Bzga\BzgaBeratungsstellensuche\Domain\Serializer\Serializer as BaseSerializer;
use Bzga\BzgaBeratungsstellensuche\Service\Importer\XmlImporter;
use Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Manager\PndConsultingManager;
use Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Manager\ReligionManager;
use Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\PndConsulting;
use Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Religion;
use SimpleXMLIterator;

/**
 * @author Sebastian Schreiber
 */
class Importer
{

    /**
     * @var ReligionManager
     */
    protected $religionManager;

    /**
     * @var PndConsultingManager
     */
    protected $pndConsultingManager;

    public function injectReligionManager(ReligionManager $religionManager): void
    {
        $this->religionManager = $religionManager;
    }

    public function injectPndConsultingManager(PndConsultingManager $pndConsultingManager): void
    {
        $this->pndConsultingManager = $pndConsultingManager;
    }

    public function preImport(XmlImporter $importer, SimpleXMLIterator $sxe, $pid, BaseSerializer $serializer): void
    {
        // Import religions
        $importer->convertRelations($sxe->konfessionen->konfession, $this->religionManager, Religion::class, $pid);

        // Import pnd beratungen
        $importer->convertRelations($sxe->pndberatungen->pndberatung, $this->pndConsultingManager, PndConsulting::class, $pid);

        $this->pndConsultingManager->persist();
        $this->religionManager->persist();
    }
}
