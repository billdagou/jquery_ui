<?php
namespace Dagou\JqueryUi\ViewHelpers;

use Dagou\JqueryUi\CDN\Customization;
use Dagou\JqueryUi\CDN\Local;
use Dagou\JqueryUi\Interfaces\CDN;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

abstract class AbstractLoadViewHelper extends AbstractViewHelper {
    /**
     * @param bool $isCustomized
     *
     * @return \Dagou\JqueryUi\Interfaces\CDN
     */
    protected function getCDN(bool $isCustomized): CDN {
        if ($isCustomized) {
            return GeneralUtility::makeInstance(Customization::class);
        }

        if (($className = $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['jquery_ui']['CDN']) && is_subclass_of($className, CDN::class)) {
            return GeneralUtility::makeInstance($className);
        } else {
            return GeneralUtility::makeInstance(Local::class);
        }
    }
}