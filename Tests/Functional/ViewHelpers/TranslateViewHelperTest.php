<?php

namespace Bzga\BzgaBeratungsstellensucheFamilienplanung\Tests\Functional\ViewHelpers;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

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
    protected $testExtensionsToLoad = ['typo3conf/ext/bzga_beratungsstellensuche_familienplanung', 'typo3conf/ext/bzga_beratungsstellensuche', 'typo3conf/ext/static_info_tables'];

    /**
     * @test
     */
    public function translateFromDefaultExtension(): void
    {
        $this->assertSame('Konfession', LocalizationUtility::translate('religions-form-label', 'bzga_beratungsstellensuche'));
    }
}
