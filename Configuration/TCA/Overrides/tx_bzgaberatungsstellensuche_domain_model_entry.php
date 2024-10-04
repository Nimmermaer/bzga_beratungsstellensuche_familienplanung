<?php

/*
 * This file is part of the "bzga_beratungsstellensuche_familienplanung" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

defined('TYPO3') || die('Access denied.');

$fields = [
    'mother_and_child' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:bzga_beratungsstellensuche_familienplanung/Resources/Private/Language/locallang_db.xlf:tx_bzgaberatungsstellensuche_domain_model_entry.mother_and_child',
        'config' => [
            'type' => 'check',
        ],
    ],
    'contraceptive_costs' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:bzga_beratungsstellensuche_familienplanung/Resources/Private/Language/locallang_db.xlf:tx_bzgaberatungsstellensuche_domain_model_entry.contraceptive_costs',
        'config' => [
            'type' => 'check',
        ],
    ],
    'consulting_agreement' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:bzga_beratungsstellensuche_familienplanung/Resources/Private/Language/locallang_db.xlf:tx_bzgaberatungsstellensuche_domain_model_entry.consulting_agreement',
        'config' => [
            'type' => 'check',
        ],
    ],
    'religious_denomination' => [
        'exclude' => 0,
        'label' => 'LLL:EXT:bzga_beratungsstellensuche_familienplanung/Resources/Private/Language/locallang_db.xlf:tx_bzgaberatungsstellensuche_domain_model_entry.religious_denomination',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['label' => '', 'value' => 0],
            ],
            'foreign_table' => 'tx_bzgaberatungsstellensuche_domain_model_religion',
            'minitems' => 0,
            'maxitems' => 1,
        ],
    ],
    'pnd_consultings' => [
        'exclude' => 0,
        'label' => 'LLL:EXT:bzga_beratungsstellensuche_familienplanung/Resources/Private/Language/locallang_db.xlf:tx_bzgaberatungsstellensuche_domain_model_entry.pnd_consultings',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'allowed' => 'tx_bzgaberatungsstellensuche_domain_model_pndconsulting',
            'foreign_table' => 'tx_bzgaberatungsstellensuche_domain_model_pndconsulting',
            'foreign_table_where' => 'ORDER BY tx_bzgaberatungsstellensuche_domain_model_pndconsulting.title',
            'size' => 10,
            'minitems' => 0,
            'maxitems' => 100,
            'MM' => 'tx_bzgaberatungsstellensuche_entry_pndconsulting_mm',
            'wizards' => [
                '_PADDING' => 0,
                '_VERTICAL' => 1,
            ],
        ],
    ],
    'pnd_other_language' => [
        'exclude' => 0,
        'label' => 'LLL:EXT:bzga_beratungsstellensuche_familienplanung/Resources/Private/Language/locallang_db.xlf:tx_bzgaberatungsstellensuche_domain_model_entry.pnd_other_language',
        'config' => [
            'type' => 'input',
            'size' => 30,
            'eval' => 'trim',
        ],
    ],
    'pnd_languages' => [
        'exclude' => 0,
        'label' => 'LLL:EXT:bzga_beratungsstellensuche_familienplanung/Resources/Private/Language/locallang_db.xlf:tx_bzgaberatungsstellensuche_domain_model_entry.pnd_languages',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'allowed' => 'static_languages',
            'foreign_table' => 'static_languages',
            'size' => 10,
            'minitems' => 0,
            'maxitems' => 100,
            'MM' => 'tx_bzgaberatungsstellensuche_entry_pnd_language_mm',
            'wizards' => [
                '_PADDING' => 0,
                '_VERTICAL' => 1,
            ],
        ],
    ],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    'tx_bzgaberatungsstellensuche_domain_model_entry',
    $fields
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'tx_bzgaberatungsstellensuche_domain_model_entry',
    implode(',', array_keys($fields)),
    '',
    'after:categories'
);
