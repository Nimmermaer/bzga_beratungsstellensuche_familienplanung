<?php

declare(strict_types=1);

/*
 * This file is part of the "bzga_beratungsstellensuche_familienplanung" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Bzga\BzgaBeratungsstellensucheFamilienplanung\EventListener;

use Bzga\BzgaBeratungsstellensuche\Domain\Serializer\Serializer as BaseSerializer;
use Bzga\BzgaBeratungsstellensuche\Events\Import\PreImportEvent;
use Bzga\BzgaBeratungsstellensuche\Service\Importer\XmlImporter;
use Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Manager\PndConsultingManager;
use Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Manager\ReligionManager;
use Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\PndConsulting;
use Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Religion;
use SimpleXMLIterator;

/**
 * @author Sebastian Schreiber
 */
class PreImportEventListener
{

    /**
     * @var ReligionManager
     */
    protected $religionManager;

    /**
     * @var PndConsultingManager
     */
    protected $pndConsultingManager;
    public function __construct(\Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Manager\ReligionManager $religionManager, \Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Manager\PndConsultingManager $pndConsultingManager)
    {
        $this->religionManager = $religionManager;
        $this->pndConsultingManager = $pndConsultingManager;
    }

    public function __invoke(PreImportEvent $event): void
    {
        // Import religions
        $event->getImporter()->convertRelations($event->getSimpleXMLIterator()->konfessionen->konfession, $this->religionManager, Religion::class,$event->getPid());

        // Import pnd beratungen
        $event->getImporter()->convertRelations($event->getSimpleXMLIterator()->pndberatungen->pndberatung, $this->pndConsultingManager, PndConsulting::class, $event->getPid());

        $this->pndConsultingManager->persist();
        $this->religionManager->persist();
    }
}
