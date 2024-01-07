<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit71007b67e8b8815f2a2a405545b9881a
{
    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/../..' . '/class',
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->fallbackDirsPsr4 = ComposerStaticInit71007b67e8b8815f2a2a405545b9881a::$fallbackDirsPsr4;
            $loader->classMap = ComposerStaticInit71007b67e8b8815f2a2a405545b9881a::$classMap;

        }, null, ClassLoader::class);
    }
}
