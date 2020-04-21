<?php
namespace Dagou\JqueryUi\ViewHelpers;

use Dagou\JqueryUi\Traits\Asset;
use Dagou\JqueryUi\Traits\PageRenderer;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class I18nViewHelper extends AbstractViewHelper {
    use Asset, PageRenderer;

    public function initializeArguments() {
        $this->registerArgument('footer', 'boolean', 'Add to footer or not.', FALSE, TRUE);
        $this->registerArgument('locale', 'string', 'Locale code.', TRUE);
    }

    public function render() {
        $js = $this->getAssetPath('EXT:jquery_ui/Resources/Public/i18n/datepicker-'.$this->arguments['locale'].'.js');

        if ($this->arguments['footer']) {
            $this->getPageRenderer()->addJsFooterLibrary('jquery-ui.i18', $js);
        } else {
            $this->getPageRenderer()->addJsLibrary('jquery-ui.i18', $js);
        }
    }
}