<?php

namespace BZgA\BzgaBeratungsstellensucheFamilienplanung\Domain\Model;


class Entry extends \BZgA\BzgaBeratungsstellensuche\Domain\Model\Entry
{


    /**
     * Konfession.
     *
     * @var \BZgA\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Religion
     */
    protected $religiousDenomination;

    /**
     * @var bool
     */
    protected $motherAndChild = false;

    /**
     * @var bool
     */
    protected $consultingAgreement = false;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SJBR\StaticInfoTables\Domain\Model\Language>
     */
    protected $pndLanguages;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\BZgA\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\PndConsulting>
     */
    protected $pndConsultings;

    /**
     * @var string
     */
    protected $pndOtherLanguage;

    /**
     * @var string
     */
    protected $pndAllLanguages = null;


    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SJBR\StaticInfoTables\Domain\Model\Language>
     */
    public function getPndLanguages()
    {
        return $this->pndLanguages;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SJBR\StaticInfoTables\Domain\Model\Language> $pndLanguages
     */
    public function setPndLanguages($pndLanguages)
    {
        $this->pndLanguages = $pndLanguages;
    }

    /**
     * @param \SJBR\StaticInfoTables\Domain\Model\Language $language
     */
    public function attachPndLanguage(\SJBR\StaticInfoTables\Domain\Model\Language $language)
    {
        $this->pndLanguages->attach($language);
    }

    /**
     * @param \SJBR\StaticInfoTables\Domain\Model\Language $language
     */
    public function detachPndLanguage(\SJBR\StaticInfoTables\Domain\Model\Language $language)
    {
        $this->pndLanguages->detach($language);
    }

    /**
     * @return string
     */
    public function getPndOtherLanguage()
    {
        return $this->pndOtherLanguage;
    }

    /**
     * @param string $pndOtherLanguage
     */
    public function setPndOtherLanguage($pndOtherLanguage)
    {
        $this->pndOtherLanguage = $pndOtherLanguage;
    }

    /**
     * @return string
     */
    public function getPndAllLanguages()
    {
        if (null === $this->pndAllLanguages) {
            if ($this->pndLanguages || $this->pndOtherLanguage) {
                $allLanguages = array();
                foreach ($this->pndLanguages as $pndLanguage) {
                    /* @var $pndLanguage \SJBR\StaticInfoTables\Domain\Model\Language */
                    $allLanguages[] = $pndLanguage->getNameLocalized();
                }
                if ($this->pndOtherLanguage) {
                    $otherLanguages = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $this->pndOtherLanguage);
                    foreach ($otherLanguages as $otherLanguage) {
                        $allLanguages[] = $otherLanguage;
                    }
                }
                sort($allLanguages);
                $this->pndAllLanguages = implode(', ', $allLanguages);
            } else {
                $this->pndAllLanguages = '';
            }
        }

        return $this->pndAllLanguages;
    }

    /**
     * Returns the religiousDenomination.
     * @return \BZgA\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Religion $religiousDenomination
     */
    public function getReligiousDenomination()
    {
        return $this->religiousDenomination;
    }

    /**
     * Sets the religiousDenomination.
     *
     * @param \BZgA\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Religion $religiousDenomination
     */
    public function setReligiousDenomination(
        \BZgA\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Religion $religiousDenomination
    ) {
        $this->religiousDenomination = $religiousDenomination;
    }


    /**
     * @return bool
     */
    public function getMotherAndChild()
    {
        return $this->motherAndChild;
    }

    /**
     * @param bool $motherAndChild
     */
    public function setMotherAndChild($motherAndChild)
    {
        $this->motherAndChild = (boolean)$motherAndChild;
    }

    /**
     * @return bool
     */
    public function getConsultingAgreement()
    {
        return (boolean)$this->consultingAgreement;
    }

    /**
     * @param bool $consultingAgreement
     */
    public function setConsultingAgreement($consultingAgreement)
    {
        $this->consultingAgreement = (boolean)$consultingAgreement;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getPndConsultings()
    {
        return $this->pndConsultings;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $pndConsultings
     */
    public function setPndConsultings($pndConsultings)
    {
        $this->pndConsultings = $pndConsultings;
    }


}