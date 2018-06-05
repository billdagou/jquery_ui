<?php
namespace Dagou\JqueryUi\Cdn;

class jsDelivr extends AbstractCdn {
    const URL = '//cdn.jsdelivr.net/npm/jquery-ui-dist@'.self::VERSION.'/';

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
            self::URL.$this->getCss()
        );
    }
}