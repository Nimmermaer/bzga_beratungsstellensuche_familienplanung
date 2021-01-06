<?php

/*
 * This file is part of the "bzga_beratungsstellensuche_familienplanung" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Bzga\BzgaBeratungsstellensucheFamilienplanung\Tests\Unit\Domain\Model;

use Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Entry;
use SJBR\StaticInfoTables\Domain\Model\Language;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

class EntryTest extends UnitTestCase
{

    /**
     * @var Entry
     */
    protected $subject;

    protected function setUp(): void
    {
        $this->subject = new Entry();
    }

    /**
     * @test
     */
    public function getAllPndLanguages(): void
    {
        $french = 'Französisch';
        $english = 'Englisch';
        $whatever = 'Whatever';

        $frenchLanguage = $this->getMockBuilder(Language::class)->getMock();
        $frenchLanguage->expects(self::once())->method('getNameLocalized')->willReturn($french);
        $englishLanguage = $this->getMockBuilder(Language::class)->getMock();
        $englishLanguage->expects(self::once())->method('getNameLocalized')->willReturn($english);

        $languages = new ObjectStorage();
        $languages->attach($frenchLanguage);
        $languages->attach($englishLanguage);
        $this->subject->setPndLanguages($languages);
        $this->subject->setPndOtherLanguage($whatever);

        self::assertSame(implode(', ', [$english, $french, $whatever]), $this->subject->getPndAllLanguages());
    }
}
