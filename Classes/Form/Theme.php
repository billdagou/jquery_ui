<?php
namespace Dagou\JqueryUi\Form;

use TYPO3\CMS\Core\Core\Environment;

class Theme {
    /**
     * @param array $params
     *
     * @return string
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

        return '<select id="em-'.$params['propertyName'].'" class="form-control" name="'.$params['fieldName'].'">'
                .implode('', array_map(function(string $theme) use ($params) {
                    return '<option value="'.$theme.'"'.($theme === $params['fieldValue'] ? ' selected="selected"' : '').'>'
                            .$GLOBALS['LANG']->sL(
                                $theme ? ucwords(str_replace('-', ' ', $theme)) : 'None'
                            )
                        .'</option>';
                }, $themes))
            .'</select>';
    }
}