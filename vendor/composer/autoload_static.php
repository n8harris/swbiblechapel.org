<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit08d0c91b39f1fa7d2fc1fe75b9027bee
{
    public static $files = array (
        'c964ee0ededf28c96ebd9db5099ef910' => __DIR__ . '/..' . '/guzzlehttp/promises/src/functions_include.php',
        'a0edc8309cc5e1d60e3047b5df6b7052' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/functions_include.php',
        '37a3dc5111fe8f707ab4c132ef1dbc62' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/functions_include.php',
        '91ccd40a15ce8ec6611bc8472a37520b' => __DIR__ . '/..' . '/directus/sdk/src/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'Z' => 
        array (
            'Zend\\Stdlib\\' => 12,
            'Zend\\Db\\' => 8,
        ),
        'P' => 
        array (
            'Psr\\Http\\Message\\' => 17,
        ),
        'L' => 
        array (
            'League\\Flysystem\\' => 17,
        ),
        'G' => 
        array (
            'GuzzleHttp\\Psr7\\' => 16,
            'GuzzleHttp\\Promise\\' => 19,
            'GuzzleHttp\\' => 11,
        ),
        'D' => 
        array (
            'Directus\\Util\\' => 14,
            'Directus\\SDK\\' => 13,
            'Directus\\Permissions\\' => 21,
            'Directus\\Hook\\' => 14,
            'Directus\\Hash\\' => 14,
            'Directus\\Filesystem\\' => 20,
            'Directus\\Database\\' => 18,
            'Directus\\Config\\' => 16,
            'Directus\\Collection\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Zend\\Stdlib\\' => 
        array (
            0 => __DIR__ . '/..' . '/zendframework/zend-stdlib/src',
        ),
        'Zend\\Db\\' => 
        array (
            0 => __DIR__ . '/..' . '/zendframework/zend-db/src',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'League\\Flysystem\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/flysystem/src',
        ),
        'GuzzleHttp\\Psr7\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/psr7/src',
        ),
        'GuzzleHttp\\Promise\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/promises/src',
        ),
        'GuzzleHttp\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/guzzle/src',
        ),
        'Directus\\Util\\' => 
        array (
            0 => __DIR__ . '/..' . '/directus/utils',
        ),
        'Directus\\SDK\\' => 
        array (
            0 => __DIR__ . '/..' . '/directus/sdk/src',
        ),
        'Directus\\Permissions\\' => 
        array (
            0 => __DIR__ . '/..' . '/directus/permissions',
        ),
        'Directus\\Hook\\' => 
        array (
            0 => __DIR__ . '/..' . '/directus/hook',
        ),
        'Directus\\Hash\\' => 
        array (
            0 => __DIR__ . '/..' . '/directus/hash',
        ),
        'Directus\\Filesystem\\' => 
        array (
            0 => __DIR__ . '/..' . '/directus/filesystem',
        ),
        'Directus\\Database\\' => 
        array (
            0 => __DIR__ . '/..' . '/directus/database',
        ),
        'Directus\\Config\\' => 
        array (
            0 => __DIR__ . '/..' . '/directus/config',
        ),
        'Directus\\Collection\\' => 
        array (
            0 => __DIR__ . '/..' . '/directus/collection',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit08d0c91b39f1fa7d2fc1fe75b9027bee::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit08d0c91b39f1fa7d2fc1fe75b9027bee::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
