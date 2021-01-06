<?php

declare(strict_types=1);

/*
 * This file is part of the "bzga_beratungsstellensuche_familienplanung" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Bzga\BzgaBeratungsstellensucheFamilienplanung\Slots;

/**
 * @author Sebastian Schreiber
 */
class EntryNameConverter
{
    public function mapNames(array $mapNames = []): array
    {
        $mapNames = array_merge($mapNames, [
            'konfession' => 'religious_denomination',
            'pndberatunglangsons' => 'pnd_other_language',
            'mutterundkind' => 'mother_and_child',
            'kostenuebernahmeverhuetung' => 'contraceptive_costs',
            'beratungsschein' => 'consulting_agreement',
            'pndberatunglang' => 'pnd_languages',
            'pndberatung' => 'pnd_consultings',
        ]);

        return [
            'extendedMapNames' => $mapNames,
        ];
    }
}
