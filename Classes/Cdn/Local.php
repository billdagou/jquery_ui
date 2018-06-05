<?php
namespace Dagou\JqueryUi\Cdn;

use Dagou\JqueryUi\Traits\Asset;

class Local extends AbstractCdn {
    use Asset;
    const URL = 'EXT:jquery_ui/Resources/Public/';

    /**
     * @param string|NULL $js
     * @param bool $footer
     */
    public function load(string $js = NULL, bool $footer = TRUE) {
        parent::load(
            $this->getAssetPath(
                self::URL.$this->getJs()
            ),
            $footer
        );
    }

    /**
     * @param string|NULL $theme
     */
    public function loadTheme(string $theme = NULL) {
        parent::loadTheme(
            $this->getAssetPath(
                self::URL.'themes/'.$this->getExtConf()['theme'].'/'.$this->getCss()
            )
        );
    }
}