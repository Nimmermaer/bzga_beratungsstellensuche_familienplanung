<?php

declare(strict_types=1);

/*
 * This file is part of the "bzga_beratungsstellensuche_familienplanung" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Bzga\BzgaBeratungsstellensucheFamilienplanung\Hooks;

use Bzga\BzgaBeratungsstellensuche\Domain\Model\Dto\Demand as BaseDemand;
use Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Dto\Demand;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;

/**
 * @author Sebastian Schreiber
 */
class EntryRepository
{
    public function modify(array $params): void
    {
        $demand = $params['demand'] ?? null;
        /** @var $demand Demand|BaseDemand */
        if (!$demand instanceof BaseDemand) {
            return;
        }

        $query = $params['query'] ?? null;
        /** @var $query QueryInterface */
        if (!$query instanceof QueryInterface) {
            return;
        }

        $constraints = &$params['constraints'];
        /* @var $constraints array */

        if ($demand->isMotherAndChild()) {
            $constraints[] = $query->equals('motherAndChild', 1);
        }

        if ($demand->isContraceptiveCosts()) {
            $constraints[] = $query->equals('contraceptiveCosts', 1);
        }

        if ($demand->isConsultingAgreement()) {
            $constraints[] = $query->equals('consultingAgreement', 1);
        }

        if ($demand->isPndConsulting()) {
            $constraints[] = $query->greaterThan('pndConsultings', 0);
        }

        if ($religion = $demand->getReligion()) {
            $constraints[] = $query->equals('religiousDenomination', $religion);
        }
    }
}
