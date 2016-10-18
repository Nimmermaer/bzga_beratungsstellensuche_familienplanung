<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}


$fields = array(
    'mother_and_child' => array(
        'exclude' => 1,
        'label' => 'LLL:EXT:bzga_beratungsstellensuche_familienplanung/Resources/Private/Language/locallang_db.xlf:tx_bzgaberatungsstellensuche_domain_model_entry.mother_and_child',
        'config' => array(
            'type' => 'check',
        ),
    ),
    'consulting_agreement' => array(
        'exclude' => 1,
        'label' => 'LLL:EXT:bzga_beratungsstellensuche_familienplanung/Resources/Private/Language/locallang_db.xlf:tx_bzgaberatungsstellensuche_domain_model_entry.consulting_agreement',
        'config' => array(
            'type' => 'check',
        ),
    ),
    'religious_denomination' => array(
        'exclude' => 0,
        'label' => 'LLL:EXT:bzga_beratungsstellensuche_familienplanung/Resources/Private/Language/locallang_db.xlf:tx_bzgaberatungsstellensuche_domain_model_entry.religious_denomination',
        'config' => array(
            'type' => 'select',
            'items' => array(
                array('', 0),
            ),
            'foreign_table' => 'tx_bzgaberatungsstellensuche_domain_model_religion',
            'minitems' => 0,
            'maxitems' => 1,
        ),
    ),
    'pnd_consultings' => array(
        'exclude' => 0,
        'label' => 'LLL:EXT:bzga_beratungsstellensuche_familienplanung/Resources/Private/Language/locallang_db.xlf:tx_bzgaberatungsstellensuche_domain_model_entry.pnd_consultings',
        'config' => Array(
            'type' => 'select',
            'internal_type' => 'db',
            'allowed' => 'tx_bzgaberatungsstellensuche_domain_model_pndconsulting',
            'foreign_table' => 'tx_bzgaberatungsstellensuche_domain_model_pndconsulting',
            'foreign_table_where' => 'ORDER BY tx_bzgaberatungsstellensuche_domain_model_pndconsulting.title',
            'size' => 10,
            'minitems' => 0,
            'maxitems' => 100,
            'MM' => 'tx_bzgaberatungsstellensuche_entry_pndconsulting_mm',
            'wizards' => Array(
                '_PADDING' => 0,
                '_VERTICAL' => 1,
            ),
        ),
    ),
    'pnd_other_language' => array(
        'exclude' => 0,
        'label' => 'LLL:EXT:bzga_beratungsstellensuche_familienplanung/Resources/Private/Language/locallang_db.xlf:tx_bzgaberatungsstellensuche_domain_model_entry.pnd_other_language',
        'config' => array(
            'type' => 'input',
            'size' => 30,
            'eval' => 'trim',
        ),
    ),
    'pnd_languages' => array(
        'exclude' => 0,
        'label' => 'LLL:EXT:bzga_beratungsstellensuche_familienplanung/Resources/Private/Language/locallang_db.xlf:tx_bzgaberatungsstellensuche_domain_model_entry.pnd_languages',
        'config' => Array(
            'type' => 'select',
            'internal_type' => 'db',
            'allowed' => 'static_languages',
            'foreign_table' => 'static_languages',
            'size' => 10,
            'minitems' => 0,
            'maxitems' => 100,
            'MM' => 'tx_bzgaberatungsstellensuche_entry_pnd_language_mm',
            'wizards' => Array(
                '_PADDING' => 0,
                '_VERTICAL' => 1,
            ),
        ),
    ),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_bzgaberatungsstellensuche_domain_model_entry',
    $fields);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tx_bzgaberatungsstellensuche_domain_model_entry',
    implode(',', array_keys($fields)), '', 'after:categories');
