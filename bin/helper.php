<?php

/**
 * Reflector helper functions
 */

/**
 * include a file in the app scope
 * @param  string $className name of the class to load
 *                           cache the class => filename ??
 * @param  string $fileName  full path the class file
 * @return void
 */
function includeFile($className = '', $fileName = '') {
    $className = preg_replace('/\\\/', '', $className);
    // $fileName = getClassFile($className);
    if (is_array($fileName)) {
        echo "array of files for {$className}...\n";
    } else {
        require_once $fileName;
    }
}
