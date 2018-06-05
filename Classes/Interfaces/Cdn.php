<?php
namespace Dagou\JqueryUi\Interfaces;

interface Cdn {
    const VERSION = '1.12.1';

    /**
     * @param string|NULL $js
     * @param bool $footer
     */
    public function load(string $js = NULL, bool $footer = TRUE);

    /**
     * @param string|NULL $theme
     */
    public function loadTheme(string $theme = NULL);
}