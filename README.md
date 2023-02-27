# TYPO3 Extension: jQuery UI

EXT:jquery_ui allows you to use [jQuery UI](https://jqueryui.com/) in your extensions.

**The extension version only matches the jQuery UI library version, it doesn't mean anything else.**

## How to use it
You can load the libraries in your Fluid template.

    <jqui:css />
    <jqui:js />

Add plugin locales.

    <jqui:locale locale="..." plugin="..." />

Or your own libraries.

    <jqui:css href="..." />
    <jqui:js src="..." />

For more options please refer to &lt;f:asset.css&gt; and &lt;f:asset.script&gt;.

To use other jQuery UI source, you can register it in `ext_localconf.php` or `AdditionalConfiguration.php`.

    \Dagou\JqueryUi\Utility\ExtensionUtility::registerSource(\Dagou\JqueryUi\Source\StackPath::class);

You may want to disable the other source and use the local one instead in some cases, for example saving page as PDF by [WKHtmlToPdf](https://wkhtmltopdf.org/).

    <jqui:css disableSource="true" />
    <jqui:js disableSource="true" />