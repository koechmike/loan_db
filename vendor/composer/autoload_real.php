<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitb1a824290d0c1a4b15b1ac7233bd8dfb
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitb1a824290d0c1a4b15b1ac7233bd8dfb', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitb1a824290d0c1a4b15b1ac7233bd8dfb', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitb1a824290d0c1a4b15b1ac7233bd8dfb::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
