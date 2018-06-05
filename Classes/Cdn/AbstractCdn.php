<?php
namespace Dagou\JqueryUi\Cdn;

use Dagou\JqueryUi\Interfaces\Cdn;
use Dagou\JqueryUi\Traits\ExtConf;
use Dagou\JqueryUi\Traits\PageRenderer;
use TYPO3\CMS\Core\SingletonInterface;

abstract class AbstractCdn implements Cdn, SingletonInterface {
    use ExtConf, PageRenderer;

    /**
     * @param string|NULL $js
     * @param bool $footer
     */
    public function load(string $js = NULL, bool $footer = TRUE) {
        if ($footer) {
            $this->getPageRenderer()->addJsFooterLibrary('jquery_ui', $js);
        } else {
            $this->getPageRenderer()->addJsLibrary('jquery_ui', $js);
        }
    }

    /**
     * @param string|NULL $theme
     */
    public function loadTheme(string $theme = NULL) {
        $this->getPageRenderer()->addCssLibrary($theme);
    }

    /**
     * @return string
     */
    protected function getJs() {
        return 'jquery-ui.min.js';
    }

    /**
     * @return string
     */
    protected function getCss() {
        return 'jquery-ui.min.css';
    }
}