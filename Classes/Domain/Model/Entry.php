<?php

/*
 * This file is part of the "bzga_beratungsstellensuche_familienplanung" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Model;

/**
 * @author Sebastian Schreiber
 */
class Entry extends \Bzga\BzgaBeratungsstellensuche\Domain\Model\Entry
{

    /**
     * @var \Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Religion
     */
    protected $religiousDenomination;

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
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SJBR\StaticInfoTables\Domain\Model\Language>
     */
    protected $pndLanguages;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\PndConsulting>
     */
    protected $pndConsultings;

    /**
     * @var string
     */
    protected $pndOtherLanguage = '';

    /**
     * @var string
     */
    protected $pndAllLanguages;

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

    public function getPndOtherLanguage(): string
    {
        return $this->pndOtherLanguage;
    }

    /**
     * @param string $pndOtherLanguage
     */
    public function setPndOtherLanguage($pndOtherLanguage): void
    {
        $this->pndOtherLanguage = $pndOtherLanguage;
    }

    public function getPndAllLanguages(): string
    {
        if (null === $this->pndAllLanguages) {
            if ($this->pndLanguages || $this->pndOtherLanguage) {
                $allLanguages = [];
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
     * @return \Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Religion $religiousDenomination
     */
    public function getReligiousDenomination()
    {
        return $this->religiousDenomination;
    }

    /**
     * @param \Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Religion $religiousDenomination
     */
    public function setReligiousDenomination(
        \Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Religion $religiousDenomination
    ) {
        $this->religiousDenomination = $religiousDenomination;
    }

    public function getMotherAndChild(): bool
    {
        return $this->motherAndChild;
    }

    /**
     * @param bool $motherAndChild
     */
    public function setMotherAndChild($motherAndChild): void
    {
        $this->motherAndChild = (bool)$motherAndChild;
    }

    public function getContraceptiveCosts(): bool
    {
        return $this->contraceptiveCosts;
    }

    /**
     * @param bool $contraceptiveCosts
     */
    public function setContraceptiveCosts($contraceptiveCosts): void
    {
        $this->contraceptiveCosts = (bool)$contraceptiveCosts;
    }

    public function getConsultingAgreement(): bool
    {
        return (boolean)$this->consultingAgreement;
    }

    /**
     * @param bool $consultingAgreement
     */
    public function setConsultingAgreement($consultingAgreement): void
    {
        $this->consultingAgreement = (bool)$consultingAgreement;
    }

    public function getPndConsultings(): ?\TYPO3\CMS\Extbase\Persistence\ObjectStorage
    {
        return $this->pndConsultings;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $pndConsultings
     */
    public function setPndConsultings($pndConsultings): void
    {
        $this->pndConsultings = $pndConsultings;
    }
}
