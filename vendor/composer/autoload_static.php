<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbf6f8ac7e647b383992e3ada8b0dac33
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'CLIgame\\' => 8,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'CLIgame\\' => 
        array (
            0 => __DIR__ . '/../..' . '/lib',
        ),
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitbf6f8ac7e647b383992e3ada8b0dac33::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbf6f8ac7e647b383992e3ada8b0dac33::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbf6f8ac7e647b383992e3ada8b0dac33::$classMap;

        }, null, ClassLoader::class);
    }
}
