<?php

/*
 * This file is part of the "bzga_beratungsstellensuche_familienplanung" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Model;

use SJBR\StaticInfoTables\Domain\Model\AbstractEntity;

/**
 * @author Sebastian Schreiber
 */
class Language extends AbstractEntity
{

    /**
     * @var int
     */
    protected $pndExternalId;

    public function getPndExternalId(): int
    {
        return (int)$this->pndExternalId;
    }

    public function setPndExternalId(int $pndExternalId): void
    {
        $this->pndExternalId = $pndExternalId;
    }
}
