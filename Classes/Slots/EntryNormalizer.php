<?php


namespace BZgA\BzgaBeratungsstellensucheFamilienplanung\Slots;

use \BZgA\BzgaBeratungsstellensuche\Domain\Serializer\Normalizer\EntryNormalizer as BaseEntryNormalizer;

class EntryNormalizer
{

    /**
     * @var \BZgA\BzgaBeratungsstellensucheFamilienplanung\Domain\Repository\ReligionRepository
     * @inject
     */
    protected $religionRepository;

    /**
     * @var \SJBR\StaticInfoTables\Domain\Repository\LanguageRepository
     * @inject
     */
    protected $languageRepository;

    /**
     * @var \BZgA\BzgaBeratungsstellensucheFamilienplanung\Domain\Repository\PndConsultingRepository
     * @inject
     */
    protected $pndConsultingRepository;

    /**
     * @param array $callbacks
     * @return array
     */
    public function additionalCallbacks(array $callbacks = array())
    {
        $callbacks = array_merge($callbacks, array(
            'religiousDenomination' => function ($religionInputId) {
                return $this->religionRepository->findOneByExternalId($religionInputId);
            },
            'pndLanguages' => function () {
                return BaseEntryNormalizer::convertToObjectStorage($this->languageRepository, func_get_args(), 'findOneByPndExternalId');
            },
            'pndConsultings' => function () {
                return BaseEntryNormalizer::convertToObjectStorage($this->pndConsultingRepository, func_get_args());
            },
        ));

        return array(
            'extendedCallbacks' => $callbacks,
        );
    }

}