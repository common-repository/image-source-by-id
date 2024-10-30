<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1bda7c98030d659a37d58d40ff069847
{
    public static $files = array (
        '5164446c3aa7a26f1f7f2744233ee2ea' => __DIR__ . '/../..' . '/Inc/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'J' => 
        array (
            'JLTISRC\\Libs\\License\\' => 21,
            'JLTISRC\\Libs\\' => 13,
            'JLTISRC\\Inc\\Admin\\' => 18,
            'JLTISRC\\Inc\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'JLTISRC\\Libs\\License\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Libs/License',
        ),
        'JLTISRC\\Libs\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Libs',
        ),
        'JLTISRC\\Inc\\Admin\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Inc/Admin',
        ),
        'JLTISRC\\Inc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Inc',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1bda7c98030d659a37d58d40ff069847::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1bda7c98030d659a37d58d40ff069847::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1bda7c98030d659a37d58d40ff069847::$classMap;

        }, null, ClassLoader::class);
    }
}