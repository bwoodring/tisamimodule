<?php
/**
 * The file used to configure the Sami php documentation engine.
 *
 * For generating documentation against the SecurityMgmtModule project.
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
    'codebase_path' => sprintf($common['codebase_path_pattern'],
        'SecurityMgmtModule'),

    // The path in which to save generated documentation
    'build_path' => sprintf($common['build_path_pattern'],
        'security-mgmt-module'),

    // The path in which to save cached files from generation process
    'cache_path' => sprintf($common['cache_path_pattern'],
        'security-mgmt-module'),

    // The documentation title
    'api_title' => 'SecurityMgmtModule API',

    // The number of tags back to generate documentation for
    'number_of_tags' => 3
);

// Require the common sami config that builds the config instance,
// bootstraps and starts the generation process
return require_once 'common.sami.php';