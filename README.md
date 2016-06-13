# TYPO3 Extension: jQuery UI
EXT:jquery_ui allows you to use [jQuery UI](http://jqueryui.com/) in your extensions.

You can easily choose using CDN or local jQuery UI library.

**The extension version only matches jQuery UI library version, doesn't mean anything else.**

## How to use it
This extension depends on [EXT:jquery](https://github.com/billdagou/jquery), please make sure you have [EXT:jquery](https://github.com/billdagou/jquery) installed in your TYPO3, or at least existed.

You can load the library file in your PHP code.

	\Dagou\JqueryUi\Utility\JqueryUiUtility::loadJqueryUi();

Or, use the ViewHelper in your Fluid template.

	<html xmlns="http://www.w3.org/1999/xhtml" lang="en"
		xmlns:jqui="http://typo3.org/ns/Dagou/JqueryUi/ViewHelpers">
		<jqui:load />
	</html>

#### LoadViewHelper
The ViewHelper you need to load jQuery UI library in your Fluid template.

	<jqui:load />

Allowed attributes:

- `js` (string)
Customized jQuery UI library.

- `css` (string)
Customized jQuery UI theme.

- `footer` (boolean)
Add the library to footer or not. Default: `TRUE`.

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