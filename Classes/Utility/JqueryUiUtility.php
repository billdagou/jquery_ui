<?php
namespace Dagou\JqueryUi\Utility;

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use Dagou\Jquery\Utility\JqueryUtility;

class JqueryUiUtility {
	/**
	 * @param string $js
	 * @param string $css
	 */
	static public function loadJqueryUi($js = NULL, $css = NULL) {
		JqueryUtility::loadJquery();

		/** @var \TYPO3\CMS\Core\Page\PageRenderer $pageRenderer */
		$pageRenderer = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Page\PageRenderer::class);

		$extConf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['jquery_ui']);
		$siteRelPath = ExtensionManagementUtility::siteRelPath('jquery');

		if ($js) {
			$pageRenderer->addJsLibrary('jquery-ui', $js);
		} else {
			if ($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['jquery_ui']['CDN'][$extConf['cdn']]['js']) {
				$pageRenderer->addJsLibrary('jquery-ui', $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['jquery_ui']['CDN'][$extConf['cdn']]['js']);
			} else {
				$pageRenderer->addJsLibrary('jquery-ui', $siteRelPath.'Resources/Public/JQueryUI/jquery-ui.min.js');
			}
		}

		if ($css) {
			$pageRenderer->addCssLibrary($css);
		} else {
			if ($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['jquery_ui']['CDN'][$extConf['cdn']]['css']) {
				$pageRenderer->addCssLibrary(str_replace('###THEME###', $extConf['theme'], $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['jquery_ui']['CDN'][$extConf['cdn']]['css']));
			} else {
				$pageRenderer->addCssLibrary($siteRelPath.'Resources/Public/themes/'.$extConf['theme'].'/jquery-ui.min.css');
			}
		}
	}
}