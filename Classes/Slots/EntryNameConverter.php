<?php

namespace Bzga\BzgaBeratungsstellensucheFamilienplanung\Slots;

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

/**
 * @package TYPO3
 * @subpackage bzga_beratungsstellensuche_familienplanung
 * @author Sebastian Schreiber
 */
class EntryNameConverter
{

    /**
     * @param array $mapNames
     * @return array
     */
    public function mapNames(array $mapNames = array())
    {
        $mapNames = array_merge($mapNames, array(
            'konfession' => 'religious_denomination',
            'pndberatunglangsons' => 'pnd_other_language',
            'mutterundkind' => 'mother_and_child',
            'beratungsschein' => 'consulting_agreement',
            'pndberatunglang' => 'pnd_languages',
            'pndberatung' => 'pnd_consultings',
        ));

        return array(
            'extendedMapNames' => $mapNames,
        );
    }
}