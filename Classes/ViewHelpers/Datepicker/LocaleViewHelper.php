<?php
namespace Dagou\JqueryUi\ViewHelpers\Datepicker;

use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Fluid\ViewHelpers\Asset\ScriptViewHelper;

class LocaleViewHelper extends ScriptViewHelper {
    public function initializeArguments(): void {
        parent::initializeArguments();

        $this->registerArgument('locale', 'string', 'Locale code.');
        $this->overrideArgument(
            'identifier',
            'string',
            'Use this identifier within templates to only inject your JS once, even though it is added multiple times.',
            FALSE,
            'jquery_ui.datepicker.locale'
        );
    }

    /**
     * @return string
     */
    public function render(): string {
        if (!$this->arguments['src']) {
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

            if ($locale) {
                $this->tag->addAttribute('src', 'EXT:jquery_ui/Resources/Public/i18n/datepicker-'.$locale.'.js');
            }
        }

        return parent::render();
    }
}