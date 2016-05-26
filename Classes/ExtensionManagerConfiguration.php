<?php
namespace Dagou\JqueryUi;

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class ExtensionManagerConfiguration {
	/**
	 * @param array $params
	 * @param \TYPO3\CMS\Extensionmanager\ViewHelpers\Form\TypoScriptConstantsViewHelper $typoScriptConstantsViewHelper
	 * @return string
	 */
	public function renderCDNSelector(array $params, \TYPO3\CMS\Extensionmanager\ViewHelpers\Form\TypoScriptConstantsViewHelper $typoScriptConstantsViewHelper) {
		$selector = '<select id="em-'.$params['propertyName'].'" class="form-control" name="'.$params['fieldName'].'">';

		foreach ($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['jquery_ui']['CDN'] as $cdn => $_) {
			$selector .= '<option value="'.htmlspecialchars($cdn).'"'.($params['fieldValue'] == $cdn ? ' selected="selected"' : '').'>'.$GLOBALS['LANG']->sL($cdn, TRUE).'</option>';
		}

		$selector .= '</select>';

		return $selector;
	}

	/**
	 * @param array $params
	 * @param \TYPO3\CMS\Extensionmanager\ViewHelpers\Form\TypoScriptConstantsViewHelper $typoScriptConstantsViewHelper
	 * @return string
	 */
	public function renderThemeSelector(array $params, \TYPO3\CMS\Extensionmanager\ViewHelpers\Form\TypoScriptConstantsViewHelper $typoScriptConstantsViewHelper) {
		$selector = '<select id="em-'.$params['propertyName'].'" class="form-control" name="'.$params['fieldName'].'">';

		$themes = GeneralUtility::get_dirs(ExtensionManagementUtility::extPath('jquery_ui').'Resources/Public/themes');

		foreach ($themes as $theme) {
			$selector .= '<option value="'.htmlspecialchars($theme).'"'.($params[fieldValue] == $theme ? ' selected="selected"' : '').'>'.$GLOBALS['LANG']->sL(ucwords(str_replace(['_', '-'], ' ', $theme)), TRUE).'</option>';
		}

		$selector .= '</select>';

		return $selector;
	}
}