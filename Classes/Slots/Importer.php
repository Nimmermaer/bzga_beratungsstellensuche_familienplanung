<?php


namespace BZgA\BzgaBeratungsstellensucheFamilienplanung\Slots;

use Bzga\BzgaBeratungsstellensuche\Service\Importer\XmlImporter;
use BZgA\BzgaBeratungsstellensuche\Domain\Serializer\Serializer as BaseSerializer;
use BZgA\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\PndConsulting;
use BZgA\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Religion;


class Importer
{

    /**
     * @var \Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Manager\ReligionManager
     * @inject
     */
    protected $religionManager;

    /**
     * @var \Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Manager\PndConsultingManager
     * @inject
     */
    protected $pndConsultingManager;

    /**
     * @param XmlImporter $importer
     * @param \SimpleXMLIterator $sxe
     * @param $pid
     * @param BaseSerializer $serializer
     */
    public function preImport(XmlImporter $importer, \SimpleXMLIterator $sxe, $pid, BaseSerializer $serializer)
    {
        # Import religions
        $importer->convertRelations($sxe->konfessionen->konfession, $this->religionManager, Religion::class, $pid);

        # Import pnd beratungen
        $importer->convertRelations($sxe->pndberatungen->pndberatung, $this->pndConsultingManager, PndConsulting::class, $pid);

        $this->pndConsultingManager->persist();
        $this->religionManager->persist();

    }

}