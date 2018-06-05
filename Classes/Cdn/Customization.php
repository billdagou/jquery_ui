<?php
namespace Dagou\JqueryUi\Cdn;

use Dagou\JqueryUi\Traits\Asset;

class Customization extends AbstractCdn {
    use Asset;

    /**
     * @param string|NULL $js
     * @param bool $footer
     */
    public function load(string $js = NULL, bool $footer = TRUE) {
        if ($js !== NULL) {
            parent::load($this->getAssetPath($js), $footer);
        }
    }

    /**
     * @param string|NULL $theme
     */
    public function loadTheme(string $theme = NULL) {
        if ($theme !== NULL) {
            parent::loadTheme($this->getAssetPath($theme));
        }
    }
}