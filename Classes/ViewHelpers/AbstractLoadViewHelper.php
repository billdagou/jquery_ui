<?php
namespace Dagou\JqueryUi\ViewHelpers;

use Dagou\JqueryUi\Cdn\Customization;
use Dagou\JqueryUi\Cdn\Local;
use Dagou\JqueryUi\Interfaces\Cdn;
use Dagou\JqueryUi\Traits\ExtConf;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

abstract class AbstractLoadViewHelper extends AbstractViewHelper {
    use ExtConf;
    /**
     * @param bool $isCustomized
     *
     * @return \Dagou\JqueryUi\Interfaces\Cdn
     */
    protected function getCdn(bool $isCustomized) {
        if ($isCustomized) {
            return GeneralUtility::makeInstance(Customization::class);
        }

        if (($cdnClassName = $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['jquery_ui']['CDN'][$this->getExtConf()['cdn']])) {
            $cdn = GeneralUtility::makeInstance($cdnClassName);

            return $cdn instanceof Cdn ? $cdn : GeneralUtility::makeInstance(Local::class);
        } else {
            return GeneralUtility::makeInstance(Local::class);
        }
    }
}