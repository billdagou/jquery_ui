# TYPO3 Extension: jQuery UI
EXT:jquery_ui allows you to use [jQuery UI](http://jqueryui.com/) in your extensions.

You can easily choose using CDN or local jQuery UI library.

**The extension version only matches jQuery UI library version, doesn't mean anything else.**

## How to use it
This extension depends on [EXT:jquery](https://github.com/billdagou/jquery), please make sure you have [EXT:jquery](https://github.com/billdagou/jquery) installed in your TYPO3, or at least existed.

All you need is to load the library file.

	\Dagou\JqueryUi\Utility\JqueryUiUtility::loadJqueryUi();

## How to maintain the CDN resources
To replace or add new CDN resources, please update $GLOBALS\['TYPO3\_CONF\_VARS'\]\['EXTCONF'\]\['jquery_ui'\]\['CDN'\] in your own extension.

	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['jquery']['CDN']['New_CDN_Name'] = array(
		'js' => '...',
		'css' => '...'
	);

Use `###THEME###` to replace the theme name in $GLOBALS\['TYPO3\_CONF\_VARS'\]\['EXTCONF'\]\['jquery\_ui'\]\['CDN'\]\['New\_CDN\_Name'\]\['css'\].

## How to use my own jQuery UI library
Sometimes, you don't want to load all the components, or maybe use your own theme. You can simply specify your own JS library or CSS theme.

	\Dagou\JqueryUi\Utility\JqueryUiUtility::loadJqueryUi('Js_Library', 'Css_Theme');

**Both file paths are relative to PATH_SITE.**