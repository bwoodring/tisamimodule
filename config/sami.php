<?php
/**
 * The file used to configure the Sami php documentation engine.
 *
 * For generating documentation against the TiSamiModule project itself
 *
 * @author Chris Chandler <chris.chandler@tire-intelligence.com>
 * @link https://github.com/fabpot/Sami Home of Sami documentor project
 */

// Require common options
$common = require_once 'common.config.php';

// Replace the options below with the information pertinent to the
// project being documented.
$projectConfig = array(
    // The path to the codebase being generated
    'codebase_path' => __DIR__ . '/../src/TiSamiModule',

    // The path in which to save generated documentation
    'build_path' => sprintf($common['build_path_pattern'], 'ti-sami-module'),

    // The path in which to save cached files from generation process
    'cache_path' => sprintf($common['cache_path_pattern'], 'ti-sami-module'),

    // The documentation title
    'api_title' => 'TiSamiModule API',

    // The number of tags back to generate documentation for
    'number_of_tags' => 3
);

// Require the common sami config that builds the config instance,
// bootstraps and starts the generation process
return require 'common.sami.php';