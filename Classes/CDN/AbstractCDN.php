<?php
namespace Dagou\JqueryUi\CDN;

use Dagou\JqueryUi\Interfaces\CDN;
use Dagou\JqueryUi\Traits\ExtConf;
use Dagou\JqueryUi\Traits\PageRenderer;
use TYPO3\CMS\Core\SingletonInterface;

abstract class AbstractCDN implements CDN, SingletonInterface {
    use ExtConf, PageRenderer;
    const URL = '';

    /**
     * @param string|NULL $css
     */
    public function loadCss(string $css = NULL) {
        $css = $this->renderCss($css);

        $this->getPageRenderer()->addCssLibrary($css);
    }

    /**
     * @param string|NULL $css
     *
     * @return string
     */
    protected function renderCss(string $css = NULL): string {
        return static::URL.'themes/'.$this->getExtConf('theme').'/'.$this->getCssBuild();
    }

    /**
     * @return string
     */
    protected function getCssBuild(): string {
        return 'jquery-ui.min.css';
    }

    /**
     * @param string|NULL $js
     * @param bool $footer
     */
    public function loadJs(string $js = NULL, bool $footer = TRUE) {
        $js = $this->renderJs($js);

        if ($footer) {
            $this->getPageRenderer()->addJsFooterLibrary('jquery-ui', $js);
        } else {
            $this->getPageRenderer()->addJsLibrary('jquery-ui', $js);
        }
    }

    /**
     * @param string|NULL $js
     *
     * @return string
     */
    protected function renderJs(string $js = NULL): string {
        return static::URL.$this->getJsBuild();
    }

    /**
     * @return string
     */
    protected function getJsBuild(): string {
        return 'jquery-ui.min.js';
    }
}