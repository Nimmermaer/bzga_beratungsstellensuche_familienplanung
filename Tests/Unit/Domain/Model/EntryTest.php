<?php


namespace Bzga\BzgaBeratungsstellensucheFamilienplanung\Tests\Unit\Domain\Model;

/**
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
        $frenchLanguage->expects($this->once())->method('getNameLocalized')->willReturn($french);
        $englishLanguage = $this->getMockBuilder(Language::class)->getMock();
        $englishLanguage->expects($this->once())->method('getNameLocalized')->willReturn($english);

        $languages = new ObjectStorage();
        $languages->attach($frenchLanguage);
        $languages->attach($englishLanguage);
        $this->subject->setPndLanguages($languages);
        $this->subject->setPndOtherLanguage($whatever);

        $this->assertSame(implode(', ', [$english, $french, $whatever]), $this->subject->getPndAllLanguages());
    }
}
