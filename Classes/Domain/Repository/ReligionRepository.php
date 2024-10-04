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
use Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Religion;

/**
 * @author Sebastian Schreiber
 */
class ReligionRepository extends AbstractBaseRepository
{
    protected $objectType = Religion::class;
    /**
     * @var string
     */
    public const TABLE = 'tx_bzgaberatungsstellensuche_domain_model_religion';
}
