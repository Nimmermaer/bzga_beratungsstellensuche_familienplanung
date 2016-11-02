<?php

namespace BZgA\BzgaBeratungsstellensucheFamilienplanung\Hooks;

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

use BZgA\BzgaBeratungsstellensuche\Domain\Model\Dto\Demand as BaseDemand;
use BZgA\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Dto\Demand;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;

/**
 * @package TYPO3
 * @subpackage bzga_beratungsstellensuche_familienplanung
 * @author Sebastian Schreiber
 */
class EntryRepository
{

    /**
     * Modify the constraints used in the query
     *
     * @param array $params
     * @return void
     */
    public function modify(array $params)
    {
        $demand = isset($params['demand']) ? $params['demand'] : null;
        /* @var $demand Demand|BaseDemand */

        if (!$demand instanceof BaseDemand) {
            return;
        }

        $query = isset($params['query']) ? $params['query'] : null;
        /* @var $query QueryInterface */
        if (!$query instanceof QueryInterface) {
            return;
        }

        $constraints = &$params['constraints'];
        /* @var $constraints array */

        if ($demand->isMotherAndChild()) {
            $constraints[] = $query->equals('motherAndChild', 1);
        }

        if ($demand->isConsultingAgreement()) {
            $constraints[] = $query->equals('consultingAgreement', 1);
        }

        if ($religion = $demand->getReligion()) {
            $constraints[] = $query->equals('religiousDenomination', $religion);
        }

        if ($demand->isPndConsulting()) {
            // @TODO: Implement logic of MM-Relation
        }

    }

}