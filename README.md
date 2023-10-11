# TYPO3 Extension: jQuery UI

EXT:jquery_ui allows you to use [jQuery UI](https://jqueryui.com/) in your extensions.

**The extension version only matches the jQuery UI library version, it doesn't mean anything else.**

## How to use it
You can load the library in your Fluid template easily.

    <f:asset.css identifier="jquery_ui" href="{jqui:uri.css()}" />
    <f:asset.script identifier="jquery_ui" src="{jqui:uri.js()}" />

And with the plugin locales.

    <f:asset.script identifier="jquery_ui.locale" src="{jqui:uri.locale(plugin: '...')}" />

Or specify the theme or locale.

    <f:asset.css identifier="jquery_ui" href="{jqui:uri.css(theme: '...')}" />
    <f:asset.script identifier="jquery_ui.locale" src="{jqui:uri.locale(plugin: '...', locale: '...')}" />

To use other jQuery UI source, you can register it in `ext_localconf.php` or `AdditionalConfiguration.php`.

    \Dagou\JqueryUi\Utility\ExtensionUtility::registerSource(\Dagou\JqueryUi\Source\StackPath::class);