<?php


namespace Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Manager;

use Bzga\BzgaBeratungsstellensuche\Domain\Manager\AbstractManager;

class PndConsultingManager extends AbstractManager
{

    /**
     * @var \BZgA\BzgaBeratungsstellensucheFamilienplanung\Domain\Repository\PndConsultingRepository
     * @inject
     */
    protected $repository;

    /**
     * @return \BZgA\BzgaBeratungsstellensucheFamilienplanung\Domain\Repository\PndConsultingRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }

}