<?php
namespace Dagou\JqueryUi\Form;

use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class Theme {
    /**
     * @param array $params
     *
     * @return string
     * @throws \TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationExtensionNotConfiguredException
     * @throws \TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationPathDoesNotExistException
     */
    public function render(array $params): string {
        $themes = [
            '',
        ];

        $path = Environment::getExtensionsPath().'/jquery_ui/Resources/Public/themes/';

        $dir = dir($path);
        while (($entry = $dir->read()) !== FALSE) {
            if ($entry !== '.' && $entry !== '..' && is_dir($path.$entry)) {
                $themes[] = $entry;
            }

            $options[] = '<option value="'.$entry.'">'.$GLOBALS['LANG']->sL(ucwords(str_replace('_', ' ', $entry))).'</option>';
        }

        sort($themes);

        $value = GeneralUtility::makeInstance(ExtensionConfiguration::class)->get('jquery_ui', 'theme') ?? $params['fieldValue'];

        return '<select id="em-jquery_ui-'.$params['fieldName'].'" class="form-control" name="'.$params['fieldName'].'">'
                .implode(
                    '',
                    array_map(
                        function(string $theme) use ($value) {
                            return '<option value="'.$theme.'"'.($theme === $value ? ' selected="selected"' : '').'>'
                                    .$GLOBALS['LANG']->sL(
                                        $theme ? ucwords(str_replace('-', ' ', $theme)) : 'None'
                                    )
                                .'</option>';
                        },
                        $themes
                    )
                )
            .'</select>';
    }
}