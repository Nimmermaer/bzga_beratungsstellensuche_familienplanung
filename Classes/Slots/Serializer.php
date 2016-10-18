<?php


namespace BZgA\BzgaBeratungsstellensucheFamilienplanung\Slots;

use BZgA\BzgaBeratungsstellensucheFamilienplanung\Domain\Serializer\Normalizer\ReligionNormalizer;
use BZgA\BzgaBeratungsstellensucheFamilienplanung\Domain\Serializer\Normalizer\PndConsultingNormalizer;

class Serializer
{

    /**
     * @param array $normalizers
     * @return array
     */
    public function additionalNormalizers(array $normalizers = array())
    {
        $normalizers = array_merge($normalizers, array(
            new ReligionNormalizer(),
            new PndConsultingNormalizer(),
        ));

        return array('extendedNormalizers' => $normalizers);
    }

}