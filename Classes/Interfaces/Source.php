<?php
namespace Dagou\JqueryUi\Interfaces;

interface Source {
    const VERSION = '1.12.1';

    /**
     * @return string
     */
    public function getCss(): string;

    /**
     * @return string
     */
    public function getJs(): string;
}