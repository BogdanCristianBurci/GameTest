<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit85df80f1877f1bba1754b6f7a8b185a8
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit85df80f1877f1bba1754b6f7a8b185a8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit85df80f1877f1bba1754b6f7a8b185a8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit85df80f1877f1bba1754b6f7a8b185a8::$classMap;

        }, null, ClassLoader::class);
    }
}