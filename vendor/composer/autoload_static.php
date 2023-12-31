<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2f69ee0ddbc04cd6439d8993db52cbbf
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'Giaco\\ProjetPoo\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Giaco\\ProjetPoo\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2f69ee0ddbc04cd6439d8993db52cbbf::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2f69ee0ddbc04cd6439d8993db52cbbf::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2f69ee0ddbc04cd6439d8993db52cbbf::$classMap;

        }, null, ClassLoader::class);
    }
}
