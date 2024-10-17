<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die();

$lll = 'LLL:EXT:custom_permission_options/Resources/Private/Language/locallang_db.xlf:';

$GLOBALS['TYPO3_CONF_VARS']['BE']['customPermOptions']['tx_custom_permission_options'] = [
    'header' => $lll . 'customPermOptions.header',
    'items' => [
        'extended_file_access' => [
            $lll . 'customPermOptions.extendFileAccess',
            'tx-custom-permission-options',
            $lll . 'customPermOptions.extendFileAccessDescription',
        ],
        'extended_pages_access' => [
            $lll . 'customPermOptions.extendPagesAccess',
            'tx-custom-permission-options',
            $lll . 'customPermOptions.extendPagesAccessDescription',
        ],
    ],
];



