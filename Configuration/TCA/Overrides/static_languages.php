<?php

/*
 * This file is part of the "bzga_beratungsstellensuche_familienplanung" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

defined('TYPO3_MODE') || die('Access denied.');

$additionalFields = [
    'lg_name_en' => 'pnd_external_id',
];

\Bzga\BzgaBeratungsstellensuche\Utility\ExtensionManagementUtility::addAdditionalFieldsToTable(
    $additionalFields,
    'static_languages'
);

unset($additionalFields);
