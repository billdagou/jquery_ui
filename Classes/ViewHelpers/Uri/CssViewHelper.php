<?php
namespace Dagou\JqueryUi\ViewHelpers\Uri;

use Dagou\JqueryUi\Interfaces\Source;
use Dagou\JqueryUi\Source\Local;
use Dagou\JqueryUi\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class CssViewHelper extends AbstractViewHelper {
    public function initializeArguments(): void {
        $this->registerArgument('theme', 'string', 'Theme name');
    }

    /**
     * @return string
     */
    public function render(): string {
        if (is_subclass_of(($className = ExtensionUtility::getSource()), Source::class)) {
            $source = GeneralUtility::makeInstance($className);
        } else {
            $source = GeneralUtility::makeInstance(Local::class);
        }

        return $source->getCss(
            $this->arguments['theme'] ?: GeneralUtility::makeInstance(ExtensionConfiguration::class)->get('jquery_ui', 'theme') ?: 'base'
        );
    }
}