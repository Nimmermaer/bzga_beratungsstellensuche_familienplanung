<?php

defined('TYPO3') || die('Access denied.');

call_user_func(function ($packageKey) {
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['EXT:bzga_beratungsstellensuche/Resources/Private/Language/locallang.xlf'][] = 'EXT:bzga_beratungsstellensuche_familienplanung/Resources/Private/Language/locallang.xlf';

    \Bzga\BzgaBeratungsstellensuche\Utility\ExtensionManagementUtility::registerExtensionKey($packageKey, 60);

    // Template layout configuration
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('@import "EXT:bzga_beratungsstellensuche_familienplanung/Configuration/TSconfig/Beratungsstellensuche.tsconfig"');

    // Extend the demand query
    $GLOBALS['TYPO3_CONF_VARS']['EXT']['bzga_beratungsstellensuche']['Domain/Repository/EntryRepository.php']['findDemanded'][] =
        \Bzga\BzgaBeratungsstellensucheFamilienplanung\Hooks\EntryRepository::class . '->modify';

    // Extend the form fields in flexforms
    $fields = [
        [
            'LLL:EXT:bzga_beratungsstellensuche_familienplanung/Resources/Private/Language/locallang_be.xlf:flexforms_additional.formFields.religion',
            'religion',
        ],
        [
            'LLL:EXT:bzga_beratungsstellensuche_familienplanung/Resources/Private/Language/locallang_be.xlf:flexforms_additional.formFields.consultingAgreement',
            'consultingAgreement',
        ],
        [
            'LLL:EXT:bzga_beratungsstellensuche_familienplanung/Resources/Private/Language/locallang_be.xlf:flexforms_additional.formFields.pndConsultingAgreement',
            'pndConsultingAgreement',
        ],
        [
            'LLL:EXT:bzga_beratungsstellensuche_familienplanung/Resources/Private/Language/locallang_be.xlf:flexforms_additional.formFields.motherAndChild',
            'motherAndChild',
        ],
        [
            'LLL:EXT:bzga_beratungsstellensuche_familienplanung/Resources/Private/Language/locallang_be.xlf:flexforms_additional.formFields.contraceptiveCosts',
            'contraceptiveCosts',
        ],
    ];
    \Bzga\BzgaBeratungsstellensuche\Utility\ExtensionManagementUtility::addAdditionalFormFields($fields);

    // Upgrade wizards
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update'][\Bzga\BzgaBeratungsstellensucheFamilienplanung\Updates\ImportLanguagesUpdate::class] = \Bzga\BzgaBeratungsstellensucheFamilienplanung\Updates\ImportLanguagesUpdate::class;

}, 'bzga_beratungsstellensuche_familienplanung');
