<?php

declare(strict_types=1);

/*
 * This file is part of the "bzga_beratungsstellensuche_familienplanung" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Repository;

use Bzga\BzgaBeratungsstellensuche\Domain\Repository\AbstractBaseRepository;
use Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\PndConsulting;

/**
 * @author Sebastian Schreiber
 */
class PndConsultingRepository extends AbstractBaseRepository
{

    protected $objectType = PndConsulting::class;
    /**
     * @var string
     */
    public const TABLE = 'tx_bzgaberatungsstellensuche_domain_model_pndconsulting';

    /**
     * @var string
     */
    public const MM_TABLE = 'tx_bzgaberatungsstellensuche_entry_pndconsulting_mm';
}
