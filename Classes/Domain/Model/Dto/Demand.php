<?php


namespace BZgA\BzgaBeratungsstellensuche\Domain\Model\Dto;


class Demand
{

    /**
     * @var \BZgA\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Religion
     */
    protected $religion;

    /**
     * @var boolean
     */
    protected $motherAndChild = false;

    /**
     * @var boolean
     */
    protected $consultingAgreement = false;

    /**
     * @var boolean
     */
    protected $pndConsulting;

    /**
     * @return \BZgA\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Religion
     */
    public function getReligion()
    {
        return $this->religion;
    }

    /**
     * @param \BZgA\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Religion $religion
     */
    public function setReligion($religion)
    {
        $this->religion = $religion;
    }

    /**
     * @return boolean
     */
    public function isMotherAndChild()
    {
        return $this->motherAndChild;
    }

    /**
     * @param boolean $motherAndChild
     */
    public function setMotherAndChild($motherAndChild)
    {
        $this->motherAndChild = $motherAndChild;
    }

    /**
     * @return boolean
     */
    public function isConsultingAgreement()
    {
        return $this->consultingAgreement;
    }

    /**
     * @param boolean $consultingAgreement
     */
    public function setConsultingAgreement($consultingAgreement)
    {
        $this->consultingAgreement = $consultingAgreement;
    }

    /**
     * @return boolean
     */
    public function isPndConsulting()
    {
        return $this->pndConsulting;
    }

    /**
     * @param boolean $pndConsulting
     */
    public function setPndConsulting($pndConsulting)
    {
        $this->pndConsulting = $pndConsulting;
    }

}