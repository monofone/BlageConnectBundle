<?php

$vendorDir = __DIR__.'/../vendor';

if (file_exists($file = $vendorDir.'/.composer/autoload.php')) {
    require_once $file;
} elseif (file_exists($vendorDir.'/symfony/src/Symfony/Component/ClassLoader/UniversalClassLoader.php')) {
    require_once $vendorDir.'/symfony/src/Symfony/Component/ClassLoader/UniversalClassLoader.php';

    $loader = new Symfony\Component\ClassLoader\UniversalClassLoader();
    $loader->registerNamespace('Symfony', array($vendorDir.'/symfony/src', $vendorDir.'/bundles'));
    $loader->register();
}

spl_autoload_register(function($class) {
    if (0 === strpos($class, 'Blage\\ConnectBundle\\')) {
        $path = __DIR__.'/../'.implode('/', array_slice(explode('\\', $class), 2)).'.php';
        if (!stream_resolve_include_path($path)) {
            return false;
        }
        require_once $path;
        return true;
    }
});