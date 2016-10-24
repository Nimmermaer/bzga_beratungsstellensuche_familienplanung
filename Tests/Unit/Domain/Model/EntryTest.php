<?php


namespace BZgA\BzgaBeratungsstellensucheFamilienplanung\Tests\Unit\Domain\Model;


use BZgA\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Entry;
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
