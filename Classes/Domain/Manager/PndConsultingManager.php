<?php

declare(strict_types=1);

/*
 * This file is part of the "bzga_beratungsstellensuche_familienplanung" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Manager;

use Bzga\BzgaBeratungsstellensuche\Domain\Manager\AbstractManager;
use Bzga\BzgaBeratungsstellensuche\Domain\Repository\AbstractBaseRepository;
use Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Repository\PndConsultingRepository;

/**
 * @author Sebastian Schreiber
 */
class PndConsultingManager extends AbstractManager
{

    /**
     * @var PndConsultingRepository
     */
    protected $repository;

    public function injectRepository(PndConsultingRepository $repository): void
    {
        $this->repository = $repository;
    }

    public function getRepository(): AbstractBaseRepository
    {
        return $this->repository;
    }
}
