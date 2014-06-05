<?php
// Common options available to sami configuration files
return array(
    // The base directory of the codebase to be documented
    'codebase_path_pattern'  => '/tmp/php-docs/%s',

    // The directory to pass to srpintin which the documentation will be placed.
    'build_path_pattern' => '/webroot/docs.corp.tire-intelligence.com/%s/build/',

    // The base directory for the cache files used in generation
    'cache_path_pattern' => '/webroot/docs.corp.tire-intelligence.com/%s/cache/',
);

