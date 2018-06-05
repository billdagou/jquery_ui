<?php
namespace Dagou\JqueryUi\Utility;

use TYPO3\CMS\Extensionmanager\ViewHelpers\Form\TypoScriptConstantsViewHelper;

class ExtensionManagerConfigurationUtility {
    /**
     * @param array $params
     * @param \TYPO3\CMS\Extensionmanager\ViewHelpers\Form\TypoScriptConstantsViewHelper $typoScriptConstantsViewHelper
     *
     * @return string
     */
    public function buildCdnSelector(array $params, TypoScriptConstantsViewHelper $typoScriptConstantsViewHelper) {
        $selector = '<select id="em-'.$params['propertyName'].'" class="form-control" name="'.$params['fieldName'].'">';
        $selector .= '<option value="">'.$GLOBALS['LANG']->sL('None').'</option>';

        if (count($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['jquery']['CDN'])) {
            ksort($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['jquery']['CDN']);

            foreach ($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['jquery']['CDN'] as $cdn => $_) {
                $selector .= '<option value="'.htmlspecialchars($cdn).'"'.($params['fieldValue'] == $cdn ? ' selected' :
                        '').'>'.$GLOBALS['LANG']->sL($cdn).'</option>';
            }
        }

        $selector .= '</select>';

        return $selector;
    }

    /**
     * @param array $params
     * @param \TYPO3\CMS\Extensionmanager\ViewHelpers\Form\TypoScriptConstantsViewHelper $typoScriptConstantsViewHelper
     *
     * @return string
     */
    public function buildThemeSelector(array $params, TypoScriptConstantsViewHelper $typoScriptConstantsViewHelper) {
        $selector = '<select id="em-'.$params['propertyName'].'" class="form-control" name="'.$params['fieldName'].'">';

        if (count($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['jquery_ui']['Theme'])) {
            ksort($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['jquery_ui']['Theme']);

            foreach ($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['jquery_ui']['Theme'] as $name => $theme) {
                $selector .= '<option value="'.htmlspecialchars($theme).'"'.($params['fieldValue'] == $theme ? ' selected' :
                        '').'>'.$GLOBALS['LANG']->sL($name).'</option>';
            }
        }

        $selector .= '</select>';

        return $selector;
    }
}