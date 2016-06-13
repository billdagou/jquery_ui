<?php
namespace Dagou\JqueryUi\ViewHelpers;

use Dagou\JqueryUi\Utility\JqueryUiUtility;

class LoadViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {
	/**
	 * {@inheritDoc}
	 * @see \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper::initializeArguments()
	 */
	public function initializeArguments() {
		$this->registerArgument('css', 'string', 'Customized jQuery UI theme.');
		$this->registerArgument('footer', 'boolean', 'Add to footer or not.', FALSE, TRUE);
		$this->registerArgument('js', 'string', 'Customized jQuery UI library.');
	}

	public function render() {
		JqueryUiUtility::loadJqueryUi($this->arguments['js'], $this->arguments['css'], $this->arguments['footer']);
	}
}