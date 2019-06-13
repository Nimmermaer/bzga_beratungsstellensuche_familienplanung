<?php

namespace Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Dto;

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

    /**
     * @return \Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Religion|null
     */
    public function getReligion()
    {
        return $this->religion;
    }

    /**
     * @param \Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Religion|null $religion
     */
    public function setReligion($religion)
    {
        $this->religion = $religion;
    }

    /**
     * @return bool
     */
    public function isMotherAndChild(): bool
    {
        return $this->motherAndChild;
    }

    /**
     * @param bool $motherAndChild
     */
    public function setMotherAndChild(bool $motherAndChild)
    {
        $this->motherAndChild = $motherAndChild;
    }

    /**
     * @return bool
     */
    public function isContraceptiveCosts(): bool
    {
        return $this->contraceptiveCosts;
    }

    /**
     * @param bool $contraceptiveCosts
     */
    public function setContraceptiveCosts(bool $contraceptiveCosts)
    {
        $this->contraceptiveCosts = $contraceptiveCosts;
    }

    /**
     * @return bool
     */
    public function isConsultingAgreement(): bool
    {
        return $this->consultingAgreement;
    }

    /**
     * @param bool $consultingAgreement
     */
    public function setConsultingAgreement(bool $consultingAgreement)
    {
        $this->consultingAgreement = $consultingAgreement;
    }

    /**
     * @return bool
     */
    public function isPndConsulting(): bool
    {
        return $this->pndConsulting;
    }

    /**
     * @param bool $pndConsulting
     */
    public function setPndConsulting($pndConsulting)
    {
        $this->pndConsulting = $pndConsulting;
    }

    /**
     * @return bool
     */
    public function isUseCoordinates(): bool
    {
        return $this->useCoordinates;
    }

    /**
     * @param bool $useCoordinates
     */
    public function setUseCoordinates(bool $useCoordinates)
    {
        $this->useCoordinates = $useCoordinates;
    }
}
