<?php
namespace Dagou\JqueryUi\Cdn;

class CDNJS extends AbstractCdn {
    const URL = '//cdnjs.cloudflare.com/ajax/libs/jqueryui/'.self::VERSION.'/';

    /**
     * @param string|NULL $js
     * @param bool $footer
     */
    public function load(string $js = NULL, bool $footer = TRUE) {
        parent::load(
            self::URL.$this->getJs(),
            $footer
        );
    }

    /**
     * @param string|NULL $theme
     */
    public function loadTheme(string $theme = NULL) {
        parent::loadTheme(
            self::URL.'themes/'.$this->getExtConf()['theme'].'/'.$this->getCss()
        );
    }
}