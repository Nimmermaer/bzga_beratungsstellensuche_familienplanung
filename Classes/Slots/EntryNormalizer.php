<?php

declare(strict_types=1);

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
use Bzga\BzgaBeratungsstellensuche\Domain\Serializer\Normalizer\EntryNormalizer as BaseEntryNormalizer;
use Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Repository\PndConsultingRepository;
use Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Repository\ReligionRepository;
use SJBR\StaticInfoTables\Domain\Repository\LanguageRepository;

/**
 * @author Sebastian Schreiber
 */
class EntryNormalizer
{

    /**
     * @var ReligionRepository
     */
    protected $religionRepository;

    /**
     * @var LanguageRepository
     */
    protected $languageRepository;

    /**
     * @var PndConsultingRepository
     */
    protected $pndConsultingRepository;

    public function injectReligionRepository(ReligionRepository $religionRepository): void
    {
        $this->religionRepository = $religionRepository;
    }

    public function injectLanguageRepository(LanguageRepository $languageRepository): void
    {
        $this->languageRepository = $languageRepository;
    }

    public function injectPndConsultingRepository(PndConsultingRepository $pndConsultingRepository): void
    {
        $this->pndConsultingRepository = $pndConsultingRepository;
    }

    public function additionalCallbacks(array $callbacks = []): array
    {
        $callbacks = array_merge($callbacks, [
            'religiousDenomination' => function ($religionInputId) {
                return $this->religionRepository->findOneByExternalId($religionInputId);
            },
            'pndLanguages' => function () {
                return BaseEntryNormalizer::convertToObjectStorage($this->languageRepository, func_get_args(), 'findOneByPndExternalId');
            },
            'pndConsultings' => function () {
                return BaseEntryNormalizer::convertToObjectStorage($this->pndConsultingRepository, func_get_args());
            },
        ]);

        return [
            'extendedCallbacks' => $callbacks,
        ];
    }
}
