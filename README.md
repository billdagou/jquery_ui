# TYPO3 Extension: jQuery UI

EXT:jquery_ui allows you to use [jQuery UI](https://jqueryui.com/) in your extensions.

**The extension version only matches the jQuery UI library version, it doesn't mean anything else.**

## How to use it
You can load the libraries in your Fluid template easily.

    <jqui:loadCss />
    <jqui:loadJs />

You can also load your own libraries.

    <jqui:loadCss css="..." />
    <jqui:loadJs js="..." />
    
Or, load the javascript library on top.

    <jqui:loadJs footer="false" />
    
To enable the I18n, you can specify the locale code or detect it from your site language by code.

    <jqui:loadJs enableLocale="true" locale="zh-CN" />
    <jqui:loadJs enableLocale="true" />
    
To use the CDN resource, please set `$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['jquery_ui']['CDN']` in `ext_localconf.php` or `AdditionalConfiguration.php`.

    $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['jquery_ui']['CDN'] = \Dagou\JqueryUi\CDN\StackPath::class;