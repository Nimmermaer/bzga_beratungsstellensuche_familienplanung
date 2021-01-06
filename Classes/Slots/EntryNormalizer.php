<?php

declare(strict_types=1);

/*
 * This file is part of the "bzga_beratungsstellensuche_familienplanung" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Bzga\BzgaBeratungsstellensucheFamilienplanung\Slots;

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
