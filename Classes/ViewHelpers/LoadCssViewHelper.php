<?php
namespace Dagou\JqueryUi\ViewHelpers;

class LoadCssViewHelper extends AbstractLoadViewHelper {
    public function initializeArguments() {
        $this->registerArgument('css', 'string', 'jQuery UI .CSS file path.');
    }

    public function render() {
        $cdn = $this->getCDN((bool)$this->arguments['css']);

        $cdn->loadCss($this->arguments['css']);
    }
}