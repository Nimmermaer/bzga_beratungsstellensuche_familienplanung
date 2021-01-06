<?php

/*
 * This file is part of the "bzga_beratungsstellensuche_familienplanung" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Bzga\BzgaBeratungsstellensucheFamilienplanung\Tests\Unit\Hooks;

use Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Dto\Demand;
use Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Religion;
use Bzga\BzgaBeratungsstellensucheFamilienplanung\Hooks\EntryRepository;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

class EntryRepositoryTest extends UnitTestCase
{

    /**
     * @var EntryRepository
     */
    protected $subject;

    protected function setUp(): void
    {
        $this->subject = new EntryRepository();
    }

    /**
     * @test
     */
    public function modifyAllConstraintsSet(): void
    {
        $religion = $this->getMockBuilder(Religion::class)->getMock();
        $demand = $this->getMockBuilder(Demand::class)->getMock();
        $query = $this->getMockBuilder(QueryInterface::class)->getMock();
        $query->expects(self::exactly(3))->method('equals')->willReturn(null);

        $params = ['demand' => $demand, 'query' => $query, 'constraints' => []];
        $demand->expects(self::once())->method('isMotherAndChild')->willReturn(true);
        $demand->expects(self::once())->method('isConsultingAgreement')->willReturn(true);
        $demand->expects(self::once())->method('getReligion')->willReturn($religion);

        $this->subject->modify($params);
    }
}
