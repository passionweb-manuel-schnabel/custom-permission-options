<?php

return [
    'web_permissionsbackendmodule' => [
        'parent' => 'web',
        'position' => ['after' => 'web_info'],
        'access' => 'user',
        'workspaces' => 'live',
        'path' => '/module/page/permissionsbackendmodule',
        'icon'   => 'EXT:custom_permission_options/Resources/Public/Icons/Extension.png',
        'labels' => 'LLL:EXT:custom_permission_options/Resources/Private/Language/locallang_db.xlf',
        'extensionName' => 'CustomPermissionOptions',
        'controllerActions' => [
            \Passionweb\CustomPermissionOptions\Controller\CustomPermissionController::class => 'printPermissions',
        ],
    ]
];
