<?php
// ini_set commands

// Path Constants
define('DIR_BASE',              substr(__FILE__, 0, strpos(__FILE__, 'private/')));
define('DIR_PUBLIC',            DIR_BASE . 'public'     . DIRECTORY_SEPARATOR);
define('DIR_PRIVATE',           DIR_BASE . 'private'    . DIRECTORY_SEPARATOR);
define('DIR_DEV',               DIR_BASE . 'dev'        . DIRECTORY_SEPARATOR);
define('DIR_DB',                DIR_DEV . 'db'          . DIRECTORY_SEPARATOR);
define('DIR_VENDORS',           DIR_BASE . 'vendors'    . DIRECTORY_SEPARATOR);
define('DIR_TEMP',              DIR_BASE . 'temp'       . DIRECTORY_SEPARATOR);

// additional ini_set commands that depend on the above constants
ini_set('session.save_path',    DIR_TEMP . 'session');


// additional constants


/**
 * escape
 * Standard output encoding for XHTML+UTF8 content
 * @return UTF8 and XHTML compatible output.
 */
function escape($input) {
    return htmlentities($input, ENT_QUOTES, 'UTF-8');
}

/**
 * pre_dump
 * simple function to recursively inspect a PHP object output
 * @return (string) serialized HTML markup displaying the internals of a PHP object with indentation
 */
function pre_dump($input) {
    echo '<div><pre>' . escape(print_r($input, TRUE)) . '</pre></div>' . "\n";
}

/**
 * djw_autoload
 * Autoload function for loading a class by name.  This is registered to the PHP magic function so
 * it is called implicitly whenever PHP encounters a classname it does not have loaded.
 * Call <pre><code>class_exists('Foo_Class');</code></pre> to force this function to execute.
 * Classes that take the form MVC_*, Controller_*, Model_*, and View_* are autoloaded from specific
 * directories using the Zend class-filesystem convention.
 */
function djw_autoload($name) {
    $filepath           = NULL;
    $class_parts        = explode('_', strtolower($name));

    // detect the filesystem path based on the classname

    if(!empty($filepath)) {
        @include($filepath);
    }
}
// register ``djw_autoload`` with the PHP autoload appliance
spl_autoload_register('djw_autoload');
