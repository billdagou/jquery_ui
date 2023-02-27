<?php
namespace Dagou\JqueryUi\Interfaces;

interface Source {
    /**
     * @param string $theme
     *
     * @return string
     */
    public function getCss(string $theme): string;

    /**
     * @return string
     */
    public function getJs(): string;

    /**
     * @param string $plugin
     * @param string $locale
     *
     * @return string
     */
    public function getLocale(string $plugin, string $locale): string;
}