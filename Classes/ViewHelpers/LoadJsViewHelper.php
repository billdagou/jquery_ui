<?php
namespace Dagou\JqueryUi\ViewHelpers;

use Dagou\JqueryUi\Traits\Asset;
use Dagou\JqueryUi\Traits\PageRenderer;
use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\Core\Environment;

class LoadJsViewHelper extends AbstractLoadViewHelper {
    use Asset, PageRenderer;

    public function initializeArguments() {
        $this->registerArgument('footer', 'boolean', 'Add to footer or not.', FALSE, TRUE);
        $this->registerArgument('js', 'string', 'jQuery UI .JS file path.');
        $this->registerArgument('enableLocale', 'boolean', 'Enable jQuery UI locale.');
        $this->registerArgument('locale', 'string', 'Locale code.');
    }

    public function render() {
        $cdn = $this->getCDN((bool)$this->arguments['js']);

        $cdn->loadJs($this->arguments['js'], $this->arguments['footer']);

        if ($this->arguments['enableLocale']) {
            if ($this->arguments['locale']) {
                $locale = $this->arguments['locale'];
            } else {
                if ($GLOBALS['TYPO3_REQUEST'] instanceof ServerRequestInterface) {
                    /** @var \TYPO3\CMS\Core\Site\Entity\SiteLanguage $siteLanguage */
                    if ($siteLanguage = $GLOBALS['TYPO3_REQUEST']->getAttribute('language')) {
                        $locale = str_replace('_', '-', explode('.', $siteLanguage->getLocale())[0]);
                    }
                }
            }

            if ($locale) {
                $js = $this->getAssetPath('EXT:jquery_ui/Resources/Public/i18n/datepicker-'.$locale.'.js');

                if (file_exists(Environment::getPublicPath().$js)) {
                    if ($this->arguments['footer']) {
                        $this->getPageRenderer()->addJsFooterLibrary('jquery-ui.locale', $js);
                    } else {
                        $this->getPageRenderer()->addJsLibrary('jquery-ui.locale', $js);
                    }
                }
            }
        }
    }
}