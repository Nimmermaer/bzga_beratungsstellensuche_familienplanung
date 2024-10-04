<?php

declare(strict_types=1);

/*
 * This file is part of the "bzga_beratungsstellensuche_familienplanung" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Bzga\BzgaBeratungsstellensucheFamilienplanung\EventListener;

use Bzga\BzgaBeratungsstellensuche\Domain\Serializer\Normalizer\EntryNormalizer as BaseEntryNormalizer;
use Bzga\BzgaBeratungsstellensuche\Events\Normalizer\CallbackEvent;
use Bzga\BzgaBeratungsstellensuche\Events\Serializer\NormalizerEvent;
use Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Repository\PndConsultingRepository;
use Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Repository\ReligionRepository;
use Nette\Utils\Callback;
use SJBR\StaticInfoTables\Domain\Repository\LanguageRepository;

/**
 * @author Sebastian Schreiber
 */
class EntryNormalizerEventListener
{

    /**
     * @var ReligionRepository
     */
    protected ReligionRepository $religionRepository;

    /**
     * @var LanguageRepository
     */
    protected LanguageRepository $languageRepository;

    /**
     * @var PndConsultingRepository
     */
    protected PndConsultingRepository $pndConsultingRepository;
    public function __construct(\Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Repository\ReligionRepository $religionRepository, \SJBR\StaticInfoTables\Domain\Repository\LanguageRepository $languageRepository, \Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Repository\PndConsultingRepository $pndConsultingRepository)
    {
        $this->religionRepository = $religionRepository;
        $this->languageRepository = $languageRepository;
        $this->pndConsultingRepository = $pndConsultingRepository;
    }

    public function __invoke(CallbackEvent $event): void
    {
        $callbacks = [
            'religiousDenomination' => function ($religionInputId) {
                return $this->religionRepository->findOneByExternalId($religionInputId);
            },
            'pndLanguages' => function () {
                return BaseEntryNormalizer::convertToObjectStorage($this->languageRepository, func_get_args(), 'findOneByPndExternalId');
            },
            'pndConsultings' => function () {
                return BaseEntryNormalizer::convertToObjectStorage($this->pndConsultingRepository, func_get_args());
            },
        ];
        $event->setCallbacks($callbacks);
    }
}
