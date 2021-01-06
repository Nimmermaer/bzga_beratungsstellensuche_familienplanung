<?php

declare(strict_types=1);

/*
 * This file is part of the "bzga_beratungsstellensuche_familienplanung" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Bzga\BzgaBeratungsstellensucheFamilienplanung\Slots;

use Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Repository\ReligionRepository;

/**
 * @author Sebastian Schreiber
 */
class EntryController
{

    /**
     * @var ReligionRepository
     */
    protected $religionRepository;

    public function injectReligionRepository(ReligionRepository $religionRepository): void
    {
        $this->religionRepository = $religionRepository;
    }

    public function listAction(array $variables = []): array
    {
        $religions = $this->religionRepository->findAll();

        $variables = array_merge($variables, [
            'religions' => $religions,
        ]);

        return [
            'extendedVariables' => $variables,
        ];
    }
}
