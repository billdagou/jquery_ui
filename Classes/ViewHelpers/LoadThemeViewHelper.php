<?php
namespace Dagou\JqueryUi\ViewHelpers;

class LoadThemeViewHelper extends AbstractLoadViewHelper {
    public function initializeArguments() {
        $this->registerArgument('theme', 'string', 'jQuery UI theme path.');
    }

    public function render() {
        $cdn = $this->getCdn((bool)$this->arguments['theme']);

        $cdn->loadTheme($this->arguments['theme']);
    }
}