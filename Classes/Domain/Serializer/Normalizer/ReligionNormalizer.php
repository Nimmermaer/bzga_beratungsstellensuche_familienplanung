<?php


namespace BZgA\BzgaBeratungsstellensucheFamilienplanung\Domain\Serializer\Normalizer;


use BZgA\BzgaBeratungsstellensuche\Domain\Serializer\Normalizer\GetSetMethodNormalizer;
use BZgA\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Religion;
use BZgA\BzgaBeratungsstellensucheFamilienplanung\Domain\Serializer\NameConverter\ReligionNameConverter;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;

class ReligionNormalizer extends GetSetMethodNormalizer
{

    /**
     * ReligionNormalizer constructor.
     * @param null|\Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactoryInterface $classMetadataFactory
     */
    public function __construct(ClassMetadataFactory $classMetadataFactory = null)
    {
        parent::__construct($classMetadataFactory, new ReligionNameConverter());
    }

    /**
     * {@inheritdoc}
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === Religion::class;
    }

}