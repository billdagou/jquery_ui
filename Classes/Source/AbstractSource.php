<?php
namespace Dagou\JqueryUi\Source;

use Dagou\JqueryUi\Interfaces\Source;
use TYPO3\CMS\Core\SingletonInterface;

abstract class AbstractSource implements Source, SingletonInterface {
    protected const URL = '';
    protected const VERSION = '1.13.2';

    /**
     * @param string $theme
     *
     * @return string
     */
    public function getCss(string $theme): string {
        return static::URL.'themes/'.$this->getCssBuild($theme);
    }

    /**
     * @param string $theme
     *
     * @return string
     */
    protected function getCssBuild(string $theme): string {
        return $theme.'/jquery-ui.min.css';
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

    /**
     * @param string $plugin
     * @param string $locale
     *
     * @return string
     */
    public function getLocale(string $plugin, string $locale): string {
        return static::URL.'i18n/'.$this->getLocaleBuild($plugin, $locale);
    }

    /**
     * @param string $plugin
     * @param string $locale
     *
     * @return string
     */
    protected function getLocaleBuild(string $plugin, string $locale): string {
        return $plugin.'-'.$locale.'.js';
    }
}