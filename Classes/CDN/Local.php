<?php
namespace Dagou\JqueryUi\CDN;

use Dagou\JqueryUi\Traits\Asset;

class Local extends AbstractCDN {
    use Asset;
    const URL = 'EXT:jquery_ui/Resources/Public/';

    /**
     * @param string|NULL $css
     *
     * @return string
     */
    protected function renderCss(string $css = NULL): string {
        return $this->getAssetPath(
            self::URL.'themes/'.$this->getExtConf('theme').'/'.$this->getCssBuild()
        );
    }

    /**
     * @param string|NULL $js
     *
     * @return string
     */
    protected function renderJs(string $js = NULL): string {
        return $this->getAssetPath(
            self::URL.$this->getJsBuild()
        );
    }
}