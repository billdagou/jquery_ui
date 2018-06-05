<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$_EXTKEY] = [
    'CDN' => [
        'jQuery' => \Dagou\JqueryUi\Cdn\jQuery::class,
        'Google' => \Dagou\JqueryUi\Cdn\Google::class,
        'Microsoft' => \Dagou\JqueryUi\Cdn\Microsoft::class,
        'CDNJS' => \Dagou\JqueryUi\Cdn\CDNJS::class,
        'jsDelivr' => \Dagou\JqueryUi\Cdn\jsDelivr::class,
    ],
    'Theme' => [
        'Base' => 'base',
        'Black Tie' => 'black-tie',
        'Blitzer' => 'blitzer',
        'Cupertino' => 'cupertino',
        'Dark Hive' => 'dark-hive',
        'Dot Luv' => 'dot-luv',
        'Eggplant' => 'eggplant',
        'Excite Bike' => 'excite-bike',
        'Flick' => 'flick',
        'Hot Sneaks' => 'hot-sneaks',
        'Humanity' => 'humanity',
        'Le Frog' => 'le-frog',
        'Mint Choc' => 'mint-choc',
        'Overcast' => 'overcast',
        'Pepper Grinder' => 'pepper-grinder',
        'Redmond' => 'redmond',
        'Smoothness' => 'smoothness',
        'South Street' => 'south-street',
        'Start' => 'start',
        'Sunny' => 'sunny',
        'Swanky Purse' => 'swanky-purse',
        'Trontastic' => 'trontastic',
        'UI darkness' => 'ui-darkness',
        'UI lightness' => 'ui-lightness',
        'Vader' => 'vader',
    ],
];