<?php


if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\BZgA\BzgaBeratungsstellensuche\Utility\ExtensionManagementUtility::registerExtensionKey($_EXTKEY, 60);

# Template layout configuration
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:bzga_beratungsstellensuche_familienplanung/Configuration/TSconfig/Beratungsstellensuche.txt">');

/** @var \TYPO3\CMS\Extbase\SignalSlot\Dispatcher $signalSlotDispatcher */
$signalSlotDispatcher = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\SignalSlot\Dispatcher::class);

// Extend name converter
$signalSlotDispatcher->connect(
    \BZgA\BzgaBeratungsstellensuche\Domain\Serializer\NameConverter\EntryNameConverter::class,
    \BZgA\BzgaBeratungsstellensuche\Events::SIGNAL_MAP_NAMES,
    \BZgA\BzgaBeratungsstellensucheFamilienplanung\Slots\EntryNameConverter::class,
    'mapNames'
);

$signalSlotDispatcher->connect(
    \BZgA\BzgaBeratungsstellensuche\Domain\Serializer\Normalizer\EntryNormalizer::class,
    \BZgA\BzgaBeratungsstellensuche\Events::DENORMALIZE_CALLBACKS_SIGNAL,
    \BZgA\BzgaBeratungsstellensucheFamilienplanung\Slots\EntryNormalizer::class,
    'additionalCallbacks'
);

// Extend Importer
$signalSlotDispatcher->connect(
    \Bzga\BzgaBeratungsstellensuche\Service\Importer\XmlImporter::class,
    \BZgA\BzgaBeratungsstellensuche\Events::PRE_IMPORT_SIGNAL,
    \BZgA\BzgaBeratungsstellensucheFamilienplanung\Slots\Importer::class,
    'preImport'
);

// Extend list view
$signalSlotDispatcher->connect(
    \BZgA\BzgaBeratungsstellensuche\Controller\EntryController::class,
    \BZgA\BzgaBeratungsstellensuche\Events::LIST_ACTION_SIGNAL,
    \BZgA\BzgaBeratungsstellensucheFamilienplanung\Slots\EntryController::class,
    'listAction'
);

// Extend form view
$signalSlotDispatcher->connect(
    \BZgA\BzgaBeratungsstellensuche\Controller\EntryController::class,
    \BZgA\BzgaBeratungsstellensuche\Events::FORM_ACTION_SIGNAL,
    \BZgA\BzgaBeratungsstellensucheFamilienplanung\Slots\EntryController::class,
    'listAction'
);

$signalSlotDispatcher->connect(
    \BZgA\BzgaBeratungsstellensuche\Domain\Repository\EntryRepository::class,
    \BZgA\BzgaBeratungsstellensuche\Events::TABLE_TRUNCATE_ALL_SIGNAL,
    \BZgA\BzgaBeratungsstellensucheFamilienplanung\Slots\EntryRepository::class,
    'truncate'
);


// Extend the demand query
$GLOBALS['TYPO3_CONF_VARS']['EXT']['bzga_beratungsstellensuche']['Domain/Repository/EntryRepository.php']['findDemanded'][]
    = 'EXT:bzga_beratungsstellensuche_essstoerungen/Classes/Hooks/EntryRepository.php:BZgA\\BzgaBeratungsstellensucheFamilienplanung\\Hooks\\EntryRepository->modify';

# Extend the form fields in flexforms
$fields = array(
    array(
        'LLL:EXT:bzga_beratungsstellensuche_familienplanung/Resources/Private/Language/locallang_be.xlf:flexforms_additional.formFields.religion',
        'religion',
    ),
    array(
        'LLL:EXT:bzga_beratungsstellensuche_familienplanung/Resources/Private/Language/locallang_be.xlf:flexforms_additional.formFields.consultingAgreement',
        'consultingAgreement',
    ),
    array(
        'LLL:EXT:bzga_beratungsstellensuche_familienplanung/Resources/Private/Language/locallang_be.xlf:flexforms_additional.formFields.pndConsultingAgreement',
        'pndConsultingAgreement',
    ),
    array(
        'LLL:EXT:bzga_beratungsstellensuche_familienplanung/Resources/Private/Language/locallang_be.xlf:flexforms_additional.formFields.motherAndChild',
        'motherAndChild',
    ),
);
\BZgA\BzgaBeratungsstellensuche\Utility\ExtensionManagementUtility::addAdditionalFormFields($fields);