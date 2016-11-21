<?php


namespace Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Model;

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

use SJBR\StaticInfoTables\Domain\Model\AbstractEntity;

/**
 * @package TYPO3
 * @subpackage bzga_beratungsstellensuche_familienplanung
 * @author Sebastian Schreiber
 */
class Language extends AbstractEntity
{

    /**
     * @var integer
     */
    protected $pndExternalId;

    /**
     * @return int
     */
    public function getPndExternalId()
    {
        return $this->pndExternalId;
    }

    /**
     * @param int $pndExternalId
     */
    public function setPndExternalId($pndExternalId)
    {
        $this->pndExternalId = $pndExternalId;
    }


}