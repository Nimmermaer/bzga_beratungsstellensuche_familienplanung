<?php

namespace BZgA\BzgaBeratungsstellensucheFamilienplanung\Tests\Unit\Hooks;

use BZgA\BzgaBeratungsstellensucheFamilienplanung\Hooks\EntryRepository;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use BZgA\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Dto\Demand;
use BZgA\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Religion;

class EntryRepositoryTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var EntryRepository
     */
    private $subject;

    /**
     * @return void
     */
    protected function setUp()
    {
        $this->subject = new EntryRepository();
    }

    /**
     * @test
     */
    public function modifyReturnsNullNoDemandDefined()
    {
        $this->assertNull($this->subject->modify([]));
    }

    /**
     * @test
     */
    public function modifyReturnNullNoQueryDefined()
    {
        $demand = $this->getMock(Demand::class);
        $params = ['demand' => $demand];
        $this->assertNull($this->subject->modify($params));
    }


    /**
     * @test
     */
    public function modifyAllConstraintsSet()
    {
        $religion = $this->getMock(Religion::class);
        $demand = $this->getMock(Demand::class);
        $query = $this->getMock(QueryInterface::class);
        $query->expects($this->exactly(3))->method('equals')->willReturn(null);

        $params = ['demand' => $demand, 'query' => $query, 'constraints' => []];
        $demand->expects($this->once())->method('isMotherAndChild')->willReturn(true);
        $demand->expects($this->once())->method('isConsultingAgreement')->willReturn(true);
        $demand->expects($this->once())->method('getReligion')->willReturn($religion);
        $demand->expects($this->once())->method('isPndConsulting')->willReturn(true);

        $this->subject->modify($params);
    }

}
