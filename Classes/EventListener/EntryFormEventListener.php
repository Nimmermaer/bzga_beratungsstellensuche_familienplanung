<?php

declare(strict_types=1);

/*
 * This file is part of the "bzga_beratungsstellensuche_familienplanung" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Bzga\BzgaBeratungsstellensucheFamilienplanung\EventListener;

use Bzga\BzgaBeratungsstellensuche\Events\Entry\FormActionEvent;
use Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Repository\ReligionRepository;

/**
 * @author Sebastian Schreiber
 */
class EntryFormEventListener
{
    public function __construct(
        protected ReligionRepository $religionRepository)
    {
    }

    public function __invoke(FormActionEvent $event): void
    {
        $religions = $this->religionRepository->findAll();
        $event->setAssignedViewValues(['religions' => $religions,]);
    }
}
