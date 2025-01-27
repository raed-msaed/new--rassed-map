<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application for file storage.
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),
    # 'default' => env('FILESYSTEM_DISK', 'public'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Below you may configure as many filesystem disks as necessary, and you
    | may even configure multiple disks for the same driver. Examples for
    | most supported storage drivers are configured here for reference.
    |
    | Supported drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app/private'),
            'serve' => true,
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
            'throw' => false,
        ],
        // 'public' => [
        //     'driver' => 'local',
        //     'root' => '/mnt/nas/storage/attachment',
        //     'url' => env('APP_URL').'/storage',
        //     'visibility' => 'public',
        // ],



        'icons' => [
            'driver' => 'local',
            'root' => storage_path('app/public/icons'),
            'url' => env('APP_URL') . '/storage/icons',
            'visibility' => 'public',
            'throw' => false,
        ],

        // 'attachment' => [
        //     'driver' => 'local',
        //     'root' => storage_path('app/public/attachment'),
        //     'url' => env('APP_URL') . '/storage/attachment',
        //     'visibility' => 'public',
        //     'throw' => false,
        // ],
        // 'attachment' => [
        //             'driver' => 'ftp',  // Use 'ftp' or 's3' depending on your NAS protocol
        //             'host' => '192.168.100.176',
        //             'username' => 'userjrc',
        //             'password' => 'Jrc@2025',
        //             'root' => '/storage/attachement',
        //             'port' => 21,  // Optional: Default is 22 for SSH/SFTP
        //             'visibility' => 'public',  // 'private' or 'public'
        //             'timeout' => 30,  // Optional: Timeout in seconds
        // ],
        // 'nas' => [
        //     'driver' => 'local',
        //     'root' => '/mnt/nas', // Point to the NAS mount directory
        //     'url' => env('APP_URL') . '/storage/nas', // Optional: Customize URL if needed
        //     'visibility' => 'public',
        // ],
        
        'nas' => [
            'driver' => 'local',
            'root' => '/mnt/nas',
            'permissions' => [
                'file' => [
                    'public' => 0664,
                    'private' => 0600,
                ],
                'dir' => [
                    'public' => 0775,
                    'private' => 0700,
                ],
            ],
        ],



        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
        public_path('nas') => '/mnt/nas/storage', // Add a symbolic link for NAS if required
    ],

];
