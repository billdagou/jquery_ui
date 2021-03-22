<?php
namespace Dagou\JqueryUi\ViewHelpers;

use Dagou\JqueryUi\Interfaces\Source;
use Dagou\JqueryUi\Source\Local;
use Dagou\JqueryUi\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\ViewHelpers\Asset\ScriptViewHelper;

class LoadJsViewHelper extends ScriptViewHelper {
    public function initializeArguments(): void {
        parent::initializeArguments();

        $this->registerArgument('disableSource', 'boolean', 'Disable Source.', FALSE, FALSE);
        $this->registerArgument('enableLocale', 'boolean', 'Enable jQuery UI locale.');
        $this->registerArgument('locale', 'string', 'Locale code.');
        $this->overrideArgument(
            'identifier',
            'string',
            'Use this identifier within templates to only inject your JS once, even though it is added multiple times.',
            FALSE,
            'jquery_ui'
        );
    }

    /**
     * @return string
     */
    public function render(): string {
        if (!$this->arguments['src']) {
            if (!$this->arguments['disableSource']
                && ($className = ExtensionUtility::getSource())
                && is_subclass_of($className, Source::class)
            ) {
                $source = GeneralUtility::makeInstance($className);
            } else {
                $source = GeneralUtility::makeInstance(Local::class);
            }

            $this->tag->addAttribute('src', $source->getJs());
        }

        return parent::render();
    }
}