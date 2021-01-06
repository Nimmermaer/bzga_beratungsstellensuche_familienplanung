<?php

/*
 * This file is part of the "bzga_beratungsstellensuche_familienplanung" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Dto;

/**
 * @author Sebastian Schreiber
 */
class Demand extends \Bzga\BzgaBeratungsstellensuche\Domain\Model\Dto\Demand
{

    /**
     * @var \Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Religion
     */
    protected $religion;

    /**
     * @var bool
     */
    protected $motherAndChild = false;

    /**
     * @var bool
     */
    protected $contraceptiveCosts = false;

    /**
     * @var bool
     */
    protected $consultingAgreement = false;

    /**
     * @var bool
     */
    protected $pndConsulting = false;

    /**
     * @var bool
     */
    protected $useCoordinates = false;

    public function getReligion(): ?\Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Religion
    {
        return $this->religion;
    }

    public function setReligion(?\Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Religion $religion): void
    {
        $this->religion = $religion;
    }

    public function isMotherAndChild(): bool
    {
        return $this->motherAndChild;
    }

    public function setMotherAndChild(bool $motherAndChild): void
    {
        $this->motherAndChild = $motherAndChild;
    }

    public function isContraceptiveCosts(): bool
    {
        return $this->contraceptiveCosts;
    }

    public function setContraceptiveCosts(bool $contraceptiveCosts): void
    {
        $this->contraceptiveCosts = $contraceptiveCosts;
    }

    public function isConsultingAgreement(): bool
    {
        return $this->consultingAgreement;
    }

    public function setConsultingAgreement(bool $consultingAgreement): void
    {
        $this->consultingAgreement = $consultingAgreement;
    }

    public function isPndConsulting(): bool
    {
        return $this->pndConsulting;
    }

    public function setPndConsulting($pndConsulting): void
    {
        $this->pndConsulting = $pndConsulting;
    }

    public function isUseCoordinates(): bool
    {
        return $this->useCoordinates;
    }

    public function setUseCoordinates(bool $useCoordinates): void
    {
        $this->useCoordinates = $useCoordinates;
    }
}
