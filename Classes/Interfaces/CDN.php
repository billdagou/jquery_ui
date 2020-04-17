<?php
namespace Dagou\JqueryUi\Interfaces;

interface CDN {
    const VERSION = '1.12.1';

    /**
     * @param string|NULL $css
     */
    public function loadCss(string $css = NULL);

    /**
     * @param string|NULL $js
     * @param bool $footer
     */
    public function loadJs(string $js = NULL, bool $footer = TRUE);
}