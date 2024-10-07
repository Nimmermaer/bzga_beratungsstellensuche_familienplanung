<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Beratungsstellensuche Familienplanung',
    'description' => 'Beratungsstellensuche der BZgA für den Bereich Familienplanung',
    'category' => 'plugin',
    'author' => 'Sebastian Schreiber',
    'author_email' => 'ssch@hauptweg-nebenwege.de',
    'author_company' => 'Hauptweg Nebenwege GmbH',
    'state' => 'beta',
    'version' => '11.5.0',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.0-12.4.99',
            'bzga_beratungsstellensuche' => '8.7.0-',
        ],
        'conflicts' => [],
    ],
    'autoload' => [
        'psr-4' => ['Bzga\\BzgaBeratungsstellensucheFamilienplanung\\' => 'Classes']
    ],
    'autoload-dev' => [
        'psr-4' => ['Bzga\\BzgaBeratungsstellensucheFamilienplanung\\Tests\\' => 'Tests']
    ],
];
