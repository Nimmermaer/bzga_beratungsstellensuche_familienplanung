<?php


use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/**
 * Class for updating the db
 */
class ext_update
{

    /**
     * Main function, returning the HTML content
     *
     * @return string HTML
     */
    public function main()
    {
        $content = '';
        $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $databaseUpdateUtility = $objectManager->get(DatabaseUpdateUtility::class);
        $databaseUpdateUtility->doUpdate('bzga_beratungsstellensuche');

        $content .= '<p>'.LocalizationUtility::translate('updateLanguageLabels',
                'StaticInfoTables').' bzga_beratungsstellensuche_familienplanung.</p>';

        return $content;
    }

    /**
     * @return bool
     */
    public function access()
    {
        return true;
    }
}