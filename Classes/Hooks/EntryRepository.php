<?php


namespace BZgA\BzgaBeratungsstellensucheFamilienplanung\Hooks;

use BZgA\BzgaBeratungsstellensuche\Domain\Model\Dto\Demand;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;

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
        if (get_class($params['demand']) !== Demand::class) {
            return;
        }

        $query = $params['query'];
        /* @var $query QueryInterface */
        $constraints = &$params['constraints'];
        /* @var $constraints array */
        $demand = $params['demand'];
        /* @var $demand Demand */

        if ($demand->isMotherAndChild()) {
            $constraints[] = $query->equals('motherAndChild', 1);
        }

        if ($demand->isConsultingAgreement()) {
            $constraints[] = $query->equals('consultingAgreement', 1);
        }

        if ($demand->getReligion()) {
            $constraints[] = $query->equals('religiousDenomination', $demand->getReligion());
        }

        if ($demand->isPndConsulting()) {
            $constraints[] = $query->equals('pndConsulting', 1);
            $constraints[] = $query->equals('pndConsultants', 1);
        }


    }

}