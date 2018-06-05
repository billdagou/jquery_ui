<?php
namespace Dagou\JqueryUi\ViewHelpers;

class LoadViewHelper extends AbstractLoadViewHelper {
    public function initializeArguments() {
        $this->registerArgument('js', 'string', 'jQuery UI file path.');
        $this->registerArgument('footer', 'boolean', 'Add to footer or not.', FALSE, TRUE);
    }

    public function render() {
        $cdn = $this->getCdn((bool)$this->arguments['js']);

        $cdn->load($this->arguments['js'], $this->arguments['footer']);
    }
}