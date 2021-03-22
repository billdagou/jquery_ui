<?php
namespace Dagou\JqueryUi\Source;

use Dagou\JqueryUi\Interfaces\Source;
use Dagou\JqueryUi\Traits\ExtConf;
use TYPO3\CMS\Core\SingletonInterface;

abstract class AbstractSource implements Source, SingletonInterface {
    use ExtConf;

    const URL = '';

    /**
     * @return string
     */
    public function getCss(): string {
        return static::URL.'themes/'.$this->getExtConf('theme').'/'.$this->getCssBuild();
    }

    /**
     * @return string
     */
    protected function getCssBuild(): string {
        return 'jquery-ui.min.css';
    }

    /**
     * @return string
     */
    public function getJs(): string {
        return static::URL.$this->getJsBuild();
    }

    /**
     * @return string
     */
    protected function getJsBuild(): string {
        return 'jquery-ui.min.js';
    }
}