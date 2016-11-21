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

class EntryTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Entry
     */
    private $subject;

    /**
     * @return void
     */
    protected function setUp()
    {
        $this->subject = new Entry();
    }

    /**
     * @test
     */
    public function getAllPndLanguages()
    {
        $french = 'Französisch';
        $english = 'Englisch';
        $whatever = 'Whatever';

        $frenchLanguage = $this->getMock(Language::class);
        $frenchLanguage->expects($this->once())->method('getNameLocalized')->willReturn($french);
        $englishLanguage = $this->getMock(Language::class);
        $englishLanguage->expects($this->once())->method('getNameLocalized')->willReturn($english);

        $languages = new ObjectStorage();
        $languages->attach($frenchLanguage);
        $languages->attach($englishLanguage);
        $this->subject->setPndLanguages($languages);
        $this->subject->setPndOtherLanguage($whatever);

        $this->assertSame(implode(', ', [$english, $french, $whatever]), $this->subject->getPndAllLanguages());
    }

}
