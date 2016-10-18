<?php


namespace Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Manager;

use Bzga\BzgaBeratungsstellensuche\Domain\Manager\AbstractManager;

class ReligionManager extends AbstractManager
{

    /**
     * @var \BZgA\BzgaBeratungsstellensucheFamilienplanung\Domain\Repository\ReligionRepository
     * @inject
     */
    protected $repository;

    /**
     * @return \BZgA\BzgaBeratungsstellensucheFamilienplanung\Domain\Repository\ReligionRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }


}