<?php
defined('TYPO3_MODE') or die();

$additionalFields = array(
    'lg_name_en' => 'pnd_external_id',
);

\BZgA\BzgaBeratungsstellensuche\Utility\ExtensionManagementUtility::addAdditionalFieldsToTable($additionalFields,
    'static_languages');

unset($additionalFields);