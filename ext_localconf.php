<?php
defined('TYPO3_MODE') || die();

$GLOBALS['TYPO3_CONF_VARS']['SYS']['fluid']['namespaces']['jqui'] = [
    'Dagou\\JqueryUi\\ViewHelpers',
];

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$_EXTKEY] = [
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