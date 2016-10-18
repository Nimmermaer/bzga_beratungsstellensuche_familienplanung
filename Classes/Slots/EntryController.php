<?php

namespace BZgA\BzgaBeratungsstellensucheFamilienplanung\Slots;

class EntryController
{

    /**
     * @var \BZgA\BzgaBeratungsstellensucheFamilienplanung\Domain\Repository\ReligionRepository
     * @inject
     */
    protected $religionRepository;

    /**
     * @var
     */
    protected $pndConsultingRepository;

    /**
     * @param array $variables
     * @return array
     */
    public function listAction(array $variables = array())
    {
        $religions = $this->religionRepository->findAll();


        $variables = array_merge($variables, array(
            'religions' => $religions,
        ));

        return array(
            'extendedVariables' => $variables,
        );
    }

}