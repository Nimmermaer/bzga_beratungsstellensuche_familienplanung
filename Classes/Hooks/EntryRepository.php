<?php

namespace Bzga\BzgaBeratungsstellensucheFamilienplanung\Hooks;

/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */
use Bzga\BzgaBeratungsstellensuche\Domain\Model\Dto\Demand as BaseDemand;
use Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Dto\Demand;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;

/**
 * @author Sebastian Schreiber
 */
class EntryRepository
{

    /**
     * Modify the constraints used in the query
     *
     * @param array $params
     */
    public function modify(array $params)
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

        if ($religion = $demand->getReligion()) {
            $constraints[] = $query->equals('religiousDenomination', $religion);
        }
    }
}
