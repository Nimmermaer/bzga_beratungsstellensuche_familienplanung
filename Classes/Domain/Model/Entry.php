<?php

namespace Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Model;

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
class Entry extends \Bzga\BzgaBeratungsstellensuche\Domain\Model\Entry
{

    /**
     * Konfession.
     *
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
     * Returns the religiousDenomination.
     * @return \Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Religion $religiousDenomination
     */
    public function getReligiousDenomination()
    {
        return $this->religiousDenomination;
    }

    /**
     * Sets the religiousDenomination.
     *
     * @param \Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Religion $religiousDenomination
     */
    public function setReligiousDenomination(
        \Bzga\BzgaBeratungsstellensucheFamilienplanung\Domain\Model\Religion $religiousDenomination
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
