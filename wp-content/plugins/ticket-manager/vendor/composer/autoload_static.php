<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita86465ecd11aba78bf6ee97d7a16f120
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Inc\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Inc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita86465ecd11aba78bf6ee97d7a16f120::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita86465ecd11aba78bf6ee97d7a16f120::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita86465ecd11aba78bf6ee97d7a16f120::$classMap;

        }, null, ClassLoader::class);
    }
}
