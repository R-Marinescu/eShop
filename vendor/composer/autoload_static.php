<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3bbd4aa395f22fee75aaf156c4c0c166
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Repositories\\' => 13,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
            'Psr\\Container\\' => 14,
        ),
        'M' => 
        array (
            'Monolog\\' => 8,
        ),
        'D' => 
        array (
            'DatabaseConfig\\' => 15,
        ),
        'C' => 
        array (
            'Controllers\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Repositories\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Repositories',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/src',
        ),
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
        'DatabaseConfig\\' => 
        array (
            0 => __DIR__ . '/../..' . '/DatabaseConfig',
        ),
        'Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Controllers',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'Pimple' => 
            array (
                0 => __DIR__ . '/..' . '/pimple/pimple/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3bbd4aa395f22fee75aaf156c4c0c166::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3bbd4aa395f22fee75aaf156c4c0c166::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit3bbd4aa395f22fee75aaf156c4c0c166::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit3bbd4aa395f22fee75aaf156c4c0c166::$classMap;

        }, null, ClassLoader::class);
    }
}
