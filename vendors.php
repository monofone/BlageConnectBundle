#!/usr/bin/env php
<?php

$rootDir = getcwd();
$composer = $rootDir.'/composer.phar';

// install/update composer
if(file_exists($composer)){
    system(sprintf('php %s', $composer.' self-update'));
}else{
    system(sprintf('curl %s | php -d=phar.readonly=Off -d=phar.require_hash=Off', 'http://getcomposer.org/installer'));
}

//fetch dependencies
system(sprintf('php %s', $composer.' update'));