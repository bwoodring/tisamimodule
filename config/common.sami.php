<?php
/**
 * The common sami config that builds the config instance, bootstraps and
 * starts the generation process based on config variables provided.
 *
 * This file should be included as part of a larger sami config file.
 * (See sami.php for an example implementation.)
 *
 * @author Chris Chandler <chris.chandler@tire-intelligence.com>
 * @link https://github.com/fabpot/Sami Home of Sami documentor project
 */

// Make sure configuration has been provided
if (!isset($projectConfig) || !is_array($projectConfig)) {
    throw new \ErrorException('Unable to find project configuration for TiSami');
}

// Create new option instance
$options = new \TiSamiModule\Config\Options();
$options->setCodebaseDir($projectConfig['codebase_path'])
        ->setBuildDir($projectConfig['build_path'])
        ->setCacheDir($projectConfig['cache_path'])
        ->setApiTitle($projectConfig['api_title'])
        ->setNumberOfTags($projectConfig['number_of_tags']);

$bootstrap = new TiSamiModule\Bootstrap($options);

return $bootstrap->getSami();