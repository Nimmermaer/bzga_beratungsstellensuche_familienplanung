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
use Bzga\BzgaBeratungsstellensuche\Domain\Serializer\Normalizer\EntryNormalizer as BaseEntryNormalizer;

/**
 * @author Sebastian Schreiber
 */
class EntryNormalizer
{

    /**
     * @var \Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Repository\ReligionRepository
     * @inject
     */
    protected $religionRepository;

    /**
     * @var \SJBR\StaticInfoTables\Domain\Repository\LanguageRepository
     * @inject
     */
    protected $languageRepository;

    /**
     * @var \Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Repository\PndConsultingRepository
     * @inject
     */
    protected $pndConsultingRepository;

    /**
     * @param array $callbacks
     * @return array
     */
    public function additionalCallbacks(array $callbacks = [])
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
