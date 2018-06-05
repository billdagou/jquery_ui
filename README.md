# TYPO3 Extension: jQuery UI
EXT:jquery_ui allows you to use [jQuery UI](http://jqueryui.com/) in your extensions.

You can easily choose using CDN or local jQuery UI library.

**The extension version only matches jQuery UI library version, doesn't mean anything else.**

## How to use it
You can load the libraries in your Fluid template with **LoadViewHelper** and **LoadThemeViewHelper**.

	<html xmlns="http://www.w3.org/1999/xhtml" lang="en"
		xmlns:jqui="http://typo3.org/ns/Dagou/JqueryUi/ViewHelpers"
		data-namespace-typo3-fluid="true">
		<jqui:load />
		<jqui:loadTheme />
	</html>

You can also load your own libraries.

    <jqui:load js="..." />
	<jqui:loadTheme theme="..." />
    
Or, load the JS before the &lt;BODY&gt; tag.

    <jqui:loadJs footer="false" />
    
To add new CDN source, please refer to `\Dagou\JqueryUi\Cdn\jQuery` and update `$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['jquery_ui']['CDN']` accordingly.