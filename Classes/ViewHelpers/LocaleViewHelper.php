<?php
namespace Dagou\JqueryUi\ViewHelpers;

use Dagou\JqueryUi\Interfaces\Source;
use Dagou\JqueryUi\Source\Local;
use Dagou\JqueryUi\Utility\ExtensionUtility;
use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\ViewHelpers\Asset\ScriptViewHelper;

class LocaleViewHelper extends ScriptViewHelper {
    public function initializeArguments(): void {
        parent::initializeArguments();

        $this->registerArgument('locale', 'string', 'Locale code.');
        $this->registerArgument('plugin', 'string', 'Plugin name.');
        $this->registerArgument('disableSource', 'boolean', 'Disable Source.');

        $this->overrideArgument(
            'identifier',
            'string',
            'Use this identifier within templates to only inject your JS once, even though it is added multiple times.',
            FALSE,
            'jquery_ui.locale'
        );
    }

    /**
     * @return string
     */
    public function render(): string {
        if ($this->arguments['locale']) {
            $locale = $this->arguments['locale'];
        } else {
            if ($GLOBALS['TYPO3_REQUEST'] instanceof ServerRequestInterface) {
                /** @var \TYPO3\CMS\Core\Site\Entity\SiteLanguage $siteLanguage */
                if ($siteLanguage = $GLOBALS['TYPO3_REQUEST']->getAttribute('language')) {
                    $locale = str_replace(
                        '_',
                        '-',
                        explode('.', $siteLanguage->getLocale())[0]
                    );
                }
            }
        }

        if ($locale === NULL) {
            $locale = 'en-GB';
        }

        $plugin = $this->arguments['plugin'] ?? 'datepicker';

        if (!$this->arguments['src']) {
            if (!$this->arguments['disableSource']
                && is_subclass_of(($className = ExtensionUtility::getSource()), Source::class)
            ) {
                $source = GeneralUtility::makeInstance($className);
            } else {
                $source = GeneralUtility::makeInstance(Local::class);
            }

            $this->tag->addAttribute('src', $source->getLocale($plugin, $locale));
        }

        $this->arguments['identifier'] .= '.'.$plugin;

        return parent::render();
    }
}