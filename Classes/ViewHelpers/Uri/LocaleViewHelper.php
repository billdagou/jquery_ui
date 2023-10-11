<?php
namespace Dagou\JqueryUi\ViewHelpers\Uri;

use Dagou\JqueryUi\Interfaces\Source;
use Dagou\JqueryUi\Source\Local;
use Dagou\JqueryUi\Utility\ExtensionUtility;
use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class LocaleViewHelper extends AbstractViewHelper {
    public function initializeArguments(): void {
        $this->registerArgument('plugin', 'string', 'Plugin name.', TRUE);
        $this->registerArgument('locale', 'string', 'Locale code.');
    }

    /**
     * @return string
     */
    public function render(): string {
        if ($this->arguments['locale']) {
            $locale = $this->arguments['locale'];
        } elseif ($GLOBALS['TYPO3_REQUEST'] instanceof ServerRequestInterface) {
            /** @var \TYPO3\CMS\Core\Site\Entity\SiteLanguage $siteLanguage */
            if ($siteLanguage = $GLOBALS['TYPO3_REQUEST']->getAttribute('language')) {
                $locale = str_replace(
                    '_',
                    '-',
                    explode('.', $siteLanguage->getLocale())[0]
                );
            }
        }

        if (is_subclass_of(($className = ExtensionUtility::getSource()), Source::class)) {
            $source = GeneralUtility::makeInstance($className);
        } else {
            $source = GeneralUtility::makeInstance(Local::class);
        }

        return $source->getLocale($this->arguments['plugin'], $locale ?? 'en-GB');
    }
}