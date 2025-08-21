<?php

return [
    'default' => 'default',

    'documentations' => [
        'default' => [
            'api' => [
                'title' => 'test29 API',
            ],

            'routes' => [
                'api' => 'api/documentation',
                'middleware' => [
                    'api' => [],
                ],
            ],

            'paths' => [
                'docs' => storage_path('api-docs'),
                'docs_json' => 'api-docs.json',
                'docs_yaml' => 'api-docs.yaml',
                'format_to_use_for_docs' => env('L5_FORMAT_TO_USE_FOR_DOCS', 'json'),
                'annotations' => [
                    base_path('app'),
                    base_path('routes/api.php'),
                ],
                'excludes' => [],
                'base' => env('L5_SWAGGER_CONST_HOST', 'http://127.0.0.1:6080'),
                'use_absolute_path' => env('L5_SWAGGER_USE_ABSOLUTE_PATH', true),
                'swagger_ui_assets_path' => env('L5_SWAGGER_UI_ASSETS_PATH', 'vendor/swagger-api/swagger-ui/dist/'),
            ],

            'generate_always' => false,

            'securityDefinitions' => [
                'bearerAuth' => [
                    'type' => 'http',
                    'description' => 'Bearer token',
                    'scheme' => 'bearer',
                    'bearerFormat' => 'Token',
                ],
            ],

            'constants' => [
                'L5_SWAGGER_CONST_HOST' => env('L5_SWAGGER_CONST_HOST', 'http://127.0.0.1:6080'),
            ],
        ],
    ],
];
