<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider;

return [
    'tx-custom-permission-options' => [
        'provider' => BitmapIconProvider::class,
        'source' => 'EXT:custom_permission_options/Resources/Public/Icons/Extension.png',
    ],
];
