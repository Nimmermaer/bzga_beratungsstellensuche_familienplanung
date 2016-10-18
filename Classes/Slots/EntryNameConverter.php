<?php


namespace BZgA\BzgaBeratungsstellensucheFamilienplanung\Slots;


class EntryNameConverter
{

    /**
     * @param array $mapNames
     * @return array
     */
    public function mapNames(array $mapNames = array())
    {
        $mapNames = array_merge($mapNames, array(
            'konfession' => 'religious_denomination',
            'pndberatunglangsons' => 'pnd_other_language',
            'mutterundkind' => 'mother_and_child',
            'beratungsschein' => 'consulting_agreement',
            'pndberatunglang' => 'pnd_languages',
            'pndberatung' => 'pnd_consultings',
        ));

        return array(
            'extendedMapNames' => $mapNames,
        );
    }
}