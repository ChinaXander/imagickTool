<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita885513c81868ef36f7ca59a4f1eee68
{
    public static $prefixLengthsPsr4 = array (
        't' => 
        array (
            'tools\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'tools\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/tools',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita885513c81868ef36f7ca59a4f1eee68::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita885513c81868ef36f7ca59a4f1eee68::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita885513c81868ef36f7ca59a4f1eee68::$classMap;

        }, null, ClassLoader::class);
    }
}
