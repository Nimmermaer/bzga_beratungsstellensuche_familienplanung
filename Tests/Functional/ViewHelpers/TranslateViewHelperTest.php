<?php

/*
 * This file is part of the "bzga_beratungsstellensuche_familienplanung" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Bzga\BzgaBeratungsstellensucheFamilienplanung\Tests\Functional\ViewHelpers;

use TYPO3\CMS\Core\Core\Bootstrap;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

class TranslateViewHelperTest extends FunctionalTestCase
{

    /**
     * @var array
     */
    protected $coreExtensionsToLoad = ['extbase', 'fluid'];

    /**
     * @var array
     */
    protected $testExtensionsToLoad = ['packages/bzga_beratungsstellensuche_familienplanung', 'packages/bzga_beratungsstellensuche', 'vendor/sjbr/static-info-tables'];

    protected function setUp(): void
    {
        parent::setUp();
        Bootstrap::initializeLanguageObject();
    }

    /**
     * @test
     */
    public function translateFromDefaultExtension(): void
    {
        self::assertSame('Denomination', LocalizationUtility::translate('religions-form-label', 'BzgaBeratungsstellensuche'));
    }
}
