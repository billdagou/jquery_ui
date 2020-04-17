<?php
namespace Dagou\JqueryUi\CDN;

use Dagou\JqueryUi\Traits\Asset;

class Local extends AbstractCDN {
    use Asset;
    const URL = 'EXT:jquery_ui/Resources/Public/';
}