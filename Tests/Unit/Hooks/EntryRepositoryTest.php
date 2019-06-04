<?php

namespace Bzga\BzgaBeratungsstellensucheFamilienplanung\Tests\Unit\Hooks;

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
use Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Dto\Demand;
use Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Religion;
use Bzga\BzgaBeratungsstellensucheFamilienplanung\Hooks\EntryRepository;
use Nimut\TestingFramework\TestCase\UnitTestCase;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;

class EntryRepositoryTest extends UnitTestCase
{

    /**
     * @var EntryRepository
     */
    private $subject;

    /**
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
        $demand = $this->getMockBuilder(Demand::class)->getMock();
        $params = ['demand' => $demand];
        $this->assertNull($this->subject->modify($params));
    }

    /**
     * @test
     */
    public function modifyAllConstraintsSet()
    {
        $religion = $this->getMockBuilder(Religion::class)->getMock();
        $demand = $this->getMockBuilder(Demand::class)->getMock();
        $query = $this->getMockBuilder(QueryInterface::class)->getMock();
        $query->expects($this->exactly(3))->method('equals')->willReturn(null);

        $params = ['demand' => $demand, 'query' => $query, 'constraints' => []];
        $demand->expects($this->once())->method('isMotherAndChild')->willReturn(true);
        $demand->expects($this->once())->method('isConsultingAgreement')->willReturn(true);
        $demand->expects($this->once())->method('getReligion')->willReturn($religion);
        $demand->expects($this->once())->method('isPndConsulting')->willReturn(true);

        $this->subject->modify($params);
    }
}
