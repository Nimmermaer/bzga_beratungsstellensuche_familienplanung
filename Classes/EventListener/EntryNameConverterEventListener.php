<?php

declare(strict_types=1);

/*
 * This file is part of the "bzga_beratungsstellensuche_familienplanung" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Bzga\BzgaBeratungsstellensucheFamilienplanung\EventListener;

use Bzga\BzgaBeratungsstellensuche\Events\Converter\EntryEvent;

/**
 * @author Sebastian Schreiber
 */
class EntryNameConverterEventListener
{


    public function __invoke(EntryEvent $event): void
    {
        $mapNames = array_merge($event->getMapNames(), [
            'konfession' => 'religious_denomination',
            'pndberatunglangsons' => 'pnd_other_language',
            'mutterundkind' => 'mother_and_child',
            'kostenuebernahmeverhuetung' => 'contraceptive_costs',
            'beratungsschein' => 'consulting_agreement',
            'pndberatunglang' => 'pnd_languages',
            'pndberatung' => 'pnd_consultings',
        ]);

        $event->setNewMapNames($mapNames);
    }
}
