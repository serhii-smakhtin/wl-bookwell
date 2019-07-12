<?php

spl_autoload_register('register_bookwell_autoload');

function register_bookwell_autoload($class)
{
    $prefix = 'themes\\bookwell\\';
    $base_dir = BOOKWELL_DIR;
    $len = strlen($prefix);

    if(strncmp($prefix, $class, $len) != 0) {
        return;
    }

    $relative_class = substr($class, $len);

    $file = $base_dir . str_replace('\\', '/', $relative_class). '.php';
    if(file_exists($file)) {
        require_once $file;
    }
}