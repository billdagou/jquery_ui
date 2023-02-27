<?php
namespace Dagou\JqueryUi\ViewHelpers;

use Dagou\JqueryUi\Interfaces\Source;
use Dagou\JqueryUi\Source\Local;
use Dagou\JqueryUi\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class CssViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\Asset\CssViewHelper {
    public function initializeArguments(): void {
        parent::initializeArguments();

        $this->registerArgument('theme', 'string', 'Theme name');
        $this->registerArgument('disableSource', 'boolean', 'Disable Source.');

        $this->overrideArgument(
            'identifier',
            'string',
            'Use this identifier within templates to only inject your CSS once, even though it is added multiple times.',
            FALSE,
            'jquery_ui'
        );
    }

    /**
     * @return string
     */
    public function render(): string {
        if (!$this->arguments['href']) {
            if ($this->arguments['disableSource'] !== TRUE
                && is_subclass_of(($className = ExtensionUtility::getSource()), Source::class)
            ) {
                $source = GeneralUtility::makeInstance($className);
            } else {
                $source = GeneralUtility::makeInstance(Local::class);
            }

            $theme = $this->arguments['theme'] ?: 'base';

            $this->tag->addAttribute('href', $source->getCss($theme));
        }

        return parent::render();
    }
}