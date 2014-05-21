<?php
/**
 * The configuration file used to configure the Sami php documentation engine.
 *
 * Replace the options below with the information pertinent to the project
 * being documented.
 *
 * @author Chris Chandler <chris.chandler@tire-intelligence.com>
 * @link https://github.com/fabpot/Sami Home of Sami documentor project
 */

// Create new option instance
$options = new \TiSamiModule\Config\Options();
$options->setCodebaseDir(__DIR__ . '/../src/TiSamiModule')
        ->setBuildDir('/webroot/docs.corp.tire-intelligence.com/ti-sami-module/build')
        ->setCacheDir('/webroot/docs.corp.tire-intelligence.com/ti-sami-module/cache')
        ->setApiTitle('TiSamiModule API')
        ->setNumberOfTags(3);

$bootstrap = new TiSamiModule\Bootstrap($options);

return $bootstrap->getSami();